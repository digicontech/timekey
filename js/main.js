
$("#contact-form").submit(function(e) {
  $('.form-messages').fadeOut();
  $button = $('#contact-form-submit');
  $form =  $("#contact-form");
  $button.html('<i class="fa fa-spinner fa-spin"></i>');
  $.ajax({
    type: "POST",
    url: "./mailer.php",
    data: $form.serialize(),
    success: function(data){
        $form.trigger('reset');
        $button.html('Sent <i class="fa fa-check"></i>');
    },
    error: function(data){
      $button.html('Send');
      $('.form-messages').html(
        '<i class="fa fa-exclamation-circle fa-2x"></i>The message failed to send. Please try again');
      $('.form-messages').fadeIn();
    },
  });
  e.preventDefault(); 
});

$("#contact-form").delegate(':input', 'focus', function() {
    $('#contact-form-submit').html('Send');
})