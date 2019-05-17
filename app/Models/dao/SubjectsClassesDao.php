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
}