<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->comments()->to($comments); ?>

<?php if ($comments->have()) : ?>
    <h3 class="title is-size-4 mt-5 has-text-centered">
        <?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?>
    </h3>
    <div class="box">
        <?php while ($comments->next()) : ?>
            <div class="card mt-5">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <figure class="image is-48x48">
                                <?php if ($comments->authorId) : ?>
                                    <?php $comments->gravatar('96', ''); ?>
                                <?php else : ?>
                                    <img src="<?php echo $this->options->themeUrl('./assets/default_avatar.png'); ?>" alt="Default Avatar">
                                <?php endif; ?>
                            </figure>
                        </div>

                        <div class="media-content">
                            <p class="title is-4"><?php $comments->author(); ?></p>
                            <p class="subtitle is-6">
                                <a href="<?php echo $comments->url; ?>">
                                    <?php echo $comments->url; ?>
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="content" style="overflow: auto;">
                        <?php $comments->content(); ?>
                        <br>
                        <span class="tag islight is-rounded">
                            <time datetime="<?php $comments->date('c'); ?>"><?php echo date('Y年m月d日 H:i', $comments->created); ?></time>
                        </span>
                    </div>

                    <!-- 添加回复按钮，并为其设置点击事件 -->
                    <a href="#" class="reply-button" data-cid="<?php echo $comments->cid; ?>">回复</a>

                    <!-- 回复表单 -->
                    <div class="reply-form" style="display: none;">
                        <form method="post" action="<?php $this->commentUrl() ?>" role="form">
                            <input type="hidden" name="respondId" value="<?php echo $comments->cid; ?>">
                            <textarea rows="4" cols="50" name="text" class="textarea" required></textarea>
                            <button type="submit" class="button is-primary">提交回复</button>
                        </form>
                    </div>

                    <!-- 显示该评论的回复 -->
                    <?php if ($comments->children) : ?>
                        <div class="replies">
                            <?php foreach ($comments->children as $comment) : ?>
                                <div class="reply">
                                    <div class="media">
                                        <div class="media-left">
                                            <figure class="image is-48x48">
                                                <?php if ($comment['authorId']) : ?>
                                                    <?php echo Typecho_Common::gravatarUrl($comment['mail'], 96, '', '', true); ?>
                                                <?php else : ?>
                                                    <img src="<?php echo $this->options->themeUrl('./assets/default_avatar.png'); ?>" alt="Default Avatar">
                                                <?php endif; ?>
                                            </figure>
                                        </div>
                                        <div class="media-content">
                                            <p class="title is-4"><?php echo $comment['author']; ?></p>
                                            <div class="content">
                                                <?php echo $comment['text']; ?>
                                            </div>
                                            <span class="tag islight is-rounded">
                                                <time datetime="<?php echo $comment['date']->format('c'); ?>"><?php echo $comment['date']->format('Y年m月d日 H:i'); ?></time>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

<!-- JavaScript代码 -->
<script>
    // 当点击回复按钮时显示对应的回复表单
    document.querySelectorAll('.reply-button').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const replyForm = this.nextElementSibling;
            replyForm.style.display = 'block';
        });
    });
</script>



<?php if ($this->options->allowComment === '1') : ?>
    <div id="<?php $this->respondId(); ?>" class="respond box">
        <h3 class="title is-size-4"><?php _e('添加新评论'); ?></h3>
        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <?php if ($this->user->hasLogin()) : ?>
                <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>.
                    <a class="button is-small" href="<?php $this->options->logoutUrl(); ?>" title="Logout">
                        <?php _e('退出'); ?>
                    </a>
                </p>
            <?php else : ?>
                <div class="field">
                    <label for="author" class="label"><?php _e('称呼'); ?></label>
                    <div class="control">
                        <input type="text" name="author" id="author" class="input" value="<?php $this->remember('author'); ?>" required />
                    </div>
                </div>
                <div class="field">
                    <label for="mail" class="label" <?php if ($this->options->commentsRequireMail) : ?> class="required" <?php endif; ?>><?php _e('Email'); ?></label>
                    <div class="control">
                        <input type="email" name="mail" id="mail" class="input" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail) : ?> required<?php endif; ?> />
                    </div>
                </div>
                <div class="field">
                    <label for="url" class="label" <?php if ($this->options->commentsRequireURL) : ?> class="required" <?php endif; ?>><?php _e('网站'); ?></label>
                    <div class="control">
                        <input type="url" name="url" id="url" class="input" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL) : ?> required<?php endif; ?> />
                    </div>
                </div>
            <?php endif; ?>
            <div class="field">
                <label for="textarea" class="label"><?php _e('内容'); ?></label>
                <div class="control">
                    <textarea rows="8" cols="50" name="text" id="textarea" class="textarea" required><?php $this->remember('text'); ?></textarea>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-primary"><?php _e('提交评论'); ?></button>
                </div>
            </div>
        </form>
    </div>

<?php else : ?>
    <div class="respond box">
        <h3><?php _e('评论已关闭'); ?></h3>
    </div>
<?php endif; ?>
</div>