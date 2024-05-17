<?php
include_once '../../helpers/session.php';
include_once '../corps/navbar.php';

$userId = $_SESSION['user_id'];
$userData = $_SESSION['user'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link rel="stylesheet" href="../404.css">
</head>

<body class="bg-purple-300 flex flex-col min-h-screen">
    <div class="flex-grow flex items-center justify-center" style="min-height: calc(100vh - 80px);">
        <div class="bg-[#AD88C6] p-8 rounded-[50px] shadow-lg w-full max-w-lg">
            <h1 class="text-white text-2xl font-bold mb-6 text-center">Profile</h1>
            <div class=" w-24 h-24 flex justify-center items-center">

                <?php
                // Set default values for avatar and username
                $defaultAvatarUrl = "https://via.placeholder.com/40/7469B6/FFFFFF?text=A";
                $avatarUrl = !empty($_SESSION['user']['avatar']) ? htmlspecialchars($_SESSION['user']['avatar']) : $defaultAvatarUrl;
                ?>
                <img src="<?php echo $avatarUrl; ?>" alt="User Avatar" class="h-10 w-10 rounded-full ">
            </div>
            <form method="post" action="/blog-php/backend/index.php?regs=updateProfil" enctype="multipart/form-data" class="space-y-10">
                <input type="hidden" name="regs" value="updateProfil">
                <div class="flex space-x-1">
                    <input type="text" name="first_name" placeholder="Full Name" value="<?php echo htmlspecialchars($userData['first_name']); ?>" class="flex-1 p-3 h-14 text-center rounded-[50px] bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                    <input type="text" name="user_name" placeholder="Username" value="<?php echo htmlspecialchars($userData['user_name']); ?>" class="flex-1 p-3 h-14 text-center rounded-[50px] bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                </div>
                <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($userData['email']); ?>" class="w-full p-3 h-14 text-center rounded-[50px] bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                <input type="password" name="password" placeholder="New Password" class="w-full p-3 h-14 text-center rounded-[50px] bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                <input type="password" name="confirm_password" placeholder="Confirm New Password" class="w-full p-3 h-14 text-center rounded-[50px] bg-gray-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                <input type="file" name="avatar" class="w-full p-3 h-14 text-center rounded-[50px] bg-gray-200 text-gray-700 focus:outline-none">
                <button type="submit" name="submit" class="w-full p-3 rounded-[50px] h-14 text-center bg-[#7469B6] text-white font-bold hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-600">Update Profile</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
include_once '../corps/footer.php';
?>