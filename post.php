<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="container paper">
    <div class="paper-content">
        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
            <div class="content">
                <h1 class="title is-2 has-text-centered" itemprop="name headline">
                    <a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                </h1>
                <div class="post-meta is-flex is-justify-content-space-between">
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
                    <div class="category-info">
                        <span class="is-size-5 has-text-grey-light">分类: </span>
                        <?php $this->category(','); ?>
                    </div>
                </div>
                <div class="post-content content" itemprop="articleBody">
                    <?php $this->content(); ?>
                </div>

                <hr class="is-divider is-size-5-widescreen is-bold is-dark">



                <div class="tags mt-4">
                    <span class="is-size-5 has-text-grey-light">标签: </span>
                    <?php $this->tags(' ', true, ' 无 ', true); ?>
                    
                </div>

                <hr class="is-divider is-size-5-widescreen is-bold is-dark">


            </div>
        </article>

        <?php $this->need('comments.php'); ?>

        <div class="container" style="padding-left:20%;">
            <ul class="post-near columns">
                <li class="column is-half">
                    <i class="fas fa-arrow-left"></i>
                    <span class="has-text-weight-bold">上一篇：</span>
                    <?php $this->thePrev('%s', '没有了'); ?>
                </li>
                <li class="column is-half">
                    <span class="has-text-weight-bold">下一篇：</span>
                    <?php $this->theNext('%s', '没有了'); ?>
                    <i class="fas fa-arrow-right"></i>
                </li>
            </ul>
        </div>


    </div>
</div>

<?php $this->need('./component/btn_section.php'); ?>

<?php $this->need('footer.php'); ?>