$(document).ready(function () {
    let audio = document.getElementById("music-background");
    let pauseIcon = `<i class="fa-solid fa-pause pause-icon"></i>`;
    let playIcon = `<i class="fa-solid fa-play play-icon"></i>`;

    $(".open-invitation").on("click", function () {
        audio.play();
    });

    $(".btn-music").on("click", () => {
        if (audio.paused) {
            audio.play();
            $(".btn-music").html(pauseIcon);
        } else {
            audio.pause();
            $(".btn-music").html(playIcon);
        }
    });
});
