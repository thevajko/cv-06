<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Post;

class PostController extends AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        $posts = Post::getAll();
        return $this->html(
            [
                'posts' => $posts
            ]
        );
    }

    public function add()
    {
        return $this->html();
    }

    public function edit()
    {
        $id = $this->request()->getValue('id');
        $post = Post::getOne($id);
        return $this->html(
            [
                'post' => $post
            ]
        );
    }

    public function save()
    {
        $id = $this->request()->getValue('id');

        if ($id > 0) {
            $post = Post::getOne($id);
        } else {
            $post = new Post();
        }

        $picture = $this->request()->getValue('picture');
        $text = $this->request()->getValue('text');

        $post->setText($text);
        $post->setPicture($picture);
        $post->save();
        return $this->redirect($this->url('index'));
    }

    public function delete()
    {
        $id = $this->request()->getValue('id');
        $post = Post::getOne($id);
        $post->delete();
        return $this->redirect($this->url('index'));
    }
}