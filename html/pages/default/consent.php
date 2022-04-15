<div class="top-100 row">
    <div class="col">
      <h1>Information Notice and Informed Consent</h1>
      <div class="line"></div>
      <?php
        $warning_text='<strong>You need to scroll</strong> the page to see the remaining content.';
        include 'html/components/warning.php';
      ?>
      <div class="consent">
        <p><b>Project title: </b> Rental price prediction</p>
        <p>
          <b>Main researcher: </b> [anonymized: researcher identification].
        </p>
        <p>
          <b>IRB approval: </b> [anonymized: IRB details].
        </p>
        <p>
          <b>Research location: </b>  Internet study on the Prolific platform
        </p>
        <p>
          <b>Research goal: </b> The goal of this study is to demonstrate an example.
        </p>
        <p>
          <!-- <b>What do we expect from you: </b>  If you agree to participate in the study, you will be shown apartments for rental and will be asked questions such as to evaluate how surprising is their price or the price prediction. The entire experiment will take approximately <?php echo $config["Prolific"]["experiment_duration"]; ?> minutes. -->
          <b>What do we expect from you: </b>  If you agree to participate in the study, you will be shown apartments for rental and will be asked questions such as to evaluate how surprising is their price or the price prediction. The entire experiment will take approximately 13 minutes.
        </p>
        <p>
          <b>Your rights to withdraw from the experiment at any time: </b> Your participation in this experiment is entirely voluntary and you may stop at any time, without providing a reason and without penalty. However, we will not be able to pay you if you do not complete the experiment.
        </p>
        <p>
          <b>Your rights to confidentiality and privacy: </b> Your participation in this research is confidential. All responses provided will be stored anonymously. For text responses, we ask you not to include any identifying information such as your name or email address. We will check your text responses to confirm that no identifiable information is provided. After our research project is completed, all anonymized data will be made publicly available on an open science platform.
        </p>
        <p>
          Note that you will not be able to withdraw your response once you confirm your participation at the end of this experiment by clicking on the completion link.
        </p>
        <p>
          <b>Potential benefits: </b> 
          You will not receive any payment for participating in this expirement.
          <!-- You will receive £<?php echo sprintf('%0.2f', $config["Prolific"]["payment"]); ?> for participating in this experiment, under the condition that you complete the experiment, do not rush through the experiment, and answer the attention check questions correctly (if any). If attention check questions are present, they will be easy if you pay attention to the experiment. -->
        </p>
        <p>
          <b>Risks and discomforts: </b> Your participation in this study does not present any foreseeable risks in participating beyond those experienced in daily life.
        </p>
        <p>
          <b>Publication: </b> This research will be published in a scientific journal or at a conference. The anonymized data will be made publicly available on an open science platform.
        </p>
        <p>
          <b>Right to ask questions: </b> [anonymized: contact].
        </p>
        <p>
          <b>Consent: </b> You must speak English and be 18 years of age or older to take part in this research study. By clicking on the "I agree. Start the experiment." button below, you certify that you have read and understood the above information, and that you are free to withdraw your consent or withdraw from the research at any time.
        </p>
      </div>
    </div>
</div>
