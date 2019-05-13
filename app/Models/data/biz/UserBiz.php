<?php

namespace App\Models\data\biz;

use Illuminate\Database\Eloquent\Model;

class UserBiz extends Model
{
    protected $fillable = ['id', 'name', 'email', 'isAdmin', 'updated_at'];

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
     * Get the value of isAdmin
     */ 
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * Get the value of roles
     */ 
    public function getRoles()
    {
        return $this->roles;
    }

    public function getAdminRoles()
    {
        switch ($this->getIsAdmin()) {
            case 1:
                return "Super Admin";
                break;
            case 2:
                return "Admin";
                break;
            default:
                return "User";
                break;
        }
    }
}
