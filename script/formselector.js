$(document).ready(function () {
   $('.reg').click(function () {
      $(this).removeClass('gray-clr');
      $(this).addClass('black-clr');
      $(".log").removeClass('black-clr');
      $(".log").addClass('gray-clr');
      $(".login__stage").addClass('hidden');
      $(".register__stage").removeClass('hidden');
      localStorage.reg=1;
      return false;
   })
})

$(document).ready(function () {
   $('.log').click(function () {
      $(this).removeClass('gray-clr');
      $(this).addClass('black-clr');
      $(".reg").removeClass('black-clr');
      $(".reg").addClass('gray-clr');
      $(".register__stage").addClass('hidden');
      $(".login__stage").removeClass('hidden');
      localStorage.reg=0;
      return false;
   })
})

$(document).ready(function() {
   if(localStorage.reg == 1) {
      $(".reg").removeClass('gray-clr');
      $(".reg").addClass('black-clr');
      $(".log").removeClass('black-clr');
      $(".log").addClass('gray-clr');
      $(".login__stage").addClass('hidden');
      $(".register__stage").removeClass('hidden');
   }
   return false;
});