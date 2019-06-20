=================================================================

=================================================================
		
		@foreach($salaries as $section =>$salary_data)
            @foreach($salary_data->chunk(10) as $salaryChunk)
            <section class="content">
                <div class="col-lg-12">
                    <div class="card">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="salaryReport table table-responsive table-hover table-bordered table-striped"  style="font-size: 13px">
                                        <thead>
                                        <tr class="bg-light">
                                            <th class="text-center">Empno</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Designation</th>
                                            <th class="text-center">Gross</th>
                                            <th class="text-center">Work</th>
                                            <th class="text-center">Absent</th>
                                            <th class="text-center">Leave</th>
                                            <th class="text-center">Ttl Days</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Atnd Bonus</th>
                                            <th class="text-center" colspan="2">Over Time</th>
                                            <th class="text-center">Total Salary</th>
                                            <th class="text-center" colspan="6">Deduction for</th>
                                            <th class="text-center" rowspan="2">Total Ded</th>
                                            <th class="text-center">Net <br>Payable</th>
                                            <th class="text-center">SIGNATURE</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <tr class="bg-light">
                                            <td colspan="10"></td>
                                            <td class="text-center">OT HR</td>
                                            <td class="text-center">OT Amt</td>
                                            <td class="text-center"></td>
                                            <th class="text-center">Transport</th>
                                            <th class="text-center">Stmp</th>
                                            <th class="text-center">S.Loan</th>
                                            <th class="text-center">L.Loan </th>
                                            <th class="text-center">Card</th>
                                            <!--<th class="text-center">TDS</th>-->
                                            <th class="text-center">Late</th>
                                            <td colspan="3"></td>

                                        </tr>                                 
                                        @foreach($salaryChunk as $salary)                                            
                                            <tr>
                                                <td>{{$salary->employee->employee_no}}</td>
                                                <td>{{$salary->employee->ename}}</td>                          
                                                <td class="text-center">{{$salary->gross}}</td>
                                                <td class="text-center">{{$working_days}}</td>
                                                <td class="text-center">{{$absent}} </td>
                                                <td class="text-center">{{$total_leaves}}</td>
                                                <td class="text-center">{{$working_days + $total_leaves}}</td>
                                                <td class="text-center">{{$amount}}</td>
                                                <td class="text-center">{{$bonus}} </td>
                                                <td class="text-center">{{$total_ot}} </td>
                                                <td class="text-center"> {{$total_ot_amount}}</td>
                                                <td class="text-center"></td>
                                            </tr>                
                                        </tbody>                                     
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </section>

            <div class="page_break"></div>
            @endforeach
        @endforeach
    @endif
 