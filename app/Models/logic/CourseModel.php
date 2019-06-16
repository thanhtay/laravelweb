<?php
namespace App\Models\logic;

use App\Models\dao\LessonDao;
use App\Models\dao\SubjectsClassesDao;
use App\Models\dao\UserCoursesPermissionsDao;
use App\Models\data\biz\CourseBiz;
use App\Models\data\biz\LessonBiz;
use Illuminate\Support\Facades\Auth;

class CourseModel
{
    public function getListCourseByTeacher()
    {
        $dao = new UserCoursesPermissionsDao();
        $result = $dao->getListCourseByUserId(Auth::user()->id, Auth::user()->isAdmin);
        $items = [];
        foreach ($result as $item) {
            $tmp = new CourseBiz((array) $item);
            $items[] = $tmp;
        }
        $data['items'] = $items;
        $data['pagination'] = $result->links();
        $data['firstItem'] = $result->firstItem();
        return $data;
    }

    public function getInfo($id)
    {
        $dao = new SubjectsClassesDao();
        $daoLesson = new LessonDao();
        $course = $dao->getInfo($id, Auth::user()->isAdmin);
        if ($course) {
            $data['info'] = new CourseBiz((array) $course);
            $lessons = $daoLesson::where('id_subject_class', $id)->get();
            $data['lessons'] = [];
            foreach ($lessons as $item) {
                $tmp = new LessonBiz($item->toArray());
                $data['lessons'][] = $tmp;
            }
            return $data;
        } else {
            return abort('404');
        }

    }
}