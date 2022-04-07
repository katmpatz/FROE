<div id="ExperimentBlock_<?php echo $id;?>">
  <div class="row navbar-logo">
    <img src ="html/img/logo.png" height="30" class="logo-img">
    <h4 class="logo">PricingTool</h4>
  </div>
  <div class="row top-40">
    <div class="col-6" id="ImageBlock_<?php echo $id;?>">
        <img src ="<?php echo $tr_house[$training_data_id]["image"];?>" class="Image">
    </div>
    <div class="col-6">
      <h4>Information:</h4>
      <div class="line"></div>
      <div class="information row">
        <div class="col-4">
          <p class="light-p"><span class="label-info">Type:</span> <?php echo $tr_house[$training_data_id]["type"];?>  </p>
          <p class="light-p"><span class="label-info">Square meters:</span> <?php echo $tr_house[$training_data_id]["squaremeters"];?></p>
        </div>
        <div class="col-4">
          <p class="light-p"><span class="label-info">Bedrooms:</span> <?php echo $tr_house[$training_data_id]["rooms"];?>  </p>
          <p class="light-p"><span class="label-info">Furnished:</span> <?php echo $tr_house[$training_data_id]["furnished"];?></p>
        </div>
        <div class="col-4">
          <p class="light-p"><span class="label-info">Bathrooms:</span> <?php echo $tr_house[$training_data_id]["bathrooms"];?></p>
          <p class="light-p"><span class="label-info">Floor:</span> <?php echo $tr_house[$training_data_id]["floor"];?></p>
        </div>
        <!-- <div class="col-12">
          <p class="light-p"><span class="label-info">Location:</span>
            See the place in the <a href="">map</a>
          </p>
        </div> -->
        <div class="col-12">
          <p class="light-p"><span class="label-info">Description:</span>
            <?php echo $tr_house[$training_data_id]["description"];?>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 top-40">
  <!-- condition 1 -->
    <?php if ($condition == 1): ?>
      <h4>Pricing:</h4>
      <div class="line"></div>
      <div class="predict" >
        <p class="light-p">Based on the presented information, how would you price this appartment per month in Euros €</p>
        <div class="row" style="margin-left:0px !important;">
            <label>Price: </label>
            <input
                  autocomplete="off" 
                  type="number" 
                  name="user-price" 
                  id="user-price_<?php echo $id;?>" 
            >
            </input>
            <button id="btn_save_<?php echo $id;?>" type="button" class="save-btn btn btn-outline-primary"><span id="save_<?php echo $id;?>"></span></button>
        </div>
        <span id="invalid_price_<?php echo $id;?>" class="error-message"></span>
        <div class="row" id="display_price_<?php echo $id;?>" style="margin-top:20px; margin-bottom:10px;">
         <p>The actual price for the apartment is <?php echo $tr_house[$training_data_id]["price"];?>€</p>
        </div>
      </div>
      <!-- end of condition 1 -->
      <!-- condition 2 -->
    <?php elseif ($condition == 2): ?> 
      <h4>Price prediction:</h4>
      <div class="line"></div>
      <div class="predict" >
        <p class="light-p">Based on the presented information, what do you think that the model will predict for this appartment per month in Euros €</p>
        <div class="row" style="margin-left:0px !important;">
            <label>Prediction: </label>
            <input
                  autocomplete="off" 
                  type="number" 
                  name="user-price" 
                  id="user-price_<?php echo $id;?>" 
            >
            </input>
            <button id="btn_save_<?php echo $id;?>" type="button" class="save-btn btn btn-outline-primary"><span id="save_<?php echo $id;?>"></span></button>
        </div>
        <span id="invalid_price_<?php echo $id;?>" class="error-message"></span>
        <div class="row" id="display_price_<?php echo $id;?>" style="margin-top:20px; margin-bottom:10px;">
         <p>The prediction for the apartment is <?php echo $tr_house[$training_data_id]["prediction"];?>$</p>
        </div>
      </div>
    <?php endif ?>
  <!-- end of condition 2 -->

  </div>          
</div>

<script type="text/javascript">
    var price_answered = "";
    var request_prediction = false;
    
//Take the value of the user's input
$('#user-price_<?php echo $id;?>').on('input', function() {
    //change text and style at the save button
    $("#save_<?php echo $id;?>").text("Save");
    $('#btn_save_<?php echo $id;?>').css({'background':'transparent', 'color':'#6f91f5'})

    //check if the price is valid and make save button not disable when the user enters a price
    price_answered = $('#user-price_<?php echo $id;?>').val();
    if (price_answered != "" &&  price_answered > 0) {
      $('#btn_save_<?php echo $id;?>').prop('disabled', false);
      $("#invalid_price_<?php echo $id;?>").text("");
    } else if(price_answered <= 0){
      $("#invalid_price_<?php echo $id;?>").text("The price has to be a positive number");
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
    
});


$('body').on('next', function(e, type){
    if (type === '<?php echo $id;?>' && price_answered != ""){
        end_time = e.timeStamp;
        // we need to log our data
        trial_log.push([
        measurements.participant_id, 
        measurements.condition,
        <?php echo $trial;?> + "", 
        <?php echo $filter;?> + "", 
        ]);
       
    }
});



$('body').on('show', function(e, type){
  if (type === '<?php echo $id;?>'){
    start_time = e.timeStamp;
    end_time = 0;
    request_prediction_time = 0;
    request_prediction = false;
    $('#btn_save_<?php echo $id;?>').prop('disabled', true);
    $('#display_price_<?php echo $id;?>').hide();
    $("#save_<?php echo $id;?>").text("Save");

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