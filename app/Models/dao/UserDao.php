<?php

namespace App\Models\dao;

use Illuminate\Database\Eloquent\Model;

class UserDao extends Model
{
    protected $table = 'users';

    protected $fillable = ['id', 'name', 'email', 'isAdmin', 'status', 'isTeacher', 'created_at', 'updated_at'];

    protected $hidden = ['password'];

    public $timestamps = false;

}