<?php
include_once '../../../helpers/session.php';
$articles = $_SESSION['getArticles'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Articles</title>
    <link rel="stylesheet" href="../../404.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .centered {
            text-align: center;
            vertical-align: middle;
        }

        img.article-image {
            width: 100px;
            /* Adjust size as needed */
            height: auto;
            border-radius: 5px;
            /* Optional: for rounded corners */
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
                <h2 class="text-xl font-bold mb-4">Articles</h2>
                <a href="/blog-php/backend/views/admin/articles/create.php" class="bg-purple-700 text-white font-bold py-2 px-4 rounded-lg hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-600">Create New Article</a>
                <table class="min-w-full bg-white mt-4">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b centered">Title</th>
                            <th class="py-2 px-4 border-b centered">Content</th>
                            <th class="py-2 px-4 border-b centered">Image</th>
                            <th class="py-2 px-4 border-b centered">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $article) : ?>
                            <tr>
                                <td class="py-2 px-4 border-b centered"><?php echo htmlspecialchars($article['title']); ?></td>
                                <td class="py-2 px-4 border-b centered"><?php echo htmlspecialchars($article['content']); ?></td>
                                <td class="py-2 px-4 border-b centered">
                                    <img src="<?php ($article['image_path']); ?>" alt="Article Image" class="article-image">
                                </td>
                                <td class="py-2 px-4 border-b centered">
                                    <a href="/blog-php/backend/index.php?regs=fetchArticle&id=<?php echo $article['id']; ?>" class="text-blue-500 hover:underline">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="/blog-php/backend/index.php?regs=deleteArticle&id=<?= $article['id'] ?>" onclick="return confirm('Are you sure you want to delete this article?');" class="text-red-500 hover:underline ml-2">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
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