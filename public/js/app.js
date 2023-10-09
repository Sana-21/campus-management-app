$(document).ready(function () {
    $('#sidebarMenu a').click(function () {
        $('#sidebarMenu a').removeClass('active');
        $(this).addClass('active');
    });
    
    $('.profile-icon').click(function () {
        $(this).addClass('active');
    });
});
