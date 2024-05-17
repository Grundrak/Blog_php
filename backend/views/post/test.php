<?php
include_once '../../helpers/session.php';
include_once '../corps/navbar.php';
$articles = $_SESSION['getArticles'];
?>

<link rel="stylesheet" href="../404.css">


<main class="flex flex-col justify-center items-center">
    <a href="/blog-php/backend/index.php?regs=getArticles">View Articles</a>
    <div class="mr-[3%]">
        <input
            type="text"
            placeholder="Search..."
            class="search-bar w-[30vw] h-[8vh] rounded-md bg-[#D9D9D9] text-center"
        />
        <label for="" class="search"></label>
    </div>

    <section class="latest-articles grid grid-cols-3 w-[70%] h-[auto] mb-10" style="margin-top: 40px; row-gap: 30px;">
        <?php if (!empty($articles)) : ?>
          <?php 
          usort($articles, function($a, $b) {
              return strtotime($b['published_date']) - strtotime($a['published_date']);
          });
          ?>
            <?php foreach ($articles as $article) : ?>
                <article class="card w-[90%] bg-[#D9D9D9] flex flex-col pt-5 pl-[8%]" style="height: 45vh">
                    <div class="blog-image w-[90%]">
                        <img class="" src="https://www.shutterstock.com/shutterstock/videos/1040794502/thumb/1.jpg?ip=x480" alt="">
                    </div>
                    <a id="<?= $article['id'] ?>" class="mt-5 mb-5 w-[90%]" href="test.php?id=<?= $article['id'] ?>">
                        <h1 class="text-16 font-bold"><?= $article['title'] ?></h1>
                    </a>
                    <div class="flex items-center">
                        <img class="w-6 h-6 rounded-full" src="https://i.pngimg.me/thumb/f/720/5601055391875072.jpg"/>
                        <p class="author-name text-14 pl-4">Leonardo</p>
                        <p class="date text-14 pl-4"><?= $article['published_date'] ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php else : ?>
            No articles found for this article.
        <?php endif; ?>
    </section>
</main>

<?php
include_once '../corps/footer.php';
?>

