<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    protected $table = 'comments';
    protected $fillable = [
        'content_comment', 'date', 'article_id'
    ];
   
    public $timestamps = false;
}