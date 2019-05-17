<?php
namespace Modules\Backend\Http\Models\data\condition;

use Illuminate\Database\Eloquent\Model;

class UserAdminCondition extends Model
{
    protected $fillable = ['name', 'email', 'isTeacher', 'limit'];
    protected $attributes = ['name', 'email', 'isTeacher' => 0, 'limit' => 10];

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIsTeacher()
    {
        return $this->isTeacher;
    }

    public function getLimit()
    {
        return $this->limit;
    }
}