<?php 
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>

<main class="flex flex-col justify-center items-center">
    <section class="latest-articles grid grid-cols-3 w-[70%] mt-[24%]">
  
        <?php if (!empty($articles)): ?>
            <?php foreach ($articles as $article): ?>
                <article class="card w-[90%] bg-[#D9D9D9] flex flex-col pt-5 pl-[8%]">
                    <div class="blog-image w-[90%] h-[100%]">
                        <img class="" src="https://via.placeholder.com/150" alt="">
                    </div>
                    <a class="mt-5 mb-5 w-[90%]" href="#">
                        <h1 class="text-16 font-bold"><?php echo $article['title']; ?></h1>
                    </a>
                    <div class="flex items-center">
                        <img class="w-6 h-6 rounded-full" src="https://via.placeholder.com/50" alt="">
                        <p class="author-name text-14 pl-4">Author: <?php echo $article['user_id']; ?></p>
                        <p class="date text-14 pl-4">Published: <?php echo $article['published_date']; ?></p>
                    </div>
                    <p class="text-14"><?php echo $article['content']; ?></p>
                    <div class="mt-4 flex">
                        <form method="post" action="edit_article.php" class="mr-2">
                            <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                        </form>
                        <form method="post" action="delete.php" onsubmit="return confirm('Are you sure you want to delete this article?');">
                            <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                        </form>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-20">No articles available.</p>
        <?php endif; ?>
     
    </section>
</main>

</body>
</html>

<?php 
ob_end_flush();
?>