<?php

namespace App\Models\dao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubjectsClassesDao extends Model
{
    protected $table = 'subjects_classes';

    public $timestamps = false;

    public function getList($condition)
    {
        $table = DB::table('subjects_classes');
        $table->select('subjects_classes.*', 'classes.name as class_name', 'subjects.name as subject_name');
        $table->leftJoin('classes', 'subjects_classes.id_class', '=', 'classes.id');
        $table->leftJoin('subjects', 'subjects_classes.id_subject', '=', 'subjects.id');
        $table->orderBy('id', 'asc');
        if ($condition->getClass()) {
            return $table->where('subjects_classes.id_class', $condition->getClass())->paginate(10, ['*']);
        }
        if ($condition->getSubject()) {
            return $table->where('subjects_classes.id_subject', $condition->getSubject())->paginate(10, ['*']);
        }
        return $table->paginate(10, ['*']);
    }

    public function getAvailableList()
    {
        $table = DB::table('subjects_classes');
        $table->select('subjects_classes.*', 'classes.name as class_name', 'subjects.name as subject_name');
        $table->leftJoin('classes', 'subjects_classes.id_class', '=', 'classes.id');
        $table->leftJoin('subjects', 'subjects_classes.id_subject', '=', 'subjects.id');
        $table->orderBy('id', 'asc');
        $table->where('status', 1);

        return $table->get();
    }

    public function getInfo($id, $isAdmin)
    {
        $table = DB::table('subjects_classes as sc');
        $table->select('sc.*', 's.name as subject_name', 'c.name as class_name');
        $table->join('subjects as s', 'sc.id_subject', '=', 's.id');
        $table->join('classes as c', 'sc.id_class', '=', 'c.id');
        $table->where('sc.status', 1);
        $table->where('sc.id', $id);
        if ($isAdmin) {

        } else {
            $table->join('user_courses_permissions as pm', 'sc.id', '=', 'pm.id_course');
            $table->where('pm.id_user', $id);
        }
        return $table->first();

    }
}