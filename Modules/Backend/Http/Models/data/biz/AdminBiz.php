<?php

namespace Modules\Backend\Http\Models\data\biz;

class AdminBiz extends UserAdminBiz
{
    protected $fillable = ['id', 'name', 'email', 'updated_at', 'status', 'isAdmin'];

    /**
     * Get the value of isAdmin
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    public function getAdminRoles()
    {
        switch ($this->getIsAdmin()) {
            case 1:
                return "Super Admin";
                break;
            case 2:
                return "Admin";
                break;
            default:
                return "User";
                break;
        }
    }
}