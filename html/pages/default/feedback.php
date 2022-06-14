<div class="top-50 row">
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
        <p>How familiar with such a task are you (assessing the rental market of a city)?*</p>
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
        <p>How confident were you in estimating the prices in the second phase?*</p>
        <ul class='likert'>
          <li>
            <input type="radio" name="confident2_<?php echo $id;?>" id="radio1"  value="1">
            <label id="abs_disagree">Not confident</label>
          </li>
          <li>
            <input type="radio" name="confident2_<?php echo $id;?>" id="radio2" value="2">
          </li>
          <li>
            <input type="radio" name="confident2_<?php echo $id;?>" id="radio3" value="3">
          </li>
          <li>
            <input type="radio" name="confident2_<?php echo $id;?>" id="radio4" value="4">
          </li>
          <li>
            <input type="radio" name="confident2_<?php echo $id;?>" id="radio5" value="5">
          </li>
          <li>
            <input type="radio" name="confident2_<?php echo $id;?>" id="radio6" value="6">
          </li>
          <li>
            <input type="radio" name="confident2_<?php echo $id;?>" id="radio7" value="7">
            <label id="abs_agree">Very confident</label>
          </li>
        </ul>
    </form> 
    <form action="" class="feedback top-50">
        <p>How confident were you in estimating the prices in the last phase?*</p>
        <ul class='likert'>
          <li>
            <input type="radio" name="confident3_<?php echo $id;?>" id="radio1"  value="1">
            <label id="abs_disagree">Not confident</label>
          </li>
          <li>
            <input type="radio" name="confident3_<?php echo $id;?>" id="radio2" value="2">
          </li>
          <li>
            <input type="radio" name="confident3_<?php echo $id;?>" id="radio3" value="3">
          </li>
          <li>
            <input type="radio" name="confident3_<?php echo $id;?>" id="radio4" value="4">
          </li>
          <li>
            <input type="radio" name="confident3_<?php echo $id;?>" id="radio5" value="5">
          </li>
          <li>
            <input type="radio" name="confident3_<?php echo $id;?>" id="radio6" value="6">
          </li>
          <li>
            <input type="radio" name="confident3_<?php echo $id;?>" id="radio7" value="7">
            <label id="abs_agree">Very confident</label>
          </li>
        </ul>
    </form> 
    <h4 class="top-50">Comments:</h4>
    <div class="line"></div>
    <p>Do you have any comment about the study, for example concerning the clarity of the instructions or technical issues you might have experienced? Was it easy during the phase 1 to learn about 
      <span id="learning"></span>? If some of the <span id="pred_or_prices"></span> were surprising can you explain why?<br> 
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


<script type="text/javascript">
  var comments = "";
  var age;
  var gender = $("#gender option:selected").val();
  var familiarityRennes;
  var confident_p2;
  var confident_p3;
  var age_ansrd = false;
  var fam_ansrd = false;
  var conf2_ansrd = false;
  var conf3_ansrd = false;

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

  //Take the value of the user's input
  $('#age_<?php echo $id;?>').on('input', function() {
    age = $('#age_<?php echo $id;?>').val();
    age_ansrd = true;
    if(age_ansrd && fam_ansrd && conf2_ansrd && conf3_ansrd){
      $("#btn_<?php echo $id;?>").prop('disabled', false);
    }
  });


  //familiarity
  $('input:radio[name="familiar_<?php echo $id;?>"]').on('click', function() {
    familiarityRennes = $('input[type="radio"][name="familiar_<?php echo $id;?>"]:checked').val();
    fam_ansrd = true;
    if(age_ansrd && fam_ansrd && conf2_ansrd && conf3_ansrd){
      $("#btn_<?php echo $id;?>").prop('disabled', false);
    }
  });
  

  //confident_2
  $('input:radio[name="confident2_<?php echo $id;?>"]').on('click', function() {
    confident_p2 = $('input[type="radio"][name="confident2_<?php echo $id;?>"]:checked').val();
    conf2_ansrd = true;
    if(age_ansrd && fam_ansrd && conf2_ansrd && conf3_ansrd){
      $("#btn_<?php echo $id;?>").prop('disabled', false);
    }
  });
  
  //confident_2
  $('input:radio[name="confident3_<?php echo $id;?>"]').on('click', function() {
    confident_p3 = $('input[type="radio"][name="confident3_<?php echo $id;?>"]:checked').val();
    conf3_ansrd = true;
    if(age_ansrd && fam_ansrd && conf2_ansrd && conf3_ansrd){
      $("#btn_<?php echo $id;?>").prop('disabled', false);
    }
  });

  // This is the event triggered to save the data entered. The event triggers when the 'next' button is pressed.
	$('body').on('next', function(e, type){
    //send a value that the expirement is completed in order to save the data
		// The if clause below ensures that this specific instance of a next button press is only triggered when the id of the element corresponds to the one being defined above.
    if (type === '<?php echo $id;?>' && !(typeof measurements === 'undefined')){
      comments = $("#optionalComments").val();
      gender = $("#gender option:selected").val();
      $.ajax({
            async: false,
            type: "POST",
            url: "<?php echo $url;?>",
            data: {
                "user": "<?php echo $user_id;?>",
                "age": age,
                "gender": gender,
                "familiarityRennes": familiarityRennes,
                "confident_p2": confident_p2,
                "confident_p3": confident_p3,
                "comments": comments,
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
</script>
