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
              <p>You first have to estimate the price of 20 apartments given their features and your knowledge of the rental market (similar to Phase2).</p>
            <img src ="html/img/end_testing_c1_1.JPG" width="800" style="margin-bottom:50px" class="smHide">
            <?php elseif ($condition == 2): ?>
              <p>You first have to estimate the price prediction of 20 apartments given their features and your knowledge about the algorithm's predictions (similar to Phase2). </p>
            <img src ="html/img/end_testing_c2_1.JPG" width="800" style="margin-bottom:50px" class="smHide">
            <?php endif ?>
          </li>
          <li>
            <?php if ($condition == 1): ?>
              <p>Once you saved the price, the system will provide the actual price of this apartement. You then have to indicate how <u>surprising</u> is this actual price. <br><b>Not surprising</b>, means that this price is close to what you expected (based on your knowledge of the rental market), while <b>Very surprising</b> means that the price is unexpectedly high or low.</p>
              <img src ="html/img/end_testing_c1_2.JPG" width="800" style="margin-bottom:50px" class="smHide">
            <?php elseif ($condition == 2): ?>
              <p>Once you saved your prediction, the system will provide the prediction of the algorithm for this apartement. You then have to indicate how <u>surprising</u> is this prediction. <br><b>Not surprising</b>, means that this price prediction is close to what you expected (based on your knowledge about the algorithm's predictions), while <b>Very surprising</b> means that the price prediction is unexpectedly high or low.</p>
              <img src ="html/img/end_testing_c2_2.JPG" width="800" style="margin-bottom:50px" class="smHide">
            <?php elseif ($condition == 3 || $condition == 4): ?>
              <p>Once you saved the price, the system will provide the prediction of the algorithm for this apartement. You then have to indicate how <u>surprising</u> is this prediction. <br><b>Not surprising</b>, means that this price prediction is close to what you expected (based on your knowledge of the rental market), while <b>Very surprising</b> means that the price prediction is unexpectedly high or low.</p>
              <img src ="html/img/end_testing_c3_2.JPG" width="800" style="margin-bottom:50px" class="smHide">
            <?php endif ?>
          </li>
            <p>This phase is about 7 minutes long. Click the <i>"Next"</i> button below, to proceed at the next apartment.</p>
          </li>
        </ul>
        <p class="top-50"><u>Please read carefully and answer to the following question:</u></p>
                <div class="mb-3">
                    <p>
                        When you have to evaluate a
                        <?php if ($condition == 1): ?>
                            <span>price</span>
                        <?php elseif ($condition != 1): ?>
                            <span>prediction</span>
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
                </div>
      </div>
    </div>
</div>

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


</script>

