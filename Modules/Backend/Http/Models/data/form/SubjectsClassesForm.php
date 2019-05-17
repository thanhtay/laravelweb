<?php

namespace Modules\Backend\Http\Models\data\biz;

use Illuminate\Database\Eloquent\Model;

class SubjectsClassesForm extends Model
{
    protected $attributes = ['id', 'id_class', 'id_subject', 'created_at', 'updated_at', 'status'];
}