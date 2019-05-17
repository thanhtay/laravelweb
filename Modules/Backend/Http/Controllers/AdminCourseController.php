<?php
namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Backend\Http\Models\data\biz\SubjectsClassesForm;
use Modules\Backend\Http\Models\data\condition\AdminCourseCondition;
use Modules\Backend\Http\Models\logic\AdminCourseModel;

class AdminCourseController extends Controller
{
    public function listCourse(Request $request)
    {
        $searchCondition = new AdminCourseCondition($request->input());
        $model = new AdminCourseModel();
        $classes = $model->getClassList();
        $subjects = $model->getSubjectList();
        $courses = $model->getCoursesList($searchCondition);
        $data = [
            'searchCondition' => $searchCondition,
            'classes' => $classes,
            'subjects' => $subjects,
            'courses' => $courses,
        ];
        return view('backend::course.list', $data);
    }

    public function updateStatus(Request $request)
    {
        $model = new AdminCourseModel();
        $form = new SubjectsClassesForm();
        $form->id = $request->input('id');
        $result = $model->changeStatus($form);

        return json_encode($result);
    }
}