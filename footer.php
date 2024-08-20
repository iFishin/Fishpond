<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

</div><!-- end .row -->
</div>
</div><!-- end #body -->

<footer class="footer" id="footer">
    <div class="container has-text-centered">
        <div>
            <p>
                &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
                <?php _e('Designed by <a href="http://github.com/ifishin">iFishin</a>'); ?>
                <br>
                <!-- 预留扩展 -->
                <?php $this->options->footerExtend(); ?>

            </p>
        </div>
    </div>

</footer>
<?php $this->footer(); ?>



<div id="cat-container" class="container-for-cat">

</div>
<div id="fish-container" class="container-for-fish"></div>

<!-- 隐藏文字 -->
<p class="is-hidden" id="text-hidden_1">
    <?php $this->options->homeText(); ?>
</p>

<!-- 进度条 -->
<progress class="progress is-info" id="scroll-progress" value="45" max="100"></progress>

<script src="<?php $this->options->themeUrl('./js/jquery.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('./js/clipboard.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('./js/highlight.min.js'); ?>"></script>
<script>
    hljs.highlightAll();
</script>
<script src="<?php $this->options->themeUrl('./js/font.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('./js/fish.js'); ?>"></script>
<script>
    $(document).ready(function() {
        var navbar = $('#main-navbar');
        var textbox = $('#textbox');
        var btn_section = $('#btn-section');
        var sidebar = $('#sidebar');
        var lastScrollTop = 0; // 存储上一次滚动位置
        var navbarBurger = $('#navbar-burger');
        var navbarMenu = $('#navbarMenu');
        var codeBlocks = $('.post-content code'); // 获取所有的代码块


        checkPosition();




        // 遍历所有的代码块 添加复制按钮 和 行号
        codeBlocks.each(function() {
            // 添加复制按钮
            var codeBlock = $(this);
            var copyButton = $('<button class="button is-small copy-button">复制</button>');

            var copyButtonWrapper = $('<div class="copy-button-wrapper"></div>');
            copyButtonWrapper.append(copyButton);
            codeBlock.before(copyButtonWrapper);

            copyButton.click(function() {
                if (clipboard) {
                    clipboard.destroy();
                }

                var clipboard = new ClipboardJS(copyButton[0], {
                    text: function() {
                        return codeBlock.text();
                    }
                });

                clipboard.on('success', function(e) {
                    console.log('已复制到剪贴板:', e.text);
                    copyButton.text('已复制');
                    setTimeout(function() {
                        copyButton.text('复制');
                    }, 1000);
                });

                clipboard.on('error', function(e) {
                    console.error('复制失败:', e.action);
                });
            });
            copyButton.click();

            // 为代码块添加行号
            var codeContent = $(this).html();
            var lines = codeContent.split('\n');
            var numberedCode = lines.map(function(line, index) {
                var lineNumber = index + 1;
                return '<span class="line-number">' + lineNumber + '</span>' + line;
            }).join('\n');
            $(this).html(numberedCode);

        });





        // 检查页面滚动位置
        function checkPosition() {
            var scrollHeight = $(window).scrollTop();
            var windowHeight = $(window).height();
            var targetHeight = windowHeight * 0.1;
            // 主页文本框
            if (scrollHeight > windowHeight * 0.6) {
                textbox.addClass('is-hidden');
            } else {
                textbox.removeClass('is-hidden');
            }
        }

        // 切换主题的函数
        function toggleTheme() {
            // 获取根元素
            var root = document.documentElement;

            // 检查当前主题
            var isDarkTheme = $(root).attr('data-theme') === 'dark';

            // 如果当前是黑夜主题，则切换回默认主题
            if (isDarkTheme) {
                $(root).attr('data-theme', 'default');
                updateThemeColors();
            } else {
                // 切换到黑夜主题
                $(root).attr('data-theme', 'dark');
                updateThemeColors();
            }
        }

        // 更新主题颜色的函数
        function updateThemeColors() {
            // 获取根元素
            var root = document.documentElement;

            // 获取当前主题
            var theme = $(root).attr('data-theme');

            // 根据当前主题设置不同的颜色
            if (theme === 'dark') {
                $(root).css('--primary', '#0EB0C9');
                $(root).css('--primary', '#FAFAFA');
                $(root).css('--secondary', '#FEEBC0');
            } else {
                $(root).css('--primary', '#08748A');
                $(root).css('--primary', '#424242');
                $(root).css('--secondary', '#B8B08C');
            }
        }


        // 主页 搜索 图标的点击事件
        $('#search-icon').click(function() {
            // 提交表单
            $('#search').submit();
        });

        // 移动端 监听导航栏按钮的点击事件
        navbarBurger.click(function() {
            console.log('click');
            navbarMenu.toggleClass('is-active');
        });

        // 按钮组 返回顶部的点击事件
        $('#btn-totop').click(function() {
            $('html, body').scrollTop(0);
        });

        // 按钮组 夜晚 点击事件
        $('#btn-dark').click(function() {
            // 切换主题
            toggleTheme();
        });

        // 按钮组 全屏 点击事件
        $('#btn-fullscreen').click(function() {
            if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
                // 进入全屏模式
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    /* Firefox */
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                    /* Chrome, Safari & Opera */
                    document.documentElement.webkitRequestFullscreen();
                } else if (document.documentElement.msRequestFullscreen) {
                    /* IE/Edge */
                    document.documentElement.msRequestFullscreen();
                }
                $('#btn-fullscreen').addClass('icon-clicked');
            } else {
                // 退出全屏模式
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    /* Firefox */
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    /* Chrome, Safari & Opera */
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    /* IE/Edge */
                    document.msExitFullscreen();
                }
                $('#btn-fullscreen').removeClass('icon-clicked');
            }
        });

        // 监听按钮组 个人中心 点击事件
        $('#btn-profile').click(function() {
            $('#slider').addClass('is-active');
        });


        // 监听页面滚动事件
        $(window).scroll(function() {
            checkPosition();
            var scrollTop = $(window).scrollTop();
            var scrollHeight = $(document).height() - $(window).height();
            var progress = (scrollTop / scrollHeight) * 100;
            $('#scroll-progress').attr('value', progress);

            if (scrollTop > lastScrollTop) {
                // 下滑
                navbar.addClass('is-hidden');
                btn_section.removeClass('is-hidden');
            } else {
                // 上滑
                if (scrollTop === 0) {
                    btn_section.addClass('is-hidden');
                    navbar.addClass('is-hidden');
                } else {
                    navbar.removeClass('is-hidden');
                    btn_section.addClass('is-hidden');
                }
            }
            lastScrollTop = scrollTop;
        });

        $('.reply-button').click(function(event) {
            event.preventDefault();
            var cid = $(this).data('cid');
            $('.reply-form[data-cid="' + cid + '"]').show();
            alert('click');
        });



    });
</script>


</body>

</html>