<div class="row" style="margin-top:100px;">
    <div class="col">
        <h1>Instructions</h1>
        <div class="line"></div>
        <div id="Instructions">
            <div id="InstructionText">
                <p>Thank you for participating in our study! <b>Please read the following instructions carefully.</b></p>
                <p>Please note that:</p>
                <ul>
                <?php if ($condition == 1): ?>
                    <li>Our experiment consists of three phases:
                        <ul>
                            <li>The <b>training phase</b>, in which you will see apartments, information for them and their prices.</li>
                            <li>The <b>testing phase</b>, in which you will have to predict the price of the apartment and you will see the actual price.</li>
                            <li>The <b>main expirement</b>, in which you will have to add the price for an apartment, see a prediction for the price and evaluate how surprising is the prediction based on your training.</li>
                        </ul>
                    </li>
                <?php elseif ($condition == 2): ?>
                    <li>Our experiment consists of three phases:
                        <ul>
                            <li>The <b>training phase</b>, in which you will see apartments, information for them, their price and the prediction of the model.</li>
                            <li>The <b>testing phase</b>, in which you will have to predict the price prediction of the model and you will see the actual prediction.</li>
                            <li>The <b>main expirement</b>, in which you will have to add the price for an apartment, see a prediction for the price and evaluate how surprising is the prediction based on your training.</li>
                        </ul>
                    </li> 
                <?php endif ?>
                </ul>
                <p>If anything is unclear or if you have any question, please ask the experimenter now.</p>
                <p>Once you are ready to start the experiment, click the <i>"Next"</i> button below.</p>
            </div>
        </div>
    </div>
</div>
