$(function () {
  $('.material-symbols-outlined').click(function () {
    $(this).toggleClass('active');
    if ($(this).hasClass('active')) {
      $('.menu-container').addClass('active');
    } else {
      $('.menu-container').removeClass('active');
    }
  });
  $('.menu-container ul li a').click(function () {
    $('.material-symbols-outlined').removeClass('active');
    $('.menu-container').removeClass('active');
  });
});

$(function () { //①
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modalClose').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
