$('body').on('click', '[data-popup="modal"]', function (e) {
    const $panelButton = $(this);
    const url = $panelButton.attr('href');
    const title = $panelButton.data('title');
    const size = $panelButton.data('size');
    $.ajax({
        type: 'GET',
        url: url, beforeSend: function () {
            window.loadingScreen.addLoading();
        },

        success: function (response) {
            bootbox.dialog({
                title: title,
                size: size || "extra-large",
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
