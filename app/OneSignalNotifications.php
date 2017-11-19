<?php

namespace App;

trait OneSignalNotifications{
	protected function sendMessageToAll($heading, $content, $data, $buttons = null){
		// $content = array(
		// 	"en" => 'English Message'
		// );

		$fields = array(
			'app_id' => "10a86433-0f00-48f3-8e35-b1b81099969a",
			'included_segments' => array('All'),
			'data' => $data,
			'contents' => $content,
			'headings' => $heading,
			'buttons' => $buttons, 
		);

		$fields = json_encode($fields);
		// print("\nJSON sent:\n");
		// print($fields);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic MTVlMzc5ODUtYzQwMC00OTFjLTkzNWYtMGM2MjE4YzBkNjgx'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);

		return $response;
	}
	protected function sendMessageToUser($receiver, $heading, $content, $data, $buttons = null){
		// $content = array(
		// 	"en" => 'English Message'
		// );

		$fields = array(
			'app_id' => "10a86433-0f00-48f3-8e35-b1b81099969a",
			'included_segments' => array('Active Users'),
			'include_player_ids' => $receiver,
			'data' => $data,
			'contents' => $content,
			'headings' => $heading,
			'buttons' => $buttons
		);
		$fields = json_encode($fields);
		// print("\nJSON sent:\n");
		// print($fields);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic MTVlMzc5ODUtYzQwMC00OTFjLTkzNWYtMGM2MjE4YzBkNjgx'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);

		return $response;
	}
	protected function addDevice($data){
		$fields = array( 
			'app_id' => "10a86433-0f00-48f3-8e35-b1b81099969a", 
			'identifier' => "ce777617da7f548fe7a9ab6febb56cf39fba6d382000c0395666288d961ee566", 
			'language' => "en", 
			'timezone' => $data['timezone'], 
			'game_version' => $data['game_version'], 
			'device_os' => $data['device_os'], 
			'device_type' => $data['device_type'], 
			'device_model' => $data['device_model'], 
			// 'tags' => array("foo" => "bar") 
		); 

		$fields = json_encode($fields); 
		// print("\nJSON sent:\n"); 
		// print($fields); 

		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/players"); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
		curl_setopt($ch, CURLOPT_HEADER, FALSE); 
		curl_setopt($ch, CURLOPT_POST, TRUE); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 

		$response = curl_exec($ch); 
		curl_close($ch); 
		return $response;
		// $return["allresponses"] = $response; 
		// $return = json_encode( $return); 

		// print("\n\nJSON received:\n"); 
		// print($return); 
		// print("\n");
	}
	protected function viewApp(){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/apps/YOUR_APP_ID");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
			'Authorization: Basic YOUR_USER_AUTH_KEY'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		// $response = json_decode($response, true);
		curl_close($ch);
		return $response;
	}
	protected function viewDevice(){
		// NOTE: Only fetches the first 300 devices.
		// Will need to add looping with offset to get all devices.
		function getDevices(){ 
			$app_id = "YOUR_ONESIGNAL_APP_ID_HERE";
			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/players?app_id=" . $app_id); 
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 
				'Authorization: Basic YOUR_ONESIGNAL_APP_AUTH_KEY_HERE')); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			$response = curl_exec($ch); 
			curl_close($ch); 
			return $response; 
		}

		$response = getDevices(); 
		$return["allresponses"] = $response; 
		$return = json_encode( $return); 
		print("\n\nJSON received:\n"); 
		print($return); 
		print("\n");
	}
	protected function editDevice(){
		$playerID = '8dee0e23-410d-4a9a-b8ce-bfe4c5257ccc';
		$fields = array( 
			'app_id' => '02b297e7-abb5-4e7e-9c2a-9ce7e2c82ff5', 
			'tags' => array('OneSignal_Example_Tag' => 'YES')
		); 
		$fields = json_encode($fields); 

		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, 'https://onesignal.com/api/v1/players/'.$playerID); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HEADER, false); 
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		$response = curl_exec($ch); 
		curl_close($ch); 

		$resultData = json_decode($response, true);
		echo $resultData;
	}
	protected function viewNotifications(){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications/YOUR_NOTIFICATION_ID?app_id=YOUR_APP_ID");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
			'Authorization: Basic AUTH_KEY'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		$return["allresponses"] = $response;
		$return = json_encode( $return);

		print("\n\nJSON received:\n");
		print($return);
		print("\n");
	}
}