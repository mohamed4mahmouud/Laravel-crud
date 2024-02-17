<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialUser extends Model
{
    use HasFactory;

    protected $fillable = ['provider', 'provider_user_id', 'token', 'user_id'];

    public function user(){
        return $this->belongsTo('App\Models\User');
        }
}
