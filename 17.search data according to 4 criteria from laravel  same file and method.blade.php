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