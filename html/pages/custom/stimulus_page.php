
<div id="ExperimentBlock_<?php echo $id;?>">
  <div class="row justify-content-between">
    <div class="row navbar-logo">
      <img src ="html/img/logo.png" height="30" class="logo-img">
      <h4 class="logo">PricingTool</h4>
    </div>
    <div class="row navbar-logo align-self-end" style="color:#828d98">
        <h5><span id="stars_<?php echo $id;?>"></span></h5>
        <img src ="html/img/star.png" height="30" class="nav-icon">
        <h5><span id="euros_<?php echo $id;?>"></span></h5>
        <img src ="html/img/euro.png" height="30" class="nav-icon">
    </div>
  </div>
  <div class="progress">
    <div class="progress-bar" role="progressbar" id="progress_<?php echo $id;?>" aria-valuenow=<?php echo $trial + 1;?> aria-valuemin="1" aria-valuemax="20"></div>
  </div>
  <h6 style="color:#828d98; margin-top:10px;"><?php echo $trial + 1;?> out of 30 apartments</h6>
  <div class="row top-25">
    <div class="col-lg-6 col-sm-12" id="ImageBlock_<?php echo $id;?>">
        <img src ="<?php echo $house[$experiment_data_id]["image"];?>" class="Image">
    </div>
    <div class="col-lg-6 col-sm-12" id="ScalesBlock_<?php echo $id;?>">
      <h4>Information: </h4>
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
    <h4>Pricing:</h4>
      <div class="line"></div>
      <div class="predict" >
        <p class="light-p">Based on the presented information, 
            <?php if ($condition != 2): ?>
              <span>how would you price this flat per month in Euros € and how confident you are for this estimation</span>
            <?php elseif ($condition == 2 ): ?>
              <span>what do you think the algorithm price prediction will be in Euros €</span>
            <?php endif ?>
        </p>
        <div class="row" style="margin-left:0px !important;">
            <div class="col-4 row">
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
            </div>
            <form class="row col-7" action="">
              <label>Confidence: </label>
              <ul class='likert-conf'>
                <li>
                  <input type="radio" name="confidence_<?php echo $id;?>" id="radio1"  value="1">
                  <label>Not confident</label>
                </li>
                <li>
                  <input type="radio" name="confidence_<?php echo $id;?>" id="radio2" value="2">
                </li>
                <li>
                  <input type="radio" name="confidence_<?php echo $id;?>" id="radio3" value="3">
                </li>
                <li>
                  <input type="radio" name="confidence_<?php echo $id;?>" id="radio4" value="4">
                </li>
                <li>
                  <input type="radio" name="confidence_<?php echo $id;?>" id="radio5" value="5">
                </li>
                <li>
                  <input type="radio" name="confidence_<?php echo $id;?>" id="radio6" value="6">
                </li>
                <li>
                  <input type="radio" name="confidence_<?php echo $id;?>" id="radio7" value="7">
                  <label>Very confident</label>
                </li>
              </ul>
            </form>
            <div class="col-1">
              <button id="btn_save_<?php echo $id;?>" type="button" class="save-btn btn btn-outline-primary"><span id="save_<?php echo $id;?>"></span></button>
            </div>  
        </div>
        <span id="invalid_price_<?php echo $id;?>" class="error-message"></span>
        <!-- Button to ask for the recommendation -->
        <!-- <div class="row" style="margin-top:10px; margin-bottom:10px;">
          <button id="btn_ai_<?php echo $id;?>" type="button" class="btn btn-link">Compare price with AI prediction</button>
        </div> -->
        <div id="price_suggestion_<?php echo $id;?>" style="margin-top:20px; margin-bottom:10px;">
            <?php if ($condition == 1): ?>
              <h5>The actual price of this flat is <span id="price"><?php echo $house[$experiment_data_id]["price"];?>€</span> per month. </h5>
              <!-- <p>The difference between the saved price (<span id="saved_price_<?php echo $id;?>"></span>€) and the actual one is <span class="price-differenece" id="output_c1_<?php echo $id;?>"></span>€. -->
            <?php elseif ($condition != 1): ?>
              <h5>The AI recommendation for this flat is <span id="price"> <?php echo roundPrediction($house[$experiment_data_id]["prediction"]);?>€</span> per month. </h5>
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
          <h6>How surprising was the recommendation for you?</h6>
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
            <!-- <label class="smHide">A bit surprising</label> -->
          </li>
          <li>
            <input type="radio" name="surprise_<?php echo $id;?>" id="radio4" value="4">
          </li>
          <li>
            <input type="radio" name="surprise_<?php echo $id;?>" id="radio5" value="5">
            <!-- <label class="smHide">Surprising</label> -->
          </li>
          <li>
            <input type="radio" name="surprise_<?php echo $id;?>" id="radio6" value="6">
          </li>
          <li>
            <input type="radio" name="surprise_<?php echo $id;?>" id="radio7" value="7">
            <label id="abs_agree">Very surprising</label>
          </li>
        </ul>
        </form>
        <div id="change_<?php echo $id;?>" class="row mt-20">
          <h6>Do you want to change your first estimation (<span id="saved_price_<?php echo $id;?>"></span>€) for this flat?</h6> 
          <button id="btn_yes_<?php echo $id;?>" type="button" class="save-btn btn btn-outline-primary">Yes</button>
          <button id="btn_no_<?php echo $id;?>" type="button" class="save-btn btn btn-outline-primary">No</button>
        </div>
        <div id="final_estimation_<?php echo $id;?>" class="row mt-20">
              <label>Estimation of Price: </label>
              <input
                  class="testing-input"
                  autocomplete="off" 
                  type="number" 
                  name="user-price2-name_<?php echo $id;?>" 
                  id="user-price2_<?php echo $id;?>" 
                 >
              </input>
              <button id="btn_save2_<?php echo $id;?>" type="button" class="save-btn btn btn-outline-primary"><span id="save2_<?php echo $id;?>"></span></button>
              <span id="invalid_price2_<?php echo $id;?>" class="error-message"></span>
          </div>

        </div>   
      </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="modal_<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="margin-top:80px;" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body" style="text-align:center;">
        <img src ="html/img/home.png" height="75" style="margin-bottom:15px;">
        <br>
        <h6>The real price of the flat is <span id="prev_price_<?php echo $id;?>"></span>€, while the recommendation of the algorithm was <span id="prev_recommendation_<?php echo $id;?>"></span>€.</h6>
        <div id="modal_text_<?php echo $id;?>"></div>
        <div id="stars_evaluation_<?php echo $id;?>"></div>
        <!-- <br> -->
        <?php if ($trial % 5 == 2): ?>
          <form action="" class="feedback top-50">
                <h6>Until now, how much do you trust the recommendation system overall?</h6>
                <ul class='likert-trust'>
                  <li>
                    <input type="radio" name="trust_<?php echo $id;?>" id="radio1"  value="1">
                    <label id="abs_disagree" style="position: absolute; margin-left: -5px; margin-top: 5px;">Low trust</label>
                  </li>
                  <li>
                    <input type="radio" name="trust_<?php echo $id;?>" id="radio2" value="2">
                  </li>
                  <li>
                    <input type="radio" name="trust_<?php echo $id;?>" id="radio3" value="3">
                  </li>
                  <li>
                    <input type="radio" name="trust_<?php echo $id;?>" id="radio4" value="4">
                  </li>
                  <li>
                    <input type="radio" name="trust_<?php echo $id;?>" id="radio5" value="5">
                  </li>
                  <li>
                    <input type="radio" name="trust_<?php echo $id;?>" id="radio6" value="6">
                  </li>
                  <li>
                    <input type="radio" name="trust_<?php echo $id;?>" id="radio7" value="7">
                    <label id="abs_agree" style="position: absolute; margin-left: -70px; margin-top: 5px;">High trust</label>
                  </li> 
                </ul>
          </form>
          <br>
        <?php endif ?> 
        <button id="btn_save_trust_<?php echo $id;?>" type="button" class="save-btn btn btn-outline-primary" data-dismiss="modal" aria-label="Close" style="margin-top: 25px;margin-bottom: 25px;margin-right: 25px;">Next 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
        </svg>
      </button>
      </div>
    </div>
  </div>
</div>   
</div>



<script type="text/javascript">
    var price_answered = 0;
    var price2_answered = -1;
    // var request_prediction = false;
    var start_time;
    var end_time = 0;
    // var request_prediction_time = 0;
    var save_price_time = 0;
    var save_trust_time = 0;
    var estimation_answered_<?php echo $id;?> = false;
    var confidence_answered_<?php echo $id;?> = false;
    var surprise_answered = false;
    var confidence = 0;
    var surprise = 0;
    var save_price2_time = 0;
    var trust = 0;
    var change = false;
    var yes_time = 0;
    var no_time = 0;
    var stars;
    var star_trial;
    var euros;
    var euros_per_star = 0.034

 
//Take the value of the user's input
$('#user-price_<?php echo $id;?>').on('input', function() {
    //check if the price is valid and make save button not disable when the user enters a price
    price_answered = $('#user-price_<?php echo $id;?>').val();
    if (price_answered != "" &&  price_answered > 0) {
      estimation_answered_<?php echo $id;?> = true;
      if(confidence_answered_<?php echo $id;?>){
        $('#btn_save_<?php echo $id;?>').prop('disabled', false);
        //change text and style at the save button
        $("#save_<?php echo $id;?>").text("Save");
        $('#btn_save_<?php echo $id;?>').css({'background':'transparent', 'color':'#6f91f5'})

      }
      $("#invalid_price_<?php echo $id;?>").text("");
    } else if(price_answered <= 0){
      $("#invalid_price_<?php echo $id;?>").text("The price has to be a positive number");
      $('#btn_save_<?php echo $id;?>').prop('disabled', true);
      $('#btn_save_<?php echo $id;?>').css({'background':'transparent', 'color':'grey'})
    }

    //as the user hasn't saved yet the price make the next button disabled again
    $("#btn_<?php echo $id;?>").prop('disabled', true);
});

//confidence
$('input:radio[name="confidence_<?php echo $id;?>"]').on('click', function() {
  confidence = $('input[type="radio"][name="confidence_<?php echo $id;?>"]:checked').val();
  confidence_answered_<?php echo $id;?> = true;
  if(estimation_answered_<?php echo $id;?>){
    $('#btn_save_<?php echo $id;?>').prop('disabled', false);
  }
});

//Save the price
$('#btn_save_<?php echo $id;?>').on('click', function(e) {
    //change text and style at the save button
    $("#save_<?php echo $id;?>").text("Saved");
    $('#btn_save_<?php echo $id;?>').css({'background':'#6f91f5', 'color':'white'})

    $("#saved_price_<?php echo $id;?>").text(price_answered);
    var difference_c1 = Math.round((<?php echo $house[$experiment_data_id]["price"];?> - price_answered) * 100) / 100;
    var difference_c2 = Math.round((<?php echo $house[$experiment_data_id]["prediction"];?> - price_answered) * 100) / 100;
    $("#output_c1_<?php echo $id;?>").text(difference_c1);
    $("#output_c2_<?php echo $id;?>").text(difference_c2);

    //disble estimation and confidence in order to not be able to change them
    $('#user-price_<?php echo $id;?>').prop('disabled', true);
    $('input:radio[name="confidence_<?php echo $id;?>"]').prop('disabled', true);

    save_price_time = new Date().getTime();
    $('#price_suggestion_<?php echo $id;?>').show();
    $('#evaluation_<?php echo $id;?>').show();
});

//evaluation surprise
$('input:radio[name="surprise_<?php echo $id;?>"]').on('click', function() {
  surprise = $('input[type="radio"][name="surprise_<?php echo $id;?>"]:checked').val();
  surprise_answered = true;
  //display the change question
  $('#change_<?php echo $id;?>').show(); 
});

//evaluation trust
$('input:radio[name="trust_<?php echo $id;?>"]').on('click', function() {
  trust = $('input[type="radio"][name="trust_<?php echo $id;?>"]:checked').val();
  $('#btn_save_trust_<?php echo $id;?>').prop('disabled', false);

});

//save trust and proceed to next house
$('#btn_save_trust_<?php echo $id;?>').on('click', function(e) {
  save_trust_time = new Date().getTime();
});

//change yes
$('#btn_yes_<?php echo $id;?>').on('click', function(e) {
    change = true;
    yes_time = new Date().getTime();
    //change style at the yes button
    $('#btn_yes_<?php echo $id;?>').css({'background':'#6f91f5', 'color':'white'})
  
  //change style at the no button
  $('#btn_no_<?php echo $id;?>').css({'background':'transparent', 'color':'#6f91f5'})
  $("#btn_<?php echo $id;?>").prop('disabled', true);

    //show the estimation
    $('#final_estimation_<?php echo $id;?>').show();
});


//change no
$('#btn_no_<?php echo $id;?>').on('click', function(e) {
    change = false;
    no_time = new Date().getTime();
    //change style at the no button
    $('#btn_no_<?php echo $id;?>').css({'background':'#6f91f5', 'color':'white'})
    //change style at the yes button
    $('#btn_yes_<?php echo $id;?>').css({'background':'transparent', 'color':'#6f91f5'})
    $('#final_estimation_<?php echo $id;?>').hide();

    $("#btn_<?php echo $id;?>").prop('disabled', false);
    $('#user-price2_<?php echo $id;?>').prop('disabled', false);
});

//Take the value of the user's input
$('#user-price2_<?php echo $id;?>').on('input', function() {
    //check if the price is valid and make save button not disable when the user enters a price
    price2_answered = $('#user-price2_<?php echo $id;?>').val();
    if (price2_answered != "" &&  price2_answered > 0) {
        $('#btn_save2_<?php echo $id;?>').prop('disabled', false);
        //change text and style at the save button
        $("#save2_<?php echo $id;?>").text("Save");
        $('#btn_save2_<?php echo $id;?>').css({'background':'transparent', 'color':'#6f91f5'})
      $("#invalid_price2_<?php echo $id;?>").text("");
    } else if(price_answered <= 0){
      $("#invalid_price2_<?php echo $id;?>").text("The price has to be a positive number");
      $('#btn_save2_<?php echo $id;?>').prop('disabled', true);
      $('#btn_save2_<?php echo $id;?>').css({'background':'transparent', 'color':'grey'})
    }

    //as the user hasn't saved yet the price make the next button disabled again
    $("#btn_<?php echo $id;?>").prop('disabled', true);
});

//save second estimation
$('#btn_save2_<?php echo $id;?>').on('click', function(e) {
    //change text and style at the save button
    $("#save2_<?php echo $id;?>").text("Saved");
    $('#btn_save2_<?php echo $id;?>').css({'background':'#6f91f5', 'color':'white'})

    //disble estimation and confidence in order to not be able to change them
    $('#user-price2_<?php echo $id;?>').prop('disabled', true);
   

    save_price2_time = new Date().getTime();
    $("#btn_<?php echo $id;?>").prop('disabled', false);
});



$('body').on('next', function(e, type){
    var actual;
    if (type === '<?php echo $id;?>' && price_answered != ""){
      //star evaluation 
      var final_price;  
      if(change){
          final_price = price2_answered;
        } else {
          final_price = price_answered;
        }       
      var performance = Math.abs(((<?php echo $house[$experiment_data_id]["price"];?> - final_price)/<?php echo $house[$experiment_data_id]["price"];?>)*100);
      console.log("Performance: " + performance);
      
      if(performance < 4){
        star_trial = 5;
        euros_trial = 0.8;
      } else if(performance < 18) {
        star_trial = 4;
        euros_trial = 0.2;
      } else if(performance < 30) {
        star_trial = 3;
        euros_trial = 0.0;
      } else if(performance < 45) {
        star_trial = 2;
        euros_trial = -0.2;
      } else {
        star_trial = 1;
        euros_trial = -0.8;
      }
        stars = parseInt(stars) + star_trial;
        euros = parseFloat(euros) + euros_trial;
        sessionStorage.setItem("stars", stars);
        sessionStorage.setItem("euros", euros);
        sessionStorage.setItem("star_trial", star_trial);
        sessionStorage.setItem("euros_trial", euros_trial);
        sessionStorage.setItem("estimation", final_price);
        sessionStorage.setItem("real_price", <?php echo $house[$experiment_data_id]["price"];?>);
        sessionStorage.setItem("recommendation", <?php echo roundPrediction($house[$experiment_data_id]["prediction"]);?>);
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
            url: "<?php echo $url . 'save_data.php';?>",
            data: {
                "user": "<?php echo $user_id;?>",
                "condition": "<?php echo $condition;?>",
                "step":3,
                "rentalPrice": "<?php echo $house[$experiment_data_id]["price"];?>",
                "recommedation": "<?php echo $prediction;?>",
                "answer": price_answered,
                "answer_min": 0,
                "answer_max": 0,
                "savePriceTime": save_price_time,
                "startTime": start_time,
                "endTime": end_time,
                "houseId": "<?php echo $house[$experiment_data_id]["id"];?>", 
                "trial":  "<?php echo $trial;?>", 
                "confidence": confidence,
                "surprise": surprise,
                "trust": trust,
                "saveTrustTime": save_trust_time,
                "change": change,
                "yesTime": yes_time,
                "noTime": no_time,
                "secondEstimation": price2_answered,
                "secondEstimationTime": save_price2_time,
                "finalEstimation": final_price,
                "stars": star_trial,
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
    //stars and modal
    if(<?php echo $trial;?> > 0){
      $("#modal_<?php echo $id;?>").modal();
    }
    if(<?php echo $trial;?> == 0){
      sessionStorage.setItem("stars", 0);
      sessionStorage.setItem("euros", 5.00);
      sessionStorage.setItem("star_trial", 0);
      sessionStorage.setItem("euros_trial", 0);
    } 
    stars = sessionStorage.getItem("stars");
    euros = sessionStorage.getItem("euros");
    star_trial = sessionStorage.getItem("star_trial");
    euros_trial = sessionStorage.getItem("euros_trial");
    estimation = sessionStorage.getItem("estimation");
    prev_price = sessionStorage.getItem("real_price");
    prev_recommendetion = sessionStorage.getItem("recommendation");
    sessionStorage.clear();

    euros = parseFloat(euros).toFixed(2);

    console.log("Stars: " + stars);
    
    $("#stars_<?php echo $id;?>").text(stars);
    $("#euros_<?php echo $id;?>").text(euros);
    $("#prev_price_<?php echo $id;?>").text(prev_price);
    $("#prev_recommendation_<?php echo $id;?>").text(prev_recommendetion);

    var el = document.getElementById('stars_evaluation_<?php echo $id;?>');
    var text = document.getElementById('modal_text_<?php echo $id;?>');
    var content;
    var modalText;
    //euros_text = Math.abs((euros_trial).toFixed(2));
    console.log("star_trial:" + star_trial)

    if(star_trial >= 1) {
      console.log("star_trial:" + star_trial)
      switch(star_trial) {
        case '1':
          modalText = '<div style = "text-align:center;"><h6>Unfortunately your estimation (' + estimation + '€) is really far from the real price of the flat.</h6><p>You got ' + star_trial + ' stars and you lost 0.80€.</p></div>'
          break;
        case '2':
          modalText = '<div style = "text-align:center;"><h6>Unfortunately your estimation (' + estimation + '€) is far from the real price of the flat!</h6><p>You got ' + star_trial + ' stars and you lost 0.20€.</p></div>'
          break;
        case '3':
          modalText = '<div style = "text-align:center;"><h6>Your estimation (' + estimation + '€) is not very close to the real price of the flat.</h6><p>You got ' + star_trial + ' stars and you neither win nor lose money.</p></div>'
          break;
        case '4':
          modalText = '<div style = "text-align:center;"><h6>Your estimation (' + estimation + '€) is close to the real price of the flat!</h6><p>You got ' + star_trial + ' stars and you won 0.20€.</p></div>'
          break;
        case '5':
          modalText = '<div style = "text-align:center;"><h6>Congratulations! Your estimation (' + estimation + '€) is really close to the real price of the flat!</h6><p>You got ' + star_trial + ' stars and you won 0.80€.</p></div>'
          break;
        default:
          modalText = '<div><h5>blah blah blah</h5></div>'
      }
      content = '<div class="row center">'
      for(var i=0; i < star_trial; i++){
        content = content + '<img src ="html/img/star.png" height="30" class="nav-icon">'
      }
      for(var i=0; i < 5-star_trial; i++){
        content = content + '<img src ="html/img/star-outline.png" height="30" class="nav-icon">'
      }
      content =  content + '</div>'
    } else {
      content = "";
    }

    
    el.insertAdjacentHTML('afterbegin', content);
    text.insertAdjacentHTML('afterbegin', modalText);

    var width_progress = ((<?php echo $trial;?> + 1) / 30) * 100 + '%';
    $('#progress_<?php echo $id;?>').css({'width': width_progress});
    start_time = e.timeStamp;
    end_time = 0;
    // request_prediction_time = 0;
    // request_prediction = false;
    $('#btn_save_<?php echo $id;?>').prop('disabled', true);
    $('#btn_save2_<?php echo $id;?>').prop('disabled', true);
    if(<?php echo $trial;?> % 5 == 2){
      $('#btn_save_trust_<?php echo $id;?>').prop('disabled', true);
    } else {
      $('#btn_save_trust_<?php echo $id;?>').prop('disabled', false);
    }
    //$('#btn_ai_<?php echo $id;?>').hide();
    $("#save_<?php echo $id;?>").text("Save");
    $("#price_suggestion_<?php echo $id;?>").hide();
    $('#evaluation_<?php echo $id;?>').hide();
    $('#change_<?php echo $id;?>').hide();
    $('#final_estimation_<?php echo $id;?>').hide();
    $("#save2_<?php echo $id;?>").text("Save");
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