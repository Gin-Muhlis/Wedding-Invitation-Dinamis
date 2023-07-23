$(document).ready(function () {
    new ClipboardJS(".copy-gift-data");

    let copyButtons = Array.from($(".copy-gift-data"));

    copyButtons.forEach((btn) => {
        $(btn).on("click", () => {
            $(btn).addClass("check");

            setTimeout(() => {
                $(btn).removeClass("check");
            }, 2000);
        });
    });
});
