<?php

namespace App\Controllers;

use App\Models\Post;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class PostController extends BaseController
{
    public function authorize(string $action): bool
    {
        return true;
    }

    public function index(Request $request): Response
    {
        // Load all posts ordered by id DESC
        $posts = Post::getAll(null, [], 'id DESC');

        return $this->html(compact('posts'));
    }

    public function add(Request $request): Response
    {
        // Show form for creating a new post
        $values = ['text' => '', 'picture' => ''];
        $errors = [];

        return $this->html(compact('values', 'errors'));
    }

    public function save(Request $request): Response
    {
        $values = [
            'text' => trim((string)$request->value('text')),
            'picture' => trim((string)$request->value('picture')),
        ];

        $errors = $this->validate($values);

        if (!empty($errors)) {
            // Show form again with errors and previous values
            return $this->html(compact('values', 'errors'), 'add');
        }

        // Save new post
        $post = new Post();
        $post->setText($values['text']);
        $post->setPicture($values['picture']);
        $post->save();

        // Redirect to posts list
        return $this->redirect($this->url('post.index'));
    }

    private function validate(array $values): array
    {
        $errors = [];
        // Required
        if ($values['picture'] === '') {
            $errors[] = 'Pole Súbor obrázka musí byť vyplnené!';
        }
        if ($values['text'] === '') {
            $errors[] = 'Pole Text príspevku musí byť vyplnené!';
        }

        // Picture must be a valid URL and have jpg or png extension
        if ($values['picture'] !== '') {
            if (filter_var($values['picture'], FILTER_VALIDATE_URL) === false) {
                $errors[] = 'Obrázok musí byť platná URL!';
            } else {
                $ext = strtolower(pathinfo(parse_url($values['picture'], PHP_URL_PATH), PATHINFO_EXTENSION));
                if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
                    $errors[] = 'Obrázok musí byť typu JPG alebo PNG!';
                }
            }
        }

        // Text length
        if ($values['text'] !== '' && mb_strlen($values['text']) < 5) {
            $errors[] = 'Počet znakov v texte príspevku musí byť aspoň 5!';
        }

        return $errors;
    }
}
