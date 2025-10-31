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
        $post = new Post();
        if ($request->isPost()) {
            $post->text = trim($request->post('text'));
            $post->picture = trim($request->post('picture'));

            if (!$post->text) {
                $errors[] = 'Text je povinný.';
            }
            if (!$post->picture) {
                $errors[] = 'Obrázok (URL) je povinný.';
            }

            if (empty($errors)) {
                $post->save();
                return $this->redirect('?c=Post&a=index');
            }
        }
        return $this->html(['errors' => $errors, 'post' => $post], 'add');
    }

    public function edit(Request $request): Response
    {
        $errors = [];
        $id = $request->get('id');
        $post = Post::getOne($id);
        if (!$post) {
            return $this->redirect('?c=Post&a=index');
        }
        if ($request->isPost()) {
            $post->text = trim($request->post('text'));
            $post->picture = trim($request->post('picture'));
            if (!$post->text) {
                $errors[] = 'Text je povinný.';
            }
            if (!$post->picture) {
                $errors[] = 'Obrázok (URL) je povinný.';
            }
            if (empty($errors)) {
                $post->save();
                return $this->redirect('?c=Post&a=index');
            }
        }
        return $this->html(['post' => $post, 'errors' => $errors], 'edit');
    }
}
