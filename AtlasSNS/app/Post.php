<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    //

    protected $fillable = [
        'user_id', 'post', 'username',
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }

            public function getFollowCount($user_id)
    {
        return $this->where('following_id', $user_id)->count();
    }

    public function getFollowerCount($user_id)
    {
        return $this->where('followed_id', $user_id)->count();
    }
    //     public function update(Int $user_id, Int $id)
    // {
    //     return $this->where('user_id', $user_id)->where('id', $post)->first();
    // }
    //     public function delete(Int $user_id, Int $id)
    // {
    //     return $this->where('user_id', $user_id)->where('id', $post)->delete();
    // }
}
