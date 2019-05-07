<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('backend::index');
    }

    /**
     * This action is just for Super admin
     *
     * @return void
     */
    public function createAdmin()
    {
        echo "This is create admin page. Welcome to super admin!";
    }

    /**
     * This action is just for super admin
     *
     * @return void
     */
    public function listAdmin()
    {
        echo "This is list admin page. Welcome to super admin!";
    }

    /**
     * This action is just for super admin
     *
     * @return void
     */
    public function controlAdmin()
    {
        echo "Control admin page. Welcome to super admin!";
    }

}
