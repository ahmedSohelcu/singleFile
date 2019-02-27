<div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email<span class="text-danger">*</span></label>
    <div class="col-md-8">
        {{ Form::text('email',null,['class'=>'form-control']) }}
        @if($errors->has('email'))<span class="help-block">{{ $errors->first('email') }}</span>@endif
    </div>
</div>

<div class="form-group row {{ $errors->has('roles') ? 'has-error' : '' }}">
    <label for="cpassword" class="col-md-2 control-label">Roles <span class="text-danger">*</span></label>
    <div class="col-md-8">
        {{ Form::select('roles[]',$roles,null,['class'=>'form-control select2','multiple']) }}
        @if($errors->has('roles'))<span class="help-block">{{ $errors->first('roles') }}</span>@endif
    </div>
</div>