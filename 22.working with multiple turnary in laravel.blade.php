Working with turnary operator in laravel 
==================================================================================================================================
{{ Form::text('join_date',$employee ? $employee->office != null ? $employee->office->join_date : "" : "",['class'=>'form-control join_date date','placeholder'=>'Joining Date']) }}

{{--{{ Request::url() === 'create' ? 'yess' : 'No' }}--}}

<li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">Dashboard</li>
		

//multiple turnary example .....
----------------------------------------------------------
{{Request::is('employee/create') ? Form::text('join_date',$employee ? $employee->office != null ? $employee->office->join_date : "" : "",['class'=>'form-control join_date date','placeholder'=>'Joining Date']) : Form::text('join_date',$employee ? $employee->office != null ? $employee->office->join_date : "" : "",['class'=>'form-control join_date date','placeholder'=>'Joining Date','readonly'=>'readonly']) }}



$rule1 = true;
$rule2 = false;
$rule3 = true;
$res = (($rule1 === true) && ($rule2 === false) && ($rule3 === true))
