<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="container paper">
    <div class="paper-content">

        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
            <div class="content">
                <h1 class="title is-2 has-text-centered" itemprop="name headline">
                    <a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                </h1>
                <div class="post-meta is-flex is-justify-content-space-between mb-5">
                    <div class="author-info">
                        <span class="is-size-5 has-text-grey-light">作者: </span>
                        <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author">
                            <?php $this->author(); ?>
                        </a>
                    </div>
                    <div class="time-info">
                        <span class="is-size-5 has-text-grey-light">时间: </span>
                        <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished">
                            <?php $this->date('Y-m-d'); ?>
                        </time>
                    </div>
                </div>
                <div class="post-content content" itemprop="articleBody">
                    <?php $this->content(); ?>
                </div>

                <hr class="is-divider is-size-5-widescreen is-bold is-dark">

            </div>
        </article>


        <?php $this->need('comments.php'); ?>

    </div>
</div>



<?php $this->need('footer.php'); ?>