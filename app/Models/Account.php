<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = 'account_id';

    protected $guarded = [];

    public function roles()
    {
        return $this->hasOne(Role::class, 'role_id', 'role_id');
    }
}
