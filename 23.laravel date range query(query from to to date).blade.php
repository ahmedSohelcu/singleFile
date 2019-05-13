laravel date range query(query from date to todate)
==================================================================================================================================

if( (Input::has('inactivedate') && Input::get('inactivedate') != null) && (Input::has('to_date') && Input::get('to_date') != null)) {
            //$date = Input::get('inactivedate');
            //$toDate = Input::get('to_date');

            $date = new Carbon(Input::get('inactivedate'));
            $toDate = new Carbon(Input::get('to_date'));

 $employees = $emp->where('inactivedate', '>=', $date->startOfDay())
                ->where('inactivedate', '<=', $toDate->endOfDay())
                ->orderBy('inactivedate','DESC');
				
}




=================================================================
controller
=================================================================
    //inactivate employee report by according to InactiveDate by ahmed
    public function inactiveEmployeeReportByInactiveDate(Employee $employee)
    {
        $emp = $employee->newQuery()->where('status',0);


//        if(auth()->user()->unit_id != null){
//            $emp->whereHas('office',function($query){
//                $query->where('unit_id',auth()->user()->unit_id);
//            });
//        }

        if( (Input::has('inactivedate') && Input::get('inactivedate') != null) && (Input::has('to_date') && Input::get('to_date') != null)) {
            //$date = Input::get('inactivedate');
            //$toDate = Input::get('to_date');

            $date = new Carbon(Input::get('inactivedate'));
            $toDate = new Carbon(Input::get('to_date'));

            $employees = $emp
                ->where('inactivedate', '>=', $date->startOfDay())
                ->where('inactivedate', '<=', $toDate->endOfDay())
                ->orderBy('inactivedate','DESC');


        }elseif(Input::has('inactivedate') && Input::get('inactivedate') != null) {
            $date = Input::get('inactivedate');
            $employees = $emp->where('inactivedate','like','%'.$date.'%')
                ->whereNull('activedate');
        }else{
            $date = '';
            $employees = [];
        }

//        if(Input::has('inactivedate') && Input::get('inactivedate') != null) {
//            $date = Input::get('inactivedate');
//            $employees = $emp->where('inactivedate','like','%'.$date.'%')
//                ->whereNull('activedate');
//        }else{
//            $date = '';
//            $employees = [];
//        }

        $employees = $emp->paginate(18);
       // dd($employees);

        return view('hrm.reports.inactive-employee-by-date',compact('employees','date'));
    }
	
	
=================================================================
blade file
=================================================================
		

 {{Form::open(['url'=>'hrm/report/inactive-employee','method'=>'get']) }}
                        <div class="form-row">
                            {{--<div class="form-group col-md-2" style="margin: -2px 0 0 0;">--}}
                                {{--{{ Form::label('unit_id', 'Unit', ['class'=>'']) }}--}}
                                {{--{{ Form::select('unit_id',$repository->units(),null,['class'=>'form-control','placeholder'=>'Select Unit','required'])}}--}}
                            {{--</div>--}}

                            {{--<div class="form-group col-md-2" style="margin: -2px 0 0 0;">--}}
                                {{--{{ Form::label('section_id', 'Section', ['class'=>'']) }}--}}
                                {{--{{ Form::select('section_id',$repository->sections(),null,['class'=>'form-control','placeholder'=>'Select Section'])}}--}}
                            {{--</div>--}}


                            <div class="form-group col-md-2">
                                <label class="input-group-addon">{{--<i class="fa fa-calendar"></i>--}}</label>
                                <input type="text" name="inactivedate" style="margin: 5px 5px" class="inactivedate form-control pull-right" id="inactivedate" placeholder="select inactive date to search">
                            </div>

                            <div class="form-group col-md-2">
                                <label class="input-group-addon">{{--<i class="fa fa-calendar"></i>--}}</label>
                                <input type="text" name="to_date" style="margin: 5px 5px" class="to_date form-control pull-right" id="to_date" placeholder="to dat">
                            </div>

                            <div class="form-group col-md-4" style="padding-bottom: 10px; margin: 29px 0 0 0;">
                                <input type="submit" class="btn btn-info" value="search">
                            </div>

                            <div class="form-group  col-md-2" style="padding-bottom:5px; margin: 29px 0 0 0;" >
                                <button class="btn btn-success" onclick="window.print(); return false;">Print</button>
                                <button class="btn btn-primary" href="#add_show_case" data-toggle="tab">Pdf</button>
                            </div>
                        </div>
                        {{  Form::close() }}
