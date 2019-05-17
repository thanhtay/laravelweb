<?php

namespace Modules\Backend\Http\Models\data\form;

use Illuminate\Database\Eloquent\Model;

class AdminUserForm extends Model
{
    protected $fillable = ['id', 'isTeacher', 'status', 'permissions', 'updated_time'];

    public function getId()
    {
        return $this->id;
    }

    public function getIsTeacher()
    {
        return $this->isTeacher;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
    }

    public function getPermissions()
    {
        return (array) $this->permissions;
    }

}