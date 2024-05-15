<?php

include_once '../../helpers/session.php';
include_once '../corps/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="../404.css">
</head>

<body class="bg-purple-300 flex flex-col min-h-screen">

    <div class="flex-grow flex items-center justify-center pt-20" style="min-height: calc(100vh - 80px);">
        <div class="bg-[#AD88C6] p-8 rounded-[50px] shadow-lg w-full max-w-lg">
            <h1 class="text-white text-2xl font-bold mb-6 text-center">Log In</h1>
            <form method="post" action="/blog-php/backend/index.php" class="space-y-10">
                <input type="hidden" name="regs" value="login">
                <input type="text" name="username" placeholder="Username or Email" class="w-full p-3 h-14 text-center rounded-[50px] bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                <input type="password" name="password" placeholder="Password" class="w-full p-3 h-14 text-center rounded-[50px] bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                <button type="submit" name="submit" class="w-full p-3 rounded-[50px] h-14 text-center bg-[#7469B6] text-white font-bold hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-600">Log In</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
include_once '../corps/footer.php';
?>