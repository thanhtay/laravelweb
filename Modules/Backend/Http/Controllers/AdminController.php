<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Backend\Http\Models\data\form\AdministratorForm;
use Modules\Backend\Http\Models\logic\AdminUserModel;

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
    public function createAdmin(Request $request)
    {
        $model = new AdminUserModel();
        if ($request->isMethod('post')) {
            $form = new AdministratorForm($request->input());
            $model->createAdmin($form);
            return redirect(action('AdminController@listAdmin'));
        }
        return view('backend::admin.create_admin');
    }

    /**
     * This action is just for super admin
     *
     * @return void
     */
    public function listAdmin()
    {
        $model = new AdminUserModel();
        $listAdmin = $model->getListAdmin();
        $data = [
            'admins' => $listAdmin,
        ];
        return view('backend::admin.list_management', $data);
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

    public function updateStatusAdmin(Request $request)
    {
        $model = new AdminUserModel();
        $id = $request->input('id');
        $result = $model->changeStatusAdmin($id);

        return json_encode($result);
    }

}