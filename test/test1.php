<?php
/*$str = 'This is an encoded string';
$encodedStr = base64_encode($str);
$decodedStr = base64_decode($encodedStr);
echo $encodedStr;
echo "<br>" . $decodedStr;*/

/*example on explode function*/
/*$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);
echo $pieces[0] ." ".$pieces[1] ." ".$pieces[2] ." ".$pieces[3] ." ".$pieces[4] ." ".$pieces[5] ." "."<br>" ; 
$data = "foo:*:1023:1000::/home/foo:/bin/sh";
list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $data);
echo $user ."<br>";
echo $pass ."<br>";
echo $uid."<br>";
echo $gid ."<br>";
echo $gecos ."<br>";
echo $home ."<br>";
echo $shell ."<br>"; // **/

/*$str = 'one|two|three|four|five|six';

// positive limit
print_r(explode('|', $str, 2));
echo "<br>";

// negative limit (since PHP 5.1)
print_r(explode('|', $str, -1));
*/
$file = "people.txt";
// Open the file to get existing content
$current = file_get_contents("people.txt");
echo $current ."<br>";
// Append a new person to the file
$current .= "hi aman...\n";
echo $current;
// Write the contents back to the file
file_put_contents($file, $current);
?>