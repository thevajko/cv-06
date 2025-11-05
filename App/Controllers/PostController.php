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
        // Only render the form for GET. Saving is handled by `save` action.
        return $this->html(['errors' => [], 'old' => []]);
    }

    // Show edit form for existing post (GET)
    public function edit(Request $request): Response
    {
        $id = $request->value('id');
        if ($id === null) {
            // no id provided, redirect to index
            return $this->redirect($this->url('post.index'));
        }

        $post = Post::getOne($id);
        if ($post === null) {
            return $this->redirect($this->url('post.index'));
        }

        $old = [
            'id' => $post->getId(),
            'text' => $post->getText(),
            'picture' => $post->getPicture(),
        ];

        return $this->html(['errors' => [], 'old' => $old], 'add');
    }

    // Handle saving both new and existing posts
    public function save(Request $request): Response
    {
        if (!$request->isPost()) {
            return $this->redirect($this->url('post.index'));
        }

        $id = $request->post('id');
        $text = trim((string)($request->post('text') ?? ''));
        $picture = trim((string)($request->post('picture') ?? ''));

        $errors = [];
        if ($text === '') {
            $errors['text'] = 'Text je povinný.';
        }

        if ($picture === '') {
            $errors['picture'] = 'URL obrázka je povinná.';
        } elseif (!filter_var($picture, FILTER_VALIDATE_URL)) {
            $errors['picture'] = 'Neplatná URL.';
        }

        if (!empty($errors)) {
            $old = ['id' => $id, 'text' => $text, 'picture' => $picture];
            return $this->html(['errors' => $errors, 'old' => $old], 'add');
        }

        if ($id) {
            $post = Post::getOne($id);
            if ($post === null) {
                return $this->redirect($this->url('post.index'));
            }
        } else {
            $post = new Post();
        }

        $post->setText($text);
        $post->setPicture($picture);
        $post->save();

        return $this->redirect($this->url('post.index'));
    }

    public function delete(Request $request): Response
    {
        $id = $request->value('id');
        if ($id !== null) {
            $post = Post::getOne($id);
            if ($post !== null) {
                $post->delete();
            }
        }
        return $this->redirect($this->url('post.index'));
    }
}