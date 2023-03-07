const loadingScreen = {
    loadingParentElement: 'body',
    addPageLoading: function () {
        overlay= `<div class="container loaderContainer">
            <div class="load-container">
                <div class="linespinner"></div>
            </div>
        </div>`
        $(this.loadingParentElement).append(overlay);
    }
}