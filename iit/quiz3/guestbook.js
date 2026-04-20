$(document).ready(function () {

    $("#guestbook-form").on("submit", function (e) {
        e.preventDefault();

        var name = $("#name").val().trim();
        var message = $("#message").val().trim();

        if (name === "" || message === "") {
            $("#error-msg").text("Please fill in both fields.").fadeIn();
            return;
        }

        $("#error-msg").fadeOut();

        $.ajax({
            type: "POST",
            url: "submit.php",
            data: { name: name, message: message },

            success: function () {

                $("#name").val("");
                $("#message").val("");

                var newEntry = $(
                    "<div class='entry' style='display:none'>" +
                    "<strong>" + $("<span>").text(name).html() + "</strong>" +
                    "<p>" + $("<span>").text(message).html() + "</p>" +
                    "<small>Just now</small>" +
                    "</div>"
                );

                $("#entries-list").prepend(newEntry);
                newEntry.slideDown(400);
            },

            error: function () {
                $("#error-msg").text("Something went wrong. Try again.").fadeIn();
            }
        });
    });

});