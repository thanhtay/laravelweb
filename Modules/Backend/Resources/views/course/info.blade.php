@extends('backend::layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col">
            <h2>List Courses</h2>
        </div>
        <div class="col flex-row-reverse">
            <a class="btn btn-primary" href="#">Create Lesson</a>
        </div>
    </div>
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
            <tr>
                <td>1</td>
                <td><a href="#">Lesson 1</a></td>
                <td>2019-05-20 10:30:10</td>
                <td>2019-05-20 10:30:10</td>
                <td><a href="" class="px-2"><i class="fa fa-cog" aria-hidden="true"></i></a></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
