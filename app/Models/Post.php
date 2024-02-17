<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['title', 'slug', 'body', 'enabled', 'published_at', 'user_id'];
    protected $dates = ['published_at', 'deleted_at'];


    public function user(){
        return $this->belongsTo('App\Models\User');
        }
}
