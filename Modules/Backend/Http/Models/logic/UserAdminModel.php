<?php

namespace Modules\Backend\Http\Models\logic;

use App\Models\dao\UserDao;
use Illuminate\Support\Facades\DB;
use Modules\Backend\Http\Models\data\biz\AdminBiz;

class UserAdminModel
{
    public function getListAdmin()
    {
        $dao = new UserDao();
        $list = $dao::where('isAdmin', '>', 1)
                    ->get();
        $data = [];
        foreach ($list as $item) {
            $tmp = new AdminBiz($item->getAttributes());
            $data[] = $tmp;
        }
        return $data;
    }
}