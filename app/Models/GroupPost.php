<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPost extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'user_id', 'body', 'image', 'group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
