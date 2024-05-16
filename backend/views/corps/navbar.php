<?php 
require_once '../../helpers/session.php'; 
$flashMessages = getAndClearFlashMessages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../404.css" rel="stylesheet">
    <title>Navbar</title>
</head>
<body class="bg-gray-100">
    <nav class="fixed inset-x-0 top-0 z-30 w-full bg-[#7469B6] py-4 px-8 shadow-lg">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center gap-16">
                <a aria-current="page" class="text-sm font-medium text-white transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 px-2 py-1 rounded-lg" href="/blog-php/backend/views/home/home.php">Home</a>
                <a class="text-sm font-medium text-white transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 px-2 py-1 rounded-lg" href="/blog-php/backend/views/articles/articles.php">Blog</a>
                <a class="text-sm font-medium text-white transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 px-2 py-1 rounded-lg" href="/blog-php/backend/views/post/post.php">Post</a>
                <a class="text-sm font-medium text-white transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 px-2 py-1 rounded-lg" href="/blog-php/backend/views/contactus/contact.php">Contact Us</a>
            </div>
            <div class="flex items-center gap-7">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                    <div class="relative">
                        <img src="profil.jpeg" alt="Avatar" class="h-10 w-10 rounded-full"> 
                    </div>
                    <a href="/blog-php/backend/views/users/logout.php" class="rounded-3xl bg-[#AD88C6] px-4 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-150">Log Out</a>
                <?php else: ?>
                    <a class="hidden sm:inline-flex items-center justify-center rounded-3xl bg-white px-4 py-2 text-sm font-semibold text-[#7469B6] shadow-sm ring-1 ring-inset ring-gray-300 transition-all duration-150" href="/blog-php/backend/views/users/login.php">Sign in</a>
                    <a class="inline-flex items-center justify-center rounded-3xl bg-[#AD88C6] px-4 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-150 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600" href="/blog-php/backend/views/users/register.php">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <div class="container mx-auto mt-20">
        <?php
        foreach ($flashMessages as $type => $message) {
            echo "<div class='{$type}'>{$message}</div>";  // Display flash messages with appropriate CSS classes
        }
        ?>
    </div>
</body>
</html>