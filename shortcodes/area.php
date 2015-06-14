	<?php
	add_shortcode('bednumber', 'getBedNumberByName');		
	function getBedNumberByName($atts){
		/*
		This function gets the Google Spreadsheet in JSON format parses and outputs in HTML
		*/
		extract(shortcode_atts(array('name' => ""), $atts));
		$name = get_the_title();
		//Get the Google Spreadsheet in JSON format
		$individuals = file_get_contents("https://spreadsheets.google.com/feeds/list/0AtH8DCEL-UwBdEVDNnZGZkt6VnJmYll1WFl5MWVZcUE/od7/public/values?alt=json");
		
		//Decodes the JSON and allows the objects to be searched in PHP
		$obj = json_decode($individuals);
		//Loops through the Entry array and output the Beach Goer, Total Costs, Deposit Paid, and Remaining Amount
		foreach($obj->feed->entry as $e){
			//get the area that the beach goer is staying
			$area = $e->{'gsx$_cssly'}->{'$t'};
			//get the goers from the SS
			$goer = $e->{'gsx$_cn6ca'}->{'$t'};
			if ($e->{'gsx$_cn6ca'}->{'$t'} == $name){
				//display only the name that is passed in
				//$room = '<p>' . $area . '<p/>';
				$room = $area;
			}
		}
		return $room;
	}

	add_shortcode('levelnumber', 'getLevelNumberByName');		
	function getLevelNumberByName($atts){
		/*
		This function gets the Google Spreadsheet in JSON format parses and outputs in HTML
		*/
		extract(shortcode_atts(array('name' => ""), $atts));
		$name = get_the_title();
		//Get the Google Spreadsheet in JSON format
		$individuals = file_get_contents("https://spreadsheets.google.com/feeds/list/0AtH8DCEL-UwBdEVDNnZGZkt6VnJmYll1WFl5MWVZcUE/od7/public/values?alt=json");
		
		//Decodes the JSON and allows the objects to be searched in PHP
		$obj = json_decode($individuals);
		//Loops through the Entry array and output the Beach Goer, Total Costs, Deposit Paid, and Remaining Amount
		foreach($obj->feed->entry as $e){
			//get the area that the beach goer is staying
			$area = $e->{'gsx$_cssly'}->{'$t'};
			//get the goers from the SS
			$goer = $e->{'gsx$_cn6ca'}->{'$t'};
			if ($e->{'gsx$_cn6ca'}->{'$t'} == $name){
				//display only the name that is passed in
				//$room = '<p>' . $area . '<p/>';
				$level = getLevel($area);
			}
		}
		return $level;
	}

	add_shortcode('bedimage1', 'getBedImage1ByName');
	function getBedImage1ByName($atts){
		/*
		This function gets the Google Spreadsheet in JSON format parses and outputs in HTML
		*/
		extract(shortcode_atts(array('name' => ""), $atts));
		$name = get_the_title();
		//Get the Google Spreadsheet in JSON format
		$individuals = file_get_contents("https://spreadsheets.google.com/feeds/list/0AtH8DCEL-UwBdEVDNnZGZkt6VnJmYll1WFl5MWVZcUE/od7/public/values?alt=json");
		
		//Decodes the JSON and allows the objects to be searched in PHP
		$obj = json_decode($individuals);
		//Loops through the Entry array and output the Beach Goer, Total Costs, Deposit Paid, and Remaining Amount
		foreach($obj->feed->entry as $e){
			//get the area that the beach goer is staying
			$area = $e->{'gsx$_cssly'}->{'$t'};
			//get the goers from the SS
			$goer = $e->{'gsx$_cn6ca'}->{'$t'};
			if ($e->{'gsx$_cn6ca'}->{'$t'} == $name){
				//display only the name that is passed in
				$room = '<img src="' . roomDetails($area, 1) . '"/>';
			}
		}
		return $room;
	}

	add_shortcode('bedimage2', 'getBedImage2ByName');
	function getBedImage2ByName($atts){
		/*
		This function gets the Google Spreadsheet in JSON format parses and outputs in HTML
		*/
		extract(shortcode_atts(array('name' => ""), $atts));
		$name = get_the_title();
		//Get the Google Spreadsheet in JSON format
		$individuals = file_get_contents("https://spreadsheets.google.com/feeds/list/0AtH8DCEL-UwBdEVDNnZGZkt6VnJmYll1WFl5MWVZcUE/od7/public/values?alt=json");
		
		//Decodes the JSON and allows the objects to be searched in PHP
		$obj = json_decode($individuals);
		//Loops through the Entry array and output the Beach Goer, Total Costs, Deposit Paid, and Remaining Amount
		foreach($obj->feed->entry as $e){
			//get the area that the beach goer is staying
			$area = $e->{'gsx$_cssly'}->{'$t'};
			//get the goers from the SS
			$goer = $e->{'gsx$_cn6ca'}->{'$t'};
			if ($e->{'gsx$_cn6ca'}->{'$t'} == $name){
				//display only the name that is passed in
				$room = '<img src="' . roomDetails($area, 2) . '"/>';
			}
		}
		return $room;
	}

	add_shortcode('bedimage3', 'getBedImage3ByName');
	function getBedImage3ByName($atts){
		/*
		This function gets the Google Spreadsheet in JSON format parses and outputs in HTML
		*/
		extract(shortcode_atts(array('name' => ""), $atts));
		$name = get_the_title();
		//Get the Google Spreadsheet in JSON format
		$individuals = file_get_contents("https://spreadsheets.google.com/feeds/list/0AtH8DCEL-UwBdEVDNnZGZkt6VnJmYll1WFl5MWVZcUE/od7/public/values?alt=json");
		
		//Decodes the JSON and allows the objects to be searched in PHP
		$obj = json_decode($individuals);
		//Loops through the Entry array and output the Beach Goer, Total Costs, Deposit Paid, and Remaining Amount
		foreach($obj->feed->entry as $e){
			//get the area that the beach goer is staying
			$area = $e->{'gsx$_cssly'}->{'$t'};
			//get the goers from the SS
			$goer = $e->{'gsx$_cn6ca'}->{'$t'};
			if ($e->{'gsx$_cn6ca'}->{'$t'} == $name){
				//display only the name that is passed in
				$room = '<img src="' . roomDetails($area, 3) . '"/>';
			}
		}
		return $room;
	}

	add_shortcode('areaNames', 'getNamesbyArea');
	function getNamesbyArea($atts){
		/*
		This function gets the Google Spreadsheet in JSON format parses and outputs in HTML
		*/
		extract(shortcode_atts(array('area' => "all"), $atts));
		//Get the Google Spreadsheet in JSON format
		$individuals = file_get_contents("https://spreadsheets.google.com/feeds/list/0AtH8DCEL-UwBdEVDNnZGZkt6VnJmYll1WFl5MWVZcUE/od7/public/values?alt=json");
		
		//Decodes the JSON and allows the objects to be searched in PHP
		$obj = json_decode($individuals);
		//Loops through the Entry array and output the Beach Goer, Total Costs, Deposit Paid, and Remaining Amount
		$sortedArray = array();
		$beachRooms = array();
		$arraygoer = array();
		foreach($obj->feed->entry as $e){
			$ssarea = $e->{'gsx$_cssly'}->{'$t'};
			$goer = $e->{'gsx$_cn6ca'}->{'$t'};

			if ($e->{'gsx$_d5fpr'}->{'$t'} == $area){
				//display only the names in this area
				array_push ($sortedArray, $goer);
			}else if ($area == 'all' AND ($e->{'gsx$_d5fpr'}->{'$t'} != "") AND ($e->{'gsx$_d5fpr'}->{'$t'} != "Area")){
				//display all of the goers in that area
				//add the goer object into an array
				$arraygoer = array($ssarea, $goer);
				//push the goer object to the beachCosts multidimensional array
				array_push($beachRooms, $arraygoer);
				//push only the goer name in this array for sorting later
				array_push ($sortedArray, $ssarea);
				//displayContents($goer, $total, $deposit, $remaining, $nights, $arriving, $leaving);
			}
		}
		if($area=='all'){
			//sort the array by Name
			//display the Beach Goers costs
			array_multisort($sortedArray, SORT_ASC, $beachRooms);
			$roomgoers = displayAllRooms($beachRooms);
		}else{
			//only displays the name passed in
			$roomgoers = displayRoomGoers($sortedArray);
		}
		return $roomgoers;
	}

	function displayRoomGoers($sortedArray){
		$roomgoers = "<ul>";
		//var_dump($sortedArray);
		foreach($sortedArray as $value){ 
			$roomgoers = $roomgoers . '<li>' . $value . '</li>';
		}
		$roomgoers = $roomgoers . "</ul>";
		return $roomgoers;
	}

	function displayAllRooms($beachRooms){
		$roomgoers = "<table>";
		$roomgoers = $roomgoers . '<th>Area #</td>';
		$roomgoers = $roomgoers . '<th>Beach Bum</td>';

		//var_dump($sortedArray);
		foreach($beachRooms as $value){ 
			$roomgoers = $roomgoers . '<tr>';
			$roomgoers = $roomgoers . '<td>' . $value[0] . '</td>';
			$roomgoers = $roomgoers . '<td>' . $value[1] . '</td>';
			$roomgoers = $roomgoers . '</tr>';
		}
		$roomgoers = $roomgoers . "</table>";
		return $roomgoers;
	}

	function roomDetails($areaSearch, $imagenumber){
		$rooms = file_get_contents("https://spreadsheets.google.com/feeds/list/0AtH8DCEL-UwBdEVDNnZGZkt6VnJmYll1WFl5MWVZcUE/od5/public/values?alt=json");
		$obj = json_decode($rooms);
		foreach($obj->feed->entry as $e){
			$bed = $e->{'gsx$bed'}->{'$t'};

			if($imagenumber == 1){
				$image = $e->{'gsx$url1'}->{'$t'};
			}else if ($imagenumber == 2){
				$image = $e->{'gsx$url2'}->{'$t'};
			}else if ($imagenumber == 3){
				$image = $e->{'gsx$url3'}->{'$t'};
			}

			if ($bed == $areaSearch){
				//display only the area URL that is passed in
				return $image;
			}
		}
	}

	function getLevel($areaSearch){
		$rooms = file_get_contents("https://spreadsheets.google.com/feeds/list/0AtH8DCEL-UwBdEVDNnZGZkt6VnJmYll1WFl5MWVZcUE/od5/public/values?alt=json");
		$obj = json_decode($rooms);
		foreach($obj->feed->entry as $e){
			$bed = $e->{'gsx$bed'}->{'$t'};

			$level = $e->{'gsx$level'}->{'$t'};

			if ($bed == $areaSearch){
				//display only the area URL that is passed in
				return $level;
			}
		}
	}
?>