<?php
namespace App\Controllers;

use Framework\Core\BaseController;
use App\Models\Post;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
use Framework\Http\Responses\ViewResponse;
use Framework\Support\LinkGenerator;

class PostController extends BaseController
{
    public function index(Request $request): Response
    {
        $posts = Post::getAll();
        return $this->html(['posts' => $posts]);
    }

    public function add(Request $request): Response
    {
        $errors = [];
        if ($request->isPost()) {
            $text = trim($request->post('text'));
            $picture = trim($request->post('picture'));

            if (!$text) {
                $errors[] = 'Text je povinný.';
            }
            if (!$picture) {
                $errors[] = 'Obrázok (URL) je povinný.';
            }

            if (empty($errors)) {
                $post = new Post();
                $post->text = $text;
                $post->picture = $picture;
                $post->save();
                return $this->redirect('?c=Post&a=index');
            }
        }
        return $this->html(['errors' => $errors]);
    }
}
