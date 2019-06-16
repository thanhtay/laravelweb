<?php

namespace Modules\Backend\Http\Models\logic;

use App\Models\dao\UserCoursesPermissionsDao;
use App\Models\dao\UserDao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Backend\Http\Models\data\biz\AdminBiz;
use Modules\Backend\Http\Models\data\biz\UserAdminBiz;
use Modules\Backend\Http\Models\data\form\AdminUserForm;

class AdminUserModel
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

    public function getListUser($condition)
    {
        $table = DB::table('users')->where('isAdmin', 0);

        if ($condition->getName()) {
            $table->where('name', 'LIKE', '%' . $condition->getName() . '%');
        }

        if ($condition->getEmail()) {
            $table->where('email', $condition->getEmail());
        }
        $result = $table->where('isTeacher', $condition->getIsTeacher())->paginate($condition->getLimit());

        $items = [];
        foreach ($result as $item) {
            $tmp = new UserAdminBiz((array) $item);
            $items[] = $tmp;
        }
        $data['items'] = $items;
        $result->appends($condition->getAttributes());
        $data['pagination'] = $result->links();
        $data['firstItem'] = $result->firstItem();
        return $data;
    }

    public function changeStatusUser($id)
    {
        $result = ['status' => false];
        $dao = new UserDao();
        $user = $dao::where('id', $id)->where('isAdmin', 0)->first();
        if (empty($user)) {
            $result['status'] = false;
            $result['message'] = 'Not found a user!';
            return $result;
        }
        if (0 === $user->status) {
            $user->status = 1;
        } else {
            $user->status = 0;
        }
        $user->updated_at = time();
        if ($user->update()) {
            $result['status'] = true;
            $result['message'] = 'Updated success!';
            $result['user'] = $user->toArray();
        }
        return $result;
    }

    public function getUserForm($id)
    {
        $dao = new UserDao();
        $user = $dao::where('id', $id)->where('isAdmin', 0)->first();
        if ($user) {
            $form = new AdminUserForm($user->toArray());
            if ($user->isTeacher) {
                $daoPermission = new UserCoursesPermissionsDao();
                $permissions = $daoPermission::where('id_user', $id)->get();
                $list = [];
                foreach ($permissions as $item) {
                    $list[] = $item->id_course;
                }
                $form->setPermissions($list);
            }
            return $form;
        } else {
            return abort(404);
        }
    }

    public function updateUser($form)
    {
        $dao = new UserDao();
        $user = $dao::where('id', $form->id)->where('isAdmin', 0)->first();
        if ($user) {
            if ($user->update($form->toArray())) {
                if ($form->getPermissions() && $form->getIsTeacher()) {

                    $daoPermission = new UserCoursesPermissionsDao();
                    $daoPermission::where('id_user', $form->getId())->delete();
                    $permissions = [];
                    foreach ($form->getPermissions() as $item) {
                        $permissions[] = [
                            'id_user' => $form->getId(),
                            'id_course' => $item,
                            'created_at' => time(),
                        ];
                    }

                    DB::table('user_courses_permissions')->insert($permissions);
                }
            }
        } else {
            return abort(404);
        }
    }

    public function createAdmin($form)
    {
        $dao = new UserDao($form->toArray());
        $dao->password = Hash::make($form->password);
        $dao->isAdmin = 2;
        $dao->created_at = time();
        $dao->updated_at = time();
        if ($dao->save()) {
            return $dao;
        } else {
            dd($dao);
        }
    }
    public function changeStatusAdmin($id)
    {
        $result = ['status' => false];
        $dao = new UserDao();
        $admin = $dao::where('id', $id)->where('isAdmin', 2)->first();
        if (empty($admin)) {
            $result['status'] = false;
            $result['message'] = 'Not found a admin!';
            return $result;
        }
        if (0 === $admin->status) {
            $admin->status = 1;
        } else {
            $admin->status = 0;
        }
        $admin->updated_at = time();
        if ($admin->update()) {
            $result['status'] = true;
            $result['message'] = 'Updated success!';
            $result['admin'] = $admin->toArray();
        }
        return $result;
    }

}