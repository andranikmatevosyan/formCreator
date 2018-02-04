<?php

function dump($data) {
    echo "<div class='fordump'><pre>";
    print_r($data);
    echo "</pre></div>";
}

function diff_dates_exp($date1, $date2) {
    $difference = strtotime($date2) - strtotime($date1);
    $year = floor($difference / (365*60*60*24));
    $mon = floor(($difference - $year * 365*60*60*24) / (30*60*60*24));
    $day = floor(($difference - $year * 365*60*60*24 - $mon*30*60*60*24)/ (60*60*24));
    $days = $year * 365 + $mon * 30 + $day; 
    if ($days < 10) {
        $daysleft = "<button class='btn statustext bg-passed text-white'>".$days."</button>";
        $daysleftclass = "btn statustext bg-passed text-white";
    } else {
        $daysleft = "<div>".$days."</div>";
        $daysleftclass = "";
    }

    return array('days' => $days, 'daysleft' => $daysleft, 'daysleftclass' => $daysleftclass);
}

function computerIP() {
    $ip_block = array('10.100.0.24', '::1');
    
    if (isset($_SERVER['HTTP_CLIENT_IP'])){
        $client_ip = $_SERVER['HTTP_CLIENT_IP'];
    } else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $client_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if(isset($_SERVER['HTTP_X_FORWARDED'])) {
        $client_ip = $_SERVER['HTTP_X_FORWARDED'];
    } else if(isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $client_ip = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if(isset($_SERVER['HTTP_FORWARDED'])) {
        $client_ip = $_SERVER['HTTP_FORWARDED'];
    } else if(isset($_SERVER['REMOTE_ADDR'])) {
        $client_ip = $_SERVER['REMOTE_ADDR'];
    }
    
    $blocked = false;
    foreach($ip_block as $ip) {
        if($client_ip == $ip) {
            $blocked = false;
            break;
        } else {
            $blocked = true;
            break;
        }
    }
    
    if($blocked == true) {
        header('Location: blocked.html');
    }
}

function is_in_array($array, $key, $key_value){
      $within_array = 'no';
      foreach( $array as $k => $v ){
        if( is_array($v) ){
            $within_array = is_in_array($v, $key, $key_value);
            if( $within_array == 'yes' ){
                break;
            }
        } else {
                if( $v == $key_value && $k == $key ){
                    $within_array = 'yes';
                    break;
                }
        }
      }
      return $within_array;
}

function max_array_value($array, $key_name) {  
      $max = '';  
      foreach($array as $key => $value) {
        $expfinishdate = explode("-", $value[$key_name]);
        $finishyear = $expfinishdate[0];
        $finishmonth = $expfinishdate[1];
        $finishday = $expfinishdate[2];
          
        if(is_numeric($finishyear)) {  
            $make_array[] = $finishyear;  
            $max = max($make_array); 
            $maxdate = $max.'-'.$finishmonth.'-'.$finishday;
        }  
        else {  
            $max = "This is not Numeric Value";  
            $maxdate = "Error";  
        }  
      }  
      return $maxdate;  
 }

function recursiveRemoveDirectory($directory) {
    foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) { 
            recursiveRemoveDirectory($file);
        } else {
            unlink($file);
        }
    }
    rmdir($directory);
}

function countFilesFolders($path) {
    $folderCount = 0;
    $fileCount = 0;

    if ($handle = opendir($path)) {
        while ($entry = readdir($handle)) {
            $isdir = is_dir($entry);
            if ($entry != "." && $entry != "..") {
                if (is_dir($entry)) {
                    echo "Folder => " . $entry . "<br>";
                    $folderCount++;
                } else {
                    echo "File   => " . $entry . "<br>";
                    $fileCount++;
                }

                echo $isdir.'<br />';
            }

        }
        echo "<br>==============<br>";
        echo "Total Folder Count : " . $folderCount . "<br>";
        echo "Total File Count : " . $fileCount;
        closedir($handle);
    }
}


function number_to_words ($x) {
     $nwords = array(  "", "մեկ", "երկու", "երեք", "չորս", "հինգ", "վեց", "յոթ", "ութ", "ինը", "տաս", "տասնմեկ", "տասներկու", "տասներեք", "տասնչորս", "տասնհինգ", "տասնվեց", "տասնյոթ", "տասնութ", "տասնինը", "քսան", 30 => "երեսուն", 40 => "քառասուն", 50 => "հիսուն", 60 => "վաթսուն", 70 => "յոթանասուն", 80 => "ութսուն", 90 => "իննսուն" );
     if(!is_numeric($x)) {
         $w = '#';
     } else if (fmod($x, 1) != 0) {
         $w = '#';
     } else { 
         
         if ($x < 0) {
             $w = 'մինուս ';
             $x = -$x;
         } else {
             $w = '';
         }
         
         if ($x < 21) {
             $w .= $nwords[$x];
         } else if ($x < 100) {
             $w .= $nwords[10 * floor($x/10)];
             $r = fmod($x, 10);
             
             if($r > 0) {
                 $w .= ' '. $nwords[$r];
             }
             
         } else if ($x < 1000) {
             $w .= $nwords[floor($x/100)] .' հարյուր';
             $r = fmod($x, 100);
             
             if($r > 0) {
                 $w .= ' '. number_to_words($r);
             }
             
         } else if ($x < 1000000) {
         	$w .= number_to_words(floor($x/1000)) .' հազար';
             $r = fmod($x, 1000);
             
             if ($r > 0) {
                 $w .= ' ';
                 
                 if($r < 100) {
                     $w .= ' ';
                 }
                 
                 $w .= number_to_words($r);
             }
         } else {
             $w .= number_to_words(floor($x/1000000)) .' միլիոն';
             $r = fmod($x, 1000000);
             
             if ($r > 0) {
                 $w .= ' ';
                 
                 if($r < 100) {
                     $word .= ' ';
                 }
                 
                 $w .= number_to_words($r);
             }
         }
     }
     return $w;
}

function dateTostring($date) {
    $expdate = explode("-", $date);
    $day =  $expdate[2];
    $month = $expdate[1];
    $year = $expdate[0];
    
    if($month == '01'){
		$monthstring = "հունվար";
	}
	else if($month == '02'){
		$monthstring = "փետրվար";
	}
    else if($month == '03'){
		$monthstring = "մարտ";
	}
    else if($month == '04'){
		$monthstring = "ապրիլ";
	}
    else if($month == '05'){
		$monthstring = "մայիս";
	}
    else if($month == '06'){
		$monthstring = "հունիս";
	}
    else if($month == '07'){
		$monthstring = "հուլիս";
	}
    else if($month == '08'){
		$monthstring = "օգոստոս";
	}
    else if($month == '09'){
		$monthstring = "սեպտեմբեր";
	}
    else if($month == '10'){
		$monthstring = "հոկտեմբեր";
	}
    else if($month == '11'){
		$monthstring = "նոյեմբեր";
	}
    else if($month == '12'){
		$monthstring = "դեկտեմբեր";
	}
	else {
        $monthstring="";
	}
    $dateRow = '&laquo;'.$day.'&raquo; '.$monthstring.' '.$year;
    
    $datestring = array('year' => $year, 'month' => $monthstring, 'day' => $day, 'full' => $dateRow);
    return $datestring;
}


?>