<?php

include_once '../../helpers/session.php';
include_once '../corps/navbar.php';

$articles = $_SESSION['getArticles'];
$articleId = $_GET['id'];
?>


<link rel="stylesheet" href="../404.css">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page</title>

    <link href="../contactus/contact.css" rel="stylesheet">
</head>

<body class="flex flex-col items-center justify-center">
    <!-- Container for demo purpose -->
    <section class="container  items-center flex justify-center py-20" style="margin-left: 100px">
            <!-- Section: Design Block -->
        <div class="w-full shrink-0 grow-0 basis-auto  md:w-9/12 px-3  ">
            <div>
                <div class="  items-center  mx-auto justify-start  md:w-9/12 ">
                    <?php foreach ($articles as $article) : ?>
                    <?php if ($article['id'] == $articleId) : ?> 
                        <div class="text-center">
                            <h5 class="font-bold mb-5" style="font-size: 30px;">
                            <?= $article['title'] ?>
                            </h5>
                        </div>           

                    <div class="mb-12 flex flex-wrap justify-center ">
                    <div class="w-full shrink-0 grow-0 basis-auto  md:w-9/12">
                        <div class="relative mb-2 img-article overflow-hidden rounded-lg bg-cover bg-no-repeat shadow-lg dark:shadow-black/20"
                            data-te-ripple-init data-te-ripple-color="light">
                            <img src="../../upload/article/<?= basename($article['image_path']) ?>" class="w-full" />
                            <a href="#!">
                                <div
                                    class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100 bg-[hsla(0,0%,98.4%,.15)]">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class = " md:w-9/12  justify-center  flex flex-col mx-auto " >
                    <p class="text-left  ">
                        <?= $article['content'] ?>
                    </p>
                </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</body>
</html>

<?php 
    include_once '../corps/footer.php';
?>