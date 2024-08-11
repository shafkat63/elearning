// function SaveData(reqURL, reqData) {
//     console.log(reqURL + "<=>" + reqData);

//     $.ajax({
//         type: "PATCH",
//         url: reqURL,
//         data: reqData,
//         processData: false,  // Prevent jQuery from automatically transforming the data into a query string
//         contentType: false,  // Prevent jQuery from setting the content type
//         success: function (response) {
//             console.log(response);
//             if (response.code == "200") {
//                 swal({
//                     title: response.status,
//                     text: response.msg,
//                 }).then((value) => {
//                     if (value) {
//                         window.location.href = response.routeUrl;
//                     }
//                 });
//             } else if (response.status == "error") {
//                 $(".validation-invalid-label").html("");
//                 $.each(response.data, function (field, messages) {
//                     $("#error-" + field).html(messages.join("<br>"));
//                 });
//             } else {
//                 $(".validation-invalid-label").html("");
//                 $("#error-save").html(
//                     "An unexpected error occurred during processing. Please try again."
//                 );
//             }
//         },
//         error: function (jqXHR, textStatus, errorThrown) {
//             console.log("Status: " + textStatus);
//             console.log("Error Thrown: " + errorThrown);
//             console.log("Response Text: " + jqXHR.responseText);
//             $(".validation-invalid-label").html("");
//             $("#error-save").html(
//                 "An unexpected error occurred during processing. Please try again."
//             );
//         },
//     });
// }

// function showSingleData(reqURL, reqID) {
//     var url = reqURL + "/" + reqID + "/edit";
//     window.location.href = url;
// }

function SaveData(reqURL, reqData) {
    console.log(reqURL + "<=>" + reqData);
    varUrl = reqURL;
    varData = reqData;
    $.ajax({
        type: "PATCH",
        url: varUrl,
        data: varData,
        success: function (response) {
            console.log(response);
            if (response.code == "200") {
                swal({
                    title: response.status,
                    text: response.msg,
                }).then((value) => {
                    if (value) {
                        window.location.href = response.routeUrl;
                    }
                });
            } else if (response.status == "error") {
                $(".validation-invalid-label").html("");
                $.each(response.data, function (field, messages) {
                    $("#error-" + field).html(messages.join("<br>"));
                });
            } else {
                $(".validation-invalid-label").html("");
                $("#error-save").html(
                    "An unexpected error occurs during processing. Please try again."
                );
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(varUrl);
            console.log(varData);
            console.log("Status: " + textStatus);
            console.log("Error Thrown: " + errorThrown);
            console.log("Response Text: " + jqXHR.responseText);
            $(".validation-invalid-label").html("");
            $("#error-save").html(
                "An unexpected error occurs during processing. Please try again.1"
            );
        },
    });
}

function showSingleData(reqURL, reqID) {
    var url = reqURL + "/" + reqID + "/edit";
    window.location.href = url;
}



