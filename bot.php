<?php
$access_token = 'ReF0AR0oFYk7HmSfwtb4ekzh2I8aFrUdqKli+fyN9iFU9Az8f2jDqkawE0UMeGd/Wh+Rwhyl5x4s4rvzyOwdcT5b9LrjcQrUh6tQYkiRjOCzV/hRTR/YwzcXomtzV6vohGjblhCkvF/7pEQA8cuPIAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			
			if($text =='t')
			{

			$messages = [
				'type' => 'text',
				'text' => 'test2:'.$text2
			];	
			}
			else
			{
			$messages = [
				'type' => 'text',
				'text' => 'No Key : '.$text
			];
			}
			// Build message to reply back


			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";

$json = file_get_contents('https://api.thingspeak.com/channels/83655/feed.json?results=1');

$json_array = file_get_contents("https://api.thingspeak.com/channels/83655/feed.json?results=1");
//$json_array = iconv('UTF-16', 'UTF-8', $json_array);
$json_data=json_decode($json_array,true);
print_r($json_data);
echo $json_data['feeds']['0']['field1'];

