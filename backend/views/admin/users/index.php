<?php 
require_once '../../../helpers/session.php';
$users = $_SESSION['fetchUsers'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="../../404.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .centered {
            text-align: center;
            vertical-align: middle;
        }
        img.avatar {
            height: 50px; /* Adjust size as needed */
            width: auto;
            border-radius: 50%; /* Optional: for rounded avatars */
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <div class="flex flex-1">
            <aside class="bg-[#7469b6] text-white w-64 p-4">
                <nav>
                    <ul>
                        <li class="mb-2"><a href="/blog-php/backend/views/admin/dashboard.php" class="text-sm font-medium text-white transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 px-2 py-1 rounded-lg">Dashboard</a></li>
                        <li class="mb-2"><a href="/blog-php/backend/views/admin/articles/index.php" class="text-sm font-medium text-white transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 px-2 py-1 rounded-lg">Manage Articles</a></li>
                        <li class="mb-2"><a href="/blog-php/backend/index.php?regs=fetchUsers" class="text-sm font-medium text-white transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 px-2 py-1 rounded-lg">View Users</a></li>
                    </ul>
                </nav>
            </aside>
            <main class="flex-1 p-4">
                <h2 class="text-xl font-bold mb-4">Users</h2>
                <table class="min-w-full bg-white mt-4">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b centered">Username</th>
                            <th class="py-2 px-4 border-b centered">Email</th>
                            <th class="py-2 px-4 border-b centered">Role</th>
                            <th class="py-2 px-4 border-b centered">Avatar</th>
                            <th class="py-2 px-4 border-b centered">Bio</th>
                            <th class="py-2 px-4 border-b centered">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($users) && is_array($users) && !empty($users)): ?>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td class="py-2 px-4 border-b centered"><?php echo htmlspecialchars($user['user_name']); ?></td>
                                <td class="py-2 px-4 border-b centered"><?php echo htmlspecialchars($user['email']); ?></td>
                                <td class="py-2 px-4 border-b centered"><?php echo htmlspecialchars($user['role']); ?></td>
                                <td class="py-2 px-4 border-b centered"><img src="<?php echo htmlspecialchars($user['avatar']); ?>" alt="Avatar" class="avatar"></td>
                                <td class="py-2 px-4 border-b centered"><?php echo htmlspecialchars($user['bio']); ?></td>
                                <td class="py-2 px-4 border-b centered">
                                <a href="/blog-php/backend/index.php?regs=editUser&id=<?php echo $user['id']; ?>" class="text-blue-500 hover:underline"><i class="fas fa-edit"></i></a>
                                <a href="/blog-php/backend/index.php?regs=deleteUser&id=<?= $user['id'] ?>" onclick="return confirm('Are you sure you want to delete this user?');" class="text-red-500 hover:underline ml-2">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                          <td colspan="6" class="py-2 px-4 border-b centered">No users found.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>
</body>
</html>