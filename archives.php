<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-2">
                <div class="box">
                    <h2 class="title is-5">标签名</h2>
                    <div class="tags">
                        <?php
                        $this->widget("Widget_Metas_Tag_Cloud", "sort=mid&ignoreZeroCount=1&desc=0")->to($tags);
                        if ($tags->have()) :
                            while ($tags->next()) :
                        ?>

                                <a href="<?php $tags->permalink(); ?>" class="tag is-rounded is-light">
                                    <span class="tag-name"><?php $tags->name(); ?></span>
                                    <span class="tag-count">(<?php $tags->count(); ?>)</span>
                                </a>
                        <?php endwhile;
                        endif; ?>
                    </div>
                </div>
            </div>

            <div class="column is-10 columns">
                <div class="column is-half">
                    <div class="box">
                        <h2 class="title is-5">分类名</h2>
                        <ul class="menu-list">
                            <?php
                            $this->widget("Widget_Metas_Category_List")->to($categories);
                            if ($categories->have()) :
                                while ($categories->next()) :
                            ?>
                                    <li class="category-item">
                                        <a href="javascript:void(0);" class="category-link mb-1" rel="category" title="<?php $categories->name(); ?>">
                                            <span class="category-name"><?php $categories->name(); ?></span>
                                            <span class="category-count">(<?php $categories->count(); ?>)</span>
                                        </a>
                                        <?php $this->widget('Widget_Archive@categories' . $categories->mid, 'pageSize=5&type=category', 'mid=' . $categories->mid)->to($categoryPosts); ?>
                                        <ul class="timeline" style="display: none;">
                                            <?php while ($categoryPosts->next()) : ?>
                                                <li class="timeline-item">
                                                    <div class="timeline-content">
                                                        <div class="title-wrapper">
                                                            <a href="<?php $categoryPosts->permalink(); ?>" class="post-link">
                                                                <h3 class="title flag is-5"><?php $categoryPosts->title(); ?></h3>
                                                            </a>
                                                            <div class="time"><?php $categoryPosts->date('Y-m-d'); ?></div>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    </li>
                            <?php endwhile;
                            endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="column is-half">
                    <div class="box">
                        <h2 class="title is-5">时间轴</h2>
                        <ul class="menu-list">
                            <?php
                            $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($posts);

                            $timelineData = array();
                            while ($posts->next()) {
                                $yearMonth = date('Y 年 m 月', $posts->created);
                                if (!isset($timelineData[$yearMonth])) {
                                    $timelineData[$yearMonth] = array();
                                }

                                // 存储文章的标题、链接和日期
                                $timelineData[$yearMonth][] = array(
                                    'title' => $posts->title,
                                    'link' => $posts->permalink,
                                    'date' => date('m月d日', $posts->created)
                                );
                            }
                            foreach ($timelineData as $yearMonth => $posts) :
                            ?>
                                <li class="category-item">
                                    <a href="javascript:void(0);" class="category-link mb-1" rel="category" title="<?php echo $yearMonth; ?>">
                                        <span class="category-name"><?php echo $yearMonth; ?></span>
                                        <span class="category-count">(<?php echo count($posts); ?>)</span>
                                    </a>
                                    <ul class="timeline" style="display: none;">
                                        <?php foreach ($posts as $post) : ?>
                                            <li class="timeline-item">
                                                <div class="timeline-content">
                                                    <a href="<?php echo $post['link']; ?>" class="post-link">
                                                        <h3 class="title flag is-5"><?php echo $post['title']; ?></h3>
                                                    </a>
                                                    <div class="time"><?php echo $post['date']; ?></div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php endforeach; ?>
                        </ul>
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
            header.style.height = "10vh";
        }
        var categoryItems = document.querySelectorAll('.category-item');

        categoryItems.forEach(item => {
            var categoryLink = item.querySelector('.category-link');
            var timeline = item.querySelector('.timeline');

            categoryLink.addEventListener('click', function() {
                timeline.style.display = (timeline.style.display === 'none' || !timeline.style.display) ? 'block' : 'none';
            });
        });
    });
</script>



<?php $this->need('footer.php'); ?>