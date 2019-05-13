<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{
    /**
     * This action is used for admin
     *
     * @return void
     */
    public function listUser()
    {
        return view('backend::user.list_management');
    }

    /**
     * This action is used for admin
     *
     * @return void
     */
    public function controlUser()
    {
        echo "Modifine user permission";
    }

}
