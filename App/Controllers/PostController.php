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
}