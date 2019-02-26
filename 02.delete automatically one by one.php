1.route
=====================================================================================
Route::post('delShiftG1', 'Hrm\ShiftController@delShiftGrou1By1')->name('delShiftG1');


2.view page
=====================================================================================
<script>
    function delShiftGroup1By1() {
        var csrf = "{{ csrf_token() }}";
        $.ajax({
            method:"post",
            url: '{{ url('delShiftG1') }}',
            data: {_token:csrf},
            type: "text",
            success: function(response) {
                alert(response);
            }
        });
    }
    //setInterval(delShiftGroup1By1,5000);
</script>

3.controller's method
=====================================================================================
public function delShiftGrou1By1(Request $request){
    $toDel = ShiftGroup::oldest()->first();
    $toDel->delete();
    return 'deleted';
}