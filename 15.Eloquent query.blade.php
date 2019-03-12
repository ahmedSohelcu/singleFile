//List of Eloquent query collection by Ahmed
===============================================================
$roles = Role::all()->pluck('name','id');

$attData = Attendance::query()->paginate(10);

//getting total employee number
$totalEmp   = Attendance::all()->count();
		
//getting present employee number
$presentEmp = Attendance::query()->where('status','p')->get()->count();

//getting total lated
$totalLated = Attendance::query()->whereTime('in_time', '>', Carbon::parse('09:00'))->get()->count();

$designations = Designation::all()->pluck('name','id');

user = User::query()->findOrFail($id);

$roles = Role::all()->pluck('name','id');

