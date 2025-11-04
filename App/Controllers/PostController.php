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
        return $this->html(['posts' => $posts]);
    }

    public function add(Request $request): Response
    {
        if ($request->isPost()) {
            return $this->save($request);
        }

        $errors = [];
        $picture = '';
        $text = '';
        return $this->html(['errors' => $errors, 'picture' => $picture, 'text' => $text]);
    }

    public function save(Request $request): Response
    {
        $picture = trim($request->value('picture'));
        $text = trim($request->value('text'));
        $errors = [];
        // Validácia povinných polí
        if ($picture === '') {
            $errors[] = 'Pole Obrázok (URL) musí byť vyplnené!';
        }
        if ($text === '') {
            $errors[] = 'Pole Text príspevku musí byť vyplnené!';
        }
//        // Validácia obrázka (jpg/png)
//        if ($picture !== '' && !preg_match('/\\.(jpg|jpeg|png)$/i', $picture)) {
//            $errors[] = 'Obrázok musí byť typu JPG alebo PNG!';
//        }
        // Validácia dĺžky textu
        if ($text !== '' && mb_strlen($text) < 5) {
            $errors[] = 'Počet znakov v texte príspevku musí byť aspoň 5!';
        }
        if (!empty($errors)) {
            return $this->html(['errors' => $errors, 'picture' => $picture, 'text' => $text]);
        }
        // Uloženie do DB
        $post = new Post();
        $post->picture = $picture;
        $post->text = $text;
        $post->save();
        // Presmerovanie na zoznam príspevkov
        return $this->redirect($this->url("post.index"));
    }
    public function delete(Request $request): Response
    {
        $id = $request->value('id');
        if ($id) {
            $post = Post::getOne($id);
            if ($post) {
                $post->delete();
            }
        }
        return $this->redirect($this->url('Post.index'));
    }
}