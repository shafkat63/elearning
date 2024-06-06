function SaveData(reqURL,reqData) {
    console.log(reqURL+'<=>'+reqData);
    varUrl= reqURL;
    varData= reqData;
    $.ajax({
        type: "POST",
        url:  varUrl,
        data: varData,
        success: function (response) {
            console.log(response);
            if (response.code == '200') {
                swal({
                    title: response.status,
                    text: response.msg,
                }).then((value) => {
                    if (value) {
                        window.location.href =  response.routeUrl;
                    }
                });
            } else if (response.status == 'error') {
                $('.validation-invalid-label').html('');
                $.each(response.data, function (field, messages) {
                    $('#error-' + field).html(messages.join('<br>'));
                });
            } else{
                $('.validation-invalid-label').html('');
                $("#error-save").html("An unexpected error occurs during processing. Please try again.");
            }
        },
        error: function () {
            console.log(varUrl);
            console.log(varData);
            $('.validation-invalid-label').html('');
            $("#error-save").html("An unexpected error occurs during processing. Please try again.1");
        }
    });
}

function showSingleData(reqURL,reqID){
    var url = reqURL+"/" + reqID + "/edit";
    window.location.href = url;
}