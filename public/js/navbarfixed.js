$(window).scroll(function(e){
   if ($(this).scrollTop() > 450) { // choose the value you want.
       $('.navbar-hidden:hidden').slideDown();
   } else {
       $('.navbar-hidden:visible').slideUp();
   }
});
