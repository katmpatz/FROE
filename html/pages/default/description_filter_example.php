<div class="row" style="margin-top:100px;">
    <div class="col">
        <h1>Instructions</h1>
        <div class="line"></div>
        <div id="Instructions">
            <div id="InstructionText">
                <p>Thank you for participating in our study! <b>Please read the following instructions carefully.</b></p>
                <p>
                For this study, we created a dataset of apartments for rent in Rennes, France using the website https://www.seloger.com/. 
                Based on this dataset, we created an algorithm that can predict the price that an apartment will have based on its features (type, square meters, rooms, bathrooms, furnished, floor).
                The algorithm can underestimate, overestimate or give a prediction very close to the actual price of the apartment.
                You will have to evaluate how surprising or not is every price prediction for you.   
                </p>
                <p>Please note that:</p>
                <ul>
                <?php if ($condition == 1): ?>
                    <li>Our experiment consists of three phases:
                        <ul>
                            <li>The <b>Phase 1</b>, in which you will see apartments, information for them and their rental prices.</li>
                            <li>The <b>Phase 2</b>, in which you will have to estimate their rental price</li>
                            <li>The <b>Phase 3</b>, in which you will have to estimate their rental price, see the actual price and evaluate how surprising is this price for you.</li>
                        </ul>
                    </li>
                <?php elseif ($condition == 2): ?>
                    <li>Our experiment consists of three phases:
                        <ul>
                            <li>The <b>Phase 1</b>, in which you will see apartments, information for them and the prediction of the algorithm for their price.</li>
                            <li>The <b>Phase 2</b>, in which you will have to estimate the price that the algorithm would predict for each apartment.</li>
                            <li>The <b>Phase 3</b>, in which you will have to estimate the price that the algorithm would predict for each apartment, see the actual prediction for the price and evaluate how surprising is this prediction for you.</li>
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
