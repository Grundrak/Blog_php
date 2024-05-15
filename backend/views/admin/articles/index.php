<?php
//  require_once '../../corps/navbar.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Articles</title>
<link rel="stylesheet" href="../../404.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">

        <div class="flex flex-1">
            <aside class="bg-[#7469b6] text-white w-64 p-4">
                <nav>
                    <ul>
                        <li class="mb-2"><a href="/blog-php/backend/views/admin/dashboard.php" class="text-sm font-medium text-white transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 px-2 py-1 rounded-lg">Dashboard</a></li>
                        <li class="mb-2"><a href="/blog-php/backend/views/admin/articles/index.php" class="text-sm font-medium text-white transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 px-2 py-1 rounded-lg">Manage Articles</a></li>
                        <li class="mb-2"><a href="/blog-php/backend/views/admin/users/index.php" class="text-sm font-medium text-white transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 px-2 py-1 rounded-lg">View Users</a></li>
                    </ul>
                </nav>
            </aside>
            <main class="flex-1 p-4">
                <h2 class="text-xl font-bold mb-4">Articles</h2>
                <a href="/blog-php/backend/views/admin/articles/create.php" class="bg-purple-700 text-white font-bold py-2 px-4 rounded-lg hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-600">Create New Article</a>
                <table class="min-w-full bg-white mt-4">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Title</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php foreach ($articles as $article): ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?php echo $article->title; ?></td>
                            <td class="py-2 px-4 border-b">
                                
                                <a href="/blog-php/backend/views/admin/articles/edit.php?id=<?php echo $article->id; ?>" class="text-blue-500 hover:underline">Edit</a>
                <a href="/blog-php/backend/views/admin/articles/delete.php?id=<?php echo $article->id; ?>" class="text-red-500 hover:underline ml-2">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?> -->
    </tbody>
</table>
</main>
</div>
</div>
</body>
</html>

<?php 
    // include_once '../corps/footer.php';
?>