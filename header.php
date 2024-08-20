<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="renderer" content="webkit">
    <title><?php $this->archiveTitle([
                'category' => _t('分类 %s 下的文章'),
                'search'   => _t('包含关键字 %s 的文章'),
                'tag'      => _t('标签 %s 下的文章'),
                'author'   => _t('%s 发布的文章')
            ], '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel="icon" type="image/png" href="<?php $this->options->logoUrl(); ?>">


    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./css/bulma.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./css/my.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./css/default.min.css'); ?>">

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>

<body class="" id="main-body">

    <?php
    $is_home = $this->is('index');
    $is_mobile = false;
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $is_mobile = preg_match('/(iPhone|Android|Windows Phone)/i', $userAgent);
    $height = $is_home ? ($is_mobile ? '60vh' : '100vh') : '40vh';
    ?>
    <header id="header" style="height: <?php echo $height; ?>;">
        <nav class="navbar is-fixed-top is-mobile  is-selectedbkcolor pl-5 pr-5" id="main-navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand" style="font-size:large; font-weight:bolder; margin-right:1vh;">
                <a class="navbar-item" href="<?php $this->options->siteUrl(); ?>">
                    <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" width="32" height="32">
                    <?php $this->options->title() ?>
                </a>
                <a role="button" class="navbar-burger burger" id="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarMenu">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div id="navbarMenu" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item <?php if ($this->is('index')) : ?> is-active <?php endif; ?>" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                    <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
                    <?php while ($pages->next()) : ?>
                        <a class="navbar-item <?php if ($this->is('page', $pages->slug)) : ?> is-active <?php endif; ?>" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                    <?php endwhile; ?>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item is-flex" style="justify-content: center;">
                        <form class="is-flex" id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                            <div class="field is-flex-grow mr-2" style="margin-top:0.3rem;">
                                <div class="control">
                                    <input type="text" id="s" name="s" class="input is-primary is-transparent" placeholder="<?php _e('输入关键字搜索'); ?>" style="margin-top: 1vh;" />
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <svg id="search-icon" t="1710077329557" class="icon is-transparent" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2394" width="200" height="200">
                                        <path d="M426.666667 170.666667C285.290667 170.666667 170.666667 285.290667 170.666667 426.666667s114.624 256 256 256 256-114.624 256-256S568.042667 170.666667 426.666667 170.666667zM85.333333 426.666667c0-188.522667 152.810667-341.333333 341.333334-341.333334s341.333333 152.810667 341.333333 341.333334c0 78.869333-26.752 151.509333-71.68 209.301333l229.845333 229.866667a42.666667 42.666667 0 1 1-60.330666 60.330666L635.946667 696.32A339.861333 339.861333 0 0 1 426.666667 768c-188.522667 0-341.333333-152.810667-341.333334-341.333333z" fill="#000000" p-id="2395"></path>
                                    </svg>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </nav>



        <?php if ($this->is('index')) : ?>
            <?php $this->need('./component/textbox.php'); ?>
        <?php else : ?>
            <div class="container" style="height:60vh">

            </div>
        <?php endif; ?>


    </header>



    <div id="body">
        <div class="container">
            <div class="row">