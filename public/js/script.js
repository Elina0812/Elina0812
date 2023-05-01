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

$(function () {
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modal-inner').on('click', function (e) {
    if (!$(e.target).closest('.modal-content').length) {
      $('.js-modal').fadeOut();
      return false;
    }
  });
});
