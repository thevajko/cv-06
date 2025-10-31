<?php
// Model for the 'posts' table based on the provided DDL
namespace App\Models;

use Framework\Core\Model;

class Post extends Model
{
    /**
     * @var int
     */
    public ?int $id = null;

    /**
     * @var string
     */
    public string $text = "";

    /**
     * @var string
     */
    public string $picture;

    // Optionally, you can define the table name if it doesn't follow conventions
    protected static string $table = 'posts';

    // Optionally, you can define the primary key if it doesn't follow conventions
    protected static ?string $primaryKey = 'id';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): void
    {
        $this->picture = $picture;
    }

}
