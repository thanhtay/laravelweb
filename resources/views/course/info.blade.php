@extends('layouts.site')
@section('content')
<div class="container-title-top p-3">
    <div class="container title-top">
        <div class="row">
            <div class="col-6">
                <h1 class="display-5">Info: {{ $info->getNameCourse()}}</h1>
            </div>
            <div class="col-6">
                {{ Form::button('Create a lesson', ['type' => 'button', 'class' => 'btn btn-primary', 'id' => 'show-form-lesson']) }}
            </div>
        </div>
        <div id="lesson-form" class="row justify-content-md-center align-items-end" style="display: none">
            <div class="col-4">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Lesson name']) }}
            </div>
            <div class="col-4">
                {{ Form::button('Create', ['type' => 'button', 'id' => 'create-lesson']) }}
                {{ csrf_field() }}
                {{ Form::hidden('url-create', route("lesson.create")) }}
                {{ Form::hidden('id-course', $info->getId()) }}
                {{ Form::hidden('url-edit', route("lesson.edit")) }}
                {{ Form::hidden('url-delete', route("lesson.delete")) }}
            </div>
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <p class="title h3 text-center">List lessons</p>
        </div>
    </div>
    <table class="table list-lesson">
        <thead class="thead-dark">
            <tr>
                <th scope="col" style="width: 10%">#</th>
                <th scope="col" style="width: 35%">Name</th>
                <th scope="col" style="width: 20%">Created Time</th>
                <th scope="col" style="width: 20%">Updated Time</th>
                <th scope="col" style="width: 15%">Setting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lessons as $key => $lesson)
            @include('course.lesson_item', [$lesson, $key])
            @endforeach
        </tbody>
    </table>
</div>
<script src="{{ asset('js/course/lesson.js') }}"></script>
@endsection
