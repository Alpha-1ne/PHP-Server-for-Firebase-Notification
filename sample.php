<?php
require "notification.php";
$noti = new NotificationSender("<your_firebase_project_id>");
if($noti->sendToTopic("kuk_notification","Notification Title","Notification Body")
	echo "Firebase notification is sent."
else
	echo "Something went wrong :("	
?>
