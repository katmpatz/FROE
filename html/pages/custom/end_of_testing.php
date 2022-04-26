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
              <p>You first have to estimate the price of 10 apartments given their features and your knowledge of the rental market in Rennes (similar to Phase2).</p>
            <img src ="html/img/end_testing_c1_1.JPG" width="800" style="margin-bottom:50px">
            <?php elseif ($condition == 2): ?>
              <p>You first have to estimate the price prediction of 10 apartments given their features and your knowledge about the algorithm's predictions (similar to Phase2). </p>
            <img src ="html/img/end_testing_c2_1.JPG" width="800" style="margin-bottom:50px">
            <?php endif ?>
          </li>
          <li>
            <?php if ($condition == 1): ?>
              <p>Once you saved the price, the system will provide the actual price of this apartement. You then have to indicate how surprising is this actual price (based on your knowledge of the rental market in Rennes).</p>
              <img src ="html/img/end_testing_c1_2.JPG" width="800" style="margin-bottom:50px">
            <?php elseif ($condition == 2): ?>
              <p>Once you saved your prediction, the system will provide the actual prediction of the algorithm for this apartement. You then have to indicate how surprising is this prediction (based on your knowledge about the algorithm's predictions).</p>
              <img src ="html/img/end_testing_c2_2.JPG" width="800" style="margin-bottom:50px">
            <?php endif ?>
          </li>
            <p>This phase is about 5 minutes long. Click the <i>"Next"</i> button below, to proceed at the next apartment.</p>
          </li>
        </ul>
      </div>
    </div>
</div>

