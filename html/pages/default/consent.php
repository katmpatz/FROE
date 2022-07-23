<div class="top-100 row">
    <div class="col">
      <h1>Information Notice and Informed Consent</h1>
      <div class="line"></div>
      <?php
        $warning_text='<strong>You need to scroll</strong> the page to see the remaining content.';
        include 'html/components/warning.php';
      ?>
      <div style="font-size:13px;">
        <p><b>Project title: </b> Rental price prediction</p>
        <p>
          <b>Main researcher: </b> Katerina Batziakoudi, Oleksandra Vereschak, Gilles Bailly, Baptiste Caramiaux 
        </p>
        <p>
          <b>Research location: </b>   Internet study
        </p>
        <p>
          <b>Research goal: </b>  The goal of this experiment is to study trust in AI recommendations.
        </p>
        <p>
          <!-- <b>What do we expect from you: </b>  If you agree to participate in the study, you will be shown apartments for rental and will be asked questions such as to evaluate how surprising is their price or the price prediction. The entire experiment will take approximately <?php echo $config["Prolific"]["experiment_duration"]; ?> minutes. -->
          <b>What do we expect from you: </b> If you agree to participate in the study, you will estimate prices of rental units for an undisclosed location. You will get familirized with the market and you will answer several questions about your perception of your answers and of AI recommendations. To avoid potential technical issues, we suggest using a computer with the latest Chrome version and a stable internet connection. The entire experiment will take approximately 30 minutes.
        </p>
        <p>
          <b>Your rights to withdraw from the experiment at any time: </b> Your participation in this experiment is entirely voluntary and you may stop at any time, without providing a reason and without penalty. However, in case you stop you will not be paid. 
          <!-- However, we will not be able to pay you if you do not complete the experiment. -->
        </p>
        <p>
          <b>Your rights to confidentiality and privacy: </b> All responses provided will be stored anonymously. For text responses, we ask that you do not include any personally identifiable information, such as your name or email address. Once our research project is completed, all anonymized data will be made publicly available on an open science platform.
        </p>
        <p>
          <b>Potential benefits: </b> 
          You will receive 5 euros for your participation and bonus based on your performance. In order to get paid you have to visit the lab in person.
          <!-- You will receive £<?php echo sprintf('%0.2f', $config["Prolific"]["payment"]); ?> for participating in this experiment, under the condition that you complete the experiment, do not rush through the experiment, and answer the attention check questions correctly (if any). If attention check questions are present, they will be easy if you pay attention to the experiment. -->
        </p>
        <p>
          <b>Risks and discomforts: </b> Your participation in this study does not present any foreseeable risks in participating beyond those experienced in daily life.
        </p>
        <p>
          <b>Publication: </b> This research will be published in a scientific journal or at a conference. The anonymized data will be made publicly available on an open science platform.
        </p>
        <p>
          <b>Right to ask questions: </b> Katerina Batziakoudi, kmpatziakoudi@gmail.com
        </p>
        <p>
          <b>Consent: </b> You must speak English and be 18 years of age or older to take part in this research study. By clicking on the "I agree. Start the experiment." button below, you certify that you have read and understood the above information, and that you are free to withdraw your consent or withdraw from the research at any time.
        </p>
      </div>
    </div>
</div>

<script type="text/javascript">
  // This is the event triggered to save the data entered. The event triggers when the 'next' button is pressed.
	$('body').on('next', function(e, type){
    //send a value that the expirement is completed in order to save the data
		// The if clause below ensures that this specific instance of a next button press is only triggered when the id of the element corresponds to the one being defined above.
    if (type === '<?php echo $id;?>'){
      $.ajax({
            async: false,
            type: "POST",
            url: "<?php echo $url . 'save_data.php';?>",
            data: {
                "start": 1,
                "user": "<?php echo $user_id;?>",
                "completed": 0,
            },
            success: function(data)
            { 
              console.log(data);
            }
       });
		}
	});
</script>
