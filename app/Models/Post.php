<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'content',
        'likes'
    ];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    protected $primaryKey = 'post_id';
}
