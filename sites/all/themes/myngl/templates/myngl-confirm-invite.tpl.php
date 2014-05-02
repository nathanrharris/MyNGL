<div id="confirm-invite-wrapper">
  <div id="confirm-invite-invite">
    <div class="invite-graphic-container">
      <div id="confirm-invite-invite-graphic" class="confirm-invite-invite-graphic">
        <div id="confirm-invite-invite-graphic-2" class="confirm-invite-invite-graphic">
        </div>
      </div>
      <div class="invite-graphic-text">
        Earn
        <span>+30</span><br>
        Points per Invite
      </div>
    </div>
    <div class="content">
      <p>
        You are now going to this Myngl event.  Do you want to invite your friends to come as well?  
        You earn points everytime an invited person joins Myngl.
      </p>
      <p>
        Invite your friends to the <?php print $node->title; ?> event via email:
      </p>
      <form>
        <label>Enter Email Address</label>
        <input type="text" name="email" /><br />
        <input type="submit" id="submit" value="SEND INVITE" />
      </form>
      <br /><br />
    </div>
  </div>
  <div id="confirm-invite-share">
    <div id=""></div>
    <div class="content">
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
    <a href="#">VIEW EVENT DETAIL</a>
    <a href="#">UPLOAD YOUR CONTENT TO THIS EVENT</a>
    <br /><br />
    <br /><br />
  </div>
  <div id="footer-links">
    <a href="/user/<?php global $user; print $user->uid; ?>" class="link-small">Go to your Dashboard</a>
  </div>
</div>
