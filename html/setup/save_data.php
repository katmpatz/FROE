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
      $actual = $_POST["actual"];
      $answer = $_POST["answer"];
      $answer_min = $_POST["answer_min"];
      $answer_max = $_POST["answer_max"];
      $savePriceTime = $_POST["savePriceTime"];
      // $requestPredictionTime = $_POST["requestPredictionTime"];
      $startTime = (int) (intval($_POST["startTime"])/1000); //we divide by 1000 to get the seconds
      $endTime = (int) (intval($_POST["endTime"])/1000); //we divide by 1000 to get the seconds
      $houseId = $_POST["houseId"];
      $likert = $_POST["likert"];
      $difference_answer = 0;
      $percentage_difference_answer = 0;
      $difference_answer_abs = 0;
      $percentage_difference_answer_abs = 0;

      //additional data
      $duration = $endTime - $startTime;

      if($step == 3){
        $difference_answer = $answer - $actual;
        $percentage_difference_answer = ($answer - $actual)/$actual;
        $difference_answer_abs = abs($answer - $actual);
        $percentage_difference_answer_abs = abs(($answer - $actual)/$actual);
      }


      //add the values in an array
      $data = [$user, $trial, $houseId, $condition, $step, $actual, $answer, $answer_min, $answer_max, $startTime, $savePriceTime, $endTime, $duration, $likert, $difference_answer, $difference_answer_abs, $percentage_difference_answer, $percentage_difference_answer_abs];
      
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
        fputcsv($f, array('User', 'Trial', 'House', 'Condition', 'Phase', 'Actual', 'Answer', 'AnswerMin', 'AnswerMax','StartTime', 'SaveTime', 'EndTime', 'Duration', 'Surprise', 'Difference', 'AbsDifference', 'Percentage', 'AbsPercentage'));
      }
      if(0 == filesize($final)){
        fputcsv($fn, array('User', 'Trial', 'House', 'Condition', 'Phase', 'Actual', 'Answer', 'AnswerMin', 'AnswerMax','StartTime', 'SaveTime', 'EndTime', 'Duration', 'Surprise' ,'Difference', 'AbsDifference', 'Percentage', 'AbsPercentage'));
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
      $confident_p2 = $_POST["confident_p2"];
      $confident_p3 = $_POST["confident_p3"];
      $comments = $_POST["comments"];

      $data = [$user, $age, $gender, $familiarityRennes, $confident_p2, $confident_p3, $comments];

    //COMPLETE - save user's info when they complete the experiment
    //if the experiment is completed save the user info

      $userfile = 'results/users.csv';
      $usf = fopen($userfile, 'a+');
      if ($usf === false) {
        die('Error opening the file ' . $userfile);
      }

      // if the file is empty save the column headers
      if(0 == filesize($userfile)){
        fputcsv($usf, array('User', 'Age', 'Gender', 'FamilliarityWithRennes', 'Confident_phase2', 'Confident_phase3', 'Comments'));
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
