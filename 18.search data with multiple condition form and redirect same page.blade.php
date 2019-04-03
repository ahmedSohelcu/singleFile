========================================================================================
//Search data using multiple condition from same page (laravel)
========================================================================================

========================================================================================
1.web.php
========================================================================================
Route::get('hrm/report/daily_reports', 'Hrm\AttendanceController@dailyAttendanceReport');




========================================================================================
2.view file
========================================================================================
--------------------------------
1.search option 
--------------------------------
<!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {{--start --}}
            <div class="col-lg-12 col-sm-8 col-md-6 col-xs-12">
                @if($errors->any())
                    <div class="col-md-12 alert alert-danger emptyMsg">
                        <h6>{{$errors->first(1)}}</h6>
                    </div>
                @endif

                <h4>Search Daily Detail Report by date</h4>
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                    {{--{{Form::open(['url'=>'hrm/report/daily_reports_by_line']) }}--}}  {{--//previous path was --}}
                    {{Form::open(['url'=>'hrm/report/daily_reports','method'=>'get']) }}
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                {{Form::label('unit_id', 'Unit', ['class'=>''])}}
                                {{ Form::select('unit_id',$repository->units(),null,['class'=>'form-control','placeholder'=>'select unit'])}}
                            </div>

                            <div class="form-group col-md-2">
                                <label class="input-group-addon">{{--<i class="fa fa-calendar"></i>--}}</label>
                                <input type="text" name="date" style="margin: 5px 5px" class="form-control pull-right" id="searchDate" placeholder="select date to search">
                            </div>

                            <div class="form-group col-md-2">
                                <button type="submit" style="margin: 29px 0 0 0;" class="btn btn-primary">Search </button>
                            </div>
                        </div>
                    {{  Form::close() }}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>{{--end --}}
    </section>
	
---------------------------------
view output
---------------------------------

{{--start showing search data --}}
    <section class="content">
        <div class="col-lg-12">
            <div class="card"><br>
                <div class="card-body">
                    <div class="row">
                        {{--start print option --}}
                        <div class="col-md-4">
                            <div class="from-group" style="padding-bottom: 10px;">
                                <a class="btn btn-danger btn-sm" href="{{ URL::previous() }}">back</a>
                            </div>
                        </div>

                        <div class="col-md-3 offset-md-5 text-right">
                            <div class="from-group">
                                <a onclick="window.print(); return false;" class="btn btn-primary btn-sm" href="{{ URL::previous() }}">Print</a>
                                <a class="btn btn-info btn-sm" href="{{ URL::to('hrm/report/textPdf') }}">Pdf</a>
                            </div>
                        </div>
                        {{--end print option --}}

                        <div class="col-md-12 text-center">
                            <h2>WELL MART LTD.</h2>
                            <h4>Daily Attendance Details Report for
                                {{--{{ $attendances->first()->date->format('Y-m-d') }}--}}
                            </h4>
                        </div>

                        <div class="col-md-4 text-left">
                            <p>
                                <strong>
                                    Date:
                                    @php
                                        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                                        echo $dt->format('j F, Y');
                                        $mytime = Carbon\Carbon::now();
                                    @endphp
                                </strong>
                            </p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p class="text-right">Printed Time:
                                <strong>
                                    @php
                                        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                                        echo $dt->format('g:i:s a');
                                        $mytime = Carbon\Carbon::now();
                                    @endphp
                                </strong>
                            </p>
                        </div>

                        <div class="col-lg-12" style="border-top: 2px solid #636363;">
                            <br>
                            <table class="table table-hover table-bordered table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Sl No</th>
                                    <th class="text-center">Emp No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Designation</th>
                                    <th class="text-center">In Time</th>
                                    <th class="text-center">Late</th>
                                    <th class="text-center">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach($attendances as $AttData)
                                    <tr>
                                        <td class="text-center">
                                            @php
                                                echo $i++;
                                            @endphp
                                        </td>
                                        <td>{{$AttData->employee_id !=null ? $AttData->employee->employee_no : "" }}</td>
                                        <td>{{$AttData->employee_id !=null ?$AttData->employee->ename : "no name"}}</td>
                                        <td>
                                            @if($AttData->employee_id !=null ? $AttData->employee->office != null : "")
                                                {{ $AttData->employee->office->designation != null ? $AttData->employee->office->designation->name : "" }}
                                            @endif
                                        </td>
                                        <td>
                                            {{\Carbon\Carbon::parse($AttData->in_time)->format('h:i:sa')}}
                                             Or {{ date('h:i:s', strtotime($AttData->in_time))}}
                                        </td>
                                        <td class="text-center">
                                            {{ $AttData->late }}
                                        </td>
                                        <td class="text-center"> {{ $AttData->status }}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                                <tr>
                                    <th rowspan="1" colspan="2">
                                        {{--// if total employee amount less then 10 then add 0 before the nummer--}}
                                        Total:- Employee:
                                        {{--{{ $totalEmp < 10 ? '0'.$totalEmp : $totalEmp }}--}}
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        Present:
                                        {{--{{ $presentEmp < 10 ? '0'.$presentEmp : $presentEmp }}--}}
                                    </th>

                                    <th rowspan="1" colspan="1 ">Late:
                                    {{--{{$totalLated}}</th>--}}
                                    <th rowspan="1" colspan="2">Absent:
                                    {{--{{ $totalEmp-$presentEmp }}</th>--}}
                                    <th rowspan="1" colspan="1"></th>
                                </tr>
                            </table>
                            {{-- {{ $attendances->links()}}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>        
{{--=================================================================================================================--}}
{{--End  viewing attendances by date--}}
{{--=================================================================================================================--}}
    </section>    {{--end showing  search data --}}


========================================================================================
	3.controller
========================================================================================
 //view attendance both for default list  and search page ....
    public function dailyAttendanceReport(Attendance $attendance){
        $repository = $this->repository;
        
		$att = $attendance->newQuery();

        if(Input::has('date') && Input::get('date') != null){
            $att->where('date',Input::get('date'));
        }
		
		if(Input::has('unit_id') && Input::get('unit_id') != null){
            $att->where('unit_id',Input::get('unit_id'));
        }
			
		<!-- you can set more and more into if function. this will act as conditional
		if(Input::has('card_no') && Input::get('card_no') != null){
            $att->where('card_no',Input::get('card_no'));
        }

        if(Input::has('status') && Input::get('status') != null){
            $att->where('status',Input::get('status'));
        }

        if(Input::has('bname') && Input::get('bname') != null){
            $att->where('bname',Input::get('bname'));
        } -->			
		
        $attendances = $att->paginate(10);
		
        return view('hrm.attendance.daily-details-report',compact('repository','attendances'));
    }



========================================================================================
1.web.php
========================================================================================