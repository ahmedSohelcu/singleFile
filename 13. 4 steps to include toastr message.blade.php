=================================================================================
1. app/Http/routes.php
=================================================================================
Route::get('notification', 'HomeController@notification');



=================================================================================
2.app/Http/Controllers/HomeController.php
=================================================================================
namespace App\Http\Controllers;


use App\Http\Requests;

use Illuminate\Http\Request;


class HomeController extends Controller

{


    public function notification()

    {

        session()->set('success','Item created successfully.');


        return view('notification-check');

    }
	

}


=================================================================================
3.resources/views/notification-check.blade.php
=================================================================================
<!DOCTYPE html>

<html>

<head>

    <title>Check For Notification toastr</title>

    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">

</head>

<body>


@include('notification')

<div class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">

                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    Check for notification

                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>


=================================================================================
4.resources/views/notification.blade.php
=================================================================================

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">


<script>

  @if(Session::has('success'))
  	toastr.success("{{ Session::get('success') }}");
  @endif


  @if(Session::has('info'))
  	toastr.info("{{ Session::get('info') }}");
  @endif


  @if(Session::has('warning'))
  	toastr.warning("{{ Session::get('warning') }}");
  @endif


  @if(Session::has('error'))
  	toastr.error("{{ Session::get('error') }}");
  @endif

</script>












