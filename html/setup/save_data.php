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

    //take the values from the request
    $predectedPrice = $_POST["predictedPrice"];
    $price = $_POST["price"];
    $houseId = $_POST["houseId"];
    $try = $_POST["try"];

    //add the values in an array
    $data = [$predectedPrice, $price, $houseId, $try];
    
    //print to check the values
    debug_to_console($data);

    //declare the name of the file that you want to save the data
    $filename = 'test.csv';

    // open csv file for writing
    $f = fopen($filename, 'a');

    if ($f === false) {
      die('Error opening the file ' . $filename);
    }

    //add the data at the csv
    fputcsv($f, $data);

    // close the file
    fclose($f);

?>
