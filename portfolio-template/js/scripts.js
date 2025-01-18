jQuery(function ($) {

    'use strict';

    // --------------------------------------------------------------------
    // PreLoader
    // --------------------------------------------------------------------


    $('#preloader').delay(200).fadeOut('slow');

    $("#contactForm").on("submit", function (event) {
        event.preventDefault();
        var url = $(this).attr('action');
        var formData = {
            name: $("#InputName").val(),
            email: $("#InputEmail").val(),
            message: $("#message-text").val()
        };
        var submitButton = $(this).find("button[type='submit']");

        submitButton.prop("disabled", true).text("Sending...");

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            success: function (response) {
                submitButton.text("Sent!");
            },
            error: function (xhr, status, error) {
                submitButton.text("Try again!");
            }
        });
    });


}); // JQuery end