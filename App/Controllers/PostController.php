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
        return $this->html([
            'posts' => Post::getAll()
        ]);
    }

    public function add()
    {
        return $this->html();
    }

    public function save()
    {
        $picture = $this->request()->getValue('picture');
        $text = $this->request()->getValue('text');

        $post = new Post();
        $post->setText($text);
        $post->setPicture($picture);
        $post->save();

        return $this->redirect($this->url('post.index'));
    }
}