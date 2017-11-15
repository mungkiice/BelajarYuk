<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
	public function sendMessageToAll(Request $request){
		$content = array(
			"en" => 'English Message'
		);

		$fields = array(
			'app_id' => "10a86433-0f00-48f3-8e35-b1b81099969a",
			'included_segments' => array('All'),
			'data' => $request->data,
			'contents' => $content
		);

		$fields = json_encode($fields);
		print("\nJSON sent:\n");
		print($fields);

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
	public function sendMessageToUser(Request $request){
		$content = array(
			"en" => 'English Message'
		);

		$fields = array(
			'app_id' => "5eb5a37e-b458-11e3-ac11-000c2940e62c",
			'included_segments' => array('Active Users'),
			'include_player_ids' => array($request->data->receiver_id),
			'data' => $request->data,
			'contents' => $content
		);

		$fields = json_encode($fields);
		print("\nJSON sent:\n");
		print($fields);

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
}
