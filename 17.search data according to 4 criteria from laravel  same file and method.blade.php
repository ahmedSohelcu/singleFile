 //default view all employee and search employee by  Employee No or Card No,  Active or Inactive or Name in Bengali
    public function view(Employee $employee)
    {
        $emp = $employee->newQuery();

        if(Input::has('employee_no') && Input::get('employee_no') != null){
            $emp->where('employee_no',Input::get('employee_no'));
        }

        if(Input::has('card_no') && Input::get('card_no') != null){
            $emp->where('card_no',Input::get('card_no'));
        }

        if(Input::has('status') && Input::get('status') != null){
            $emp->where('status',Input::get('status'));
        }

        if(Input::has('bname') && Input::get('bname') != null){
            $emp->where('bname',Input::get('bname'));
        }

        $employees = $emp->paginate(50);

        return view('hrm.information.all-employees',compact('employees'));
    }
	
	
	
	//view 
	  {{--start search Employee Information --}}
    <section id="employeeInfoSearch">
        <div class="container col-md-12">
            {{ Form::open(['action'=>'Hrm\HrmInformationController@view','method'=>'get']) }}
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="employee_no">Employee No</label>
                        <input type="text" class="form-control" id="employee_no" name="employee_no">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="card_no">Card No</label>
                        <input type="text" class="form-control" id="card_no" name="card_no">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="status">Active or Inactive</label>
                        <select id="status" name="status" class="form-control">
                            <option selected value="">Choose...</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="bname">Name in Bengali</label>
                        <input type="text" class="form-control" id="bname" name="bname">
                    </div>

                    <div class="form-group col-md-1"><br>
                        <button type="submit" class="btn btn-primary">Search </button>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </section>
    {{--end search Employee Information --}}