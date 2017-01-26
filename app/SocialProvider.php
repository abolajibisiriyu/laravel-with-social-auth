<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
    //

    protected $fillable = ['provider_id', 'provider', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
