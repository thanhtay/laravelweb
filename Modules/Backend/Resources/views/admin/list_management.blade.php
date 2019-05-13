@extends('backend::layouts.admin')
@section('content')
<!-- list admin -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col">
            <h2>List Admin</h2>
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</td>
                <th scope="col">Name</td>
                <th scope="col">Email</td>
                <th scope="col">Role</td>
                <th scope="col">Setting</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $item)
                <tr>
                    <td>{{ $item->getId() }}</td>
                    <td><a href="#">{{ $item->getName() }}</a></td>
                    <td>{{ $item->getEmail() }}</td>
                    <td>{{ $item->getAdminRoles() }}</td>
                    <td><button class="btn-secondary">Lock</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
