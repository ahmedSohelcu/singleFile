conditional view in create and edit page according to url
==================================================================================================================================
<?php echo URL::current(); ?>

            {{--{{ URL::current()}}--}}
            {{--{{ Request::url()}}--}}

            {{--{{ Request::url() === 'create' ? 'yess' : 'No' }}--}}

		@php
            if (Request::is('employee/create'))
            {
                echo 'it is employee/create';
            }else{
                echo 'not ';
            }

		@endphp

//if create page join_date can take value but in edit join_date is readonly...
{{Request::is('employee/create') ? Form::text('join_date',$employee ? $employee->office != null ? $employee->office->join_date : "" : "",['class'=>'form-control join_date date','placeholder'=>'Joining Date']) : Form::text('join_date',$employee ? $employee->office != null ? $employee->office->join_date : "" : "",['class'=>'form-control join_date date','placeholder'=>'Joining Date','readonly'=>'readonly']) }}

//will active if it is dashboard page....
<li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">Dashboard</li>


