<?php include '../../corps/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
    <link rel="stylesheet" href="../../404.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">

        <div class="flex flex-1 pt-16">
            <aside class="bg-[#7469b6] text-white w-64 p-4">
                <nav>
                    <ul>
                        <li class="mb-2"><a href="/blog-php/backend/views/admin/dashboard.php" class="hover:underline">Dashboard</a></li>
                        <li class="mb-2"><a href="/blog-php/backend/views/admin/articles/index.php" class="hover:underline">Manage Articles</a></li>
                        <li class="mb-2"><a href="/blog-php/backend/views/admin/users/index.php" class="hover:underline">View Users</a></li>
                    </ul>
                </nav>
            </aside>
            <main class="flex-1 p-4">
                <h2 class="text-xl font-bold mb-4">Create New Article</h2>
                <form method="post" action="/blog-php/backend/index.php?regs=create_article" class="space-y-4">
                    <input type="text" name="title" placeholder="Title" class="w-full p-3 rounded-lg bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                    <textarea name="content" placeholder="Content" class="w-full p-3 rounded-lg bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600"></textarea>
                    <button type="submit" class="w-full p-3 rounded-lg bg-purple-700 text-white font-bold hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-600">Create</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>