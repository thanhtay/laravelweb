@extends('backend::layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col">
            <h2>List User</h2>
        </div>
    </div>

    {{ Form::open(['method' => 'GET']) }}
    <div class="row mb-3 px-4">
        <div class="col-6">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', $searchCondition->getName(), ['class' => 'form-control']) }}
        </div>
        <div class="col-6">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', $searchCondition->getEmail(), ['class' => 'form-control']) }}
        </div>
        <div class="w-100 mt-3"></div>
        <div class="col-6">
            <div class="form-check d-inline">
                {{ Form::radio(
                    'isTeacher',
                    1,
                    $searchCondition->getIsTeacher() == 1 ? true : false,
                    ['id' => 'teacher']
                ) }}
                {{ Form::label('teacher', 'Teacher') }}
            </div>
            <div class="form-check d-inline">
                {{ Form::radio(
                        'isTeacher',
                        0,
                        $searchCondition->getIsTeacher() == 0 ? true : false,
                        ['id' => 'user']
                    ) }}
                {{ Form::label('user', 'User') }}
            </div>
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
                <th scope="col">Email</td>
                    {{-- <th scope="col">Roles</td> --}}
                <th scope="col">Setting</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users['items'] as $key => $user)
            <tr>
                <td>{{ $users['firstItem'] + $key }}</td>
                <td><a href="#">{{ $user->getName()}}</a></td>
                <td>{{ $user->getEmail( )}}</td>
                {{-- <td>Super Admin</td> --}}
                <td>
                    {{ Form::button(
                        $user->getStatusShown(),
                        [
                            'class' => 'btn-secondary text-capitalize update-user-status',
                            'data-id' => $user->getId(),
                            'data-status' => $user->getStatusShown(),
                            'id' => 'status-user-' . $user->getId()
                        ]
                    ) }}
                    <a href="{{ route('userAdmin.controlUser', ['id' => $user->getId()])}}" class="px-2"><i
                            class="fa fa-cog" aria-hidden="true"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="...">
        {{ $users['pagination']}}
    </nav>
    {{ csrf_field() }}
    {{ Form::hidden('url', route("adminUser.updateStatusUser")) }}

    <script src="{{ Module::asset('backend:js/user.js') }}"></script>
</div>
@endsection
