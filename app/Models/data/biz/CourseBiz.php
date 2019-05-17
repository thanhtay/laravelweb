<?php
namespace App\Models\data\biz;

use Illuminate\Database\Eloquent\Model;

class CourseBiz extends Model
{
    protected $fillable = ['id', 'class_name', 'subject_name', 'created_at', 'status'];

    public function getId()
    {
        return $this->id;
    }

    public function getNameCourse()
    {
        return $this->subject_name . ' ' . $this->class_name;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getShowStatus()
    {
        if ($this->getStatus() == 1) {
            return 'active';
        } else {
            return 'unactive';
        }
    }
}
