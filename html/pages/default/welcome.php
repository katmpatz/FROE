<div class="row d-flex justify-content-center" style="margin-top:150px; margin-right:0px !important;">
  <div class="col">
    <h1>Important information</h1>
    <div class="line"></div>
    <ol>
      <li>You <b>cannot</b> navigate back to previous pages</li>

      <li>You will <b>not be paid</b> if you fail an <u>attention check</u> 
      <?php if($config["exclude_reloaders"]){
      	?>
      		or <u>reload the page </u> after having accepted the informed consent
      	<?php
      } ?></li>
      <li>Instructions can be dependend on <b>conditions</b><?php echo ($factor1 == $config["factors"][0]["levels"][0]) ? ", and only be shown to some of the participants" : ""; ?></li>
    </ol>
    <br>
    <p>Click <b>"Next"</b> to proceed to the informed consent.</p>
    <br>
  </div>
</div>
