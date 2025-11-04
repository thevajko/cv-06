<?php
namespace App\Models;

use Framework\Core\Model;

class Post extends Model
{
    public ?int $id = null;
    public ?string $text;
    public string $picture;
}
