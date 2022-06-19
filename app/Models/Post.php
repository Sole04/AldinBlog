<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable=["title","slug","short_description","content","user_id","picture"];
   

    public function sluggable():array{
        return [
            "slug"=>[
                'source'=>"title"
            ]
        ];
    }


}