<?php

namespace App\Models\dao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserCoursesPermissionsDao extends Model
{
    protected $table = 'user_courses_permissions';
    public $timestamps = false;

    public function getListCourseByUserId($id, $isAdmin = false)
    {
        $table = DB::table('subjects_classes as sc');
        $table->select('sc.*', 's.name as subject_name', 'c.name as class_name');
        $table->join('subjects as s', 'sc.id_subject', '=', 's.id');
        $table->join('classes as c', 'sc.id_class', '=', 'c.id');
        $table->where('sc.status', 1);

        if ($isAdmin) {

        } else {

            $table->join('user_courses_permissions as pm', 'sc.id', '=', 'pm.id_course');
            $table->where('pm.id_user', $id);
        }
        return $table->paginate(10);

    }

}