<div class="top-100 row">
    <div class="col-12">
      <h1>End of <b>Phase 1</b></h1>
      <div class="line"></div>
      <div class="consent" id="end-training">
        <p>You completed the first phase of the experiment!</p>
        <p>In the next step:</p>
        <ul>
          <li>
            <?php if ($condition != 2): ?>
              <p>Your goal is to estimate a range of prices(lower and higher possible prices) for 10 flats given their features and your 
                knowledge of the rental market (based on Phase 1). </p>             
            <?php elseif ($condition == 2): ?>
              <p>Your goal is to estimate the price prediction of 10 apartments given their features and your
               knowledge about the algorithm's predictions (based on Phase 1). </p>        
            <?php endif ?>
            </li>
            <li>
            <!-- <p>You will see informations for an apartment and you will have to predict
            <?php if ($condition != 2): ?>
              <span>a range of prices.</span>
            <?php elseif ($condition == 2): ?>
              <span>the prediction of the model</span>
            <?php endif ?> 
            </p> -->
            <?php if ($condition != 2): ?>
              <img src ="html/img/end_training.JPG" width="900" style="margin-bottom:30px" class="smHide">
            <?php elseif ($condition == 2): ?>
              <img src ="html/img/end_testing_c2_1.JPG" width="900" style="margin-bottom:30px" class="smHide">
            <?php endif ?> 
          </li>
          <li>
            <p>This Phase is about 5 minutes long. Click the <i>"Next"</i> button below, to proceed at the next apartment.</p>
          </li>
        </ul>
      </div>
    </div>
</div>

