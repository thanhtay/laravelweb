<?php
namespace App\Http\Controllers;

use App\Models\logic\CourseModel;

class CourseController extends Controller
{
    public function management()
    {
        $model = new CourseModel();
        $courses = $model->getListCourseByTeacher();
        $data = [
            'courses' => $courses,
        ];
        return view('course.list', $data);
    }

    public function info($id)
    {
        $model = new CourseModel();
        $course = $model->getInfo($id);
        return view('course.info', $course);
    }
}