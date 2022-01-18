// ready document

$(document).ready(function () {
    $('#sendMessage').click(function () {
        Send();
    });
});

function Send() {
    console.log($('#write_msg').val(), $('#message_id').val(), $('#session_id').val(), $('#sendMessage').val());
    // if ($('#write_msg').val() != null) {
    alert('send');
    console.log('hey');
    $('#write_msg').val('');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                'content')
        }
    });

    $.ajax({
        type: "POST",
        url: "./send.php",
        // dataType: "json",
        data: "{'X-CSRF-TOKEN': .'"+$('meta[name="csrf-token"]').attr(
            'content')+"', 'sender_id': '" + $('#session_id').val() + "', 'message_id':'" + $('#message_id').val() + "', 'message':'" + $('#write_msg').val() + "', 'sendMessage': '" + $('#sendMessage').val() + "' }",
        my: function(data){
            console.log('data');
        },
        success: function (data) {
            console.log(data);
            $('#write_msg').val('');
        },
        Error: function (textMsg) {

            $('#Result').text("Error: " + Error);
        }
    });
    // }
}