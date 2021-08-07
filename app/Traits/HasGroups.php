<?php

namespace App\Traits;

use App\Models\Group;

trait HasGroups
{
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_users');
    }
}
