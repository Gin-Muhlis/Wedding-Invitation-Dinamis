$(document).ready(function() {
    $(".form-rsvp").on('submit', function(e) {
        e.preventDefault();

        const data = {
            name: $("#input-name").val(),
            comment: $("#input-comment").val(),
            kehadiran: $("#input-kehadiran").val(),
            order_id: order_id
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/rsvp-invitation',
            type: 'POST',
            data: data,
            success: function(response) {
                console.log(response)
            },
            error: function(xhr) {
                const error = xhr.responseText
                console.log(error)
            }
        })
    })
})