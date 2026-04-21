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
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    min-height: 100vh;
    background: #000000;
    overflow-x: hidden;
    position: relative;
    color: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
}

body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(ellipse at bottom, #ffffff 0%, transparent 50%),
        radial-gradient(ellipse at top, #ffffff 0%, transparent 50%),
        conic-gradient(from 0deg at 20% 70%, #ffffff20 0deg, transparent 90deg),
        conic-gradient(from 180deg at 80% 30%, #ffffff30 0deg, transparent 120deg);
    animation: nebulaFloat 20s ease-in-out infinite alternate;
    z-index: -2;
}

@keyframes nebulaFloat {
    0% { transform: scale(1) rotate(0deg); opacity: 0.8; }
    100% { transform: scale(1.1) rotate(2deg); opacity: 1; }
}

body::after {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(2px 2px at 20px 30px, #ffffff, transparent),
        radial-gradient(2px 2px at 40px 70px, #ffffff80, transparent),
        radial-gradient(1px 1px at 90px 40px, #ffffff, transparent),
        radial-gradient(1px 1px at 130px 80px, #ffffff60, transparent);
    background-repeat: repeat;
    background-size: 200px 100px;
    animation: starsTwinkle 3s linear infinite;
    z-index: -1;
}

@keyframes starsTwinkle {
    0%, 100% { opacity: 0.7; transform: scale(1); }
    50% { opacity: 1; transform: scale(1.2); }
}

.card {
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(20px);
    padding: 50px 40px;
    border-radius: 20px;
    text-align: center;
    color: white;
    box-shadow: 0 20px 40px rgba(0,0,0,0.5), inset 0 0 20px rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    width: 90%;
    max-width: 450px;
    animation: fadeInUp 1s ease-out;
    position: relative;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.icon {
    font-size: 80px;
    margin-bottom: 20px;
    text-shadow: 0 0 20px currentColor;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

.success { color: #ffffff; }
.success-icon { filter: hue-rotate(120deg) brightness(1.2); } /* White glow */

.error { color: #ffffff; opacity: 0.9; }
.error-icon { filter: brightness(1.5) contrast(1.2); } /* Bright white */

h2 {
    margin-bottom: 15px;
    font-size: 28px;
    text-shadow: 0 0 10px rgba(255,255,255,0.8);
}

p {
    font-size: 16px;
    margin-bottom: 30px;
    opacity: 0.9;
}

.btn {
    text-decoration: none;
    padding: 15px 30px;
    border-radius: 12px;
    background: linear-gradient(135deg, #ffffff, #f0f0f0);
    color: #000000;
    font-weight: bold;
    font-size: 16px;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
    display: inline-block;
    position: relative;
    overflow: hidden;
}

.btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: 0.5s;
}

.btn:hover::before {
    left: 100%;
}

.btn:hover {
    background: linear-gradient(135deg, #000000, #333333);
    color: #ffffff;
    box-shadow: 0 10px 30px rgba(255,255,255,0.2);
    transform: scale(1.05);
}

@media (max-width: 480px) {
    .card {
        padding: 40px 30px;
        margin: 20px;
    }
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
