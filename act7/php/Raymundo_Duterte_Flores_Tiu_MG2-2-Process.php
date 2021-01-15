<link rel="stylesheet" href="css/style.css">
<?php

/* set the default time zone muna
 * kasi maling time ang ibibigay.
 */

date_default_timezone_set("Asia/Manila");

class Stopwatch {

   private $start_count;
   private $start_time;
   private $stop_time;
   private $duration;

  public function Start() {

    #increments start_count and check if run twice in a row
    $this->start_count++;         
    
    if($this->start_count == 2) {
      echo "<strong>Stopwatch has already started, you cannot run it twice in a row.</strong><br>"; 
    } else {
      $this->start_time = date("H:i:s"); #assigned new date to the start_time
      $this->stop_time = 0;
    }

  }

  public function Stop() {

    $this->start_count = 0;                 #reset start_count
    $this->stop_time = date("H:i:s");       #assigned new date to the stop_time

    /*
     * the stopwatch has stop, we will do an automatic 
     * computaton of duration. In my previous code, I did the computation of the 
     * duration inside getDuration() method. However, every time you
     * get the duration, you need to compute, even if you did not restart
     * the stopwatch.
     * 
     * Kaso lang, pwede ring hindi naman kukunin si duration so sayang lang diba?
     * Pero diba ganun naman talaga? Kapag inistop auto-compute na. 
     * Inisip ko lang si real-life situation. Pero anyway, correct nyo na lang ako pag-mali.
     */

    $this->computeForDuration();
  }

  public function getDuration() {
    return $this->duration;
  }

  private function computeForDuration() {

    #store the time values into an array
    $start_arr = explode(":", $this->start_time);
    $stop_arr = explode(":", $this->stop_time);
    //$stop_arr = $this->stop_time != 0 ? explode(":", $this->stop_time) : explode(":", date("H:i:s"));
        

    #create a computable time, mktime lets you do operations
    $start_mk = mktime($start_arr[0], $start_arr[1], $start_arr[2]);
    $stop_mk = mktime($stop_arr[0], $stop_arr[1], $stop_arr[2]);

    #we get the difference of the stop and start time in seconds
    $time_in_seconds = $stop_mk - $start_mk;

    /* After computing for time_in_seconds, 
     * we are going to use the secondsToDate() function to get the mktime of it.
     * We are also going to use the return value of that secondsToDate() function
     * as the value in PHP date() parameter,
     * so we will get the date in this H:i:s format and 
     * store in this->duration variable.
     */ 

    $this->duration = date("H:i:s", $this->secondsToDate($time_in_seconds));
  }

  private function secondsToDate($time_in_seconds) {
    
    # Conversion of time_in_seconds into hours, minutes and seconds.   
    $hours = floor($time_in_seconds / 3600);
    $mins = floor($time_in_seconds / 60 % 60);
    $seconds = floor($time_in_seconds % 60);

    # Once converted, we are going to create a new time in mktime function
    return mktime($hours, $mins, $seconds);
  }

}

  $sw_object = new Stopwatch(); #create an object
  
  #first run of the stopwatch
  $sw_object->Start();
  //sleep(1);
  $sw_object->Stop();
  echo "The <em>duration</em> of our stopwatch is <strong>" . $sw_object->getDuration(). "</strong><br><br>";
  
  #second run of the stopwatch
  $sw_object->Start();
  //sleep(3);
  $sw_object->Stop();
  echo "The <em>duration</em> of our stopwatch is <strong>" . $sw_object->getDuration(). "</strong><br><br>";
  
  #third run of the stopwatch
  $sw_object->Start();
  $sw_object->Stop();
  echo "The <em>duration</em> of our stopwatch is <strong>" . $sw_object->getDuration(). "</strong><br><br>";
  
  #fourth run of the stopwatch
  $sw_object->Start();
  $sw_object->Start(); #unable to run start stopwatch twice in a row 
  $sw_object->Start(); #we are now able to restart the stopwatch 
  $sw_object->Stop(); 
  echo "The <em>duration</em> of our stopwatch is <strong>" . $sw_object->getDuration(). "<br><br>";

?>