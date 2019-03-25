1.{{--for add page --}}
{{ Form::open(['route'=>'save.shift_group','method'=>'POST', 'class'=>'form-horizontal']) }}
@include('hrm.settings.shiftGroup.form-shift-group',['buttonText'=>'save'])
{{ Form::close() }}

    OR

{{ Form::open(['action'=>'UserController@store','method'=>'post']) }}
    @include('user.form')
{{ Form::close() }}
---------------------------------------------------------------------------------------------------------------
2.{{--for edit page--}}
{{ Form::model($shiftGroup,['route'=>['update.shift_group',$shiftGroup->id],'method'=>'patch','class'=>'form-horizontal']) }}
    @include('hrm.settings.shiftGroup.form-shift-group',['buttonText'=>'Update'])
{{ Form::close() }}

    OR

{{ Form::model($user,['action'=>['UserController@update',$user->id],'method'=>'patch']) }}
{{ Form::close() }}
---------------------------------------------------------------------------------------------------------------
3.{{--for delete page--}}
<td>
    {{ Form::open(['action'=>['Hrm\ShiftController@destroyShiftGroup',$shiftGroup->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}    &nbsp;&nbsp;&nbsp;
    <a href="{{ action('Hrm\ShiftController@editShiftGroup',$shiftGroup->id) }}" type="button" class="btn btn-info btn-sm">
        <i class="fa fa-pencil-alt"></i>
    </a>    &nbsp;&nbsp;
    <button type="submit" class="btn btn-danger btn-sm">
        <i class="fa fas fa-trash"></i>
    </button>
    {{ Form::close() }}
</td>


edit
---------------------------
{{ Form::select('unit_id',$repository->units(),null,['class'=>'form-control','id'=>"unit_id", 'placeholder'=>'select unit'])}}