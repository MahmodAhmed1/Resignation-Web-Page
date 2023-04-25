<?php

if(isset($_POST['get']))
{


	$birthday=$_POST["birthdate"];

	$birthday = strtotime($_POST['birthday']); 
    $day=date('d',$birthday);
    $month=date('m',$birthday);
    
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
			"X-RapidAPI-Key: ca267e76afmsh1914117e432dc29p1a0d65jsndf53adac502f"
		],
	]);

	$response = curl_exec($curl);

	$response=str_replace(array("[","]",",","/","name",":"),"",$response);
	$actor_ids=substr($response,9);


	$err = curl_error($curl);

	curl_close($curl);

	if ($err) 
	{
		echo "cURL Error #:" . $err;
	} 
	else 
	
	{
	
	
 
		$curl = curl_init();

		$actor_names=array("");

		foreach($actor_ids as $id)
		{
			curl_setopt_array($curl, [
				CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/actors/get-bio?nconst=$id",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => [
					"X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
					"X-RapidAPI-Key: ca267e76afmsh1914117e432dc29p1a0d65jsndf53adac502f"
				],
			]);
	
			$response = curl_exec($curl);
			$err = curl_error($curl);


			//we must extract the names of the actors form the response and push them into an array
			$start=strpos($response,'"name":');
            $end=strpos($response,',"birthDate":');
            $start=$start+7;
			$length=$end-$start;
			$name=substr($response,$start,$length);
			array_push($actor_names,$name);
			//end
	
			curl_close($curl);
	
			if ($err) 
			{
				echo "cURL Error #:" . $err;
			} 
			else 
			{
				foreach($actor_names as $name)
				{
					echo $name;

				}

				
			}

		}
		
		
	}

}


?>