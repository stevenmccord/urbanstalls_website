<?php
	add_shortcode('costs', 'getCosts');
	function getCosts($atts){
		extract(shortcode_atts(array('name' => all), $atts));
		/*
		This function gets the Google Spreadsheet in JSON format parses and outputs in HTML
		*/

		//Get the Google Spreadsheet in JSON format
		$individuals = file_get_contents("https://spreadsheets.google.com/feeds/list/0AtH8DCEL-UwBdEVDNnZGZkt6VnJmYll1WFl5MWVZcUE/od7/public/values?alt=json");

		//Decodes the JSON and allows the objects to be searched in PHP
		$obj = json_decode($individuals);

		$beachCosts = array();
		$sortedArray = array();
		$nameOnlyArray = array();
		$name = get_the_title();

		//Loops through the Entry array and output the Beach Goer, Total Costs, Deposit Paid, and Remaining Amount
		foreach($obj->feed->entry as $e){
			//number_format($number, 2, '.', '');
			$goer = $e->{'gsx$_cn6ca'}->{'$t'};
			//removes $ and - from the JSON string so that we can cast to Double
			$totalstring = (double) str_replace(array('$','-'), "", $e->{'gsx$general'}->{'$t'});
			$depositstring = (double) str_replace(array('$','-'), "", $e->{'gsx$_cpzh4'}->{'$t'});
			$remainingstring = (double) str_replace(array('$','-'), "", $e->{'gsx$_cre1l'}->{'$t'});
			$nights = $e->{'gsx$overview'}->{'$t'};
			$arriving = $e->{'gsx$_dmair'}->{'$t'};
			$leaving = $e->{'gsx$_dnp34'}->{'$t'};
			$priority = $e->{'gsx$_d180g'}->{'$t'};

			//format the double to only have 2 decimal places
			$total = number_format($totalstring, 2);
			$deposit = number_format($depositstring, 2);
			$remaining = number_format($remainingstring, 2);

			//takes care of the scenario where someone didn't pay a deposit
			if ($deposit==NULL){
				$deposit = 0;
			}

			//takes care of the coulmn headers in the spreadsheet and not display them
			if ($e->{'gsx$_cn6ca'}->{'$t'} == "Beach Goer"){
				//do nothing b/c this is just the column header
			}else if ($e->{'gsx$_cn6ca'}->{'$t'} == $name){
				//display only the name that is passed in
				$nameOnlyArray = array($goer, $total, $deposit, $remaining, $nights, $arriving, $leaving, $priority);
			}else if ($name == 'Beach Costs'){
				//add the goer object into an array
				$arraygoer = array($goer, $total, $deposit, $remaining, $nights, $arriving, $leaving, $priority);
				//push the goer object to the beachCosts multidimensional array
				array_push($beachCosts, $arraygoer);
				//push only the goer name in this array for sorting later
				array_push ($sortedArray, $goer);
				//displayContents($goer, $total, $deposit, $remaining, $nights, $arriving, $leaving);
			}
		}
		if($name=='Beach Costs'){

			//sort the array by Name
			//display all the Beach Goers costs
			array_multisort($sortedArray, SORT_ASC, $beachCosts);
			$display = tableHeaders();
			$display = $display . displayAllContents($beachCosts);
			$display = $display . "</tbody></table></div>";
		}else{
			//only displays the name passed in
			$display = displayNameContents($nameOnlyArray);
		}
		return $display;
	}

	function tableHeaders(){
		$headers = "<div class='datagrid'><table id='costTable' class='tablesorter'><thead><tr><th>Beach Bum</th><th>Total Costs</th><th>Deposit Paid</th><th>Remaining Amount</th><th># of Nights</th><th>Day of Arrival</th><th>Leaving Day</th><th>Room Priority</th></tr></thead><tbody>";
		return $headers;
	}

	function displayAllContents($beachCosts){
		foreach($beachCosts as $value){ 
			//Display the Beach Goer column
			$display = $display . '<tr><td>' . $value[0] . '</td>';
			//Display the Total Costs column
			$display = $display . '<td>$' . $value[1] . '</td>';
			//Display the Deposit Paid column
			$display = $display . '<td>$' . $value[2] . '</td>';
			//Display the Remaining Amount
			$display = $display . '<td>$' . $value[3] . '</td>';
			//Display # of Nights
			$display = $display . '<td>' . $value[4] . '</td>';
			//Display day of arrival
			$display = $display . '<td>' . $value[5] . '</td>';
			//Display day leaving
			$display = $display . '<td>' . $value[6] . '</td>';
			//Display room priority
			$display = $display . '<td>' . $value[7] . '</td>';
			$display = $display . "</tr>";
		}
		return $display;
	}

	function displayNameContents($nameOnlyArray){
			//$display = $display . '<h2>' . $nameOnlyArray[0] . '</h2>';
			//Display the Total Costs column
			$display = '<li>Total Costs: $' . $nameOnlyArray[1] . '</li>';
			//Display the Deposit Paid column
			$display = $display . '<li>Deposit Paid: $' . $nameOnlyArray[2] . '</li>';
			//Display the Remaining Amount
			$display = $display . '<li>Remaining Amount: $' . $nameOnlyArray[3] . '</li>';
			//Display # of Nights
			$display = $display . '<li># of Nights: ' . $nameOnlyArray[4] . '</li>';
			//Display day of arrival
			$display = $display . '<li>Day of Arrival: ' . $nameOnlyArray[5] . '</li>';
			//Display day leaving
			$display = $display . '<li>Leaving day: ' . $nameOnlyArray[6] . '</li>';
			//Display room priority
			$display = $display . '<li>Room Priority: ' . $nameOnlyArray[7] . '</li>';
			return $display;
	}
?>