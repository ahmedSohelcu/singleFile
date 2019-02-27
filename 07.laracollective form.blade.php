===========================================================================================================================
				#5. Laracollective Form By Ahmed ullah-Chittagong
===========================================================================================================================
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
1.Installation
Begin by installing this package through Composer. Edit your project's composer.json file to require laravelcollective/html.

composer require "laravelcollective/html":"^5.4.0"
---------------------------------------------------------------------------------------------------------------------------
Next, add your new provider to the providers array of config/app.php:

  'providers' => [
	// ...
	Collective\Html\HtmlServiceProvider::class,
	// ...
  ],
---------------------------------------------------------------------------------------------------------------------------

Finally, add two class aliases to the aliases array of config/app.php:

  'aliases' => [
	// ...
	  'Form' => Collective\Html\FormFacade::class,
	  'Html' => Collective\Html\HtmlFacade::class,
	// ...
  ],
===========================================================================================================================

---------------------------------------------------------------------------------------------------------------------------
{{ Form::open(array('url'=>'/sess')) }}
{{ Form::open(['route'=>'save.line','method'=>'POST', 'class'=>'form-horizontal']) }}

-------------------------------------------------for update----------------------------------------------------------------
{{ Form::model($shiftbyId,['route'=>['update.shift_group',$shiftbyId->id],'method'=>'patch','class'=>'form-horizontal']) }} //in edit file

-------------------------------------------------for delete----------------------------------------------------------------
{{ Form::open(['action'=>['Hrm\ShiftController@destroyShiftGroup',$shiftGroup->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
<a href="{{ action('Hrm\ShiftController@editShiftGroup',$shiftGroup->id) }}" type="button" class="btn btn-info btn-sm">
	<i class="fa fa-pencil-alt"></i>
</a>

{{ Form::close() }}
---------------------------------------------------------------------------------------------------------------------------
OR
---------------------------------------------------------------------------------------------------------------------------
<form method="POST" action="{{ route('register') }}">
 @csrf </form>
---------------------------------------------------------------------------------------------------------------------------

---------------------------------------------------------------------------------------------------------------------------
{{ Form::text('field_name',$value = null,['class'=>'form-control','placeholder'=>'Name']) }}
Will produce	--- <input type="text" name="field_name" class="form-control" value="" placeholder="Name">
---------------------------------------------------------------------------------------------------------------------------
2.
---------------------------------------------------------------------------------------------------------------------------
{{Form::label('unit_id', 'Unit', ['class'=>'label-control'])}}
{{ Form::select('unit_id',$repository->units(),null,['class'=>'form-control','placeholder'=>'select unit'])}}
---------------------------------------------------------------------------------------------------------------------------
2.
---------------------------------------------------------------------------------------------------------------------------
{{ Form::label('isbn_num','Isbn Num') }}
{{ Form::text('isbn_num','Type ISBN Num', ['class'=>'form-control']) }}
Will produce	--- <input type="text"  class="form-control" name="isbn_num" placeholder="Type ISBN Num">
---------------------------------------------------------------------------------------------------------------------------
3.
---------------------------------------------------------------------------------------------------------------------------
{{  Form::submit('Click Me!', ['class'=>'btn btn-success']) }}
Will produce	--- <input type="submit" class="btn btn-success" value="Submit">
---------------------------------------------------------------------------------------------------------------------------
4.
---------------------------------------------------------------------------------------------------------------------------
{{ Form::textarea('notes') }}
Will produce	--- <textarea name="notes" cols="50" rows="10"></textarea>
---------------------------------------------------------------------------------------------------------------------------
5.
---------------------------------------------------------------------------------------------------------------------------
You can pass the value as the second argument.
{{ Form::textarea('notes', '3 < 4') }}
The value will be escaped.
<textarea name="notes" cols="50" rows="10">3 &lt; 4</textarea>
---------------------------------------------------------------------------------------------------------------------------
6.
---------------------------------------------------------------------------------------------------------------------------
Additional options can be passed as a third argument. This must be an array.
{{ Form::textarea('notes', null, ['class' => 'field']) }}
This will add the class "field" to the text area.
<textarea class="field" name="notes" cols="50" rows="10"></textarea>
---------------------------------------------------------------------------------------------------------------------------
7.
---------------------------------------------------------------------------------------------------------------------------
{{ Form::textarea('notes', null, ['size' => '30x5']) }}
Will produce	--- <textarea name="notes" cols="30" rows="5"></textarea>
---------------------------------------------------------------------------------------------------------------------------
8.
{{ Form::password('password', ['class' => 'form-control']); }}
Will produce	--- <input class="form-control" name="password" type="password" value="">
---------------------------------------------------------------------------------------------------------------------------