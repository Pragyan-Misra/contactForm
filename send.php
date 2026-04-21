<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $to = $email; // Send to the user's email address
    $subject = "Message from $name";

    $body = "You have received a message:\n\n";
    $body .= "Name: $name\n";
    $body .= "Phone: $phone\n";
    $body .= "Message:\n$message\n";

    $headers = "From: pragyanmisra08@gmail.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        $status = "success";
        $message = "Message Sent Successfully!";
    } else {
        $status = "error";
        $message = "Failed to send message.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Status - Galaxy Contact</title>
<link rel="stylesheet" href="style.css">
<style>
    /* STATUS CARD (send.php) */
.card {
    width: 100%;
    max-width: 450px;
    padding: 35px;
    border-radius: 15px;

    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);

    border: 1px solid rgba(255,255,255,0.1);
    text-align: center;
}

/* ICON */
.icon {
    font-size: 60px;
    margin-bottom: 15px;
}

/* SUCCESS & ERROR COLORS */
.success {
    color: #4caf50;
}

.error {
    color: #ff4d4d;
}

/* HEADING */
.card h2 {
    margin-bottom: 10px;
}

/* MESSAGE TEXT */
.card p {
    margin-bottom: 20px;
    color: #ccc;
}

/* BUTTON (link styled like button) */
.btn {
    display: inline-block;
    padding: 12px 20px;
    border-radius: 8px;
    background: #fff;
    color: #000;
    font-weight: bold;
    text-decoration: none;
    transition: 0.2s;
}

/* HOVER EFFECT (subtle, no animation overload) */
.btn:hover {
    background: #ddd;
}
</style>
</head>
<body>

<div class="card">
    <?php if(isset($status) && $status == "success"): ?>
        <div class="icon success success-icon">✔</div>
        <h2>Success!</h2>
        <p><?php echo $message; ?></p>
    <?php else: ?>
        <div class="icon error error-icon">✖</div>
        <h2>Oops!</h2>
        <p><?php echo isset($message) ? $message : 'Something went wrong.'; ?></p>
    <?php endif; ?>

    <a href="index.html" class="btn">Go Back</a>
</div>

</body>
</html>
