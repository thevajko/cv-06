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
}