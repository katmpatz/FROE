
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
        <h5>The model predicts that this appartment will cost <span id="price"><?php echo $house[$experiment_data_id]["predicted_price"];?>$</span> per month.</h5>
        <p class="light-p">Based on the presented information, how would you price this appartment per month in (US dollars $)</p>
        <div class="row" style="margin-left:0px !important;">
          <label>Price: </label>
          <input  
                type="text" 
                name="user-price" 
                id="user-price_<?php echo $id;?>" 
                placeholder="<?php echo $house[$experiment_data_id]["predicted_price"];?>">
          </input>
        </div>
      </div>
  </div>          
</div>

<script type="text/javascript">
    var price_answered = "";
    
//Take the value of the user's input
$('#user-price_<?php echo $id;?>').on('input', function() {
    price_answered = $('#user-price_<?php echo $id;?>').val();

    //make the button active as soon as the value was changed
    if (price_answered != "") $("#btn_<?php echo $id;?>").prop('disabled', false);

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