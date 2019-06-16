<?php

namespace App\Models\dao;

use Illuminate\Database\Eloquent\Model;

class LessonDao extends Model
{
    protected $table = 'lessons';

    protected $fillable = ['id', 'name', 'id_subject_class', 'created_at', 'updated_at'];

    public $timestamps = false;

}