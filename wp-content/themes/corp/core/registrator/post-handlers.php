<?php

#Handler for feedbacks
if (isset($_POST['sendthisfeedback'])) {
	sendFeedback($_POST['senderemail'], $_POST['sendermessage'], $_POST['sendername'], $_POST['feedback_url']);
}

?>