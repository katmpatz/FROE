<?php
    //display the errors that they will occur
    error_reporting(E_ALL);
    ini_set('display_errors', 1); 

    //simulate the console.log functionality
    function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);
  
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

  //As we don't use a database we need an extra file in order to be able to create file names based on an order
  //create a file to store the trials in order to have different files for each completed trial
  $idfile = 'results/trials';
  

    //variables
    $basedir = $_SERVER['DOCUMENT_ROOT']."/www/html/results/";
    
    //-----------------------------------------------------------------/
    
    //GET DATA FROM REQUEST

    //take the value that the expirement ended from the last page
    $completed = $_POST["completed"];
    $start = $_POST["start"];
    $user = $_POST["user"];


    //TRIALS - create a new entry when a user starts the experiment
    if($start == 1){

      // open csv file for reading and writing
      $idf = fopen($idfile, 'a+');

      if ($idf === false) {
        die('Error opening the file ' . $idfile);
      }


      //when a user starts add a line with the number of the trial to the trials file.
      //In this way the next trial will have a seperate file 
      fwrite($idf, "trial" . $user . "\n");

      // close the file
      fclose($idf);

 

    } else {
      //if completed is equal to 0 it means that the request is coming from the main page and therefore there are the data related to the expirement
    if($completed == 0){
      //GET DATA FROM REQUEST
      //take the values from the request of the main page
      $trial = $_POST["trial"];
      $condition = $_POST["condition"];
      $step = $_POST["step"];
      $rentalPrice = $_POST["rentalPrice"];
      $recommendation = $_POST["recommedation"];
      $answer = $_POST["answer"];
      $answer_min = $_POST["answer_min"];
      $answer_max = $_POST["answer_max"];
      $savePriceTime = (int) (intval($_POST["savePriceTime"])/1000);
      // $requestPredictionTime = $_POST["requestPredictionTime"];
      $startTime = (int) (intval($_POST["startTime"])/1000); //we divide by 1000 to get the seconds
      $endTime = (int) (intval($_POST["endTime"])/1000); //we divide by 1000 to get the seconds
      $houseId = $_POST["houseId"];
      $surprise = $_POST["surprise"];
      $confidence = $_POST["confidence"];
      $expectations = 0;
      $trust = $_POST["trust"];
      $trustSaveTime = (int) (intval($_POST["saveTrustTime"])/1000);
      $change = $_POST["change"];
      $second_estimation = $_POST["secondEstimation"];
      $second_estimation_time = (int) (intval($_POST["secondEstimationTime"])/1000);
      $yesTime =(int) (intval($_POST["yesTime"])/1000);
      $noTime = (int) (intval($_POST["noTime"])/1000);
      $finalEstimation = $_POST["finalEstimation"];
      $stars = $_POST["stars"];
      $weight_of_advice = 0;
      //additional data
      $duration = $endTime - $startTime;
      if($savePriceTime > 0){
        $reaction_time = $endTime - $savePriceTime;
      } else {
        $reaction_time = 0;
      }
      
      if($step == 3){
        $expectations = abs(($answer - $rentalPrice)/$answer*100);
        if($second_estimation > -1){
          $weight_of_advice = abs(($finalEstimation - $answer)/($recommendation - $answer));
        }
      }


      //add the values in an array
      $data = [$user, $trial, $houseId, $condition, $step, $rentalPrice, $recommendation , $answer, $answer_min, $answer_max, $startTime, $savePriceTime, $endTime, $duration, $reaction_time, $surprise, $confidence, $expectations, $trust, $trustSaveTime, $yesTime, $noTime, $change, $second_estimation, $second_estimation_time, $finalEstimation, $stars, $weight_of_advice];
      
      //print to check the values
      debug_to_console($data);

      //CREATE A NEW FILE AND SAVE THE DATA 
      //create a unique file for each trial
      //declare the name of the file that you want to save the data
      $filename = "results/participant".$user.".csv";
      $final = 'results/experiment_data.csv';

      // open csv file for writing
      $f = fopen($filename, 'a');
      $fn = fopen($final, 'a');

      // if the file is empty save the column headers
      if(0 == filesize($filename)){
        fputcsv($f, array('User', 'Trial', 'House', 'Condition', 'Phase', 'RentalPrice', 'Recommendation', 'Answer', 'AnswerMin', 'AnswerMax','StartTime', 'SaveTime', 'EndTime', 'Duration', 'Reaction Time', 'Subjective Surprise', 'Confidence', 'Expectations', 'Trust', 'Trust Save Time', 'Yes Time', 'No time', 'Change', 'Second Estimation', 'Second Estimation Time', 'Final Estimation', 'Stars', 'Weight of Advice'));
      }
      if(0 == filesize($final)){
        fputcsv($fn, array('User', 'Trial', 'House', 'Condition', 'Phase', 'RentalPrice', 'Recommendation', 'Answer', 'AnswerMin', 'AnswerMax','StartTime', 'SaveTime', 'EndTime', 'Duration', 'Reaction Time', 'Subjective Surprise', 'Confidence', 'Expectations', 'Trust', 'Trust Save Time', 'Yes Time', 'No time', 'Change', 'Second Estimation', 'Second Estimation Time', 'Final Estimation', 'Stars', 'Weight of Advice'));
      }

      if ($f === false) {
        die('Error opening the file ' . $filename);
      }

      if ($fn === false) {
        die('Error opening the file ' . $final);
      }

      //add the data at the csv
      fputcsv($f, $data);

      //add the data at the csv
      fputcsv($fn, $data);

      // close the file
      fclose($f);

      // close the file
      fclose($fn);



    } else {
      //GET DATA FROM FEEDBACK
      $user = $_POST["user"];
      $age = $_POST["age"];
      $gender = $_POST["gender"];
      $familiarityRennes = $_POST["familiarityRennes"];
      $trust = $_POST["trust"];
      $comments = $_POST["comments"];
      $totalStars = $_POST["totalStars"];
      $totalEuros = $_POST["totalEuros"];

      $data = [$user, $age, $gender, $familiarityRennes, $trust, $totalStars, $totalEuros, $comments];

    //COMPLETE - save user's info when they complete the experiment
    //if the experiment is completed save the user info

      $userfile = 'results/users.csv';
      $usf = fopen($userfile, 'a+');
      if ($usf === false) {
        die('Error opening the file ' . $userfile);
      }

      // if the file is empty save the column headers
      if(0 == filesize($userfile)){
        fputcsv($usf, array('User', 'Age', 'Gender', 'FamilliarityWithRennes', 'Trust', 'TotalStars', 'TotalEuros', 'Comments'));
      }

      //add the data at the csv
      fputcsv($usf, $data);



      // close the file
      fclose($usf);
    }

    //-----------------------------------------------------------------//


    }

    //-----------------------------------------------------------------//


?>
