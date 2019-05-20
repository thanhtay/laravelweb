<?php
namespace App\Http\Controllers;

class CourseController extends Controller
{
    public function management()
    {
        return view('course.list');
    }
}