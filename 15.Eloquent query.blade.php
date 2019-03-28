//List of Eloquent query collection by Ahmed
===============================================================
$roles = Role::all()->pluck('name','id');

$attData = Attendance::query()->paginate(10);

//getting total employee number
$totalEmp   = Attendance::all()->count();
		
//getting present employee number
$presentEmp = Attendance::query()->where('status','p')->get()->count();

$designations = Designation::all()->pluck('name','id');

user = User::query()->findOrFail($id);

$roles = Role::all()->pluck('name','id');

Unit::all()->pluck('name','id');

//getting total lated
$totalLated = Attendance::query()->whereTime('in_time', '>', Carbon::parse('09:00'))->get()->count();

$results = User::where('this', '=', 1)
    ->where('that', '=', 1)
    ->where('this_too', '=', 1)
    ->where('that_too', '=', 1)
    ->where('this_as_well', '=', 1)
    ->where('that_as_well', '=', 1)
    ->where('this_one_too', '=', 1)
    ->where('that_one_too', '=', 1)
    ->where('this_one_as_well', '=', 1)
    ->where('that_one_as_well', '=', 1)
    ->get();
	
	OR
	
	$query->where([
		['column_1', '=', 'value_1'],
		['column_2', '<>', 'value_2'],
		[COLUMN, OPERATOR, VALUE],
		...
	]);	
		
	
	User::where('this', '=', 1)
		->whereNotNull('created_at')
		->whereNotNull('updated_at')
		->where(function($query){
			return $query
			->whereNull('alias')
			->orWhere('alias', '=', 'admin');
		});


	$attendances = \App\Attendance::whereNotNull('employee_id')
				->whereNull('out_time')
				->whereSection_id($section->id)
				->where('date',\Carbon\Carbon::yesterday())
				->get();				



{{ Form::select('unit_id',$repository->units(),null,['class'=>'form-control','id'=>"unit_id", 'placeholder'=>'select unit'])}}








where('that', 1)
where('that', '=', 1)




