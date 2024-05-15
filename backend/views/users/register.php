<?php

include_once '../../helpers/session.php';
include_once '../corps/navbar.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../404.css">
</head>

<body class="bg-purple-300 flex flex-col min-h-screen">

    <div class="flex-grow flex items-center justify-center " style="min-height: calc(100vh - 80px);">
        <div class="bg-[#AD88C6] p-8 rounded-[50px] shadow-lg w-full max-w-lg">
            <h1 class="text-white text-2xl font-bold mb-6 text-center">Register</h1>
            <form method="post" action="/blog-php/backend/index.php" class="space-y-10">
                <input type="hidden" name="regs" value="register">
                <div class="flex space-x-1">
                    <input type="text" name="first_name" placeholder="Name" class="flex-1 p-3 h-14 text-center rounded-[50px] bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                    <input type="text" name="user_name" placeholder="Username" class="flex-1 w-6 h-14 text-center p-3 rounded-[50px] bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                </div>
                <input type="text" name="email" placeholder="Email" class="w-full p-3 h-14 text-center rounded-[50px] bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                <input type="password" name="password" placeholder="Password" class="w-full p-3 h-14 text-center rounded-[50px] bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                <input type="password" name="confirm_password" placeholder="Confirm Password" class="w-full p-3 h-14 text-center rounded-[50px] bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                <button type="submit" name="submit" class="w-full p-3 rounded-[50px] h-14 text-center bg-[#7469B6] text-white font-bold hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-600">Sign Up</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
include_once '../corps/footer.php';
?>