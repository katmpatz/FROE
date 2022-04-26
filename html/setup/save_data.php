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

    //variables
    //$basedir = $_SERVER['DOCUMENT_ROOT']."/FROE/html/results/";
    $count = 0;

    //-----------------------------------------------------------------//
    //GET DATA FROM REQUEST
      //take the values from the request of the main page
      $condition = $_POST["condition"];
      $step = $_POST["step"];
      $actual = $_POST["actual"];
      $answer = $_POST["answer"];
      // $savePriceTime = $_POST["savePriceTime"];
      // $requestPredictionTime = $_POST["requestPredictionTime"];
      $startTime = $_POST["startTime"];
      $endTime = $_POST["endTime"];
      $houseId = $_POST["houseId"];
      $trial = $_POST["trial"];
      $likert = $_POST["likert"];

    

    //take the value that the expirement ended from the last page
    $completed = $_POST["completed"];


    //if completed is equal to 0 it means that the request is coming from the main page and therefore there are the data related to the expirement
    if($completed == 0){

      //add the values in an array
      $data = [$trial, $houseId, $condition, $step, $actual, $answer, $startTime, $endTime, $likert];
      
      //print to check the values
      debug_to_console($data);
    }

    //-----------------------------------------------------------------//
    //TRIALS
    
    //As we don't use a database we need an extra file in order to be able to create file names based on an order
    //create a file to store the trials in order to have different files for each completed trial
    $idfile = 'trials';

    // open csv file for reading and writing
    $idf = fopen($idfile, 'a+');

    if ($idf === false) {
      die('Error opening the file ' . $idfile);
    }

    //id the trials file exist count all the lines to find the number of the trial
    if(0 != filesize($idfile)){
      while(!feof($idf)) {
        if(fgets($idf) != ""){
          $count =  $count + 1;
        }
      }
    }

    //if the experiment is completed add a line with the number of the trial to the trials file.
    //In this way the next trial will have a seperate file 
    if($completed != 0){
      fwrite($idf, "trial" . $count . "\n");
    }
    // close the file
    fclose($idf);


   //-----------------------------------------------------------------//
   
   //CREATE A NEW FILE AND SAVE THE DATA

    //create a unique file for each trial
    //declare the name of the file that you want to save the data
    $filename = "trial".$count;
    //$fileNameWithPath = "data/".$filename;

    // open csv file for writing
    $f = fopen($filename, 'a');

    // if the file is empty save the column headers
    if(0 == filesize($filename)){
      fputcsv($f, array('Trial', 'House id', 'Condition', 'Step', 'Actual', 'Answer', 'Start Time', 'End Time', 'Likert'));
    }

    if ($f === false) {
      die('Error opening the file ' . $filename);
    }

    if($completed == 0){
      //add the data at the csv
      fputcsv($f, $data);
    }

    // close the file
    fclose($f);

?>
