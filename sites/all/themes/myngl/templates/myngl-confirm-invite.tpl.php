

<?php $brand = node_load($node->field_myngl_brand['und'][0]['nid']);  ?>

<div class="event-detail-overlay" ></div>




<?php
  $points_invite_friend = $node->field_points_for_invititing_frie['und'][0]['value'];


  if ($points_invite_friend<100){
    $font_size=70;
    $margin_top=-13;
    $margin_bottom=-10;
  }
  else if ($points_invite_friend <1000){
    $font_size=60;
    $margin_top=-5;
    $margin_bottom=-10;
  }
  else if ($points_invite_friend< 10000){
    $font_size=50;
    $margin_top=-5;
    $margin_bottom=0;
  }
  else if ($points_invite_friend< 100000){
    $font_size=40;
    $margin_top=0;
    $margin_bottom=5;
  }
  else{
    $font_size=30;
    $margin_top=10;
    $margin_bottom=1;
  }

?>

<style>
  #friend_invite_points{
    font-size:<?php print $font_size ?>px;
    margin-top:<?php print $margin_top;?>px;
    margin-bottom:<?php print $margin_bottom;?>px;
  }
</style>

<div id="confirm-invite-wrapper">
  <div id="confirm-invite-invite">
    <div class="invite-graphic-container">
      <div id="confirm-invite-points-graphic" class="confirm-invite-points-graphic">
        <div id="confirm-invite-points-graphic-2" class="confirm-invite-points-graphic">
        </div>
      </div>
      <div class="invite-graphic-text" style = "height:120px;text-align: center;">
        <div style="display:block;">Earn</div>
        <div id="friend_invite_points" style="display:inline-block;"><?php print $points_invite_friend; ?></div>
        <div style="display:inline-block;">Points per Invite</div>
      </div>
    </div>
    <div class="content">
      <?php

        $m =field_view_field('node', $node, 'field_rsvp_confirmed_message','full' );
        print render($m);
      ?>

<script>
var confirm = (function ($) {
        return {
          share_click: function (media) {
            $.ajax({
              type: "GET",
              url: "/myngl/social-sharing-record/<?php print $user->uid .'/'. $node->nid . '/';?>"+media+"/confirmed",
              success: function(data) {
              }
            });
            return false;

          }
        }
      }(jQuery));
</script>


      <?php
        $this_form = drupal_get_form('myngl_myngl_confirm_add_invitee', arg(1));
        print render($this_form);
      ?>

      <br /><br />
    </div>
  </div>
  <div id="confirm-invite-share">

    <div id="confirm-invite-invite-graphic">

      <script>function fbs_click() {u='<?php print 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REDIRECT_URL']; ?>';t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script>
      <a href="http://www.facebook.com/share.php" onclick="confirm.share_click('facebook'); return fbs_click()" target="_blank" title="Myngl">
        <span class="fa-stack fa-lg" id="facebook-share">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
        </span>
      </a> 

      <script>function twt_click() {
        window.open('https://twitter.com/share?url=<?php print 'http://'.$_SERVER['HTTP_HOST']; ?>&text=<?php print urlencode($node->field_twitter_message['und'][0]['value']); ?>','sharer','toolbar=0,status=0,width=626,height=436');return false;}</script>
        <a href="https://twitter.com/share?url=<?php print 'http://'.$_SERVER['HTTP_HOST']; ?>&text=<?php print urlencode($node->field_twitter_message['und'][0]['value']); ?>" onclick=" confirm.share_click('twitter');return twt_click()" target="_blank">
        <span class="fa-stack fa-lg" id="twitter-share">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
        </span>
      </a>
    </div>
    <div>
      <p>Share theMyngl on your social networks and earn +30 points!</p>
    </div>
  </div>
  <div id="confirm-invite-details">
    <div class="content">
      <p>
        Get involved now with theMyngl event.  You can look at the event details or start sharing photos and videos
        with otehr attendees at the upcoming Myngl event.
      </p>
    </div>
  <br>
  <div id="footer-links">
    <div style="margin-top:-30px;">
      <div style="float:right;">
        <a href="/user/<?php global $user; print $user->uid; ?>?upload=<?php print $node->nid; ?>"><i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;UPLOAD YOUR CONTENT TO THIS EVENT</a>
      </div>
      <div >
        <a href="/user/<?php global $user; print $user->uid; ?>?view-detail=<?php print $node->nid; ?>"><i class = "fa fa-bars"></i>&nbsp;&nbsp;&nbsp;VIEW EVENT DETAIL</a>
      </div>

    </div>
    <div style="margin-top:40px;"><a style="text-decoration:underline;" href="/user/<?php global $user; print $user->uid; ?>" class="link-small">Go to your Dashboard</a></div>
  </div>
</div>


