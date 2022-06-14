
<div id="ExperimentBlock_<?php echo $id;?>">
  <div class="row navbar-logo">
    <img src ="html/img/logo.png" height="30" class="logo-img">
    <h4 class="logo">PricingTool</h4>
  </div>
  <div class="progress">
    <div class="progress-bar" role="progressbar" id="progress_<?php echo $id;?>" aria-valuenow=<?php echo $trial + 1;?> aria-valuemin="1" aria-valuemax="20"></div>
  </div>
  <h6 style="color:#828d98; margin-top:10px;"><?php echo $trial + 1;?> out of 20 apartments</h6>
  <div class="row top-40">
    <div class="col-lg-6 col-sm-12" id="ImageBlock_<?php echo $id;?>">
        <img src ="<?php echo $house[$experiment_data_id]["image"];?>" class="Image">
    </div>
    <div class="col-lg-6 col-sm-12" id="ScalesBlock_<?php echo $id;?>">
      <h4>Information:</h4>
      <div class="line"></div>
      <div class="smHide information row" style="margin-bottom:20px;">
        <div class="col-md-4 col-xs-6">
          <p class="light-p"><span class="label-info">Type:</span> <?php echo $house[$experiment_data_id]["type"];?>  </p>
          <p class="light-p"><span class="label-info">Square meters:</span> <?php echo $house[$experiment_data_id]["squaremeters"];?></p>
        </div>
        <div class="col-md-4 col-xs-6">
          <p class="light-p"><span class="label-info">Bedrooms:</span> <?php echo $house[$experiment_data_id]["rooms"];?>  </p>
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
  <div class="col-12 top-40">
    <h4>Pricing:</h4>
      <div class="line"></div>
      <div class="predict" >
        <p class="light-p">Based on the presented information, 
            <?php if ($condition != 2): ?>
              <span>how would you price this accommodation per month in Euros €</span>
            <?php elseif ($condition == 2 ): ?>
              <span>what do you think the algorithm price prediction will be in Euros €</span>
            <?php endif ?>
        </p>
        <div class="row" style="margin-left:0px !important;">
            <?php if ($condition != 2): ?>
              <label>Estimation of Price: </label>
            <?php elseif ($condition == 2 ): ?>
              <label>Estimation of Prediction: </label>
            <?php endif ?>
            <input
                  class="testing-input"
                  autocomplete="off" 
                  type="number" 
                  name="user-price-name_<?php echo $id;?>" 
                  id="user-price_<?php echo $id;?>" 
            >
            </input>
            <button id="btn_save_<?php echo $id;?>" type="button" class="save-btn btn btn-outline-primary"><span id="save_<?php echo $id;?>"></span></button>
        </div>
        <span id="invalid_price_<?php echo $id;?>" class="error-message"></span>
        <!-- Button to ask for the recommendation -->
        <!-- <div class="row" style="margin-top:10px; margin-bottom:10px;">
          <button id="btn_ai_<?php echo $id;?>" type="button" class="btn btn-link">Compare price with AI prediction</button>
        </div> -->
        <div id="price_suggestion_<?php echo $id;?>" style="margin-top:20px; margin-bottom:10px;">
            <?php if ($condition == 1): ?>
              <h5>The actual price of this accommodation is <span id="price"><?php echo $house[$experiment_data_id]["price"];?>€</span> per month. </h5>
              <!-- <p>The difference between the saved price (<span id="saved_price_<?php echo $id;?>"></span>€) and the actual one is <span class="price-differenece" id="output_c1_<?php echo $id;?>"></span>€. -->
            <?php elseif ($condition != 1): ?>
              <h5>The algorithm predicts that this accommodation will cost <span id="price"> <?php echo $prediction;?>€</span> per month. </h5>
              <!-- <p>The difference between the saved price (<span id="saved_price_<?php echo $id;?>"></span>€) and the predicted one is <span class="price-differenece" id="output_c2_<?php echo $id;?>"></span>€. -->
            <?php endif ?>
          <!-- <br><span id="sure_<?php echo $id;?>"></span>. -->
        </p>
        </div>
        <div class="col-12 top-20  no-padding" id="evaluation_<?php echo $id;?>">
    <!-- <h4>Evaluation:</h4>
      <div class="line"></div> -->
      <form action="" style="margin: top 20px;">
        <?php if ($condition == 1): ?>
          <h5>This price is:</h5>
        <?php elseif ($condition != 1): ?>
          <h5>This prediction is:</h5>
        <?php endif ?>
        <ul class='likert'>
          <li>
            <input type="radio" name="surprise_<?php echo $id;?>" id="radio1"  value="1">
            <label id="abs_disagree">Not surprising</label>
          </li>
          <li>
            <input type="radio" name="surprise_<?php echo $id;?>" id="radio2" value="2">
          </li>
          <li>
            <input type="radio" name="surprise_<?php echo $id;?>" id="radio3" value="3">
            <label class="smHide">A bit surprising</label>
          </li>
          <li>
            <input type="radio" name="surprise_<?php echo $id;?>" id="radio4" value="4">
          </li>
          <li>
            <input type="radio" name="surprise_<?php echo $id;?>" id="radio5" value="5">
            <label class="smHide">Surprising</label>
          </li>
          <li>
            <input type="radio" name="surprise_<?php echo $id;?>" id="radio6" value="6">
          </li>
          <li>
            <input type="radio" name="surprise_<?php echo $id;?>" id="radio7" value="7">
            <label id="abs_agree">Very surprising</label>
          </li>
        </ul>
        <?php if ($condition == 1): ?>
          <p class="small-text">"Not surprising, means that this price is close to what you expected (based on your knowledge of the rental market), while  Very surprising means that the price is unexpectedly high or low."</p>
        <?php elseif ($condition == 2): ?>
          <p class="small-text">"Not surprising, means that this price prediction is close to what you expected (based on your knowledge about the algorithm), while  Very surprising means that the price prediction is unexpectedly high or low."</p>
        <?php elseif ($condition == 3 || $condition == 4): ?>
          <p class="small-text">"Not surprising, means that this price prediction is close to what you expected (based on your knowledge of the rental market), while Very surprising means that the price prediction is unexpectedly high or low."</p>
        <?php endif ?>
        </form> 
  </div>  
        
      </div>
  </div>
       
</div>

<script type="text/javascript">
    var price_answered = "";
    // var request_prediction = false;
    var start_time;
    var end_time = 0;
    // var request_prediction_time = 0;
    // var save_price_time = 0;
    var likert = 0;
    
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

    //get out of comments to display a button to ask for the predictions
    //display ai suggestions 
    // if(!request_prediction){
    //   $("#btn_ai_<?php echo $id;?>").show();
    // }
    $("#saved_price_<?php echo $id;?>").text(price_answered);
    var difference_c1 = Math.round((<?php echo $house[$experiment_data_id]["price"];?> - price_answered) * 100) / 100;
    var difference_c2 = Math.round((<?php echo $house[$experiment_data_id]["prediction"];?> - price_answered) * 100) / 100;
    $("#output_c1_<?php echo $id;?>").text(difference_c1);
    $("#output_c2_<?php echo $id;?>").text(difference_c2);

    $('#user-price_<?php echo $id;?>').prop('disabled', true);
    //add text to help the user understand that he has to save in order to proceed
    //$("#sure_<?php echo $id;?>").text("If you are sure that you want to save this price click on 'Next'");

    save_price_time = new Date();
    $('#price_suggestion_<?php echo $id;?>').show();
    $('#evaluation_<?php echo $id;?>').show();

    //make the next button active when the user has saved a new price
    //save the data in the csv file every time that the user saves a new price
    // if ( price_answered != "" && price_answered > 0) {
      
    //   $.ajax({
    //         async: false,
    //         type: "POST",
    //         url: '/FROE/html/setup/save_data.php',
    //         data: {
    //             "predictedPrice": "<?php echo $house[$experiment_data_id]["prediction"];?>",
    //             "price": price_answered,
    //             "savePriceTime": save_price_time,
    //             // "requestPredictionTime": request_prediction_time,
    //             "startTime": start_time,
    //             "endTime": end_time,
    //             "houseId": "<?php echo $house[$experiment_data_id]["id"];?>", 
    //             "try":  "<?php echo $experiment_data_id;?>", 
    //             "likert": likert,
    //             "completed": 0,
    //         },
    //         success: function(data)
    //         { 
    //           console.log(data);
    //         }
    //    });
    // }
});

//evaluation
$('input:radio[name="surprise_<?php echo $id;?>"]').on('click', function() {
  likert = $('input[type="radio"][name="surprise_<?php echo $id;?>"]:checked').val();
  $("#btn_<?php echo $id;?>").prop('disabled', false);
});

// //Display model prediction
// $('#btn_ai_<?php echo $id;?>').on('click', function(e) {
//     $('#price_suggestion_<?php echo $id;?>').show();
//     $("#btn_ai_<?php echo $id;?>").hide();
//     request_prediction = true;
//     request_prediction_time = e.timeStamp;
// });


$('body').on('next', function(e, type){
    var actual;
    if (type === '<?php echo $id;?>' && price_answered != ""){
        end_time = e.timeStamp;
        // we need to log our data
        trial_log.push([
        measurements.participant_id, 
        measurements.condition,
        <?php echo $trial;?> + "", 
        ]);
        if(<?php echo $condition;?> == 1){
          actual = "<?php echo $house[$experiment_data_id]["price"];?>"
        } else {
          actual = "<?php echo $prediction;?>"
        }
        $.ajax({
            async: false,
            type: "POST",
            url: "<?php echo $url;?>",
            data: {
                "user": "<?php echo $user_id;?>",
                "condition": "<?php echo $condition;?>",
                "step":3,
                "actual": actual,
                "answer": price_answered,
                "answer_min": 0,
                "answer_max": 0,
                "savePriceTime": save_price_time,
                //"requestPredictionTime": request_prediction_time,
                "startTime": start_time,
                "endTime": end_time,
                "houseId": "<?php echo $house[$experiment_data_id]["id"];?>", 
                "trial":  "<?php echo $trial;?>", 
                "likert": likert,
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
    var width_progress = ((<?php echo $trial;?> + 1) / 20) * 100 + '%';
    $('#progress_<?php echo $id;?>').css({'width': width_progress});
    start_time = e.timeStamp;
    end_time = 0;
    // request_prediction_time = 0;
    // request_prediction = false;
    $('#btn_save_<?php echo $id;?>').prop('disabled', true);
    //$('#btn_ai_<?php echo $id;?>').hide();
    $("#save_<?php echo $id;?>").text("Save");
    $("#price_suggestion_<?php echo $id;?>").hide();
    $('#evaluation_<?php echo $id;?>').hide();
    $('#user-price_<?php echo $id;?>').prop('disabled', false);
    $('input').prop('disabled', false);

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