<?php

function getContragentsInfo() {
	$data = getMoreDB("SELECT * FROM tbl_contragents ORDER BY id DESC");

	$contragent = array();

	foreach($data as $result) {
		$balance = '';
		$inBalance = '';
		$outBalance = '';
		$incomeInfo = array();
		$outcomeInfo = array();
		$contragentId = $result['id'];

		$incomeQuery = getMoreDB("SELECT * FROM tbl_income WHERE contragentId = '$contragentId'");

		if(is_array($incomeQuery)) {
			foreach ($incomeQuery as $income) {
				$inBalance += $income['amount'];
				$incomeInfo[] = ['type' => $income['type'], 'amount' => $income['amount'], 'note' => $income['note'], 'date' => $income['date']];
			}
		}

		

		$outcomeQuery = getMoreDB("SELECT * FROM tbl_outcome WHERE contragentId = '$contragentId'");

		if(is_array($outcomeQuery)) {
			foreach ($outcomeQuery as $outcome) {
				$outBalance += $outcome['amount'];
				$outcomeInfo[] = ['consultantId' => $outcome['consultantId'], 'year' => $outcome['year'], 'catalogue' => $outcome['catalogue'], 'ordernum' => $outcome['ordernum'], 'amount' => $outcome['amount']];
			}
		}

		$fullname = $result['name']." ".$result['surname'];

		$balance = $outBalance - $inBalance;
		$balanceFormat = number_format($balance, 2, '.', ' ' );
		$totalBalance += $balance;
			
		$contragent[] = ['id' => $result['id'], 'name' => $result['name'], 'surname' => $result['surname'], 'fullname' => $fullname, 'page' => $result['page'], 'phone' => $result['phone'], 'email' => $result['email'], 'balance' => $balance, 'balanceFormat' => $balanceFormat, 'incomeInfo' => $incomeInfo, 'outcomeInfo' => $outcomeInfo];
	}
	
	$totalBalanceFormat = number_format($totalBalance, 2, '.', ' ' );
	$contragent['total'] = $totalBalance;
	$contragent['totalFormat'] = $totalBalanceFormat;
	
	return $contragent;
}

function getOneContragentInfo($contragentId) {
	$result = getOneDB("SELECT * FROM tbl_contragents WHERE id = '$contragentId'");

	$contragent = array();

	$balance = '';
	$inBalance = '';
	$outBalance = '';
	$incomeInfo = array();
	$outcomeInfo = array();
	$contragentId = $result['id'];

	$incomeQuery = getMoreDB("SELECT * FROM tbl_income WHERE contragentId = '$contragentId' ORDER BY date DESC");

	if(is_array($incomeQuery)) {
		foreach ($incomeQuery as $income) {
			$incomeId = $income['id'];	
			$productIncome = getMoreDB("SELECT * FROM tbl_product_move WHERE actionId = '$incomeId' AND type = 1");
			$productInfo = '';
			if (is_array($productIncome)) {
				foreach($productIncome as $productIn) {
					$productId = $productIn['productId'];
					$productData = getOneDB("SELECT * FROM tbl_products WHERE id = '$productId'");
					
					$priceFormat = number_format($productIn['price'], 2, '.', ' ' );
					$subtotal = $productIn['quontity']*$productIn['price'];
					$subtotalFormat = number_format($subtotal, 2, '.', ' ' );
					
					$productInfo[] = ['id' => $productData['id'], 'code' => $productData['code'], 'name' => $productData['name'], 'type' => $productIn['type'], 'price' => $productIn['price'], 'priceFormat' => $priceFormat, 'quontity' => $productIn['quontity'], 'subtotal' => $subtotal, 'subtotalFormat' => $subtotalFormat, 'date' => $productIn['date']];
					
				}
			}
			
		
			$amountFormat = number_format( $income['amount'], 2, '.', ' ' );

			$inBalance += $income['amount'];
			$incomeInfo[] = ['type' => $income['type'], 'amount' => $income['amount'], 'amountFormat' => $amountFormat, 'note' => $income['note'], 'date' => $income['date'], 'productInfo' => $productInfo];
		}
	}



	$outcomeQuery = getMoreDB("SELECT * FROM tbl_outcome WHERE contragentId = '$contragentId' ORDER BY date DESC");

	if(is_array($outcomeQuery)) {
		foreach ($outcomeQuery as $outcome) {
			$outcomeId = $outcome['id'];	
			$outBalance += $outcome['amount'];
			$productOutcome = getMoreDB("SELECT * FROM tbl_product_move WHERE actionId = '$outcomeId' AND type = 2");
			
			$productInfoOut = '';
			if (is_array($productOutcome)) {
				foreach($productOutcome as $productOut) {
					$productId = $productOut['productId'];
					$productData = getOneDB("SELECT * FROM tbl_products WHERE id = '$productId'");

					$priceFormat = number_format($productOut['price'], 2, '.', ' ' );
					$subtotal = $productOut['quontity']*$productOut['price'];
					$subtotalFormat = number_format($subtotal, 2, '.', ' ' );

					$productInfoOut[] = ['id' => $productData['id'], 'code' => $productData['code'], 'name' => $productData['name'], 'type' => $productOut['type'], 'price' => $productOut['price'], 'priceFormat' => $priceFormat, 'quontity' => $productOut['quontity'], 'subtotal' => $subtotal, 'subtotalFormat' => $subtotalFormat, 'date' => $productOut['date']];
				}
			}
			
			$consultantId = $outcome['consultantId'];
			
			if($consultantId == 0) {
				$consultantNumber = '';
				$consultant = 'Սեփական Պատվեր';
			} else {
				$consultantInfo = getOneDB("SELECT * FROM tbl_consultants WHERE id = '$consultantId'");
				$consultantNumber = $consultantInfo['number'];
				$consultant = $consultantInfo['name'].' '.$consultantInfo['surname'];
			}
			
			$amountFormat = number_format( $outcome['amount'], 2, '.', ' ' );
			
			$outcomeInfo[] = ['type' =>  $outcome['type'], 'consultantNumber' => $consultantNumber, 'consultant' => $consultant, 'year' => $outcome['year'], 'catalogue' => $outcome['catalogue'], 'ordernum' => $outcome['ordernum'], 'amount' => $outcome['amount'], 'amountFormat' => $amountFormat, 'date' => $outcome['date'], 'productInfo' => $productInfoOut];
		}
	}

	$fullname = $result['name']." ".$result['surname'];

	$balance = $outBalance - $inBalance;

	$totalBalance += $balance;
	$totalBalanceFormat = number_format( $totalBalance, 2, '.', ' ' );
	
	$contragent = ['id' => $result['id'], 'name' => $result['name'], 'surname' => $result['surname'], 'fullname' => $fullname, 'page' => $result['page'], 'phone' => $result['phone'], 'email' => $result['email'], 'balance' => $balance, 'incomeInfo' => $incomeInfo, 'outcomeInfo' => $outcomeInfo];
	
	
	$contragent['total'] = $totalBalance;
	$contragent['totalFormat'] = $totalBalanceFormat;
	
	return $contragent;
}

function dateReport($fromDate, $toDate, $reportType) {
	$fromDateTime = strtotime($fromDate);
	$toDateTime = strtotime($toDate);

	$incomeQuery = getMoreDB("SELECT * FROM tbl_income ORDER BY id DESC");

	$inProductBalance = 0;
	$inProductBalanceOff = 0;
	
	foreach ($incomeQuery as $income) {
		$incomeDate = $income['date'];
		$inActionDate = $income['actionDate'];
		$incomeDateTime = strtotime($inActionDate);
		$contragentId = $income['contragentId'];
		$incomeId = $income['id'];
		$productInfo = '';
				
		if($incomeDate == $inActionDate) {
			$inDateClass = '';
		} else {
			$inDateClass = 'text-danger';
		}
		
		$contragent = getOneDB("SELECT * FROM tbl_contragents WHERE id = '$contragentId'");

		if($incomeDateTime >= $fromDateTime && $incomeDateTime <= $toDateTime) {
			$amountFormat = number_format( $income['amount'], 2, '.', ' ' );
			
			if($income['type'] == 1) {
				$inType = 'Գումարի մուտք';
				$contragentName = $contragent['name'];
				$contragentSurname = $contragent['surname'];
				$contragentPhone = $contragent['phone'];
				$contragentEmail = $contragent['email'];
				$contragentPage = $contragent['page'];
				
				$inAmountBalance += $income['amount'];
			} else if($income['type'] == 2) {
				$inType = 'Ապրանքի մուտք';
				$contragentName = $contragent['name'];
				$contragentSurname = $contragent['surname'];
				$contragentPhone = $contragent['phone'];
				$contragentEmail = $contragent['email'];
				$contragentPage = $contragent['page'];
				
				$inProductBalance += $income['amount'];
				
			} else if ($income['type'] == 3) {
				$inType = 'Ապրանքի մուտք';
				$contragentName = 'Պահեստ';
				$contragentSurname = '';
				$contragentPhone = '';
				$contragentEmail = '';
				$contragentPage = '-';
				
				$inProductBalanceOff += $income['amount'];
			}
				
			$productIncome = getMoreDB("SELECT * FROM tbl_product_move WHERE actionId = '$incomeId' AND type = 1 OR actionId = '$incomeId' AND type = 3");

			if (is_array($productIncome)) {
				foreach($productIncome as $productIn) {
					$productId = $productIn['productId'];
					$productData = getOneDB("SELECT * FROM tbl_products WHERE id = '$productId'");

					$priceFormat = number_format($productIn['price'], 2, '.', ' ' );
					$subtotal = $productIn['quontity']*$productIn['price'];
					$subtotalFormat = number_format($subtotal, 2, '.', ' ' );

					$productInfo[] = ['id' => $productData['id'], 'code' => $productData['code'], 'name' => $productData['name'], 'type' => $productIn['type'], 'price' => $productIn['price'], 'priceFormat' => $priceFormat, 'quontity' => $productIn['quontity'], 'subtotal' => $subtotal, 'subtotalFormat' => $subtotalFormat, 'date' => $productIn['date']];

				}
			}
			
			$incomeInfo[] = ['typeId' => $income['type'], 'type' => $inType, 'page' => $contragentPage, 'name' => $contragentName, 'surname' => $contragentSurname, 'phone' => $contragentPhone, 'email' => $contragentEmail, 'amount' => $income['amount'], 'amountFormat' => $amountFormat, 'date' =>  $income['date'], 'actionDate' =>  $inActionDate, 'dateClass' =>  $inDateClass, 'productInfo' =>  $productInfo];
		}
	}
	
	$inAmountBalanceFormat = number_format( $inAmountBalance, 2, '.', ' ' );
	$inProductBalanceFormat = number_format( $inProductBalance, 2, '.', ' ' );
	$inProductBalanceOffFormat = number_format( $inProductBalanceOff, 2, '.', ' ' );
	
	$incomeInfo['amountBalance'] = $inAmountBalance;
	$incomeInfo['amountBalanceFormat'] = $inAmountBalanceFormat;
	$incomeInfo['productBalance'] = $inProductBalance;
	$incomeInfo['productBalanceFormat'] = $inProductBalanceFormat;
	$incomeInfo['productBalanceOff'] = $inProductBalanceOff;
	$incomeInfo['productBalanceOffFormat'] = $inProductBalanceOffFormat;
	
	
	$outcomeQuery = getMoreDB("SELECT * FROM tbl_outcome ORDER BY id DESC");

	foreach ($outcomeQuery as $outcome) {
		$outcomeDate = $outcome['date'];
		$outActionDate = $outcome['actionDate'];
		$outcomeDateTime = strtotime($outActionDate);
		$contragentId = $outcome['contragentId'];
		$consultantId = $outcome['consultantId'];
		$outcomeId = $outcome['id'];
		$productInfo = '';
		
		if($outcomeDate == $outActionDate) {
			$outDateClass = '';
		} else {
			$outDateClass = 'text-danger';
		}
		
		$contragent = getOneDB("SELECT * FROM tbl_contragents WHERE id = '$contragentId'");

		if($outcomeDateTime >= $fromDateTime && $outcomeDateTime <= $toDateTime) {
			$amountFormat = number_format( $outcome['amount'], 2, '.', ' ' );

			if($outcome['type'] == 1) {
				$outType = 'Պատվերի ելք';
				$contragentName = $contragent['name'];
				$contragentSurname = $contragent['surname'];
				$contragentPhone = $contragent['phone'];
				$contragentEmail = $contragent['email'];
				$contragentPage = $contragent['page'];
				
				$outOrderBalance += $outcome['amount'];
			} else if ($outcome['type'] == 2) {
				$outType = 'Ապրանքի ելք';
				$contragentName = $contragent['name'];
				$contragentSurname = $contragent['surname'];
				$contragentPhone = $contragent['phone'];
				$contragentEmail = $contragent['email'];
				$contragentPage = $contragent['page'];
				
				$outProductBalance += $outcome['amount'];
			} else if ($outcome['type'] == 3) {
				$outType = 'Ապրանքի դուրսգրում';
				$contragentName = 'Պահեստ';
				$contragentSurname = '';
				$contragentPhone = '';
				$contragentEmail = '';
				$contragentPage = '-';
				
				$outProductBalance = $outcome['amount'];
			}
			
			$productOutcome = getMoreDB("SELECT * FROM tbl_product_move WHERE actionId = '$outcomeId' AND type = 2 OR actionId = '$outcomeId' AND type = 4");

			if (is_array($productOutcome)) {
				foreach($productOutcome as $productOut) {
					$productId = $productOut['productId'];
					$productData = getOneDB("SELECT * FROM tbl_products WHERE id = '$productId'");

					$priceFormat = number_format($productOut['price'], 2, '.', ' ' );
					$subtotal = $productOut['quontity']*$productOut['price'];
					$subtotalFormat = number_format($subtotal, 2, '.', ' ' );

					$productInfo[] = ['id' => $productData['id'], 'code' => $productData['code'], 'name' => $productData['name'], 'type' => $productOut['type'], 'price' => $productOut['price'], 'priceFormat' => $priceFormat, 'quontity' => $productOut['quontity'], 'subtotal' => $subtotal, 'subtotalFormat' => $subtotalFormat, 'date' => $productOut['date']];

				}
			}
		
			
			$outcomeInfo[] = ['typeId' => $outcome['type'], 'type' => $outType, 'page' => $contragentPage, 'name' => $contragentName, 'surname' => $contragentSurname, 'phone' => $contragentPhone, 'email' => $contragentEmail, 'amount' => $outcome['amount'], 'amountFormat' => $amountFormat, 'year' =>  $outcome['year'], 'catalogue' =>  $outcome['catalogue'], 'ordernum' =>  $outcome['ordernum'], 'date' =>  $outcome['date'], 'actionDate' =>  $outActionDate, 'dateClass' =>  $outDateClass, 'productInfo' =>  $productInfo];
		}
	}
	
	$outOrderBalanceFormat = number_format( $outOrderBalance, 2, '.', ' ' );
	$outProductBalanceFormat = number_format( $outProductBalance, 2, '.', ' ' );
	
	$outcomeInfo['orderBalance'] = $outOrderBalance;
	$outcomeInfo['orderBalanceFormat'] = $outOrderBalanceFormat;
	$outcomeInfo['productBalance'] = $outProductBalance;
	$outcomeInfo['productBalanceFormat'] = $outProductBalanceFormat;

	$dateInfo = ['incomeInfo' => $incomeInfo, 'outcomeInfo' => $outcomeInfo];

	return $dateInfo;
}

function logActivityEdit($data) {
	$actionType = $data['type'];
	$userId = $data['userId'];
	$actionId = $data['actionId'];
	$actionName = $data['name'];
	$actionDate = date('Y-m-d');
	
	$logActivity = query("INSERT INTO tbl_activity(actionType, userId, actionId, actionName, actionDate) VALUES ('$actionType', '$userId', '$actionId', '$actionName', '$actionDate')");
	
	return $logActivity;
}

function logActivity($data) {
	$tableName = $data['table'];
	$actionType = $data['type'];
	$userId = $data['userId'];
	$actionName = $data['name'];
	$actionDate = date('Y-m-d');
	
	$last = getOneDB("SELECT * FROM $tableName ORDER BY id DESC LIMIT 1");
	$actionId = $last['id'];
	
	$logActivity = query("INSERT INTO tbl_activity(actionType, userId, actionId, actionName, actionDate) VALUES ('$actionType', '$userId', '$actionId', '$actionName', '$actionDate')");
	
	return $logActivity;
}

function dump($data) {
    echo "<div class='fordump'><pre>";
    print_r($data);
    echo "</pre></div>";
}

function apiResponse($url, $data = array()) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $response_json = curl_exec($ch); 
    curl_close($ch);
    $response=json_decode($response_json, true);
    
    return $response;
}

function dateTimestamp ($date) {
    $dateExp = explode(' ', $date);
    $day = $dateExp[0];
    $month = $dateExp[1];
    $year = $dateExp[2];
    
    $timeExp = explode(':', $dateExp[3]);
    
    $hour = $timeExp[0];
    $minute = $timeExp[1];
    $seconds = mktime($hour, $minute, 0, $month, $day, $year);
    
    return $seconds;
}

function finishdateArray($startdate, $duration, $fullYearStatus) {
    $expdate = explode("-", $startdate);
    $startday =  $expdate[2];
    $startmonth = $expdate[1];
    $startyear = $expdate[0];
    
    $finishyear = $startyear + $duration;
    
    if ($fullYearStatus == 1) {
        $finishmonth = $startmonth;
        $finishday = $startday;
    } else {
        if($startday == 1) {
            $finishmonth = sprintf("%02d", $startmonth - 1);
           if($startmonth == 4 || $startmonth == 6 || $startmonth == 9 || $startmonth == 11) {
                $finishday = 30;
            } else if($startmonth == 1 || $startmonth == 3 || $startmonth == 5 || $startmonth == 7 || $startmonth == 8 || $startmonth == 10 || $startmonth == 12) {
                $finishday = 31;
           } else if($startmonth == 2) {
                $finishday = 28;
           }
        } else {
            $finishday = sprintf("%02d", $startday - 1);
            $finishmonth = $startmonth;
        }
    }
    $finishdate = $finishyear."-".$finishmonth."-".$finishday;
    $finishdateString = dateTostring($finishdate);
    
    return array('finishdate' => $finishdate, 'finishdateString' => $finishdateString, 'finishyear' => $finishyear);
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

function customerfullGroup($groupId, $company, $firstname, $lastname) {
    if ($groupId == 1) {
        $groupName = "ՖԱ";
        $companyGroup = $firstname.' '.$lastname;
        $customerName = $firstname.' '.$lastname;
    } else if ($groupId == 2) {
        $groupName = "ԱՁ";
        $companyGroup = $groupName.' '.$firstname.' '.$lastname;
        $customerName = $groupName.' '.$firstname.' '.$lastname;
    } else if ($groupId == 3) {
        $groupName = "ՍՊԸ";
        $companyGroup = "&laquo;".$company."&raquo; ".$groupName."";
        $customerName = $firstname.' '.$lastname;
    } else if ($groupId == 4) {
        $groupName = "ԲԲԸ";
        $companyGroup = "&laquo;".$company."&raquo; ".$groupName."";
        $customerName = $firstname.' '.$lastname;
    } else if ($groupId == 5) {
        $groupName = "ՓԲԸ";
        $companyGroup = "&laquo;".$company."&raquo; ".$groupName."";
        $customerName = $firstname.' '.$lastname;
    } else if ($groupId == 6) {
        $groupName = "ԱԿ";
        $companyGroup = "&laquo;".$company."&raquo; ".$groupName."";
        $customerName = $firstname.' '.$lastname;
    } else if ($groupId == 7) {
        $groupName = "ԳՄՀԿ";
        $companyGroup = "&laquo;".$company."&raquo; ".$groupName."";
        $customerName = $firstname.' '.$lastname;
    } else if ($groupId == 8) {
        $groupName = "ՀԿ";
        $companyGroup = "&laquo;".$company."&raquo; ".$groupName."";
        $customerName = $firstname.' '.$lastname;
    } else if ($groupId == 9) {
        $groupName = "ՊՈԱԿ";
        $companyGroup = "&laquo;".$company."&raquo; ".$groupName."";
        $customerName = $firstname.' '.$lastname;
    } else if ($groupId == 10) {
        $groupName = "գյուղական համայնքի համայնքապետարան";
        $companyGroup = "&laquo;".$company."&raquo; ".$groupName."";
        $customerName = $firstname.' '.$lastname;
    } else if ($groupId == 11) {
        $groupName = "Մշակութային հիմնադրամ";
        $companyGroup = "&laquo;".$company."&raquo; ".$groupName."";
        $customerName = $firstname.' '.$lastname;
    } else if ($groupId == 12) {
        $groupName = "Համայնքային կառավարչական հիմնարկ";
        $companyGroup = "&laquo;".$company."&raquo; ".$groupName."";
        $customerName = $firstname.' '.$lastname;
    } else if ($groupId == 13) {
        $groupName = "գյուղի գյուղապետարանի աշխատակազմ";
        $companyGroup = "&laquo;".$company."&raquo; ".$groupName."";
        $customerName = $firstname.' '.$lastname;
    } else if ($groupId == 14) {
        $groupName = "ՀՈԱԿ";
        $companyGroup = "&laquo;".$company."&raquo; ".$groupName."";
        $customerName = $firstname.' '.$lastname;
    }  else {
        $groupName = "undefined";
        $companyGroup = "undefined";
        $customerName = "undefined";
    } 
    
    $group = array($groupName, $companyGroup, $customerName);
    return $group;
}

function customersimpleGroup($groupId) {
    if ($groupId == 1) {
        $groupName = "ՖԱ";
    } else if ($groupId == 2) {
        $groupName = "ԱՁ";
    } else if ($groupId == 3) {
        $groupName = "ՍՊԸ";
    } else if ($groupId == 4) {
        $groupName = "ԲԲԸ";
    } else if ($groupId == 5) {
        $groupName = "ՓԲԸ";
    } else if ($groupId == 6) {
        $groupName = "ԱԿ";
    } else if ($groupId == 7) {
        $groupName = "ԳՄՀԿ";
    } else if ($groupId == 8) {
        $groupName = "ՀԿ";
    } else if ($groupId == 9) {
        $groupName = "ՊՈԱԿ";
    } else if ($groupId == 10) {
        $groupName = "գյուղական համայնքի համայնքապետարան";
    } else if ($groupId == 11) {
        $groupName = "Մշակութային հիմնադրամ";
    } else if ($groupId == 12) {
        $groupName = "Համայնքային կառավարչական հիմնարկ";
    } else if ($groupId == 13) {
        $groupName = "գյուղի գյուղապետարանի աշխատակազմ";
    } else if ($groupId == 14) {
        $groupName = "ՀՈԱԿ";
    }  else {
        $groupName = "undefined";
    } 

    return $groupName;
}

?>