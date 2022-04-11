<div class="top-100 row">
    <div class="col">
      <h1>End of training</h1>
      <div class="line"></div>
      <div class="consent" id="end-training">
        <p>You completed the first phase of the expirement!</p>
        <p>In the next step:</p>
        <ul>
          <li>
            <p>You will see informations for an apartment and you will have to predict
            <?php if ($condition == 1): ?>
              <span>the actual price.</span>
            <?php elseif ($condition == 2): ?>
              <span>the prediction of the model</span>
            <?php endif ?> 
            </p>
            <?php if ($condition == 1): ?>
              <img src ="html/img/end_training_c1_1.JPG" width="800" style="margin-bottom:50px">
            <?php elseif ($condition == 2): ?>
              <img src ="html/img/end_training_c2_1.JPG" width="800" style="margin-bottom:50px">
            <?php endif ?> 
          </li>
          <li>
            <p>When you save your prediction you will see the actual 
            <?php if ($condition == 1): ?>
              <span>price of the apartment.</span>
            <?php elseif ($condition == 2): ?>
              <span>prediction of the model.</span>
            <?php endif ?>
            </p>
            <?php if ($condition == 1): ?>
              <img src ="html/img/end_training_c1_2.JPG" width="800" style="margin-bottom:50px">
            <?php elseif ($condition == 2): ?>
              <img src ="html/img/end_training_c2_2.JPG" width="800" style="margin-bottom:50px">
            <?php endif ?> 
          </li>
          <li>
            <p>Click the <i>"Next"</i> button below, to proceed at the next apartment</p>
          </li>
        </ul>
      </div>
    </div>
</div>

