<?php
    $e = 0;
for ($i= 1980; $i <= 2018; $i++){
    if ($i % 4 == 0) {
        $y = '  Leap Year';
	$e++;
    }
    else {
        $y = '';
    }
      
    echo $i;
    echo $y;
    echo '<br/>';
}
    echo 'Total number of leap years is ' . $e;
?>
