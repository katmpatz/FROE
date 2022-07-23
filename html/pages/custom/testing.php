<div id="ExperimentBlock_<?php echo $id;?>">
  <div class="row navbar-logo">
    <img src ="html/img/logo.png" height="30" class="logo-img">
    <h4 class="logo">PricingTool</h4>
  </div>
  <div class="progress">
    <div class="progress-bar" role="progressbar" id="progress_<?php echo $id;?>" aria-valuenow=<?php echo $trial_test + 1;?> aria-valuemin="1" aria-valuemax="20"></div>
  </div>
  <h6 style="color:#828d98; margin-top:10px;"><?php echo $trial_test + 1;?> out of 10 apartments</h6>
  <div class="row top-25">
    <div class="col-lg-6 col-sm-12" id="ImageBlock_<?php echo $id;?>">
        <img src ="<?php echo $house[$experiment_data_id]["image"];?>" class="Image">
    </div>
    <div id="houseInfo" class="col-lg-6 col-sm-12">
      <h4>Information:</h4>
      <div class="line"></div>
      <div class="smHide information row" style="margin-bottom:20px;">
        <div class="col-md-4 col-xs-6">
          <p class="light-p"><span class="label-info">Type:</span> <?php echo $house[$experiment_data_id]["type"];?>  </p>
          <p class="light-p"><span class="label-info">Square meters:</span> <?php echo $house[$experiment_data_id]["squaremeters"];?></p>
        </div>
        <div class="col-md-4 col-xs-6">
          <p class="light-p"><span class="label-info">Rooms:</span> <?php echo $house[$experiment_data_id]["rooms"];?>  </p>
          <p class="light-p"><span class="label-info">Furnished:</span> <?php echo $house[$experiment_data_id]["furnished"];?></p>
        </div>
        <div class="col-md-4 col-xs-12">
          <p class="light-p"><span class="label-info">Bathrooms:</span> <?php echo $house[$experiment_data_id]["bathrooms"];?></p>
          <p class="light-p"><span class="label-info">Floor:</span> <?php echo $house[$experiment_data_id]["floor"];?></p>
        </div>
      </div>
      <div class="lgHide mgl-5 row justify-content-right">
        <div class="col-xs-5 ">
          <p class="light-p"><span class="label-info">Type:</span> <?php echo $house[$experiment_data_id]["type"];?>  </p>
          <p class="light-p"><span class="label-info">Square meters:</span> <?php echo $house[$experiment_data_id]["squaremeters"];?></p>
          <p class="light-p"><span class="label-info">Bathrooms:</span> <?php echo $house[$experiment_data_id]["bathrooms"];?></p>
        </div>
        <div class="offset-1 col-xs-5">
          <p class="light-p"><span class="label-info">Bedrooms:</span> <?php echo $house[$experiment_data_id]["rooms"];?>  </p>
          <p class="light-p"><span class="label-info">Furnished:</span> <?php echo $house[$experiment_data_id]["furnished"];?></p>
          <p class="light-p"><span class="label-info">Floor:</span> <?php echo $house[$experiment_data_id]["floor"];?></p>
        </div>
      </div>
      <div style="margin-bottom:10px;" class="mgl-5">
          <p class="light-p"><span class="label-info">Description:</span>
            <?php echo $house[$experiment_data_id]["shortDescription"];?>
          </p>
      </div>
    </div>
  </div>
  <div class="col-12 top-25">
  <!-- condition 1 -->
    <?php if ($condition != 2): ?>
      <h4>Pricing:</h4>
      <div class="line"></div>
      <div class="predict" >
        <p class="light-p">Based on the presented information, how would you price this accommodation per month in Euros €</p>
        <div class="row" style="margin-left:0px !important;">
            <label>Estimation of Price: </label>
              <input 
                    class="testing-input"
                    autocomplete="off" 
                    type="number" 
                    name="user-price-min" 
                    id="user-price_min_<?php echo $id;?>" 
                    placeholder="Min"
              >
              </input>
              <input 
                    class="testing-input"
                    autocomplete="off" 
                    type="number" 
                    name="user-price-max" 
                    id="user-price_max_<?php echo $id;?>" 
                    placeholder="Max"
              >
              </input>
              <button id="btn_save_<?php echo $id;?>" type="button" class="save-btn btn btn-outline-primary"><span id="save_<?php echo $id;?>"></span></button>
        </div>
        <span id="invalid_price_<?php echo $id;?>" class="error-message"></span>
      </div>
      <!-- end of condition 1 -->
      <!-- condition 2 -->
    <?php elseif ($condition == 2): ?> 
      <h4>Prediction:</h4>
      <div class="line"></div>
      <div class="predict" >
        <p class="light-p">Based on the presented information, what do you think that the model will predict for this accommodation per month in Euros €</p>
        <div class="row" style="margin-left:0px !important;">
            <label>Estimation of Prediction: </label>
              <input
                    class="testing-input"
                    autocomplete="off" 
                    type="number" 
                    name="user-price-min" 
                    id="user-price_min_<?php echo $id;?>"
                    placeholder="Min"
              >
              </input>
              <input 
                    class="testing-input"
                    autocomplete="off" 
                    type="number" 
                    name="user-price-max" 
                    id="user-price_max_<?php echo $id;?>"
                    placeholder="Max" 
              >
              </input>
              <button id="btn_save_<?php echo $id;?>" type="button" class="save-btn btn btn-outline-primary"><span id="save_<?php echo $id;?>"></span></button>
        </div>
        <span id="invalid_price_<?php echo $id;?>" class="error-message"></span>
        <!-- <div class="row" id="display_price_<?php echo $id;?>" style="margin-top:20px; margin-bottom:10px;">
         <p>The prediction for the apartment is <?php echo $house[$experiment_data_id]["prediction"];?>$</p>
        </div> -->
      </div>
    <?php endif ?>
  <!-- end of condition 2 -->

  </div>          
</div>

<script type="text/javascript">
    var price_answered_min = "";
    var price_answered_max = "";
    var start_time;
    var end_time = 0;
    // var request_prediction = false;
    // var save_price_time = 0;
    
//Take the value of the user's input
$('#user-price_min_<?php echo $id;?>').on('input', function() {
    //change text and style at the save button
    $("#save_<?php echo $id;?>").text("Save");
    $('#btn_save_<?php echo $id;?>').css({'background':'transparent', 'color':'#6f91f5'})

    //check if the price is valid and make save button not disable when the user enters a price
    price_answered_min = $('#user-price_min_<?php echo $id;?>').val();
    if (price_answered_max != "" &&  parseInt(price_answered_max) > 0 && parseInt(price_answered_min) > 0 && price_answered_min != "") {
      $('#btn_save_<?php echo $id;?>').prop('disabled', false);
      $("#invalid_price_<?php echo $id;?>").text("");
    } else if(price_answered_min <= 0){
      $("#invalid_price_<?php echo $id;?>").text("The price has to be a positive number");
      $('#btn_save_<?php echo $id;?>').prop('disabled', true);
      $('#btn_save_<?php echo $id;?>').css({'background':'transparent', 'color':'grey'})
    }
    
    if(parseInt(price_answered_min) > parseInt(price_answered_max)){
      $("#invalid_price_<?php echo $id;?>").text("The min price can't be higher than the max price");
      $('#btn_save_<?php echo $id;?>').prop('disabled', true);
      $('#btn_save_<?php echo $id;?>').css({'background':'transparent', 'color':'grey'})
    }

    //as the user hasn't saved yet the price make the next button disabled again
    $("#btn_<?php echo $id;?>").prop('disabled', true);

    //add text to help the user understand that he has to save in order to proceed
    //$("#sure_<?php echo $id;?>").text("Save first the price and then click on 'Next'");
});

//Take the value of the user's input
$('#user-price_max_<?php echo $id;?>').on('input', function() {
    //change text and style at the save button
    $("#save_<?php echo $id;?>").text("Save");
    $('#btn_save_<?php echo $id;?>').css({'background':'transparent', 'color':'#6f91f5'})

    //check if the price is valid and make save button not disable when the user enters a price
    price_answered_max = $('#user-price_max_<?php echo $id;?>').val();
    if (price_answered_max != "" &&  price_answered_max > 0 && price_answered_min > 0 && price_answered_min != "") {
      $('#btn_save_<?php echo $id;?>').prop('disabled', false);
      $("#invalid_price_<?php echo $id;?>").text("");
    } else if(price_answered_max <= 0){
      $("#invalid_price_<?php echo $id;?>").text("The price has to be a positive number");
      $('#btn_save_<?php echo $id;?>').prop('disabled', true);
      $('#btn_save_<?php echo $id;?>').css({'background':'transparent', 'color':'grey'})
    } 
    
    if(parseInt(price_answered_min) > parseInt(price_answered_max)){
      $("#invalid_price_<?php echo $id;?>").text("The min price can't be higher than the max price");
      $('#btn_save_<?php echo $id;?>').prop('disabled', true);
      $('#btn_save_<?php echo $id;?>').css({'background':'transparent', 'color':'grey'})
    }

    //as the user hasn't saved yet the price make the next button disabled again
    $("#btn_<?php echo $id;?>").prop('disabled', true);

    //add text to help the user understand that he has to save in order to proceed
    //$("#sure_<?php echo $id;?>").text("Save first the price and then click on 'Next'");
});


//Save the price
$('#btn_save_<?php echo $id;?>').on('click', function(e) {
    //change text and style at the save button
    $("#save_<?php echo $id;?>").text("Saved");
    $('#btn_save_<?php echo $id;?>').css({'background':'#6f91f5', 'color':'white'})
    $("#display_price_<?php echo $id;?>").show();
    $("#btn_<?php echo $id;?>").prop('disabled', false);
    $("input").prop('disabled', true);

    save_price_time = new Date().getTime();
    
});


$('body').on('next', function(e, type){
    if (type === '<?php echo $id;?>' && price_answered_min != "" && price_answered_max != ""){
        end_time = e.timeStamp;
        // we need to log our data
        trial_log.push([
        measurements.participant_id, 
        measurements.condition,
        <?php echo $trial;?> + "", 
        <?php echo $filter;?> + "", 
        ]);
        if(<?php echo $condition;?> != 2){
          actual = "<?php echo $house[$experiment_data_id]["price"];?>"
        } else {
          actual = "<?php echo $prediction?>"
        }
        $.ajax({
            async: false,
            type: "POST",
            url: "<?php echo $url . 'save_data.php';?>",
            data: {
                "user": "<?php echo $user_id;?>",
                "condition": "<?php echo $condition;?>",
                "step":2,
                "rentalPrice": "<?php echo $house[$experiment_data_id]["price"];?>",
                "recommedation": "<?php echo $prediction;?>",
                "answer": 0,
                "answer_min": price_answered_min,
                "answer_max": price_answered_max,
                "savePriceTime": save_price_time,
                //"requestPredictionTime": request_prediction_time,
                "startTime": start_time,
                "endTime": end_time,
                "houseId": "<?php echo $house[$experiment_data_id]["id"];?>", 
                "trial":  "<?php echo $trial_test;?>", 
                "confidence": 0,
                "surprise": 0,
                "trust": 0,
                "saveTrustTime": 0,
                "change": 0,
                "secondEstimation": 0,
                "secondEstimationTime": 0,
                "yesTime": 0,
                "noTime": 0,
                "finalEstimation": 0,
                "stars": 0,
                "completed": 0,
                "start": 0,
            },
            success: function(data)
            { 
              console.log(data);
            }
       });
       
    }
});



$('body').on('show', function(e, type){
  if (type === '<?php echo $id;?>'){
    var width_progress = ((<?php echo $trial_test;?> + 1) / 10) * 100 + '%';
    $('#progress_<?php echo $id;?>').css({'width': width_progress});
    start_time = e.timeStamp;
    end_time = 0;
    // request_prediction_time = 0;
    // request_prediction = false;
    $('#btn_save_<?php echo $id;?>').prop('disabled', true);
    $('#display_price_<?php echo $id;?>').hide();
    $("#save_<?php echo $id;?>").text("Save");
    $("input").prop('disabled', false);

    console.log("showing page " + type);
    console.log(<?php echo $id;?>);
    //var img = $("#Stimulus_Image_<?php echo $id;?>");
    $('#btn_<?php echo $id;?>').hide();
    var initial_mask_time = config.stimulus_timing.initial_mask_time;
    var stimulus_time = config.stimulus_timing.stimulus_time;
    var totalDelay = initial_mask_time + stimulus_time;
    // setTimeout(function(){changeImageSrc(img, '<?php echo $src;?>')}, initial_mask_time);
    // setTimeout(function(){changeImageSrc(img, "html/img/filter_example/Mask.png")}, totalDelay);
    setTimeout(function(){$('#ScalesBlock_<?php echo $id;?>').show();}, totalDelay);
    setTimeout(function(){$('#btn_<?php echo $id;?>').show();}, totalDelay);

  }


});

</script>