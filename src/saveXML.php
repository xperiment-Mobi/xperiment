<?php
if (isset($GLOBALS["HTTP_RAW_POST_DATA"])){
	try {
		$xml = $GLOBALS["HTTP_RAW_POST_DATA"];
		$fp = fopen("myResults.sav", "a+");
		$retries = 0;
		$max_retries = 10;
		if (!$fp) {
			// failure
			echo "success=myResults.sav may be write protected";
			}
		// keep trying to get a lock as long as possible
		do {
			if ($retries > 0) {
				usleep(rand(1, 5000));
				}
			$retries += 1;
			}
		while (!flock($fp, LOCK_EX) and $retries <= $max_retries);
		// could not get the lock, give up
		if ($retries == $max_retries) {
			// failure
			echo "success=myResults.sav is locked (must be many people saving at the same time)";
			return false;
			}
		// got the lock, write the data
		$result=fwrite($fp, $xml);
		// release the lock
		flock($fp, LOCK_UN);
		fclose($fp);
		// success
		if($result === false) {
			echo "success=myResults.sav may be write protected";	
		}
		else{
			echo "success=saved";
		}
	}
	catch(Exception $e) {
		echo "success=myResults.sav may not exist";
		}
	}
else{
	echo "success=fail";
	}
?>