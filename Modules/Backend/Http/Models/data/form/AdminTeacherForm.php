<?php
namespace Modules\Backend\Http\Models\data\form;

class AdminTeacherForm extends AdminUserForm
{
    protected $appends = ['permission'];

    public function setPermission($permissions)
    {
        $this->permission = $permissions;
    }
}