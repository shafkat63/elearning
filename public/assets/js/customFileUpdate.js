function SaveData(reqURL, reqData, isEdit = false) {
    $.ajax({
        type: isEdit ? "PATCH" : "POST", // Use PATCH for edit, POST for create
        url: reqURL,
        data: reqData,
        processData: false,  // Do not process the data
        contentType: false,  // Do not set content type
        success: function (response) {
            if (response.code === "200") {
                swal({
                    title: response.status,
                    text: response.msg,
                }).then((value) => {
                    if (value) {
                        window.location.href = response.routeUrl;
                    }
                });
            } else if (response.status === "error") {
                $(".validation-invalid-label").html("");
                $.each(response.data, function (field, messages) {
                    $("#error-" + field).html(messages.join("<br>"));
                });
            } else {
                $(".validation-invalid-label").html("");
                $("#error-save").html(
                    "An unexpected error occurred during processing. Please try again."
                );
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("Status: " + textStatus);
            console.log("Error Thrown: " + errorThrown);
            console.log("Response Text: " + jqXHR.responseText);
            $(".validation-invalid-label").html("");
            $("#error-save").html(
                "An unexpected error occurred during processing. Please try again."
            );
        },
    });
}
