$(document).ready(function () {
    $(".btn-open-gift").on("click", () => {
        $(".popup-gift").removeClass("d-none");
    });

    $(".close-popup").on("click", () => {
        $(".popup-gift").addClass("d-none");
    });
});
