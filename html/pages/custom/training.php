<div id="ExperimentBlock_<?php echo $id;?>">
  <div class="row navbar-logo">
    <img src ="html/img/logo.png" height="30" class="logo-img">
    <h4 class="logo">PricingTool</h4>
  </div>
  <div class="progress">
    <div class="progress-bar" role="progressbar" id="progress_<?php echo $id;?>" aria-valuenow=<?php echo $trial_train + 1;?> aria-valuemin="1" aria-valuemax="20"></div>
  </div>
  <h6 style="color:#828d98; margin-top:10px;"><?php echo $trial_train + 1;?>  out of 20 apartments</h6>
  <div class="row top-50">
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
      <h4>Pricing:</h4>
      <div class="line"></div>
      <div class="information row">
        <?php if ($condition != 2): ?>
        <div class="col-12">
          <p class="light-p"><span class="label-info">Rental price of the accommodation in the market:</span>
            <span id="price"><?php echo $house[$experiment_data_id]["price"];?>€</span>
          </p>
        </div>
        <?php endif ?>
        <!-- condition 2 -->
        <?php if ($condition == 2 || $condition == 4): ?>
          <div class="col-12">
            <p class="light-p"><span class="label-info">Price prediction of the algorithm:</span>
              <span id="price" style="color:#386cba;"><?php echo $prediction;?>€ </span>
            </p>
            <!-- <p style="font-size:15px;">The difference between the actual price and the prediction is <span id="difference_<?php echo $id;?>"></span>€</p> -->
          </div>  
        <?php endif ?>
        <!-- end of condition 2 -->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    var request_prediction = false;
    var start_time;
    var end_time = 0;

    // var difference = Math.round((<?php echo $house[$experiment_data_id]["prediction"];?> - <?php echo $house[$experiment_data_id]["price"];?>) * 100) / 100;
    // $("#difference_<?php echo $id;?>").text(difference);
    // if(difference > 0){
    //   $('#difference_<?php echo $id;?>').css({'color':'rgb(70, 152, 121)', 'font-weight': 600});
    // } else {
    //   $('#difference_<?php echo $id;?>').css({'color':'rgb(238, 34, 78)', 'font-weight': 600});
    // }
    

$('body').on('next', function(e, type){
  end_time = e.timeStamp;
  if (type === '<?php echo $id;?>'){
    if(<?php echo $condition;?> == 1 || <?php echo $condition;?> == 3){
        actual = "<?php echo $house[$experiment_data_id]["price"];?>"
    } else {
        actual = "<?php echo $prediction?>"
    }
    $.ajax({
            async: false,
            type: "POST",
            url: "<?php echo $url;?>",
            data: {
                "user": "<?php echo $user_id;?>",
                "condition": "<?php echo $condition;?>",
                "step":1,
                "actual": actual,
                "answer": 0,
                "answer_min": 0,
                "answer_max": 0,
                "savePriceTime": 0,
                //"requestPredictionTime": request_prediction_time,
                "startTime": start_time,
                "endTime": end_time,
                "houseId": "<?php echo $house[$experiment_data_id]["id"];?>", 
                "trial":  "<?php echo $trial_train;?>", 
                "likert": 0,
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
    var width_progress = ((<?php echo $trial_train;?> + 1) / 20) * 100 + '%';
    $('#progress_<?php echo $id;?>').css({'width': width_progress});
    start_time = e.timeStamp;
    end_time = 0;
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