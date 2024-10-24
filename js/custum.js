// Custom Admin JS
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

    // Custom behavior for sidebar toggle
    $('#sidebarToggle').on('click', function() {
        $('.sidebar').toggleClass('active');
    });
});
