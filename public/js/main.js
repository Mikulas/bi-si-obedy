$(function() {
    $(".notification .delete").on('click', function() {
        var $notification = $(this).parent('.notification');
        $notification.slideUp();
    });
});
