<?php
// Include this file where you want AdSense units to appear for not-logged-in users.
// It expects the caller to have run session_start().
if(!isset($_SESSION)) session_start();
if(!isset($_SESSION['status_logowania']) || $_SESSION['status_logowania'] !== true){
    // NOTE: replace data-ad-slot value with your real AdSense slot id(s)
    ?>
    <div id="ad_placeholder" class="ad-unit">
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="pub-7742530928316810"
             data-ad-slot="REPLACE_WITH_SLOT"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    </div>
    <?php
}
?>
