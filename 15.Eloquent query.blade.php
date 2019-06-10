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

$efg = Employee::query()->where('status',0)->whereHas('office',function($query){
	$query->groupBy('section_id');
})->first();

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

{{--//==============================================================================================--}}
	if(Input::has('start') && Input::has('end')){
		$start = Carbon::parse(Input::get('start'))->startOfDay();
		$end = Carbon::parse(Input::get('end'))->endOfDay();

		$start = $start->format('Y-m-d');
		$end =  $end->format('Y-m-d');
		//dd($start,$end);

		$abc = EmployeeOffice::query();

		if(Auth::user()->unit_id){
			$abc->where('unit_id',Auth::user()->unit_id);
		}else{
			$abc->whereIn('unit_id',[8,10,11]);
		}

		$abc = $abc->whereHas('employee',function ($query) use ($start,$end) {
			$query->whereBetween('inactivedate',[$start, $end])->where('status',0);
		})->paginate()->groupBy('section_id');
		}else{
			$abc = [];
			$start = '';
			$end = '';
		}
{{--//==============================================================================================--}}






