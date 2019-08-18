store data with laravel and bootstrap modal
====================================================================
1.create.blade file 
-------------------------------------------------------------------
    {{--==========================================================================================--}}
    {{-- start modal for add company by Ahmed --}}
    {{--==========================================================================================--}}
    <!-- Button to Open the Modal -->
    {{--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">--}}
    {{--        Open modal--}}
    {{--    </button>--}}

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add a new company</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="#">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="description">Short Description</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <input type="submit" id="companySubmit" class="btn btn-success btn-sm"  data-dismiss="modal" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--==========================================================================================--}}
    {{--end modal for add company --}}
    {{--==========================================================================================--}}




        //=====================================================
    //    jquery code for company store with modal
    //    =====================================================
        $(document).on('click','#companySubmit',function (e) {
           e.preventDefault();
            var name = $("#name").val();
            var description = $("#description").val();
            var csrf = "{{ csrf_token() }}";

            $.ajax({
                method:"post",
                url: '{{ url('settings/company-store') }}',
                data: {name:name,description:description,_token:csrf},
                type: "html",
                success: function(response) {
                    $("#name").val('');
                    $("#description").val('');
                    location.reload();
                },
                catch:function (error){
                    console.log(error)
                }
            });
        });
        //=====================================================
        //    End code for company store with modal
        //=====================================================





web.php
-------------------------------------------------------------------
Route::post("settings/company-store","Account\CompanySetupController@store")->name('company.store');



-------------------------------------------------------------------
click button to open modal
-------------------------------------------------------------------
<button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#myModal">
                add new company
            </button>

============================================================================================================
controller .....
============================================================================================================

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'note'=>'max:200'
        ]);
        AccountCompany::create($request->all());
        session()->flash('success',"Company Name created successfully");
        return redirect()->route('company.add');
    }

============================================================================================================





