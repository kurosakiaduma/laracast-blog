<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /*Mass assignment fields*/
    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'author', 'category_id'];

    /* Protected fields from mass assignment to avoid vulnerabilities*/
    protected $guarded = ['id'];

    public function category()
    {
        #LARAVEL's relationship types
        # hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);

    }

}
