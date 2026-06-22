<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

file_put_contents(
    "subscribers.txt",
    $email . PHP_EOL,
    FILE_APPEND | LOCK_EX
);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Subscription Successful</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}
:root
{
    --bg:#050505;
    --text:#f5f5f5;
    --muted:#b8b8b8;
}
body
{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:var(--bg);
    color:var(--text);
    font-family:'Inter',sans-serif;
    overflow:hidden;
}
body::before
{
    content:"";
    position:fixed;
    inset:0;
    background:
        radial-gradient(circle at top, rgba(255,255,255,.08), transparent 40%),
        linear-gradient(to bottom, rgba(0,0,0,.15), rgba(0,0,0,.95));
    z-index:-1;
}
.container
{
    max-width:650px;
    text-align:center;
    padding:3rem;
}
.success-icon
{
    font-size:4rem;
    margin-bottom:1rem;
}

h1
{
    font-family:'Cormorant Garamond',serif;
    font-size:4rem;
    font-weight:300;
    letter-spacing:4px;
    margin-bottom:1rem;
}

p
{
    color:var(--muted);
    line-height:1.9;
    margin-bottom:2rem;
}

.btn
{
    display:inline-block;
    padding:.95rem 2rem;
    border:1px solid rgba(255,255,255,.25);
    color:white;
    text-decoration:none;
    transition:.35s;
}

.btn:hover
{
    background:white;
    color:black;
}

</style>

    </head>

        <body>

            <div class="container">

                <h1>Thank You</h1>

                <p>Your subscription has been received successfully. You'll be the first to know when something new arrives.</p>

            <a href="index.html" class="btn">Return Home</a>
            
            </div>

        </body>
</html>
