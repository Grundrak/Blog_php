<?php
 include_once '../../../helpers/session.php';

$user = $_SESSION['userEdit']; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Profile</title>
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
                <h2 class="text-xl font-bold mb-4">Edit User Profile</h2>
                <form action="index.php?regs=editUser" method="POST" class="space-y-4">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <input type="text" name="user_name" placeholder="Username" value="<?php echo htmlspecialchars($user['user_name']); ?>" class="w-full p-3 rounded-lg bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600" required>
                    <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($user['email']); ?>" class="w-full p-3 rounded-lg bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600" required>
                    <input type="password" name="password" placeholder="Password (leave blank to keep current)" class="w-full p-3 rounded-lg bg-gray-200 text-gray-700 focus:outline-none">
                    <input type="text" name="avatar" placeholder="Avatar URL" value="<?php echo htmlspecialchars($user['avatar']); ?>" class="w-full p-3 rounded-lg bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                    <textarea name="bio" placeholder="Bio" class="w-full p-3 rounded-lg bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600"><?php echo htmlspecialchars($user['bio']); ?></textarea>
                    <button type="submit" class="w-full p-3 rounded-lg bg-purple-700 text-white font-bold hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-600">Update User</button>
                </form>
            </main>
        </div>
    </div>
</body>

</html>