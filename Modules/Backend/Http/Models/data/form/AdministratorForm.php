<?php

namespace Modules\Backend\Http\Models\data\form;

use Illuminate\Database\Eloquent\Model;

class AdministratorForm extends Model
{
    protected $fillable = ['name', 'email', 'password', 'isAdmin', 'created_at', 'updated_time'];
}