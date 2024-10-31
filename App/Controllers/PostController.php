<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
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

    public function edit(): Response
    {
        $id = (int)$this->request()->getValue('id');
        $post = Post::getOne($id);

        if (is_null($post)) {
            throw new HTTPException(404);
        }

        return $this->html(
            [
                'post' => $post
            ]
        );
    }

    public function save()
    {
        $id = (int)$this->request()->getValue('id');

        if ($id > 0) {
            $post = Post::getOne($id);
        } else {
            $post = new Post();
        }

        $post->setText($this->request()->getValue('text'));
        $post->setPicture($this->request()->getValue('picture'));

        $post->save();
        return new RedirectResponse($this->url("post.index"));

    }

    public function delete()
    {
        $id = (int)$this->request()->getValue('id');
        $post = Post::getOne($id);

        $post->delete();
        return new RedirectResponse($this->url("post.index"));

    }
}