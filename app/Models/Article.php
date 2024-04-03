<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//c'est mieux ecrire tous en anglais 
class Article extends Model
{
    use HasFactory;
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected $table = 'articles';
    protected $fillable = [
        'title', 'content', 'publication_date'
    ];
   
    public $timestamps = false; 
}


