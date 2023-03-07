import bootbox from "bootbox";

$('body').on('click', '[data-popup="modal"]', function (e) {
    e.preventDefault();
    const $panelButton = $(this);
    const url = $panelButton.attr('href');
    const title = $panelButton.data('title');
    const size = $panelButton.data('size');
    $.ajax({
        type: 'GET',
        url: url,
        beforeSend: function () {

        },
        success: function (response) {
            bootbox.dialog({
                title: title,
                size: size || "extra-large",
                centerVertical: true,
                message: response,
                buttons: {
                    cancel: {
                        label: 'close',
                        className: "btn-secondary",
                    },
                }
            });
        },
    })
})
