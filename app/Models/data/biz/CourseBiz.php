<?php
namespace App\Models\data\biz;

use Illuminate\Database\Eloquent\Model;

class CourseBiz extends Model
{
    protected $fillable = ['id', 'class_name', 'subject_name', 'created_at', 'updated_at', 'status'];

    public $timestamps = false;

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

    public function getCreatedAt()
    {
        return date('Y-m-d H:i:s', $this->created_at);
    }

    public function getUpdatedAt()
    {
        return date('Y-m-d H:i:s', $this->updated_at);
    }
}