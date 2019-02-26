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