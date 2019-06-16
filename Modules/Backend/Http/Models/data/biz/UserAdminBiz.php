<?php

namespace Modules\Backend\Http\Models\data\biz;

use Illuminate\Database\Eloquent\Model;

class UserAdminBiz extends Model
{
    protected $fillable = ['id', 'name', 'email', 'updated_at', 'status', 'isTeacher'];

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the value of status is shown
     */
    public function getStatusShown()
    {
        return 1 === $this->status ? 'active' : 'block';
    }

    public function getIsTeacher()
    {
        return $this->isTeacher;
    }
}