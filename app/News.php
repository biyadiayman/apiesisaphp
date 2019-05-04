<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $filePath
 * @property string $postDate
 */
class News extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'content', 'filePath', 'postDate'];

    public function setUpdatedAt($value)
    {
      return NULL;
    }


    public function setCreatedAt($value)
    {
      return NULL;
    }
}
