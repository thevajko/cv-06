<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\RedirectResponse;
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
        return $this->html([
            'posts' => $posts
        ]);
    }

    public function add(): Response
    {
        return $this->html();
    }

    public function save()
    {
        $post = new Post();
        $post->setText($this->request()->getValue('text'));
        $post->setPicture($this->request()->getValue('picture'));

        $post->save();

        return new RedirectResponse($this->url("post.index"));
    }
}