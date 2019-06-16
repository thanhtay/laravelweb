@extends('layouts.site')
@section('content')
<div class="container-title-top p-3">
    <div class="container title-top">
        <h1 class="display-5">Welcome to Courses Management Board</h1>
    </div>
</div>
<div class="container mt-3">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</td>
                <th scope="col">Name</td>
                <th scope="col">Created Time</td>
                <th scope="col">Updated Time</td>
                <th scope="col">Setting</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses['items'] as $key => $course)
            <tr>
                <td>{{ $courses['firstItem'] + $key }}</td>
                <td><a href="#">{{ $course->getNameCourse() }}</a></td>
                <td>{{ $course->getCreatedAt() }}</td>
                <td>{{ $course->getUpdatedAt() }}</td>
                <td><a href="{{ route('course.info', ['id' => $course->getId()])}}" class="px-2" target="_bank"><i class="fa fa-cog" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="...">
        {{ $courses['pagination']}}
    </nav>
</div>
@endsection
