@extends('backend::layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col">
            <h2>Control User</h2>
        </div>
    </div>

    {{ Form::open(['method' => 'Post']) }}
    <div class="row mb-3 px-4">
        <div class="col-6">
            {{ Form::label('isTeacher', 'Choose Status:')}}
            <div class="form-check d-inline">
                {{ Form::radio(
                    'status',
                    1,
                    $form->getStatus() == 1 ? true : false,
                    ['id' => 'active']
                ) }}
                {{ Form::label('active', 'Active') }}
            </div>
            <div class="form-check d-inline">
                {{ Form::radio(
                        'status',
                        0,
                        $form->getStatus() == 0 ? true : false,
                        ['id' => 'block']
                    ) }}
                {{ Form::label('block', 'Block') }}
            </div>
        </div>
        <div class="col-6">
            <div class="form-check d-inline">
                {{ Form::label('isTeacher', 'Choose Teacher Role:')}}
                {{ Form::radio(
                    'isTeacher',
                    1,
                    $form->getIsTeacher() == 1 ? true : false,
                    ['id' => 'teacher']
                ) }}
                {{ Form::label('teacher', 'Teacher') }}
            </div>
            <div class="form-check d-inline">
                {{ Form::radio(
                        'isTeacher',
                        0,
                        $form->getIsTeacher() == 0 ? true : false,
                        ['id' => 'user']
                    ) }}
                {{ Form::label('user', 'User') }}
            </div>
        </div>


    </div>
    <div class="row mb-3 px-4 permissions-content" style="{{ $form->getIsTeacher() == 0 ? 'display: none':'' }}">
        <div class="col-6">
            <p>Permission class</p>
        </div>
        <div class="w-100"></div>
        <div class="col-6">
            <p>Class</p>
            <div class="w-100 border border-primary p-3">
                <ul class="p-0 list_class">
                    @foreach ($courses as $course)
                    <li data-id="{{ $course->getId()}}"
                        style="{{ in_array($course->getId(), $form->getPermissions()) ? 'display: none':'' }}"><button
                            type="button" class="btn-info">{{ $course->getNameCourse()}}</button></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-6">
            <p>Permission</p>
            <div class="w-100 border border-primary p-3">
                <ul class="p-0 list_permission">
                    @foreach ($courses as $course)
                    @if (in_array($course->getId(), $form->getPermissions()))
                    <li data-id="{{ $course->getId()}}"><button type="button"
                            class="btn-info">{{ $course->getNameCourse()}}</button></li>
                    @endif
                    @endforeach
                </ul>
                <div class="permission_data" style="display: none;">
                    @foreach ($form->getPermissions() as $item)
                    <input id="permission-{{$item}}" name="permissions[]" type="hidden" value="{{$item}}">
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="w-100"></div>
    <div class="col mt-3">
        {{ Form::button('Update', ['type' => 'submit']) }}
    </div>
    {{ Form::close() }}
</div>
<script src="{{ Module::asset('backend:js/user_control.js') }}"></script>
@endsection
