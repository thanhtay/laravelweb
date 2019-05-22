<tr id="lesson-{{ $lesson->getId() }}" data-id="{{ $lesson->getId() }}">
    <td class="no">{{ $key + 1 }}</td>
    <td>
        <div class="row name-lesson">
            <div class="col-10">
                <a href="{{ route('lesson.info', $lesson->getId())}}">{{ $lesson->getName()}}</a>
            </div>
            <div class="col-2">
                <i class="fa fa-edit edit-lesson" data-id="{{ $lesson->getId() }}"></i>
            </div>
        </div>
        <div id="lesson-form-{{ $lesson->getId() }}" class="edit-form row" style="display: none;">
            <div class="col-8">
                {{ Form::text('lesson-name', $lesson->getName(), ['class' => 'form-control input-name', 'placeholder' => 'Lesson name']) }}
            </div>
            <div class="col-4">
                {{ Form::button('Update', ['type' => 'button', 'class' => 'update-lesson']) }}
            </div>
        </div>
    </td>
    <td>{{ $lesson->getCreatedAtShown() }}</td>
    <td class="updated-at">{{ $lesson->getUpdatedAtShown() }}</td>
    <td>
        <i class="fa fa-trash delete-lesson" data-id="{{ $lesson->getId() }}" aria-hidden=" true"></i>
    </td>
</tr>
