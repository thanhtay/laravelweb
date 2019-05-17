@extends('backend::layouts.admin')
@section('content')
<!-- list admin -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col">
            <h2>List Courses</h2>
        </div>
    </div>
    {{ Form::open(['method' => 'GET']) }}
    <div class="row mb-3 px-4">
        <?php
        $classData = [null => 'Choose Class'];
        foreach ($classes as $class) {
            $classData[$class->getId()] = $class->getName();
        }
        $subjectData = [null => 'Choose Subject'];
        foreach ($subjects as $sub) {
            $subjectData[$sub->getId()] = $sub->getName();
        }
        ?>
        <div class="col-6">
            {{ Form::label('class', 'Class') }}
            {{ Form::select('class', $classData, $searchCondition->getClass(), ['class' => 'form-control']) }}
        </div>
        <div class="col-6">
            {{ Form::label('subject', 'Subject') }}
            {{ Form::select('subject', $subjectData, $searchCondition->getSubject(), ['class' => 'form-control']) }}
        </div>
        <div class="w-100 mt-3"></div>
        <div class="col-6">
        </div>
        <div class="col-6">
            {{ Form::button('Search', ['type' => 'submit']) }}
        </div>
    </div>
    {{ Form::close() }}
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</td>
                <th scope="col">Name</td>
                <th scope="col">Status</td>
                <th scope="col">Setting</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses['items'] as $key => $course)
            <tr>
                <td>{{ $courses['firstItem'] + $key }}</td>
                <td><a href="#">{{ $course->getNameCourse() }}</a></td>
                <td>Prepare</td>
                <td>
                    {{ Form::button(
                        $course->getShowStatus(),
                        [
                            'class' => 'btn-secondary text-capitalize update-course-status',
                            'data-id' => $course->getId(),
                            'data-status' => $course->getStatus(),
                            'id' => 'status-course-' . $course->getId()
                        ]
                    ) }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="...">
        {{ $courses['pagination']}}
    </nav>
</div>
{{ csrf_field() }}
{{ Form::hidden('url', route("adminCourse.updateStatus")) }}

<script src="{{ Module::asset('backend:js/course.js') }}"></script>

@endsection
