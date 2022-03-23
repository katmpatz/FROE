
<div id="ExperimentBlock_<?php echo $id;?>">
  <div class="row navbar-logo">
    <img src ="html/img/logo.png" height="30" class="logo-img">
    <h4 class="logo">PricingTool</h4>
  </div>
  <div class="row top-40">
    <div class="col-6" id="ImageBlock_<?php echo $id;?>">
        <img src ="<?php echo $house[$experiment_data_id]["image"];?>" class="Image">
    </div>
    <div class="col-6" id="ScalesBlock_<?php echo $id;?>" style="display: none;">
      <h4>Information:</h4>
      <div class="line"></div>
      <div class="information row">
        <div class="col-4">
          <p class="light-p"><span class="label-info">Bedrooms:</span> <?php echo $house[$experiment_data_id]["num_of_bedrooms"];?>  </p>
          <p class="light-p"><span class="label-info">Bathrooms:</span> <?php echo $house[$experiment_data_id]["num_of_bathrooms"];?></p>
        </div>
        <div class="col-4">
          <p class="light-p"><span class="label-info">Square meters:</span> <?php echo $house[$experiment_data_id]["square_meters"];?></p>
          <p class="light-p"><span class="label-info">Parking:</span> <?php echo $house[$experiment_data_id]["parking"];?></p>
        </div>
        <div class="col-4">
          <p class="light-p"><span class="label-info">Furnished:</span> Yes</p>
          <p class="light-p"><span class="label-info">Balcony:</span> No</p>
        </div>
        <div class="col-12">
          <p class="light-p"><span class="label-info">Location:</span>
            See the place in the <a href="">map</a>
          </p>
        </div>
        <div class="col-12">
          <p class="light-p"><span class="label-info">Description:</span>
            Double room has become available in this newly refurbished house close to Addenbrookes hospital and ARM.
            The property benefits from a large fully fitted kitchen area along with a dining table and shared living room with TV and 2 double seater sofas, to the rear is a well sized garden area. There is a dishwasher and washing machine located in the kitchen area.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 top-40">
    <h4>Pricing:</h4>
      <div class="line"></div>
      <div class="predict" >
        <p class="light-p">Based on the presented information, how would you price this appartment per month in (US dollars $)</p>
        <div class="row" style="margin-left:0px !important;">
            <label>Price: </label>
            <input
                  autocomplete="off" 
                  type="number" 
                  name="user-price" 
                  id="user-price_<?php echo $id;?>" 
                  placeholder="1000">
            </input>
            <button id="btn_save_<?php echo $id;?>" type="button" class="save-btn btn btn-outline-primary"><span id="save_<?php echo $id;?>"></span></button>
        </div>
        <span id="invalid_price_<?php echo $id;?>" class="error-message"></span>
        <div class="row" style="margin-top:10px; margin-bottom:10px;">
          <button id="btn_ai_<?php echo $id;?>" type="button" class="btn btn-link">Compare price with AI prediction</button>
        </div>
        <div id="price_suggestion_<?php echo $id;?>">
          <h5>The model predicts that this appartment will cost <span id="price"><?php echo $house[$experiment_data_id]["predicted_price"];?>$</span> per month. </h5>
          <p>The difference between the saved price (<span id="saved_price_<?php echo $id;?>"></span>$) and the predicted one is <span class="price-differenece" id="output_<?php echo $id;?>"></span>$.
          <br><span id="sure_<?php echo $id;?>"></span>.</p>
        </div>
      </div>
  </div>          
</div>

<script type="text/javascript">
    var price_answered = "";
    var request_prediction = false;
    var start_time;
    var end_time;
    var request_prediction_time;
    
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
    $("#sure_<?php echo $id;?>").text("Save first the price and then click on 'Next'");
});

//Save the price
$('#btn_save_<?php echo $id;?>').on('click', function() {
    //change text and style at the save button
    $("#save_<?php echo $id;?>").text("Saved");
    $('#btn_save_<?php echo $id;?>').css({'background':'#6f91f5', 'color':'white'})
    
    //display ai suggestions
    if(!request_prediction){
      $("#btn_ai_<?php echo $id;?>").show();
    }
    $("#saved_price_<?php echo $id;?>").text(price_answered);
    var difference = <?php echo $house[$experiment_data_id]["predicted_price"];?> - price_answered;
    $("#output_<?php echo $id;?>").text(difference);
    
    //add text to help the user understand that he has to save in order to proceed
    $("#sure_<?php echo $id;?>").text("If you are sure that you want to save this price click on 'Next'");


    //make the next button active when the user has saved a new price
    if (price_answered != "") {
      $("#btn_<?php echo $id;?>").prop('disabled', false);
    }
});

//Display model prediction
$('#btn_ai_<?php echo $id;?>').on('click', function() {
    $('#price_suggestion_<?php echo $id;?>').show();
    $("#btn_ai_<?php echo $id;?>").hide();
    request_prediction = true;
});


$('body').on('next', function(e, type){
    if (type === '<?php echo $id;?>' && price_answered != ""){
        // we need to log our data
        trial_log.push([
        measurements.participant_id, 
        measurements.condition,
        <?php echo $trial;?> + "", 
        <?php echo $filter;?> + "", 
        ]);
        // console.log(trial_log);
        $.ajax({
            async: false,
            type: "POST",
            url: '/FROE/html/setup/save_data.php',
            data: {
                "predictedPrice": "<?php echo $house[$experiment_data_id]["predicted_price"];?>",
                "price": price_answered,
                "requestPrediction": request_prediction,
                "houseId": "<?php echo $house[$experiment_data_id]["id"];?>", 
                "try":  "<?php echo $experiment_data_id;?>" 
            },
            success: function(data)
            { 
              console.log(data);
            }
       });
    }
});


$('body').on('show', function(e, type){
  //price_answered = "";
  // console.log("show");
  request_prediction = false;
  $('#btn_save_<?php echo $id;?>').prop('disabled', true);
  $('#btn_ai_<?php echo $id;?>').hide();
  $("#save_<?php echo $id;?>").text("Save");
  $("#price_suggestion_<?php echo $id;?>").hide();
  if (type === '<?php echo $id;?>'){
    console.log("showing page " + type);
    console.log(<?php echo $id;?>);
    var img = $("#Stimulus_Image_<?php echo $id;?>");
    $('#btn_<?php echo $id;?>').hide();
    var initial_mask_time = config.stimulus_timing.initial_mask_time;
    var stimulus_time = config.stimulus_timing.stimulus_time;
    var totalDelay = initial_mask_time + stimulus_time;
    setTimeout(function(){changeImageSrc(img, '<?php echo $src;?>')}, initial_mask_time);
    setTimeout(function(){changeImageSrc(img, "html/img/filter_example/Mask.png")}, totalDelay);
    setTimeout(function(){$('#ScalesBlock_<?php echo $id;?>').show();}, totalDelay);
    setTimeout(function(){$('#btn_<?php echo $id;?>').show();}, totalDelay);

  }


});

</script>