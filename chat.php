<?php
$access_token = '2D9ta27vlNRhzGAyFTsrrkahVFo8lrVd0VEpzTGR626H2BXI7jhIdOpxo33pf9G0s8J3zIrzpA6pTOodfqQNBVduDQA4x4jmxYI57a4+PMFz/sfPwyLCtEPCUWiOmrfBSHTam/xjueQxWRvAruE/cgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data

$messageWelcome = 'ขอบคุณที่ส่งข้อความถึงเรา .. TVIClaim ยินดีบริการ เราพร้อมอยู่เคียงข้างและดูแลคุณตลอด 24 ชม. กรุณาเลือกบริการที่ท่านต้องการติดต่อ';

		$messageTopic1	= 'บริการแจ้งเคลม TVIClaim ยินดีดูแลลูกค้าและเคียงข้างตลอด 24 ชม.';
		$messageTopic2	= 'บริการแจ้งซ่อม TVIClaim ยินดีดูแลลูกค้าและเคียงข้างตลอด 24 ชม.';
$messageCallname 	= 'กรุณาระบุ ชื่อ และนามสกุล';
$messagePlatNumber 	= 'กรุณาระบุ หมายเลขทะเบียนรถ';
$messageTel 		= 'กรุณาระบุ เบอร์โทรศัพท์';
$messageLocation 	= 'กรุณาระบุ ระบุตำแหน่ง';
$messageThank	= 'ขอบคุณสำหรับข้อมูลของท่านค่ะ';

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
	

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';




			//START STEP (1)
			if($text == '1' || $text == '2')
			{
				$data = [
					'replyToken' => $replyToken,
					'messages' => array(
						
							array(

								'type' => 'text',
								'text' => replyTopic($text)

							), 
						
							array(

								'type' => 'text',
								'text' => $messageCallname

							), 							
						)
				];

			}
			
			//START STEP (2)
			else if($text == 'Thunyasit Pholprasit')
			{
				$data = [
					'replyToken' => $replyToken,
					'messages' => array(
						
							array(

								'type' => 'text',
								'text' => $messagePlatNumber

							), 
						
													
						)
				];

			}	
			//START STEP (2)
			else if($text == '4435')
			{
				$data = [
					'replyToken' => $replyToken,
					'messages' => array(
						
							array(

								'type' => 'text',
								'text' => $messageTel

							), 
						
													
						)
				];

			}				
			//START STEP (3)
			else if($text == '4435')
			{
				$data = [
					'replyToken' => $replyToken,
					'messages' => array(
						
							array(

								'type' => 'text',
								'text' => $messageTel

							), 
						
													
						)
				];

			}			
			//START STEP (3)
			else if($text == '0806160169')
			{
				$data = [
					'replyToken' => $replyToken,
					'messages' => array(
						
							array(

								'type' => 'text',
								'text' => $messageLocation

							), 
						
													
						)
				];

			}							
			else
			{
				$data = [
					'replyToken' => $replyToken,
					'messages' => array(
						
							array(

								'type' => 'text',
								'text' => $messageWelcome

							),
							array(
						
									'type' => 'template',
									'altText' => 'ท่านต้องการติดต่อ?',
									'template' =>	array(
								
										
											      'type' => 'confirm',
											      'text' => 'ท่านต้องการติดต่อ?',
											      'actions' => array(
											          array(
											            'type' => 'message',
											            'label' => '(1) แจ้งเคลม',
											            'text' => '1'
											          ),
											          array(
											            'type' => 'message',
											            'label' => '(2) แจ้งซ่อม',
											            'text' => '2'
											          )										          

											      )
										 	
										  
									)

							)
						
						)
					
				];
			}
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
		else if ($event['type'] == 'message' && $event['message']['type'] == 'location') {

			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
				$data = [
					'replyToken' => $replyToken,
					'messages' => array(
						
							array(

								'type' => 'text',
								'text' => 'ข้อมูลของคุณ Thunyasit Pholprasit คือ \nทะเบียนรถ 4435 \nเบอร์โทรศัพท์ 0806160269\nทางเราได้รับเรื่องแล้ว จะติดต่อกลับไปค่ะ ขอบคุณคะ'

							), 
						
													
						)
				];	

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';

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
function replyTopic( $message )
{



		$messageTopic1	= 'บริการแจ้งเคลม TVIClaim ยินดีดูแลลูกค้าและเคียงข้างตลอด 24 ชม.';
		$messageTopic2	= 'บริการแจ้งซ่อม TVIClaim ยินดีดูแลลูกค้าและเคียงข้างตลอด 24 ชม.';


		if( $message == '1')
		{
			return $messageTopic1;
		}
		else
		{

			return $messageTopic2;
		}

}

function replyMessage( $message )
{

		$messageCallname 	= 'กรุณาระบุ ชื่อ และนามสกุล';
		$messagePlatNumber 	= 'กรุณาระบุ หมายเลขทะเบียนรถ';
		$messageTel 		= 'กรุณาระบุ เบอร์โทรศัพท์';
		$messageLocation 	= 'กรุณาระบุ ระบุตำแหน่ง';
		$messageThank		= 'ขอบคุณสำหรับข้อมูลของท่านค่ะ';
		if( $message == 'Thunyasit Pholprasit')
		{
			return $messagePlatNumber;
		}
		else if( $message == '4435')
		{
			return $messageLocation;
		}

}

?>