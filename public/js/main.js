$(document).ready(function()
{

    $(".showdepart").click(function(){

        $(".department").slideToggle(7700);
    });
});
function markNotificationAsRead(notificationCount) {
    if(notificationCount !=='0'){
        $.get('/markAsRead');
    }
}