<?php 
// include_once '../../corps/navbar.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
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
                <h2 class="text-xl font-bold mb-4">Users</h2>
                <table class="min-w-full bg-white mt-4">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Username</th>
                            <th class="py-2 px-4 border-b">Email</th>
                            <th class="py-2 px-4 border-b">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php foreach ($users as $user): ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?php echo $user->username; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $user->email; ?></td>
                            <td class="py-2 px-4 border-b"><?php echo $user->role; ?></td>
                        </tr>
                        <?php endforeach; ?> -->
                    </tbody>
                </table>
            </main>
        </div>
    </div>
</body>
</html>