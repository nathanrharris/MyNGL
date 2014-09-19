
<?php $brand = node_load($node->field_myngl_brand['und'][0]['nid']);  ?>

<div class="event-detail-overlay" ></div>

<div id="confirm-invite-wrapper">
  <div id="confirm-invite-invite">
    <div class="invite-graphic-container">
      <div id="confirm-invite-points-graphic" class="confirm-invite-points-graphic">
        <div id="confirm-invite-points-graphic-2" class="confirm-invite-points-graphic">
        </div>
      </div>
      <div class="invite-graphic-text">
        Earn<br>
        <span><span>+</span>30</span><br>
        Points per Invite
      </div>
    </div>
    <div class="content">
      <?php

        $m =field_view_field('node', $node, 'field_rsvp_confirmed_message','full' );
        print render($m);
      ?>



      <!--
      <p>RSVP CONFIRMED!</p>
      <p>We look forward to seeing you at "<?php print $node->title; ?>".
      <p>Now, here’s a chance to invite your friends. And…your first chance to begin earning valuable reward Myngl Points to redeem for great gifts at theMyngl.
      <p>Invite your friends to the “Godiva Chocolate & Fashion Myngl” via email:
      (Earn 10 MynglPoints per invite)
      </p>
      <p>Share this event on your social networks.<br />
      (Earn 5 Myngl  Points per post)
      </p>
      <p>We want you to be part of theMyngl!  Be creative! Share your videos and photos to be shown at the event by uploading here.<br />
      (Earn 20 Myngl Points per submission)
      </p>
      -->
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
      <a href="http://www.facebook.com/share.php" onclick="return fbs_click()" target="_blank" title="Myngl"> 
        <span class="fa-stack fa-lg" id="facebook-share">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
        </span>
      </a> 

      <script>function twt_click() { window.open('https://twitter.com/share?url=<?php print 'http://'.$_SERVER['HTTP_HOST']; ?>&text=<?php print urlencode('At theMyngl – Cool new Online Experiential Event! Exclusive content, Chat, FREE gifts! theMyngl.com #'. $brand->title .'Myngl'); ?>','sharer','toolbar=0,status=0,width=626,height=436');return false;}</script>
        <a href="https://twitter.com/share?url=<?php print 'http://'.$_SERVER['HTTP_HOST']; ?>&text=<?php print urlencode('At theMyngl – Cool new Online Experiential Event! Exclusive content, Chat, FREE gifts! theMyngl.com #'. $brand->title .'Myngl'); ?>" onclick="return twt_click()" target="_blank">
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


