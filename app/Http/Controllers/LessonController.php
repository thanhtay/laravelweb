<?php
namespace App\Http\Controllers;

use App\Models\data\form\LessonForm;
use App\Models\logic\LessonModel;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function create(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|max:255',
            'id_course' => 'required|numeric',
        ]);
        $form = new LessonForm();
        $form->name = $request->input('name');
        $form->id_subject_class = $request->input('id_course');
        $form->created_at = time();
        $form->updated_at = time();

        $model = new LessonModel();
        $result = $model->create($form);
        $data = [
            'status' => true,
        ];
        if ($result) {
            $data['html'] = view('course.lesson_item', ['lesson' => $result, 'key' => $request->input('count')])->render();
        } else {
            $data['status'] = false;
        }

        return json_encode($data);
    }

    public function edit(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|max:255',
            'id' => 'required|numeric',
        ]);

        $form = new LessonForm();
        $form->id = $request->input('id');
        $form->name = $request->input('name');
        $model = new LessonModel();
        $lesson = $model->update($form);
        $data = ['status' => true];
        if ($lesson) {
            $data['lesson'] = $lesson->toArray();
            $data['lesson']['updated_at'] = $lesson->getUpdatedAtShown();
        } else {
            $data['status'] = false;
        }
        return json_encode($data);
    }

    public function delete(Request $request)
    {
        $model = new LessonModel();
        $data = ['status' => true];
        if ($model->delete($request->input('id'))) {
            $data['id'] = $request->input('id');
        } else {
            $data['status'] = false;
        }
        return json_encode($data);
    }

    public function info($id)
    {
        return view('lesson.info');
    }
}