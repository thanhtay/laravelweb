<?php

namespace App\Models\dao;

use Illuminate\Database\Eloquent\Model;

class UserDao extends Model
{
    protected $table = 'users';

    protected $fillable = ['id', 'name', 'email', 'isAdmin', 'updated_at'];

    protected $hidden = ['password'];
}
