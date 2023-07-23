$(document).ready(function () {
    let checkIcon = "fa-circle-check";
    let crossIcon = "fa-circle-xmark";
    let isReply = false;
    let rsvp_id;

    $(".form-rsvp").on("submit", function (e) {
        e.preventDefault();

        let url = !isReply ? "/rsvp-invitation" : "/reply-rsvp";
        $(".send-text").addClass("d-none");
        $(".spinner-rsvp").removeClass("d-none");

        const data = !isReply
            ? {
                  name: $("#input-name").val(),
                  comment: $("#input-comment").val(),
                  kehadiran: $("#input-kehadiran").val(),
                  bg_profile: getRandomColor(),
                  order_id: order_id,
              }
            : {
                  name: $("#input-name").val(),
                  reply: $("#input-comment").val(),
                  kehadiran: $("#input-kehadiran").val(),
                  bg_profile: getRandomColor(),
                  rsvp_id: rsvp_id,
              };

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: function (response) {
                $(".send-text").removeClass("d-none");
                $(".spinner-rsvp").addClass("d-none");

                $(".popup-alert").removeClass("d-none");
                $(".popup-alert").addClass("alert-success");
                $(".popup-alert").addClass("d-flex");
                $(".icon-popup").addClass(checkIcon);

                $(".text-popup").html("Ucapan Berhasil Terkirim...");
                setTimeout(() => {
                    $(".popup-alert").removeClass("d-flex");
                    $(".popup-alert").addClass("d-none");
                }, 3000);

                $("#input-name").val("");
                $("#input-comment").val("");

                let markup = ``;

                if (!isReply) {
                    response.forEach((data) => {
                        let replyMarkup = ``;
                        if (data["dataReplies"].length > 0) {
                            data["dataReplies"].forEach((reply) => {
                                replyMarkup += ` <div
                                class="d-flex align-items-start justify-content-start gap-2 mb-3 reply-field">
                                <div class="image d-flex align-items-center justify-content-center text-white"
                                    style="background-color: #${reply["bg"]};">
                                    ${reply["name"].charAt(0)}
                                </div>
                                <div class="text d-flex flex-column gap-1">
                                    <div
                                        class="mb-1 d-flex align-items-center justify-content-start gap-2">
                                        <span class="name text-light">${
                                            reply["name"]
                                        }</span>
                                        <span
                                            class="kehadiran text-dark">${
                                                reply["kehadiran"]
                                            }</span>
    
                                    </div>
                                    <span
                                        class="time text-white">${
                                            reply["time"]
                                        }</span>
                                    <span class="message text-white">${
                                        reply["reply"]
                                    }</span>
                                </div>
                            </div>`;
                            });
                        }

                        markup += `<div class="d-flex align-items-start justify-content-start gap-2 mb-3">
                        <div class="image d-flex align-items-center justify-content-center text-white" style="background-color: #${
                            data["bg"]
                        };">
                            ${data["name"].charAt(0).toUpperCase()}
                        </div>
                        <div class="text d-flex flex-column gap-1">
                            <div class="mb-1 d-flex align-items-center justify-content-start gap-2">
                                <span class="name text-light">${
                                    data["name"]
                                }</span>
                                <span class="kehadiran text-dark">${
                                    data["kehadiran"]
                                }</span>
                            </div>
                            <span
                                class="time text-white">${data["time"]}</span>
                            <span class="message text-white">${
                                data["comment"]
                            }</span>
                            <span class="btn-reply" data-rsvp="${
                                data["id"]
                            }">Balas</span>
                        </div>
                    </div>
                    <div class="wrapper-reply wrapper-reply${
                        data["id"]
                    }">${replyMarkup}</div>`;
                    });

                    $(".data-rsvp").html(markup);
                    clickReply();
                } else {
                    response.forEach((data) => {
                        markup += `<div class="d-flex align-items-start justify-content-start gap-2 mb-3 reply-field">
                        <div class="image d-flex align-items-center justify-content-center text-white" style="background-color: #${
                            data.bg
                        };">
                            ${data["name"].charAt(0).toUpperCase()}
                        </div>
                        <div class="text d-flex flex-column gap-1">
                            <div class="mb-1 d-flex align-items-center justify-content-start gap-2">
                                <span class="name text-light">${
                                    data["name"]
                                }</span>
                                <span class="kehadiran text-dark">${
                                    data["kehadiran"]
                                }</span>
                            </div>
                            <span
                                class="time text-white">${data["time"]}</span>
                            <span class="message text-white">${
                                data["reply"]
                            }</span>
                        </div>
                    </div>`;
                        $(`.wrapper-reply${data.id}`).html(markup);
                    });

                    $("#input-name").val("");
                    $("#input-comment").val("");
                    $("#input-comment").attr("placeholder", "Pesan");
                    isReply = false;
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                $(".send-text").removeClass("d-none");
                $(".spinner-rsvp").addClass("d-none");

                $(".popup-alert").removeClass("d-none");
                $(".popup-alert").addClass("alert-danger");
                $(".popup-alert").addClass("d-flex");
                $(".icon-popup").addClass(crossIcon);

                $(".text-popup").html(
                    "Terjadi Kesalahan! Periksa Pesan Yang Anda Kirim dan Ulang..."
                );
                setTimeout(() => {
                    $(".popup-alert").removeClass("d-flex");
                    $(".popup-alert").addClass("d-none");
                }, 3000);
            },
        });
    });

    $(document).on("keydown", function (event) {
        let key = event.originalEvent.code;

        if (
            (key == "Escape" ||
                (key == "Space" && !$("#input-comment").is(":focus"))) &&
            isReply
        ) {
            isReply = false;

            $("#input-comment").trigger("blur");
            $("#input-comment").attr("placeholder", "Pesan");
        }
    });

    function clickReply() {
        let btnReplays = Array.from($(".btn-reply"));
        btnReplays.forEach((btn) => {
            $(btn).on("click", function (event) {
                rsvp_id = $(event.target).data("rsvp");
                isReply = true;
                console.log(rsvp_id);
                $("#input-name").val("");
                $("#input-comment").val("");
                $("#input-comment").trigger("focus");
                $("#input-comment").attr(
                    "placeholder",
                    "Balas (Esc or Space to cancel)"
                );
            });
        });
    }

    clickReply();

    function getRandomColor() {
        let colors = [
            "F0DE36",
            "0D1282",
            "0D1282",
            "1A5D1A",
            "862B0D",
            "6527BE",
            "164B60",
            "F29727",
            "27374D",
            "D21312",
        ];

        let randomIndex = Math.floor(Math.random() * 11);

        return colors[randomIndex] || "080808";
    }
});
