<div id="ExperimentBlock_<?php echo $id;?>">
  <div class="row navbar-logo">
    <img src ="html/img/logo.png" height="30" class="logo-img">
    <h4 class="logo">PricingTool</h4>
  </div>
  <div class="row top-40">
    <div class="col-6" id="ImageBlock_<?php echo $id;?>">
        <img src ="<?php echo $house[$experiment_data_id]["image"];?>" class="Image">
    </div>
    <div class="col-6">
      <h4>Information:</h4>
      <div class="line"></div>
      <div class="information row" style="margin-bottom:20px;">
        <div class="col-4">
          <p class="light-p"><span class="label-info">Type:</span> <?php echo $house[$experiment_data_id]["type"];?>  </p>
          <p class="light-p"><span class="label-info">Square meters:</span> <?php echo $house[$experiment_data_id]["squaremeters"];?></p>
        </div>
        <div class="col-4">
          <p class="light-p"><span class="label-info">Bedrooms:</span> <?php echo $house[$experiment_data_id]["rooms"];?>  </p>
          <p class="light-p"><span class="label-info">Furnished:</span> <?php echo $house[$experiment_data_id]["furnished"];?></p>
        </div>
        <div class="col-4">
          <p class="light-p"><span class="label-info">Bathrooms:</span> <?php echo $house[$experiment_data_id]["bathrooms"];?></p>
          <p class="light-p"><span class="label-info">Floor:</span> <?php echo $house[$experiment_data_id]["floor"];?></p>
        </div>
        <div class="col-12">
          <p class="light-p"><span class="label-info">Description:</span>
            <?php echo $house[$experiment_data_id]["description"];?>
          </p>
        </div>
      </div>
      <h4>Pricing:</h4>
      <div class="line"></div>
      <div class="information row">
        <div class="col-12">
          <p class="light-p"><span class="label-info">Price:</span>
            <span id="price"><?php echo $house[$experiment_data_id]["price"];?>€</span>
          </p>
        </div>
        <!-- condition 2 -->
        <?php if ($condition == 2): ?>
          <div class="col-12">
            <p class="light-p"><span class="label-info">Prediction of the model:</span>
              <span id="price" style="color:#386cba;"><?php echo $house[$experiment_data_id]["prediction"];?>€</span>
            </p>
            <p style="font-size:15px;">The difference between the actual price and the prediction is <span id="difference_<?php echo $id;?>"></span>€</p>
          </div>  
        <?php endif ?>
        <!-- end of condition 2 -->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    var price_answered = "";
    var request_prediction = false;
    var difference = Math.round((<?php echo $house[$experiment_data_id]["prediction"];?> - <?php echo $house[$experiment_data_id]["price"];?>) * 100) / 100;
    $("#difference_<?php echo $id;?>").text(difference);
    if(difference > 0){
      $('#difference_<?php echo $id;?>').css({'color':'rgb(70, 152, 121)', 'font-weight': 600});
    } else {
      $('#difference_<?php echo $id;?>').css({'color':'rgb(238, 34, 78)', 'font-weight': 600});
    }
    

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

    $('#btn_<?php echo $id;?>').hide();
    var initial_mask_time = config.stimulus_timing.initial_mask_time;
    var stimulus_time = config.stimulus_timing.stimulus_time;
    var totalDelay = initial_mask_time + stimulus_time;
    setTimeout(function(){$('#ScalesBlock_<?php echo $id;?>').show();}, totalDelay);
    setTimeout(function(){$('#btn_<?php echo $id;?>').show();}, totalDelay);

  }


});

</script>