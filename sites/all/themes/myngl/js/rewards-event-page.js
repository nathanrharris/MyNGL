var selected_reward_id = -1;
var update_status_interval;




(function ($) {
  $(document).ready( function() {
    $('li#gifting-suite').removeClass("inactive").addClass("active");

    $('form#myngl-myngl-post-questions-form input#edit-submit').attr("value", "NEXT");
    $('form#myngl-myngl-post-questions-form').removeAttr('method').removeAttr('action');//.attr("onsubmit",'rewards_overlay.form_submit()');
    $('form#myngl-myngl-post-questions-form').submit(function(event){rewards_overlay.form_submit(event);});
    $('#congrats form#email').submit(function(event){rewards_overlay.email_form_submit(event);});

    myngl.update_participant_status(Drupal.settings.myngl_id, Drupal.settings.user_id,"Gifting Suite");
    update_status_interval = setInterval(function(){myngl.update_participant_status(Drupal.settings.myngl_id, Drupal.settings.user_id,"Gifting Suite");},20000);
  })
}(jQuery));


var rewards_overlay = (function($){
  return {
    show : function (entity_id, points_needed){
      $('#you-need .points').text(points_needed);
      $('#gifting-series-overlay #questions').css('display','none');
      $('#gifting-series-overlay #gift-and-points-info').css('display','block');
      $('#reward-id-'+entity_id).css('display', 'block');

      var myngl_total_points = Drupal.settings.total_points;

      if (myngl_total_points < points_needed) {
        $('#gifting-series-overlay #redeem').css('display','none');
      }
      else{
        $('#gifting-series-overlay #redeem').css('display','block');
        selected_reward_id = entity_id;
      }

      $("#gifting-series-overlay").fadeIn(500);

    },

    close : function(){
      $('#gifting-series-overlay').fadeOut(100);
      $('.overlay-reward').css('display','none');
    },

    show_questions : function(){
      $('#gifting-series-overlay #questions').fadeIn(500);
      $('#gifting-series-overlay #gift-and-points-info').fadeOut(500);
    },

    form_submit : function(event){
      event.preventDefault();

      $.ajax({
        url: '/myngl-event/' + Drupal.settings.myngl_id + '/rewards/question-submit/' + Drupal.settings.user_id + '/' + selected_reward_id ,
        cache: false,
        type: 'POST',
        data : $('form#myngl-myngl-post-questions-form').serialize() ,
        success: function(json) {

        }
      });

      var gift_name = $("#reward-id-" + selected_reward_id + " .field-name-field-title" ).text();
      $('#gifting-series-overlay #congrats #title').text("CONGRATS, YOU GOT YOUR " + gift_name.toUpperCase());
      $('#gifting-series-overlay #congrats span#gift-name').text(gift_name);

      $('#gifting-series-overlay #questions').fadeOut(500);
      $('#gifting-series-overlay #congrats').fadeIn(500);
      $('#gifting-series-overlay .close').fadeOut(500);

      myngl.update_participant_status(Drupal.settings.myngl_id, Drupal.settings.user_id,"Gift Redeemed");
      clearInterval(update_status_interval);
      return false;

    },

    email_form_submit : function(event){
      event.preventDefault();
      console.log($('#gifting-series-overlay form#email #email-input').val()  );
      return false;
    },
  }
}(jQuery));
