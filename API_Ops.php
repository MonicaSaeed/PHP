<?php

$month =$_POST['month'];
$day = $_POST['day'];
$actors = array();

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/actors/list-born-today?month=$month&day=$day",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
		"X-RapidAPI-Key: 9bc40ad5b4mshd8ba5b1bd0c63aep148b41jsnc38c7b9da8e8",
        "Content-Type:application/json"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
if ($err) {
	echo "cURL Error #:" . $err;
}else{
	foreach(json_decode($response) as $value){
		$nconst = explode("/",$value)[2];
		curl_setopt($curl, CURLOPT_URL, "https://online-movie-database.p.rapidapi.com/actors/get-bio?nconst=$nconst");
		$response = curl_exec($curl);
		$err = curl_error($curl);
		if ($err) {
			echo "cURL Error #:" . $err;
		}else{
			$name = json_decode($response)->name;
			array_push($actors, $name);
		}
	}
}


curl_close($curl);
//array->string
echo json_encode($actors);

?>