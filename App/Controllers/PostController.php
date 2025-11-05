<?php

namespace App\Controllers;

use App\Models\Post;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class PostController extends BaseController
{
    public function index(Request $request): Response
    {
        $posts = Post::getAll();
        return $this->html(compact('posts'));
    }

    // Add action to show form (GET) and handle submission (POST)
    public function add(Request $request): Response
    {
        // If form submitted
        if ($request->isPost()) {
            $text = trim((string)($request->post('text') ?? ''));
            $picture = trim((string)($request->post('picture') ?? ''));

            $errors = [];
            if ($text === '') {
                $errors['text'] = 'Text je povinný.';
            }

            // picture URL is required and must be a valid URL
            if ($picture === '') {
                $errors['picture'] = 'URL obrázka je povinná.';
            } elseif (!filter_var($picture, FILTER_VALIDATE_URL)) {
                $errors['picture'] = 'Neplatná URL.';
            }

            if (empty($errors)) {
                $post = new Post();
                $post->setText($text);
                $post->setPicture($picture);
                $post->save();

                // redirect to post index
                return $this->redirect($this->url('post.index'));
            }

            // re-render form with errors and old input
            return $this->html([
                'errors' => $errors,
                'old' => ['text' => $text, 'picture' => $picture]
            ]);
        }

        // GET -> show empty form
        return $this->html(['errors' => [], 'old' => []]);
    }
}