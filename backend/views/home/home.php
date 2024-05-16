<link rel="stylesheet" href="../output.css" />


<main class="flex flex-col justify-center items-center">
    <section class="hero">
      <article class="hero-image w-[55vw] h-[40vh]">
        <img
          class="rounded-2xl w-[100%]"
          src="https://www.shutterstock.com/shutterstock/videos/1040794502/thumb/1.jpg?ip=x480"
          alt=""
        />
      </article>

      <article
        class="hero-blog-card w-[28%] h-[33%] absolute top-[43%] left-[35%] rounded-2xl bg-white shadow-lg"
      >
        <a class="" href=""
          ><h1 class="text-18 font-bold mt-8 mb-5 ml-14 w-[80%]">
            The Impact of Technology on the Workplace: How Technology is
            Changing
          </h1></a
        >
        <div class="flex items-center ml-14">
          <img
            class="w-6 h-6 rounded-full"
            src="https://i.pngimg.me/thumb/f/720/5601055391875072.jpg"
            alt=""
          />
          <p class="author-name text-14 pl-4">Leonardo</p>
          <p class="date text-14 pl-4">June 10, 2022</p>
        </div>
      </article>
    </section>

    <section class="latest-articles grid grid-cols-3 gap-y-2 w-[70%] h-[100vh] mt-[24%]">
        <?php $articlesInstance = new Articles();?>
        <?php $articles = $articlesInstance->getArticles();?>
        <?php if (!empty($articles)) : ?>
            <?php $articleCount = 0; ?>
            <?php foreach ($articles as $article) : ?>
                <?php if ($articleCount >= 6) break; ?>
                <article class="card w-[90%] bg-[#D9D9D9] flex flex-col pt-5 pl-[8%]">
                    <div class="blog-image w-[90%]">
                        <img class="" src="https://www.shutterstock.com/shutterstock/videos/1040794502/thumb/1.jpg?ip=x480" alt="">
                    </div>
                    <a class="mt-5 mb-5 w-[90%]" href="">
                        <h1 class="text-16 font-bold"><?= $article['title'] ?></h1>
                    </a>
                    <div class="flex items-center">
                        <img class="w-6 h-6 rounded-full" src="https://i.pngimg.me/thumb/f/720/5601055391875072.jpg"/>
                        <p class="author-name text-14 pl-4">Leonardo</p>
                        <p class="date text-14 pl-4"><?= $article['published_date'] ?></p>
                    </div>
                </article>
                <?php $articleCount++; ?>
            <?php endforeach; ?>
        <?php else : ?>
            No articles found for this article.
        <?php endif; ?>
    </section>
</main>