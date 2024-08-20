<?php
/**
 *  基于bulma制作
 * @package fishpond鱼塘
 * @author fish 
 * @version 1.0
 * @link https://github.com/ifishin
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="container" id="main" role="main">
    <?php while ($this->next()) : ?>

        <div class="paper">
            <div class="card mt-5 mb-5 paper-content">
                <header class="card-header">
                    <p class="card-header-title title is-2" itemprop="name headline">
                        <a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                    </p>
                </header>

                <div class="card-content">
                    <div class="content" itemprop="articleBody">
                        <?php $this->excerpt(100, '...'); ?>
                    </div>
                </div>
                <footer class="card-footer">
                    <p class="card-footer-item" itemprop="author" itemscope itemtype="http://schema.org/Person">
                        <?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a>
                    </p>
                    <p class="card-footer-item" itemprop="datePublished">
                        <?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time>
                    </p>
                    <p class="card-footer-item" itemprop="interactionCount">
                        <a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a>
                    </p>
                </footer>
            </div>
        </div>

    <?php endwhile; ?>



    <?php $this->need('./component/pagination.php'); ?>


</div><!-- end #main-->



<?php $this->need('./component/btn_section.php'); ?>




<?php $this->need('footer.php'); ?>