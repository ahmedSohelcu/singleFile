I want to display the difference between the current date and time with the one stored in the updated_at column. However, I want it to be human-friendly like:

53 mins ago
2 hours ago
3 days ago

Is there a function out there that I could use to make it easier?
To be sure that you understand me, let's say I have a column (updated_at) in my database which is equal to 2015-06-22 20:00:03 and the current time is 20:00:28. Then I'd like to see:
25 mins ago
=====================================================================================================================================================================================

=====================================================================================================================================================================================


Answer
=====================================================================================================================================================================================

By default, Eloquent converts created_at and updated_at columns to instances of Carbon. So if you are fetching the data using Eloquent, then you can do it as below.

$object->updated_at->diffForHumans();

If you want to customize the fields that will be mutated automatically, then within your model, you can customize them as you wish.


// Carbon instance fields
protected $dates = ['created_at', 'updated_at', 'deleted_at'];

