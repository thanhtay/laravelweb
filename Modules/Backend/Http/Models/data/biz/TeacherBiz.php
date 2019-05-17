<?php

namespace Modules\Backend\Http\Models\data\biz;

class TeacherBiz extends UserAdminBiz
{
    public $roles = [];

    /**
     * Get the value of roles
     */ 
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set the value of roles
     *
     * @return  self
     */ 
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }
}