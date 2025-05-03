<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/header.css">
    <?php wp_head(); ?>
</head>
<body>
  <header>
    <div class="header">
      <div class="header__content">
        <h3 class="header__title">ポートフォリオ</h3>
        <ul class="header__tags">
          <li><a class="header__link" href="/">about</a></li>
          <li><a class="header__link" href="/">お問い合わせ</a></li>
        </ul>
      </div>
      <img class="header__image" src="<?php echo get_template_directory_uri(); ?>/assets/image/header/header.jpg">
    </div>
  </header>