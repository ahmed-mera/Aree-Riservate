$(document).ready(function() {
  ////////////////////////////////////////////////////////////////////////////////////////////////
  $('.open').click(function() {

    $('.navbar-nav').css('width', '270px');
    // $('.container-fluid').css('marginLeft','250px');
    // $('.fixed-top').css('left','250px');
  });

  $('.close').click(function() {

    $('.navbar-nav').css('width', '0');
    // $('.container-fluid').css('marginLeft','0');
    // $('.fixed-top').css('left','0');
  });
  ///////////////////////////////////////////////////////////////////////////////////////////////////
  // per dropdown
  $('.serivce , .settings').click(function() {

    $(this).parent().find('.dropdown-menu').toggle(1000);

  });
  /////////////////////////////////////////////////////////////////////////////////////////////
  // (function getCookie() {
  // var	allCookies = document.cookie,
  // 		myCookie = allCookies.substring(allCookies.indexOf('view'),42);
  // 		/*
  // 		//per modificare il cookie
  // 		content = myCookie.substring(myCookie.indexOf('='));
  // 		content = '=100';
  // 		document.cookie = 'view'+content;
  // 		console.log(content);
  // 		*/
  //     $(function (){ $('.cookie').hide(); });//show alert cookie cookie
  //     console.log(allCookies);
  //
  // 	if ('view' != myCookie) {
  //     console.log(allCookies);
  // 		// $(function (){ $('.cookie').show(1000); });
  // 		$(function (){ $('.cookie').show(1000); });//show alert cookie cookie
  // 		$(function (){ $('.cookie .cls').on('click', function () {$('.cookie').hide(1000); }); });//click to hide alert cookie
  // 	}
  // }());
  ///////////////////////////////////////////////////////////////////////////////////////////////////

  // $('.nav-item').click(function(){
  //
  //   $(this).parent().find('.active').removeClass('active');
  //   $(this).addClass('active');
  //
  // });
});
// $(function() {
//   $("html").niceScroll();
//
// });
// window.onload = function() {
//   Particles.
//   init
//     ({
//       // normal options
//       selector: '.background',
//
//     });
// };
