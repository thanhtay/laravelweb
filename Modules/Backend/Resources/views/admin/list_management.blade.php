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
            @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin->getId() }}</td>
                <td><a href="#">{{ $admin->getName() }}</a></td>
                <td>{{ $admin->getEmail() }}</td>
                <td>{{ $admin->getAdminRoles() }}</td>
                <td><button id="status-admin-{{ $admin->getId() }}" class="btn-secondary update-admin-status"
                        data-id="{{ $admin->getId()}}">{{ $admin->getStatusShown()}}</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ csrf_field() }}
    {{ Form::hidden('url', route("admin.updateStatusAdmin")) }}
</div>
<script src="{{ Module::asset('backend:js/admin.js') }}"></script>
@endsection
