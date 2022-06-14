<div class="row mt-250" >
  <div class="col">
    <h2>Thank you for your participation!</h2>
    <!-- <p>You completed the experiment. Click <a href="<?php echo $config["Prolific"]["prolific_completion_url"];?>" target="_BLANK"><strong>here</strong></a> to report your task completion to the Prolific system.</p> -->
    <p>You completed succesfully the experiment. 
      <br>Please share with your friends and help us to better understand the interaction between humans and AI.<br>
      We need to reach more than 100 users, so if you could send this link to your friends, it would be amazing! 
    </p>
    <div class="row" style="margin-left:0px !important;">
            <label>Link:  <a href="https://rentalprice.isir.upmc.fr/?pilot">https://rentalprice.isir.upmc.fr/?pilot</a></label>
            <a onclick="copyText()" type="button" id="copyLink" class="save-btn btn btn-outline-primary" style="display: block !important;"><span id="copyText">Copy link</span></a>
    </div>
    <br>
    <p>Have a nice day! <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16" style="margin-top:-5px">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
      </svg></p>
  </div>
</div>

<script>
      function copyText() {
        /* Copy text into clipboard */
        navigator.clipboard.writeText("https://rentalprice.isir.upmc.fr/?pilot");
        $("#copyText").text("Copied!");
      }

    $('body').on('show', function(e, type){
      if (type === '<?php echo $id;?>'){
        $("#copyText").text("Copy link");
        $('#btn_<?php echo $id;?>').hide();
        $('#copyLink').css({'background':'#6f91f5', 'color':'white', 'display':'block'});
        $('#copyLink').show();
    }
    });
</script>
