<?php
namespace App\Models\data\biz;

use Illuminate\Database\Eloquent\Model;

class LessonBiz extends Model
{
    protected $fillable = ['id', 'name', 'id_subject_class', 'created_at', 'updated_at'];
    public $timestamps = false;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIdSubjectClass()
    {
        return $this->id_subject_class;
    }

    public function getCreatedAtShown()
    {
        return date('Y-m-d H:i:s', $this->created_at);
    }

    public function getUpdatedAtShown()
    {
        return date('Y-m-d H:i:s', $this->updated_at);
    }
}