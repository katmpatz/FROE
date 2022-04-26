<?php

global $experiment_data_id, $houses, $house, $training_houses, $tr_house,  $data_for_csv, $price, $con, $pointer;


function loadConfig(){
  global $config, $pages, $page_order, $houses, $apartment_order;
  // we temporarily change working directories
  $cwd = getcwd();
  chdir(dirname(__FILE__) . '/config/');

  if(!isset($config)){
    $configFileContents = file_get_contents("config.json");
    $config = json_decode($configFileContents, true);
  }

  if(!isset($pages)){
    $pageFileContents = file_get_contents("page_definitions.json");
    $pages = json_decode($pageFileContents, true);
  }

  if(!isset($page_order)){
    $orderFileContents = file_get_contents("experiment_structure.json");
    $page_order = json_decode($orderFileContents, true);
  }

  if(!isset($houses)){
    $housesFileContents = file_get_contents("houses.json");
    $houses = json_decode($housesFileContents, true);
  }

  if(!isset($apartment_order)){
    $orderApFileContents = file_get_contents("order.json");
    $apartment_order = json_decode($orderApFileContents, true);
  }

  chdir($cwd);
}

//simulate the console.log functionality
function debug_to_console($data) {
  $output = $data;
  if (is_array($output))
      $output = implode(',', $output);

  echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


//we don't use it
function checkForTimedOutFiles(){
  global $config;
  // check if there are abandoned files from participants who timed out
  if (isset($config["stimuli_order_files"]["time_out"])){
    $cwd = getcwd();
    $new_dir = dirname(__FILE__) . '/' . $config["stimuli_order_files"]["directory_name"] . '/in_use/';
    var_dump($new_dir);
    chdir($new_dir);
    $time_out = $config["stimuli_order_files"]["time_out"] * 60 * 60;
    $now = time();
    // go through all files in the in_use folder and check when they were last modified.
    $files = glob('*.csv');
    // make sure there is at least 1
    if (count($files) > 0){
      for ($i=0; $i < count($files); $i++) { 
        $ts = filemtime($files[$i]);
        if ($now - $ts > $time_out){
          rename($files[$i] , '../unused/'.  $files[$i]);
        }
      }
    }
    // set the old working directory back
    chdir($cwd);
  }
}

//we don't use it
function select_random_file($dir)
{
    // we temporarily change working directories
    $cwd = getcwd();
    chdir($dir);
    // get all files in the given directory
    $files = glob('*.csv');
    // make sure there is at least 1
    if (!(count($files) > 0)) {
      checkForTimedOutFiles();
      // now check again
      $files = glob('*.csv');
    }
    if (count($files) > 0){
      $index = array_rand($files);
      $file = $files[$index];

      // move the file to indicate it is in use
      rename($file , '../in_use/'.  $file);
      // touch file so that it's changed date is updated and we know when it was moved
      touch('../in_use/' . $file);
      // set the old working directory back
      chdir($cwd);
      return $file;
    } else {
      chdir($cwd);
      // return null if there is no file
      return null;
    }

}


// function randomAssignment() {
//   // this function is called for between designs where a participant just needs to be randomly assigned to a condition combining a set of factor levels
//   global $config, $order_value, $factor1;

//   // check if $order_value was already set through a GET parameter
//   if (isset($order_value)){
//     // don't do anything; a certain condition was requested
//   } else {
//     if (function_exists('random_int')){
//       $order_value = random_int(0, $config["num_conditions"] - 1);
//     } else {
//       $order_value = rand(0,$config["num_conditions"] - 1);
//     }
//   }

//   switch ($order_value) {
//     case 0:
//         $factor1 = $config["factors"][0]["levels"][0];
//         break;
//     case 1:
//         $factor1 = $config["factors"][0]["levels"][1];
//         break;
//   }
// }


//we don't use it
function randomAssignmentFromFiles($basedir = 'html/setup') {
  // this function is called for between designs where a participant just needs to be randomly assigned to a condition combining a set of factor levels
  global $config, $stimuli_order, $factor1;
  $basedir = rtrim($basedir, '/') . '/';
  $directory = $basedir . $config["stimuli_order_files"]["directory_name"];
  $file = select_random_file($directory . "/unused");
  if (is_null($file)){
    $order_value = null;
    $factor1 = null;
  } else {
    $factor1 = $file; // we store the name of the file in the factor variable. That way it will be saved as the 'condition' assigned to the participant.
    $stimuli_order = explode(',', rtrim(file_get_contents($directory . '/in_use/' . $file)));

  }
}


//function that ensure that we will have exactly the same order of houses in the two conditions
function mirrorConditions($basedir = 'results'){
  $count = 0;
  //open the condition file
  //As we don't use a database we need an extra file in order to be able to create file names based on an order
  //create a file to store the trials in order to have different files for each completed trial
  $idfile = $basedir . '/trials';

  // open csv file for reading and writing
    $idf = fopen($idfile, 'r');

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

  //if the trials are more than the total number of houses, start from the beginning
  if($count >= 200){
    $count = $count - 200;
  }

  // close the file
  fclose($idf);
  //if the total number of lines is an even number move the pointer and change condition
  if($count == 0 || $count % 2 == 0){
    $con = 1;
    $pointer = $count - 1 - intdiv($count, 2); //-1 because we increase +1 before the first trial at the generatePages() and - count/2 to increase every two trials
  //else if the total number of lines is an odd number keep the same position of the pointer as the previous condition and change condition
  } else {
    $con = 2;
    $pointer = $count - 2 - intdiv($count, 2); //-2 because we want to keep the same order of appartments as the previous condition which was $count-1
  }

  $con = 1;
  
  return array($con, $pointer, $count);

}

function roundPrediction($pred) {
  $round_pred = round($pred); //rounded without decimals
  $last_digit = $round_pred % 10; //the last digit of the prediction
  $lower_pred = $round_pred - $last_digit; //prediction rounded to the lower decadal, for example if the prediction is 37.34 the lower_pred will be 30
  //if the last digit is closer to 0
  if($last_digit < 2.5) {
    $round_pred = $lower_pred;
  }
  //if the last digit is closer to 5
  elseif($last_digit < 7.5 ) {
    $round_pred = $lower_pred + 5;
  }
  //if the last digit is closer to 10
  else {
    $round_pred = $lower_pred + 10;
  }
  return $round_pred;

}



function generatePages() {
  // generate all pages based on the data indicated in the json files
  global $page_order, $pages, $page_ids, $config, $start_page, $save_page , $condition, $count; 
  global $experiment_data_id, $houses, $house, $pointer, $trial, $prediction, $apartment_order, $order, $user;

  list($condition,$pointer, $count) = mirrorConditions();

  $page_number = 0;
  $house = $houses['houses'];
  $user = $apartment_order['users'];
  $order = $user[$count]["order"];
  //$order = [10,5,47,25,62,1,2,6,7,104,167,4,199,28,43];
  //shuffle($house);
  //variable which counts the repeats of the expirement in order to display the right info
  //$experiment_data_id = $pointer;
  debug_to_console($count);
  $experiment_data_id = 0;
  $index = 0;
  $trial = -1;
  $trial_test = -1;
  $prediction = 0;
  

  if (isset($start_page)){
    $start_page = max(0, $start_page-1);
  }
  for ($i=0; $i < count($page_order); $i++) {
      $rep = 1;
      if(isset($pages[$page_order[$i]]["repetitions"])){
        $rep = $pages[$page_order[$i]]["repetitions"];
      }
      for($j=0; $j < $rep; $j++){
         $page_number++;
         $page_id = $page_order[$i];
         $id = $page_order[$i] . "_" . $page_number;
         $button = $pages[$page_id]["button_text"];
         $page_ids[] = '#' . $id;
         if($pages[$page_id]["start_page"] && !isset($start_page)){
            $start_page = $page_number-1;
         }
         //if the page is part of the training increase the $training_data_id in order to display the right house details
         if($pages[$page_id]["id"] == "training" || $pages[$page_id]["id"] == "training2" || $pages[$page_id]["id"] == "training3" || $pages[$page_id]["id"] == "training4" || $pages[$page_id]["id"] == "testing" || $pages[$page_id]["id"] == "main_stimulus"){
          debug_to_console($order[$index]);
          $experiment_data_id = $order[$index];
          $index++;
          $prediction = roundPrediction($house[$experiment_data_id]["prediction"]);
         }
         if($pages[$page_id]["id"] == "main_stimulus"){
          $trial++;
         }
        if($pages[$page_id]["id"] == "testing"){
          $trial_test++;
        }
        
         // check if the current page needs to be repeated (multiple trials); 
         // can never happen on the last page (which just thanks the participant and gives the link to receive payment)
         if ($i < count($page_order) - 1){
           // if we do repetitions, then the next page has the same id and just the page number increases
           if($rep > 1 && $j < $rep - 1){
              $next = $page_order[$i] . "_" . ($page_number + 1);
           } else {
              // otherwise the next page will be the next listed in page_order
              $next = $page_order[$i+1]. "_" . ($page_number + 1);
            }
         } else {
          // the last page doesn't have a next page
          $next = ' ';
         }
         // the url where to find the php file for the page
         $page = $pages[$page_id]["page_path"];
         // whether the button should be initially disabled
         $disabled = $pages[$page_id]["disabled"];
         // the variable $save_page indicates which page_id triggers the saving of the final log file. 
         // Only one page can be indicated for this purpose, and it should be at the very end of the experiment, that is, once no more data is to be collected from the participant. 
         if(isset($pages[$page_order[$i]]["save_page"])){
            $save_page = $pages[$page_order[$i]]["save_page"];
          }
          

         // by calling the statement below a page will be generated and inserted in the main file (content.php) using the variables set above
         // there should rarely be any need to modify the page_skeleton; exceptions exist of course, for example, if you want to include a component on all pages
         include "html/page_skeleton.php";

      }
     }

     // Outside the loop: generate the attention check failed page in case the participant fails the check
       if (array_key_exists("attention_check_failed", $pages)){
         $id = "attention_check_failed";
         $button = $pages[$id]["button_text"];
         $page_number = -1;
         $page_ids[] = '#' . $id;
         $next = null;
         $page = $pages[$id]["page_path"];
         include "html/page_skeleton.php";
       }

}


  ?>