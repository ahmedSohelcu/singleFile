1.html form
====================================================================
{{--=====================================================--}}
    {{--This is by Ahmed --}}
{{--=====================================================--}}
<div class="row">
    <div class="col-lg-2 col-sm-2 col-md-4 col-xs-12">
        <div class="from-group {{ $errors->has('ename') ? 'has-error' : '' }} ">
            {{ Form::label('date','Date : ') }} <br>
            {{Form::text('date',date('Y-m-d'),['id'=>'date','class'=>'form-control']) }}

            @if($errors->has('date'))
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif
        </div>
    </div>

    @php
        $companies = ['1'=>'Well Design','2'=>'Well Dresses','3'=>'Well Mart','4'=>'Well Fashion','5'=>'Unit 2'];
    @endphp

    <div class="col-lg-4 col-sm-2 col-md-4 col-xs-12">
        {{ Form::label('company_id','Select a company / : ') }}
            <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#myModal">
                add new company
            </button>

        <div class="from-group {{ $errors->has('company_id') ? 'has-error' : '' }} ">
            {!! Form::select('company_id', $companies , null , ['class' => 'form-control','placeholder'=>'Select company']) !!}
            @if($errors->has('company_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('company_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-lg-12"></div>


    <div class="col-lg-6 col-sm-12 col-md-4 col-xs-12">
        <div class="from-group"> <br>
            {{ Form::label('journal_no','Journal No : ') }}
            {!! Form::text('journal_no',null,['class'=>'form-control','readonly'=>'readonly', 'rows' => 1, 'cols' => 40]) !!}
        </div>
    </div>

    <div class="col-lg-12"></div>

    <div class="col-lg-12 row" id="AppendDebitRow">
        <div class="col-lg-12 row">
            <div class="col-lg-4 col-sm-3 col-md-3 col-xs-12">
                <div class="from-group {{ $errors->has('dr_ledger_group_id[]') ? 'has-error' : '' }} ">
                    <br>
                    {{ Form::label('dr_ledger_group_id[]','Account Names (Dr): ') }}
                    {!! Form::select('dr_ledger_group_id[]', $repository->ledgerGroups() , null , ['class' => 'form-control','placeholder'=>'select Debit Accounts']) !!}
                    @if($errors->has('dr_ledger_group_id[]'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dr_ledger_group_id[]') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="from-group" id="AppDebAmount"> <br>
                    {{ Form::label('dr_amount[]','Debit : ') }}
                    {{ Form::text('dr_amount[]',old('dr_amount[]'),['class'=>'dr_amount form-control','id'=>'dr_amount','placeholder'=>'00']) }}
                </div>
            </div>
            {{----------add more debit button-------------}}
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="from-group" id="AppDebAmount"> <br><br>
                    <button style="margin: 11px 0" class="btn btn-light btn-sm text-dark"  style="margin:20px;" data-toggle="tooltip" title=" more debit" id="addMoreDebit">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
         </div>
    </div>{{--end debit row--}}
{{--    =============================================--}}

    <div class="col-lg-3 col-sm-2 col-md-2 col-xs-12"></div>

    {{--stary credit row --}}
    <div class="col-lg-12 row" id="AppendCreditRow">
        <div class="col-lg-12 row">
            <div class="col-lg-4 col-sm-3 col-md-3 col-xs-12">
                <div class="from-group {{ $errors->has('cr_ledger_group_id') ? 'has-error' : '' }}"><br>
                    {{ Form::label('cr_ledger_group_id','Account Names (Cr) : ') }}
                    {!! Form::select('cr_ledger_group_id[]', $repository->ledgerGroups() , null , ['class' => 'form-control','placeholder'=>'select Credit Accounts']) !!}

                    @if($errors->has('cr_ledger_group_id'))
                        <span class="help-block">
                        <strong>{{ $errors->first('cr_ledger_group_id') }}</strong>
                    </span>
                    @endif
                    <br>
                </div>
            </div>

            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12" id="AppCreAmount">
                <div class="from-group"><br>
                    {{ Form::label('cr_amount','Credit : ') }}
                    {{ Form::text('cr_amount[]',old('cr_amount[]'),['class'=>'form-control','placeholder'=>'00','id'=>'cr_amount']) }}
                </div>
            </div>

            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="from-group" id="AppDebAmount"> <br><br>
                    <button style="margin: 11px 0" class="btn btn-light btn-sm text-dark"  style="margin:20px;" data-toggle="tooltip" title=" more Credit" id="addMoreCredit">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
    {{----------end credit row------------}}






    <div class="col-lg-12"></div>

    <div class="col-lg-6 col-sm-2 col-md-2 col-xs-12">
        <div class="from-group"><br>
            {{ Form::label('event','Event Or Transaction : ') }}
            {!! Form::textarea('event',null,['class'=>'form-control', 'rows' => 1, 'cols' => 10]) !!}
        </div>
    </div>

    <div class="col-lg-12"></div>

{{--    <div class="col-lg-2 offset-lg-5 col-sm-4 col-md-4 col-xs-12"><br>--}}
{{--        <div class="m-left-15 from-group">--}}
{{--            <button class="btn btn-info">Create</button>--}}
{{--        </div>--}}
{{--    </div>--}}

</div>
==========================================================================







   2.     {{--==========================================================================================--}}
        //     Append multiple debit or credit with jquery append function by Ahmed
        {{--//--}}{{--==========================================================================================--}}


        //1. start multiple debit appended option by Ahemd
        //==========================================================
        $(document).on('click','#addMoreDebit',function (e) {
            e.preventDefault();
            var AppendDeb = `<div class="container row">
            <div class="col-lg-5 col-sm-3 col-md-3 col-xs-12">
                <div class="from-group {{ $errors->has('dr_ledger_group_id[]') ? 'has-error' : '' }} ">
                    <br>
                    {{ Form::label('dr_ledger_group_id[]','Account Names (Dr): ') }}
                    {!! Form::select('dr_ledger_group_id[]', $repository->ledgerGroups() , null , ['class' => 'form-control','placeholder'=>'select Debit Accounts']) !!}
                    @if($errors->has('dr_ledger_group_id[]'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dr_ledger_group_id[]') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-lg-3 col-sm-2 col-md-2 col-xs-12">
                <div class="from-group" id="AppDebAmount"> <br>
                    {{ Form::label('dr_amount[]','Debit : ') }}
                    {{ Form::text('dr_amount[]',old('dr_amount[]'),['class'=>'dr_amount form-control','id'=>'dr_amount','placeholder'=>'00']) }}
                </div>
            </div>

                {{-----start add more debit and remove button--------}}
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="from-group" id="AppDebAmount"> <br><br>
                        <button style="margin: 11px 0" class="btn btn-light btn-sm text-dark"  style="margin:20px;" data-toggle="tooltip" title=" more debit" id="addMoreDebit">
                            <i class="fa fa-plus"></i>
                        </button>
                        <button style="margin: 11px 0" class="btn btn-danger btn-sm text-light"  id="removeDebitRow" style="margin:20px;" data-toggle="tooltip" title=" remove this" id="">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
             </div>`;

            $('#AppendDebitRow').append(AppendDeb);
            $("select").select2();
        });

        
        //to remove multiple debit appended item after click
        $(document).on('click','#removeDebitRow',function (e) {
            e.preventDefault();
            //console.log('clicked remove debit button......');
            $(this).parent().parent().parent().remove();
        });
        //=========================================================================
        //2. start multiple credit appended option by Ahemd

        $(document).on('click','#addMoreCredit',function (e) {
            e.preventDefault();
            var creditRow = `<div class="container row">
            <div class="col-lg-5 col-sm-3 col-md-3 col-xs-12">
                <div class="from-group {{ $errors->has('cr_ledger_group_id') ? 'has-error' : '' }}" id="AppendCreAcc"><br>
                    {{ Form::label('cr_ledger_group_id','Account Names (Cr) : ') }}
                    {!! Form::select('cr_ledger_group_id[]', $repository->ledgerGroups() , null , ['class' => 'form-control','placeholder'=>'select Credit Accounts']) !!}

                    @if($errors->has('cr_ledger_group_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cr_ledger_group_id') }}</strong>
                        </span>
                    @endif
                <br>
            </div>
        </div>

        <div class="col-lg-3 col-sm-2 col-md-2 col-xs-12" id="AppCreAmount">
            <div class="from-group"><br>
                    {{ Form::label('cr_amount','Credit : ') }}
                    {{ Form::text('cr_amount[]',old('cr_amount[]'),['class'=>'form-control','placeholder'=>'00','id'=>'cr_amount']) }}
                </div>
            </div>

            {{-----start add more credit and remove button--------}}
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="from-group" id="AppDebAmount"> <br><br>
                    <button style="margin: 11px 0" class="btn btn-light btn-sm text-dark"  style="margin:20px;" data-toggle="tooltip" title=" more Credit" id="addMoreCredit">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button style="margin: 11px 0" class="btn btn-danger btn-sm text-light"  id="removeCreditRow" style="margin:20px;" data-toggle="tooltip" title="remove this" id="">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>`;

            $('#AppendCreditRow').append(creditRow);
            $("select").select2();
        });

        $(document).on('click','#removeCreditRow',function (e) {
            e.preventDefault();
            $(this).parent().parent().parent().remove();
        });
    </script>
@stop
