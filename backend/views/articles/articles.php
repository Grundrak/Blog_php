<link rel="stylesheet" href="../output.css" />


<main class="flex flex-col justify-center items-center">
    <div class="mr-[3%]">
        <input
            type="text"
            placeholder="Search..."
            class="search-bar w-[30vw] h-[8vh] rounded-md bg-[#D9D9D9] text-center"
        />
        <label for="" class="search"></label>
    </div>

    <section class="latest-articles grid grid-cols-3 gap-y-2 w-[70%] h-[100vh] mt-[24%]">
      <?php
          $articlesInstance = new Articles();
          $articles = $articlesInstance->getArticles();

          if (!empty($articles)) {
              foreach ($articles as $article) {
                  echo '<article class="card w-[90%] bg-[#D9D9D9] flex flex-col pt-5 pl-[8%]">' .
                          '<div class="blog-image w-[90%]">' .
                              '<img class="" src="https://www.shutterstock.com/shutterstock/videos/1040794502/thumb/1.jpg?ip=x480" alt="">' .
                          '</div>' .
                          '<a class="mt-5 mb-5 w-[90%]" href="">' .
                              '<h1 class="text-16 font-bold">'. $article['title'] .'</h1>' .
                          '</a>' .
                          '<div class="flex items-center">' .
                              '<img class="w-6 h-6 rounded-full" src="https://i.pngimg.me/thumb/f/720/5601055391875072.jpg"/>' .
                              '<p class="author-name text-14 pl-4">Leonardo</p>' .
                              '<p class="date text-14 pl-4">'. $article['published_date'] .'</p>' .
                          '</div>' .
                      '</article>';
              }
          } else {
              echo "No articles found for this article.";
          }
      ?>
    </section>
</main>