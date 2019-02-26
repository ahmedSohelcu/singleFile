    <script>
            //to get floor according to unit id by Ahmed
            $(document).ready(function() {
                //$('#hideFloor').hide();
                $('body').on('change','#unit_id', function() {
                    var unit_id = $(this).val();
                    var csrf = "{{ csrf_token() }}";

                    $.ajax({
                        method:"post",
                        url: '{{ url('hrm/setting/line_by_floor') }}',
                        data: {unit_id:unit_id,_token:csrf},
                        type: "html",
                        success: function(response) {
                            $('#hideFloor').show(500);
    //                       $("#selectData").html(response);
                            $("#floor_id").empty().append(response);
                        }
                    });
                });
            });
        </script>