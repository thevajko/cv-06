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

    private function processPostForm(Post $post, Request $request): array
    {
        $errors = [];
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
                return ['redirect' => true];
            }
        }
        return ['errors' => $errors, 'post' => $post];
    }

    public function add(Request $request): Response
    {
        $post = new Post();
        $result = $this->processPostForm($post, $request);
        if (!empty($result['redirect'])) {
            return $this->redirect('?c=Post&a=index');
        }
        return $this->html(['errors' => $result['errors'], 'post' => $result['post']], 'add');
    }

    public function edit(Request $request): Response
    {
        $id = $request->get('id');
        $post = Post::getOne($id);
        if (!$post) {
            return $this->redirect('?c=Post&a=index');
        }
        $result = $this->processPostForm($post, $request);
        if (!empty($result['redirect'])) {
            return $this->redirect('?c=Post&a=index');
        }
        return $this->html(['post' => $result['post'], 'errors' => $result['errors']], 'edit');
    }

    public function delete(Request $request): Response
    {
        $id = $request->get('id');
        $post = Post::getOne($id);
        if ($post) {
            $post->delete();
        }
        return $this->redirect('?c=post&a=index');
    }
}
