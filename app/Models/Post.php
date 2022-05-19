<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $garded=[];/* Champ protégé "à vide"*/

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    /* Chaque fois que je fais un "getTitleAttribute" ,je récupère "$attribute" */
    public function getTitleAttribute($attribute){
        return Str::title($attribute);
    }
}
