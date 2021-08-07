<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    use HasFactory;
    protected $table = 'group_users';

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
