<?php get_header(); ?>
<main>
  <div class="home">
    <h3 class="home__title">作品紹介</h3>
      <?php if( have_posts() ): ?>
        <div class="content">
        <?php while( have_posts() ): the_post(); ?>
          <div class="article">
            <h2><?php the_title(); ?></h2>
            <p><?php the_content(); ?></p>
          </div>
        <?php endwhile; ?>
        </div>
      <?php else: ?>
      <p>投稿されている記事は見つかりませんでした。</p>
      <?php endif; ?>
  </div>
</main>
<?php get_footer(); ?>