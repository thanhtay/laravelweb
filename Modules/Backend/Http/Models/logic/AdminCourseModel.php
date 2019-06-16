<?php

namespace Modules\Backend\Http\Models\logic;

use App\Models\dao\ClassDao;
use App\Models\dao\SubjectDao;
use App\Models\dao\SubjectsClassesDao;
use App\Models\data\biz\ClassBiz;
use App\Models\data\biz\CourseBiz;
use App\Models\data\biz\SubjectBiz;

class AdminCourseModel
{
    public function getClassList()
    {
        $dao = new ClassDao();
        $result = $dao::get();
        $data = [];
        foreach ($result as $item) {
            $tmp = new ClassBiz($item->getAttributes());
            $data[] = $tmp;
        }
        return $data;
    }

    public function getSubjectList()
    {
        $dao = new SubjectDao();
        $result = $dao::get();
        $data = [];
        foreach ($result as $item) {
            $tmp = new SubjectBiz($item->getAttributes());
            $data[] = $tmp;
        }
        return $data;
    }

    public function getCoursesList($condition)
    {
        $dao = new SubjectsClassesDao();
        $result = $dao->getList($condition);
        $items = [];
        foreach ($result as $item) {
            $tmp = new CourseBiz((array) $item);
            $items[] = $tmp;
        }
        $data['items'] = $items;
        $result->appends($condition->getAttributes());
        $data['pagination'] = $result->links();
        $data['firstItem'] = $result->firstItem();
        return $data;
    }

    public function changeStatus($form)
    {
        $result = ['status' => false];
        $dao = new SubjectsClassesDao();
        $course = $dao::find($form->id);
        if (empty($course)) {
            $result['status'] = false;
            $result['message'] = 'Not found a course!';
            return $result;
        }
        if (0 === $course->status) {
            $course->status = 1;
        } else {
            $course->status = 0;
        }
        $course->updated_at = time();
        if ($course->update()) {
            $result['status'] = true;
            $result['message'] = 'Updated success!';
            $result['course'] = $course->getAttributes();
        }
        return $result;
    }

    public function getAvailableList()
    {
        $dao = new SubjectsClassesDao();
        $result = $dao->getAvailableList();
        $items = [];
        foreach ($result as $item) {
            $tmp = new CourseBiz((array) $item);
            $items[] = $tmp;
        }

        return $items;
    }
}