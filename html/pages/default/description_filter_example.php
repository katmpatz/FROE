<div class="row" style="margin-top:100px;">
    <div class="col">
        <h1>Instructions</h1>
        <div class="line"></div>
        <div id="Instructions">
            <div id="InstructionText">
                <p>Thank you for participating in our study! <b>Please read the following instructions carefully.</b></p>
                <p>
                For this study, we use a dataset of apartments for rent in Rennes, France. 
                <?php if ($condition == 2): ?>
                    Based on this dataset, we created an algorithm that can predict the price of an apartment based on its features (type, square meters, rooms, bathrooms, furnished, floor). 
                    Note that the algorithm can underestimate, overestimate or give a prediction very close to the actual price of the apartment.
                <?php endif ?>
                </p>
                <div class="mb-5">
                    <p>Our experiment consists of three phases:</p>
                    <ul>
                    <?php if ($condition == 1): ?>
                            <ul>
                                <li><b>Phase 1:</b> The goal of the Phase 1 is to be familiar with the rental market in Rennes. To do this, you will see 15 appartements with their features and the corresponding prices. We ask you to read carefully all these information so that you will be able to estimate carefully the rental price of appartements in Phase 2 (and phase 3). This phase is about 5 minutes long.</li>
                                <li><b>Phase 2:</b> Your goal is to estimate the price of 10 appartements given their features and your knowledge of the rental market in Rennes (based on Phase 1). This Phase is about 3 minutes long.</li>
                                <li><b>Phase 3:</b> In Phase 3, you first have to estimate the price of 10 appartements given their features and your knowledge of the rental market in Rennes (similar to Phase2). Once you saved the price, the system will provide the actual price of this appartement. You then have to indicate how surprising is this actual price (based on your knowledge of the rental market in Rennes). This phase is about 5 minutes long.</li>
                            </ul>
                    <?php elseif ($condition == 2): ?>
                            <ul>
                                <li><b>Phase 1:</b> The goal of the Phase 1 is to be familiar with the algorithm's predictions about rental prices in Rennes. To do this, you will see 15 appartements with their features and the corresponding price prediction of the algorithm. We ask you to read carefully all these information so that you will be able to estimate carefully the price prediction of appartements in Phase 2 (and phase 3). This phase is about 5 minutes long.</li>
                                <li><b>Phase 2:</b> Your goal is to estimate the price prediction of 10 appartements given their features and your knowledge about the algorithm's predictions (based on Phase 1). This Phase is about 3 minutes long.</li>
                                <li><b>Phase 3:</b> In Phase 3, you first have to estimate the price prediction of 10 appartements given their features and your knowledge about the algorithm's predictions (similar to Phase2). Once you saved your prediction, the system will provide the actual prediction of the algorithm for this appartement. You then have to indicate how surprising is this prediction (based on your knowledge about the algorithm's predictions). This phase is about 5 minutes long.</li>
                            </ul>
                    <?php endif ?>
                    </ul>
                </div>
                <p><u>Please read carefully and answer to the following questions:</u></p>
                <div class="mb-3">
                    <p>In which phase will you have to evaluate how surprising is the prediction of the algorithm?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_1_<?php echo $id;?>" value="1" checked>
                        <label class="form-check-label" for="phase1">
                            Phase 1
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_1_<?php echo $id;?>" value="2">
                        <label class="form-check-label" for="phase2">
                            Phase 2
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_1_<?php echo $id;?>" value="3">
                        <label class="form-check-label" for="phase3">
                            Phase 3
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_1_<?php echo $id;?>" value="4">
                        <label class="form-check-label" for="phase4">
                            Phase 4
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <p>In which phase will you learn about the prices in the market?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_2_<?php echo $id;?>" value="1" checked>
                        <label class="form-check-label" for="phase1">
                            Phase 1
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_2_<?php echo $id;?>" value="2">
                        <label class="form-check-label" for="phase2">
                            Phase 2
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_2_<?php echo $id;?>" value="3">
                        <label class="form-check-label" for="phase3">
                            Phase 3
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_2_<?php echo $id;?>" value="4">
                        <label class="form-check-label" for="phase4">
                            Phase 4
                        </label>
                    </div>
                    </div>
                    <div class="mb-3">
                        <button id="btn_save_<?php echo $id;?>" type="button" class="btn btn-wider btn-design" style="color:white;">Check your responses</button>
                        <span id="answer"></span>
                    </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var answer_1 = 1;
var answer_2 = 1;


$('input:radio[name="attention_check_1_<?php echo $id;?>"]').on('click', function() {
    answer_1 = $('input[type="radio"][name="attention_check_1_<?php echo $id;?>"]:checked').val();
    console.log(answer_1);
});


$('input:radio[name="attention_check_2_<?php echo $id;?>"]').on('click', function() {
    answer_2 = $('input[type="radio"][name="attention_check_2_<?php echo $id;?>"]:checked').val();
    console.log(answer_2);
});

//Check their answers
$('#btn_save_<?php echo $id;?>').on('click', function(e) {
    if(answer_1 == "3" && answer_2 == "1"){
            console.log("go");
            $("#answer").text("You answered correct, you can start the expirement.");
            $("#answer").css({'color': '#4aad81'})
            $('#btn_save_<?php echo $id;?>').hide();
            $('#btn_<?php echo $id;?>').show();
        } else {
            $("#answer").text("You answered wrong, please read again carefully.");
            $("#answer").css({'color': '#ff0044'})
        }
});

$('body').on('show', function(e, type){
  if (type === '<?php echo $id;?>'){
    $('#btn_<?php echo $id;?>').hide();
}
});


</script>