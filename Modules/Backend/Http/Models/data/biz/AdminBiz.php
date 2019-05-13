<?php

namespace Modules\Backend\Http\Models\data\biz;

use App\Models\data\biz\UserBiz;


class AdminBiz extends UserBiz
{
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