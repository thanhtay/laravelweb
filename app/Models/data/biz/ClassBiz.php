<?php
namespace App\Models\data\biz;

use Illuminate\Database\Eloquent\Model;

class ClassBiz extends Model
{
    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
}
