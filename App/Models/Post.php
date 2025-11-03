<?php

namespace App\Models;

use Framework\Core\Model;

class Post extends Model
{
    protected ?int $id;
    protected string $text;
    protected string $picture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): Post
    {
        $this->text = $text;
        return $this;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): Post
    {
        $this->picture = $picture;
        return $this;
    }

}