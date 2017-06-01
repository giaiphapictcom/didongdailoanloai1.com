function initMenu() {
    $('#menu1 ul').hide();
    //$('#menu1 ul:first').show();
    $('#menu1 li a').hover(
        function() {
            var checkElement = $(this).next();
            if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                $('#menu1 ul:visible').slideUp('normal');
                checkElement.slideDown('normal');
                return false;
            }
        }
        );
}
$(document).ready(function() {
    initMenu();
});