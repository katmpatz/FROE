<div class="top-100 row">
    <div class="col">
      <h1>End of <b>Phase 2</b></h1>
      <div class="line"></div>
      <div class="consent" id="end-testing">
        <p>You completed the first phase of the expirement!</p>
        <p>In the next step:</p>
        <ul>
          <li>
            <?php if ($condition == 1): ?>
              <p>You will see informations for an apartment and you will have to estimate the actual price.</p>
            <img src ="html/img/end_testing_c1_1.JPG" width="800" style="margin-bottom:50px">
            <?php elseif ($condition == 2): ?>
              <p>You will see informations for an apartment and you will have to estimate the prediction of the algorithm.</p>
            <img src ="html/img/end_testing_c2_1.JPG" width="800" style="margin-bottom:50px">
            <?php endif ?>
            
          </li>
          <li>
            <?php if ($condition == 1): ?>
              <p>When you save your price you will see the actual price of the apartment.</p>
              <img src ="html/img/end_testing_c1_2.JPG" width="800" style="margin-bottom:50px">
            <?php elseif ($condition == 2): ?>
              <p>When you save your estimation you will see the actual prediction of the algorithm.</p>
              <img src ="html/img/end_testing_c2_2.JPG" width="800" style="margin-bottom:50px">
            <?php endif ?>
          </li>
          <li>
            <?php if ($condition == 1): ?>
              <p>After, you have to evaluate how surprising is the price of the apartment based on the training you had.</p>
              <img src ="html/img/end_testing_c1_3.JPG" width="800" style="margin-bottom:50px">
            <?php elseif ($condition == 2): ?>
              <p>After, you have to evaluate how surprising is the price prediction of the apartment based on the training you had.</p>
              <img src ="html/img/end_testing_c1_3.JPG" width="800" style="margin-bottom:50px">
            <?php endif ?>
          </li>
          <li>
            <p>Click the <i>"Next"</i> button below, to proceed at the next apartment</p>
          </li>
        </ul>
      </div>
    </div>
</div>

