<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    /**
     * This action is used for admin
     *
     * @return void
     */
    public function listUser()
    {
        echo "List User Page";
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
