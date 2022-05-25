<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable = [
        'user_id', 'post',
    ];
    //     public function update(Int $user_id, Int $id)
    // {
    //     return $this->where('user_id', $user_id)->where('id', $post)->first();
    // }
    //     public function delete(Int $user_id, Int $id)
    // {
    //     return $this->where('user_id', $user_id)->where('id', $post)->delete();
    // }
}
