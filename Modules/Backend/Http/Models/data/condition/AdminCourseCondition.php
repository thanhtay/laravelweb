<?php
namespace Modules\Backend\Http\Models\data\condition;

use Illuminate\Database\Eloquent\Model;

class AdminCourseCondition extends Model
{
    protected $fillable = ['class', 'subject'];

    public function getClass()
    {
        return $this->class;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getUri()
    {
        return $this->uri;
    }
}
