<div class="row top-100">
    <div class="col">
        <h1>Instructions</h1>
        <div class="line"></div>
        <div id="Instructions">
            <div id="InstructionText" class="col-12">
                <p>Thank you for participating in our study!<br><b>Please read the following instructions carefully.</b></p>
                <p>
                For this study, we use a dataset of apartments for rent in a city of France. 
                Every apartment has the following information:
                <ul>
                    <li>Photo: The photo aims to give information about the condition and the aesthetics of the accommodation.</li>
                    <li>Type: 3</li>
                    <li>Square meters: the size of the apartment in square meters.</li>
                    <li>Rooms: the total number of rooms, including bedrooms, living room, office ect.</li>
                    <li>Bathrooms: the total number of bathrooms.</li>
                    <li>Furnished:  if the accommodation is furnished or not.</li>
                    <li>Floor: in which floor is the apartment.</li>
                    <li>Short description: Keywords extracted by the descriptions of the apartments at the website. The keywords are: close to transport, close to green space, close to shops, close to historic center, close to university, equipped, renovated or recent or refurbished, cellar, balcony or terrace, parking or garage, shared apartment. </li>
                </ul>
                <?php if ($condition != 1): ?>
                    Based on this dataset, we created an algorithm that can predict the price of the accommodation based on its features (type, square meters, rooms, bathrooms, furnished, floor). 
                    Note that the algorithm can underestimate, overestimate or give a prediction very close to the actual price of the accommodation.
                <?php endif ?>
                </p>
                <div class="mb-5">
                    <p>Our experiment consists of three phases:</p>
                    <ul>
                    <?php if ($condition == 1): ?>
                                <li><b>Phase 1:</b> The goal of the Phase 1 is to be familiar with the rental market. To do this, you will see 20 apartments with their features and the corresponding prices. We ask you to read carefully all this information so that you will be able to estimate carefully in the next phases. This phase is about 7 minutes long.</li>
                                <li><b>Phase 2:</b> Your goal is to estimate the price of 20 apartments given their features and your knowledge of the rental marke (based on Phase 1). This Phase is about 6 minutes long.</li>
                                <li><b>Phase 3:</b> You first have to estimate the price of 20 apartments given their features and your knowledge of the rental market (similar to Phase2). Once you saved the price, the system will provide the actual price of this apartment. You then have to indicate how <b>surprising</b> is this actual price (based on your knowledge of the rental market). By surprising, we mean that you find this price unexpectingly high or low. This phase is about 7 minutes long.</li>
                    <?php elseif ($condition == 2): ?>
                                <li><b>Phase 1:</b> The goal of the Phase 1 is to be familiar with the algorithm's predictions about rental prices. To do this, you will see 20 apartments with their features and the corresponding price prediction of the algorithm. We ask you to read carefully all this information so that you will be able to estimate carefully the price prediction of apartments in Phase 2 (and phase 3). This phase is about 7 minutes long.</li>
                                <li><b>Phase 2:</b> Your goal is to estimate the price prediction of 20 apartments given their features and your knowledge about the algorithm's predictions (based on Phase 1). This Phase is about 6 minutes long.</li>
                                <li><b>Phase 3:</b> You first have to estimate the price prediction of 20 apartments given their features and your knowledge about the algorithm's predictions (similar to Phase2). Once you saved your prediction, the system will provide the actual prediction of the algorithm for this apartment. You then have to indicate how <b>surprising</b> is this prediction (based on your knowledge about the algorithm's predictions). By surprising, we mean that you find this price unexpectingly high or low. This phase is about 7 minutes long.</li>
                    <?php elseif ($condition == 3): ?>
                                <li><b>Phase 1:</b> The goal of the Phase 1 is to be familiar with the rental market. To do this, you will see 20 apartments with their features and the corresponding prices. We ask you to read carefully all this information so that you will be able to estimate carefully in the next phases. This phase is about 7 minutes long.</li>
                                <li><b>Phase 2:</b> Your goal is to estimate the price of 20 apartments given their features and your knowledge of the rental market (based on Phase 1). This Phase is about 6 minutes long</li>
                                <li><b>Phase 3:</b> You first have to estimate  the price of 20 apartments given their features and your knowledge of the rental market (similar to Phase2). Once you saved the price, the system will provide <u>the prediction of the algorithm</u> for this apartment. You then have to indicate how <b>surprising</b> is this prediction (based on your knowledge about the rental market). By surprising, we mean that you find this price unexpectingly high or low. This phase is about 7 minutes long.</li>
                    <?php elseif ($condition == 4): ?>
                                <li><b>Phase 1:</b> The goal of the Phase 1 is to be familiar with the rental market in and the algorithm's predictions. To do this, you will see 20 apartments with their features and the corresponding prices in market and price predictions. We ask you to read carefully all this information so that you will be able to estimate carefully in the next phases. This phase is about 7 minutes long.</li>
                                <li><b>Phase 2:</b> Your goal is to estimate the price in the market for 20 apartments given their features and your knowledge of the rental market and the algorithm(based on Phase 1). This Phase is about 6 minutes long</li>
                                <li><b>Phase 3:</b> You first have to estimate  the price of 20 apartments given their features and your knowledge of the rental market. Once you saved the price, the system will provide <u>the prediction of the algorithm</u> for this apartment. You then have to indicate how <b>surprising</b> is this prediction (based on your knowledge about the rental market and the algorithm). By surprising, we mean that you find this price unexpectingly high or low. This phase is about 7 minutes long.</li>
                    <?php endif ?>
                    </ul>
                </div>
                <p><u>Please read carefully and answer to the following questions:</u></p>
                <div class="mb-3">
                    <p>
                        In which phase will you have to evaluate how surprising is 
                        <?php if ($condition == 1): ?>
                            <span>the actual price of the accommodation?</span>
                        <?php elseif ($condition != 1): ?>
                            <span>the prediction of the algorithm?</span>
                        <?php endif ?>
                    </p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_1_<?php echo $id;?>" value="1">
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
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_1_<?php echo $id;?>" value="5" checked>
                        <label class="form-check-label" for="phase5">
                            None of them
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <p>In which phase will you learn about 
                        <?php if ($condition == 1 || $condition == 3): ?>
                            <span>the prices in the market?</span>
                        <?php elseif ($condition == 2): ?>
                            <span>the predictions of the algorithm?</span>
                        <?php elseif ($condition == 4): ?>
                            <span>the prices in the market and the predictions of the algorithm?</span>
                        <?php endif ?>
                    </p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_2_<?php echo $id;?>" value="1">
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
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attention_check_2_<?php echo $id;?>" value="5" checked>
                        <label class="form-check-label" for="phase5">
                            None of them
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
var answer_1 = 5; 
var answer_2 = 5;


$('input:radio[name="attention_check_1_<?php echo $id;?>"]').on('click', function() {
    answer_1 = $('input[type="radio"][name="attention_check_1_<?php echo $id;?>"]:checked').val();
});


$('input:radio[name="attention_check_2_<?php echo $id;?>"]').on('click', function() {
    answer_2 = $('input[type="radio"][name="attention_check_2_<?php echo $id;?>"]:checked').val();
});

//Check their answers
$('#btn_save_<?php echo $id;?>').on('click', function(e) {
    if(answer_1 == "3" && answer_2 == "1"){
            $("#answer").text("You answered correctly, you can start the expirement.");
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