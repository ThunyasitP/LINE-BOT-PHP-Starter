<?php
$access_token = '2D9ta27vlNRhzGAyFTsrrkahVFo8lrVd0VEpzTGR626H2BXI7jhIdOpxo33pf9G0s8J3zIrzpA6pTOodfqQNBVduDQA4x4jmxYI57a4+PMFz/sfPwyLCtEPCUWiOmrfBSHTam/xjueQxWRvAruE/cgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data

$messageWelcome = 'ขอบคุณที่ส่งข้อความถึงเรา .. TVIClaim ยินดีบริการ เราพร้อมอยู่เคียงข้างและดูแลคุณตลอด 24 ชม. กรุณาเลือกบริการที่ท่านต้องการติดต่อ';

$dialogMessage = array(
  "type"=> "template",
  "altText"=> "this is a carousel template",
  "template"=> array(
      "type"=> "carousel",
      "columns"=> [
          array(
            "thumbnailImageUrl"=> "https=>//example.com/bot/images/item1.jpg",
            "imageBackgroundColor"=> "#FFFFFF",
            "title"=> "this is menu",
            "text"=> "description",
            "defaultAction"=> array(
                "type"=> "uri",
                "label"=> "View detail",
                "uri"=> "http=>//example.com/page/123"
            ),
            "actions"=> [
                array(
                    "type"=> "postback",
                    "label"=> "Buy",
                    "data"=> "action=buy&itemid=111"
                ),
                array(
                    "type"=> "postback",
                    "label"=> "Add to cart",
                    "data"=> "action=add&itemid=111"
                ),
                array(
                    "type"=> "uri",
                    "label"=> "View detail",
                    "uri"=> "http=>//example.com/page/111"
                )
            ]
          ),
          array(
            "thumbnailImageUrl"=> "https=>//example.com/bot/images/item2.jpg",
            "imageBackgroundColor"=> "#000000",
            "title"=> "this is menu",
            "text"=> "description",
            "defaultAction"=> array(
                "type"=> "uri",
                "label"=> "View detail",
                "uri"=> "http=>//example.com/page/222"
            ),
            "actions"=> [
                array(
                    "type"=> "postback",
                    "label"=> "Buy",
                    "data"=> "action=buy&itemid=222"
                ),
                array(
                    "type"=> "postback",
                    "label"=> "Add to cart",
                    "data"=> "action=add&itemid=222"
                ),
                array(
                    "type"=> "uri",
                    "label"=> "View detail",
                    "uri"=> "http=>//example.com/page/222"
                )
            ]
          )
      ],
      "imageAspectRatio"=> "rectangle",
      "imageSize"=> "cover"
  )
);


if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				
				
					'type' => 'text',
					'text' => $messageWelcome
			 	

			];

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

?>