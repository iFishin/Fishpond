<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<section class="hero is-fullheight is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-half">
                    <div class="box has-background-info has-text-white has-text-centered p-6">
                        <h1 class="title is-1 has-text-warning mb-5"><?php _e('404 - 页面没找到'); ?></h1>
                        <p class="subtitle is-5 mb-5"><?php _e('很抱歉，您所请求的页面不存在或已被删除。'); ?></p>
                        <form method="post" class="has-text-centered" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                            <div class="field has-addons">
                                <div class="control is-expanded">
                                    <input type="text" name="s" class="input is-primary is-large" autofocus placeholder="<?php _e('请输入关键词搜索'); ?>">
                                </div>
                                <div class="control">
                                    <button type="submit" class="button is-info is-large">
                                        <span><?php _e('搜索'); ?></span>
                                        <span class="icon is-small">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var header = document.querySelector("header#header");
        if (header) {
            header.style.height = "0";
        }
    });
</script>


<?php $this->need('footer.php'); ?>
