<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Backend\Http\Models\data\condition\UserAdminCondition;
use Modules\Backend\Http\Models\data\form\AdminUserForm;
use Modules\Backend\Http\Models\logic\AdminCourseModel;
use Modules\Backend\Http\Models\logic\AdminUserModel;

class AdminUserController extends Controller
{
    /**
     * This action is used for admin
     *
     * @return void
     */
    public function listUser(Request $request)
    {
        $model = new AdminUserModel();
        $searchCondition = new UserAdminCondition($request->input());
        $users = $model->getListUser($searchCondition);
        $data = [
            'searchCondition' => $searchCondition,
            'users' => $users,
        ];
        return view('backend::user.list_management', $data);
    }

    public function updateStatusUser(Request $request)
    {
        $model = new AdminUserModel();
        $id = $request->input('id');
        $result = $model->changeStatusUser($id);

        return json_encode($result);
    }

    /**
     * This action is used for admin
     *
     * @return void
     */
    public function controlUser($id, Request $request)
    {
        $model = new AdminUserModel();
        $userForm = $model->getUserForm($id);
        $data = [
            'form' => $userForm,
        ];
        $modelCourse = new AdminCourseModel();
        $courses = $modelCourse->getAvailableList();
        $data['courses'] = $courses;

        if ($request->isMethod('post')) {
            $form = new AdminUserForm($request->input());
            $form->id = $id;
            $model->updateUser($form);
            return redirect(action('AdminUserController@listUser', ['isTeacher' => $form->getIsTeacher()]));
        }

        return view('backend::user.user_control', $data);
    }

}