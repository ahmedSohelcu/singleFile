===========================================================================
//1.in controller (create session message )
===========================================================================
Session::flash('success','District has been updated!');
return redirect('hrm/setting/district');

More redirect type
===========================================================================
1. return redirect('hrm/setting/district');

// For a route with the following URI: profile/{id}
2. return redirect()->route('profile', ['id' => 1]);

// For a route with the following URI: profile/{id}
3. return redirect()->route('profile', [$user]);


===========================================================================
//2.show session message (in view)
===========================================================================
{{-- start showing success message --}}
<div class="col-md-4">
    @if (session('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('success') }}
        </div>
    @endif
</div>
{{-- end showing gsuccess message --}}

Or
------------------
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

===========================================================================

*******
===========================================================================
//** 3. Passing and show different type's of session message at a time 
===========================================================================
One solution would be to flash two variables into the session:
The message itself
The "class" of your alert
for example:
---------------------------------------------------------------------------
Session::flash('message', 'This is a message!'); 
Session::flash('alert-class', 'alert-danger'); 

Then in your view:
---------------------------------------------------------------------------
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
===========================================================================




===========================================================================
4.OR 
===========================================================================
In your view:
---------------------------------------------------------------------------
<div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>
---------------------------------------------------------------------------
Then set a flash message in the controller:
---------------------------------------------------------------------------
Session::flash('alert-danger', 'danger');
Session::flash('alert-warning', 'warning');
Session::flash('alert-success', 'success');
Session::flash('alert-info', 'info');