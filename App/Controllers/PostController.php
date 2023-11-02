<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\Response;
use App\Core\Responses\ViewResponse;
use App\Helpers\FileStorage;
use App\Models\Post;

class PostController extends AControllerBase
{
    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        return $this->redirect("home.index");
    }

    public function add(): Response
    {
        return $this->processRequest(new Post());
    }

    public function edit(): Response
    {
        $post = Post::getOne($this->request()->getValue("id"));
        if ($post == null)
        {
            throw new HTTPException(404);
        }
        return $this->processRequest($post);
    }

    public function delete(): Response
    {
        $post = Post::getOne($this->request()->getValue("id"));
        if ($post == null)
        {
            throw new HTTPException(404);
        }
        FileStorage::deleteFile($post->getPicture());
        $post->delete();
        return $this->redirect($this->url("home.index"));
    }

    private function processRequest(Post $post): Response
    {
        $errors = [];
        //Formular nebol ešte odoslany
        if ($this->request()->getPost() == []) {
             return $this->html(compact("post", "errors"), "form");
        }

        $postText = trim($this->request()->getValue('text'));
        $postPicture = @$this->request()->getFiles()['picture'];

        //Validujeme
        if ($postText == "") {
            $errors[] = "Pole Text príspevku musí byť vyplnené!";
        }
        else if (strlen($postText) < 10) {
            $errors[] = "Post príspevku musí mať aspoň 10 znakov";
        }

        //Obrazok musí byt len v pripade, že editujeme post
        if ($post->getId() == null) {
            if ($postPicture == null || $postPicture['name'] == "") {
                $errors[] = "Pole Súbor obrázka musí byť vyplnené!";
            }
        }
        if ($postPicture != null && $postPicture['name'] != "" && !in_array($postPicture['type'], ['image/jpeg', 'image/png'])) {
            $errors[] = "Obrázok musí byť typu JPG alebo PNG!";
        }

        //Bind hodnôt do postu, subor tam nemám aký nastavit
        $post->setText($postText);

        //Formular obsahuje chyby, neukladame
        if (count($errors) > 0) {
            return $this->html(compact("post", "errors"), "form");
        }


        //Ukladanie formulara
        if ($postPicture != null && $postPicture['name'] != "") {
            if ($post->getPicture() != null && $post->getPicture() != "") {
                FileStorage::deleteFile($post->getPicture());
            }
            $newFileName = FileStorage::saveFile($this->request()->getFiles()['picture']);
            $post->setPicture($newFileName);
        }
        $post->save();
        return $this->redirect($this->url("home.index"));
    }
}