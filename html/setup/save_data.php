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
    $count = 0;

    //take the values from the request of the main page
    $predectedPrice = $_POST["predictedPrice"];
    $price = $_POST["price"];
    $savePriceTime = $_POST["savePriceTime"];
    $requestPredictionTime = $_POST["requestPredictionTime"];
    $startTime = $_POST["startTime"];
    $endTime = $_POST["endTime"];
    $houseId = $_POST["houseId"];
    $try = $_POST["try"];

    //take the value that the expirement ended from the last page
    $completed = $_POST["completed"];

    if($completed == 0){
      //add the values in an array
      $data = [$predectedPrice, $price, $savePriceTime, $requestPredictionTime, $startTime, $endTime, $houseId, $try];
      
      //print to check the values
      debug_to_console($data);
    }
    

    //create a file to store the trials in order to have different files for each completed trial
    $idfile = 'trials';

    // open csv file for writing
    $idf = fopen($idfile, 'a+');

    if ($idf === false) {
      die('Error opening the file ' . $idfile);
    }

    if(0 != filesize($idfile)){
      while(!feof($idf)) {
        if(fgets($idf) != ""){
          $count =  $count + 1;
        }
      }
    }

    if($completed != 0){
      fwrite($idf, "trial" . $count . "\n");
    }
    

    // close the file
    fclose($idf);


    //declare the name of the file that you want to save the data
    $filename = "trial".$count;
    //$fileNameWithPath = "data/".$filename;

    // open csv file for writing
    $f = fopen($filename, 'a');

    // if the file is empty save the column headers
    if(0 == filesize($filename)){
      fputcsv($f, array('Predected Price', 'Price', 'Save Price Time', ' Request Prediction Time', 'Start Time', 'End Time', 'House Id', 'Order'));
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
