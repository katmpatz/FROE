<div class="top-100 row">
    <div class="col-12">
      <h1>End of <b>Phase 2</b></h1>
      <div class="line"></div>
      <div id="end-testing">
        <p>You completed the second phase of the expirement!</p>
        <p>In the next step:</p>
        <ul>
          <li>
            <?php if ($condition != 2): ?>
              <p>You first have to estimate the rental price of a flat and how confident you feel about this estimation given its features and your knowledge of the rental market. Note that you can't change the estimated price and confidence after saving.</p>
            <img src ="html/img/end_testing_1.JPG" width="800" style="margin-bottom:50px" class="smHide">
            <?php elseif ($condition == 2): ?>
              <p>You first have to estimate the price recommendation of 20 flats given their features and your knowledge about the algorithm's recommendations (similar to Phase2). </p>
            <img src ="html/img/end_testing_c2_1.JPG" width="800" style="margin-bottom:50px" class="smHide">
            <?php endif ?>
          </li>
          <li>
            <?php if ($condition == 1): ?>
              <p>Once you saved the price, the system will provide the actual price of this apartement. You then have to indicate how <u>surprising</u> is this actual price. <br></p>
              <img src ="html/img/end_testing_c1_2.JPG" width="800" style="margin-bottom:50px" class="smHide">
            <?php elseif ($condition == 2): ?>
              <p>Once you saved your recommendation, the system will provide the AI recommendation for this apartement. You then have to indicate how <u>surprising</u> is this recommendation. <br><b>Not surprising</b>, means that this price recommendation is close to what you expected (based on your knowledge about the algorithm's recommendations), while <b>Very surprising</b> means that the price recommendation is unexpectedly high or low.</p>
              <img src ="html/img/end_testing_c2_2.JPG" width="800" style="margin-bottom:50px" class="smHide">
            <?php elseif ($condition == 3 || $condition == 4): ?>
              <p>Once you have saved the price, the system will provide the AI recommendation for this flat. You then have to indicate how surprising this recommendation is.</p>
              <img src ="html/img/end_testing_2.JPG" width="800" style="margin-bottom:50px" class="smHide">
            <?php endif ?>
          </li>
          <li>
            <p> After seeing and evaluating the AI recommendation you can choose if you want to change or not your initial estimation. Based on how close is your final estimation to the real price of the flat, you gain from 1 to 5 stars. With 5 stars, you earn 0,80 €, with 4 stars you earn 0,20€, with 3 stars you neither gain nor lose, with 2 stars you lose 0,20€ and with 1 star you lose 0,80€.</p>
            <img src ="html/img/end_testing_3.JPG" width="800" style="margin-bottom:50px" class="smHide">
            <img src ="html/img/end_testing_4.JPG" width="400" style="margin-bottom:50px; border: 3px solid #f4f4f4; border-radius: 10px;" class="smHide">
          </li>
          <li>
            <p>Every 5 trials, we ask you to evaluate if you trust the recommendations of the algorithm. You will estimate the rental price for 30 flats. This phase is about 15 minutes long. Click the "Next" button below, to proceed to the next flat.</p>
            <img src ="html/img/end_testing_5.JPG" width="400" style="margin-bottom:50px;border: 3px solid #f4f4f4;border-radius: 10px;" class="smHide">
          </li>
        </ul>
        <!-- <p class="top-50"><u>Please read carefully and answer to the following question:</u></p> -->
                <!-- <div class="mb-3">
                    <p>
                        When you have to evaluate a
                        <?php if ($condition == 1): ?>
                            <span>price</span>
                        <?php elseif ($condition != 1): ?>
                            <span>recommendation</span>
                        <?php endif ?>
                        as "Not surprising"?
                    </p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_1_<?php echo $id;?>" value="1">
                        <label class="form-check-label" for="phase1">
                            When the value is much higher than the price that I expect.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_1_<?php echo $id;?>" value="2">
                        <label class="form-check-label" for="phase2">
                            When the value is much lower than the price that I expect.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_1_<?php echo $id;?>" value="3">
                        <label class="form-check-label" for="phase3">
                            When the value is close to the price that I expect.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_1_<?php echo $id;?>" value="4">
                        <label class="form-check-label" for="phase4">
                            When the value is much higher or lower than the price that I expect.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_1_<?php echo $id;?>" value="5" checked>
                        <label class="form-check-label" for="phase5">
                            None of them
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                      <span id="message"></span>
                      <button id="btn_save_<?php echo $id;?>" type="button" class="btn btn-wider btn-design" style="color:white;">Check your responses</button>
                </div> -->
      </div>
    </div>
</div>
<!-- 
<script type="text/javascript">
var answer_1 = 5;


$('input:radio[name="attention_check_1_<?php echo $id;?>"]').on('click', function() {
    answer_1 = $('input[type="radio"][name="attention_check_1_<?php echo $id;?>"]:checked').val();
});


//Check their answers
$('#btn_save_<?php echo $id;?>').on('click', function(e) {
    if(answer_1 == "3"){
            $("#message").text("You answered correctly, you can start the expirement.");
            $("#message").css({'color': '#4aad81'})
            $('#btn_save_<?php echo $id;?>').hide();
            $('#btn_<?php echo $id;?>').show();
        } else {
            $("#message").text("You answered wrong, please read again carefully.");
            $("#message").css({'color': '#ff0044'})
        }
});

$('body').on('show', function(e, type){
  if (type === '<?php echo $id;?>'){
    $('#btn_<?php echo $id;?>').hide();
    $("input").prop('disabled', false);
}
});


</script> -->

