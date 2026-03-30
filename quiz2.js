// Quiz 2
// Put your javascript here in a document.ready function
alert("This page is about to load");

$(document).ready(function () {

    var defaultTitle = "ITWS 1100 - Quiz 2";

    // set default title
    document.title = defaultTitle;

    $("#goButton").click(function () {
        if (document.title === defaultTitle) {
            document.title = "D'Andre Collins - Quiz 2";
        } else {
            document.title = defaultTitle;
        }
    });

    $(".last-name").hover(
        function () {
            $(this).addClass("makeItPurple");
        },
        function () {
            $(this).removeClass("makeItPurple");
        }
    );
});