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
}

