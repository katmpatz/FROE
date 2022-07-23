<div class="top-50">
<div class="row justify-content-between">
    <div class="row navbar-logo">
      <img src ="html/img/logo.png" height="30" class="logo-img">
      <h4 class="logo">PricingTool</h4>
    </div>
    <div class="row navbar-logo align-self-end" style="color:#828d98">
        <h5 style="color: #212529; margin-right:15px;">Final results: &nbsp;</h5>
        <h5><span id="stars_<?php echo $id;?>"></span></h5>
        <img src ="html/img/star.png" height="30" class="nav-icon">
        <h5><span id="euros_<?php echo $id;?>"></span></h5>
        <img src ="html/img/euro.png" height="30" class="nav-icon">
    </div>
  </div>
  <div class="col">
    <h1>Feedback</h1>
  <div id="feedback" class="col-12 top-40">
    <h4>Personal Information:</h4>
    <div class="line"></div>
    <div class="row top-40">
      <div class="col-md-3 col-sm-12" id="age">
          <label>Age*: </label> 
          <input
              autocomplete="off" 
              type="number" 
              name="age"
              id="age_<?php echo $id;?>" 
          >
          </input>
      </div>
      <div class="col-md-4 col-sm-12">
          <label>Gender*: </label> 
          <select class="form-select" aria-label="Default select example" name="gender" id="gender">
            <option name="gender_<?php echo $id;?>"  value="0" selected>I don’t want to answer</option>
            <option name="gender_<?php echo $id;?>"  value="1">Female</option>
            <option name="gender_<?php echo $id;?>"  value="2">Male</option>
            <option name="gender_<?php echo $id;?>"  value="3">Non-binary</option>
          </select>
      </div>
    </div>
  <form action="" class="feedback top-50">
        <p>How familiar are you with assessing the prices of the rental market (Not familiar-I have never looked at rental prices in my life, Very familiar-I have worked in the real estate market) ?*</p>
        <ul class='likert'>
          <li>
            <input type="radio" name="familiar_<?php echo $id;?>" id="radio1"  value="1">
            <label id="abs_disagree">Not familiar</label>
          </li>
          <li>
            <input type="radio" name="familiar_<?php echo $id;?>" id="radio2" value="2">
          </li>
          <li>
            <input type="radio" name="familiar_<?php echo $id;?>" id="radio3" value="3">
          </li>
          <li>
            <input type="radio" name="familiar_<?php echo $id;?>" id="radio4" value="4">
          </li>
          <li>
            <input type="radio" name="familiar_<?php echo $id;?>" id="radio5" value="5">
          </li>
          <li>
            <input type="radio" name="familiar_<?php echo $id;?>" id="radio6" value="6">
          </li>
          <li>
            <input type="radio" name="familiar_<?php echo $id;?>" id="radio7" value="7">
            <label id="abs_agree">Very familiar</label>
          </li>
        </ul>
    </form>
    <form action="" class="feedback top-50">
                <p>How much do you trust the recommendation system overall?</p>
                <ul class='likert'>
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
    <h4 class="top-50">Comments:</h4>
    <div class="line"></div>
    <p>If some of the recommendations were surprising, can you explain why? Was Phase 1 helpful to learn about the rental market? Do you have any other feedback about the study (clarity of the instructions, questions or any technical issues)? <br> 
      This question is optional, but we would really appreciate your feedback 
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16" style="margin-top:-5px">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
      </svg>!
    </p>
            <form class="mt-2" action="" method="post">
              <div class="row mt-4">
                <div class="form-group">
                  <textarea class="form-control" id="optionalComments" rows="4" cols="200"></textarea>
                </div>
              </div>
            </form>
    <p>You have to answer all the mandatory questions(*) in order to complete the experiment.</p>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="margin-top:80px;" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" style="text-align:center;">
        <img src ="html/img/home.png" height="75" style="margin-bottom:15px;">
        <br>
        <h6>The real price of the flat is <span id="prev_price_<?php echo $id;?>"></span>€, while the recommendation of the algorithm was <span id="prev_recommendation_<?php echo $id;?>"></span>€.</h6>
        <div id="modal_text_<?php echo $id;?>"></div>
        <div id="stars_evaluation_<?php echo $id;?>"></div>
        <br>
        <h6>You completed the experiment gaining <span id="totalStars"></span> stars and <span id="totalEuros"></span>€</h6>
        <!-- <br> -->
          <br>
        <button id="btn_save_trust_<?php echo $id;?>" type="button" class="save-btn btn btn-outline-primary" data-dismiss="modal" aria-label="Close" style="margin-bottom: 25px;margin-right: 25px;">Final Questions
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
        </svg>
      </button>
      </div>
    </div>
  </div>
</div>   



<script type="text/javascript">
  var comments = "";
  var age;
  var gender = $("#gender option:selected").val();
  var familiarityRennes;
  var confident_p2;
  var confident_p3;
  var age_ansrd = false;
  var fam_ansrd = false;
  var trust_ansrd = false;
  var trust;
  var save_trust_time;
  var stars;
  var star_trial;
  var euros;
  var euros_per_star = 0.034;
  var content;
    var modalText;


  if(<?php echo $condition;?> == 1){
    $("learning").text("the rental market");
    $("pred_or_prices").text("prices");
  } else if(<?php echo $condition;?> == 2) {
    $("learning").text("the predictions of the algorithm");
    $("pred_or_prices").text("predictions");
  } else if(<?php echo $condition;?> == 3) {
    $("learning").text("the rental market");
    $("pred_or_prices").text("predictions");
  } else if(<?php echo $condition;?> == 4) {
    $("learning").text("the rental market and the predictions of the algorithm");
    $("pred_or_prices").text("predictions");
  }

  //evaluation trust
$('input:radio[name="trust_<?php echo $id;?>"]').on('click', function() {
  trust = $('input[type="radio"][name="trust_<?php echo $id;?>"]:checked').val();
  trust_ansrd = true;
  if(age_ansrd && fam_ansrd && trust_ansrd){
      $("#btn_<?php echo $id;?>").prop('disabled', false);
    }
});

//save trust and proceed to next house
$('#btn_save_trust_<?php echo $id;?>').on('click', function(e) {
  save_trust_time = new Date().getTime();
});

  //Take the value of the user's input
  $('#age_<?php echo $id;?>').on('input', function() {
    age = $('#age_<?php echo $id;?>').val();
    age_ansrd = true;
    if(age_ansrd && fam_ansrd && trust_ansrd){
      $("#btn_<?php echo $id;?>").prop('disabled', false);
    }
  });


  //familiarity
  $('input:radio[name="familiar_<?php echo $id;?>"]').on('click', function() {
    familiarityRennes = $('input[type="radio"][name="familiar_<?php echo $id;?>"]:checked').val();
    fam_ansrd = true;
    if(age_ansrd && fam_ansrd && trust_ansrd){
      $("#btn_<?php echo $id;?>").prop('disabled', false);
    }
  });
  

  // This is the event triggered to save the data entered. The event triggers when the 'next' button is pressed.
	$('body').on('next', function(e, type){
    //send a value that the expirement is completed in order to save the data
		// The if clause below ensures that this specific instance of a next button press is only triggered when the id of the element corresponds to the one being defined above.
    if (type === '<?php echo $id;?>'){
      comments = $("#optionalComments").val();
      gender = $("#gender option:selected").val();
      $.ajax({
            async: false,
            type: "POST",
            url: "<?php echo $url . 'save_data.php';?>",
            data: {
                "user": "<?php echo $user_id;?>",
                "age": age,
                "gender": gender,
                "familiarityRennes": familiarityRennes,
                "comments": comments,
                "trust": trust,
                "totalStars": stars,
                "totalEuros": euros,
                "completed": 1,
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
    sessionStorage.clear();

    euros = parseFloat(euros).toFixed(2);
    
    var el = document.getElementById('stars_evaluation_<?php echo $id;?>');
    var text = document.getElementById('modal_text_<?php echo $id;?>');

    console.log("star_trial:" + star_trial)
    totalStars = parseInt(stars) + parseInt(star_trial);
    totalEuros = (parseFloat(euros) + parseFloat(euros_trial)).toFixed(2);
    $("#totalStars").text(totalStars);
    $("#totalEuros").text(totalEuros);

    $("#stars_<?php echo $id;?>").text(totalStars);
    $("#euros_<?php echo $id;?>").text(totalEuros);

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
    
    if(<?php echo $trial;?> % 5 == 1){
      $('#btn_save_trust_<?php echo $id;?>').prop('disabled', true);
    } else {
      $('#btn_save_trust_<?php echo $id;?>').prop('disabled', false);
    }

    el.insertAdjacentHTML('afterbegin', content);
    text.insertAdjacentHTML('afterbegin', modalText);
    
  }


});
</script>
