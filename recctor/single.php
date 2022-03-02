<?php get_template_part('header-recctor'); ?>

            <main class="page-news page-news-detail">
                <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                <article>

                    <section class="page-fv">
                        <div class="bg mc-bg"></div>
                        <div class="m-inner clearfix">
                            <ul class="pankuzu">
                                <li><a href="<?php echo home_url();?>/news">最新情報</a></li>
                                <li><img src="<?php echo get_template_directory_uri(); ?>/img/arrow-right.png"></li>
                                <li><?php the_category(); ?></li>
                            </ul>
                        </div>
                    </section>

                    <section class="news-area">
                        <div class="l-inner clearfix">
                            <div class="m-inner clearfix">
                                <div class="mainbar">
                                    <div class="post-content">
                                        <div class="info clearfix">
                                            <p class="date"><?php echo get_post_time('Y.m.d'); ?></p>
                                            <?php
                                                $cats = get_the_category();
                                                foreach($cats as $cat):
                                                echo "<a class='cat mc' href='".get_category_link($cat->cat_ID)."'>".$cat->cat_name."</a>";
                                                endforeach;
                                            ?>
                                        </div>
                                        <h1 class="link"><?php echo mb_substr(strip_tags($post->post_title),0,1000); ?></h1>
                                        <?php if ( has_post_thumbnail() ): ?><!-- if文による条件分岐 アイキャッチが有る時-->
                                        <div class="image bgset"><?php echo get_the_post_thumbnail(); ?></div>
                                        <?php else: ?><!-- アイキャッチが無い時-->
                                        <?php endif; ?>
                                        <div class="text">
                                            <?php the_content(); ?>
                                        </div>
                                        <div class="post-cta mc-bg">
                                            <h2>資料請求はこちらから</h2>
                                            <?php if(get_field('form-tag')): ?>
                                            <?php the_field('form-tag'); ?>
                                            <?php else: ?>
                                            <iframe frameborder="0" scrolling="auto" src="https://form.kintoneapp.com/public/form/show/762639ba1afd898d0a855331c4e472d272cf614085d0765e539d5a4ee84171c7?iframe=true" title="問い合わせ管理" width="100%" height="1024px"></iframe>
                                            <?php endif; ?>
                                        </div>
                                    <?php endwhile; ?>
                                    <?php endif; ?>
                                    </div>
                                    <div class="news-content">
                                        <div class="page-news-title">
                                            <h2>Related Posts<span>- 関連記事</span></h2>
                                        </div>
                                        <ul>
                                            <?php $cat_info = get_category( $cat ); ?>
                                            <?php $posts = get_posts(array('post_type'=>'news', 'posts_per_page'=>3, 'offset' => 1, 'cat' => $cat_info->cat_ID)); ?>
                                            <?php foreach($posts as $post): ?>
                                            <?php if ( has_post_thumbnail() ): ?><!-- if文による条件分岐 アイキャッチが有る時-->
                                            <li class="clearfix">
                                                <div class="image" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></div>
                                                <div class="text">
                                                    <div class="info clearfix">
                                                        <p class="date"><?php echo get_post_time('Y.m.d'); ?></p>
                                                        <?php
                                                            $cats = get_the_category();
                                                            foreach($cats as $cat):
                                                            echo "<a class='cat mc' href='".get_category_link($cat->cat_ID)."'>".$cat->cat_name."</a>";
                                                            endforeach;
                                                        ?>
                                                    </div>
                                                    <a href="<?php the_permalink(); ?>" class="link"><?php echo mb_substr(strip_tags($post->post_title),0,60); ?></a>
                                                    <a href="<?php the_permalink(); ?>" class="excerpt"><?php the_excerpt(); ?></a>
                                                </div>
                                            </li>
                                            <?php else: ?><!-- アイキャッチが無い時-->
                                            <li class="clearfix">
                                                <div class="info clearfix">
                                                    <p class="date"><?php echo get_post_time('Y.m.d'); ?></p>
                                                    <?php
                                                        $cats = get_the_category();
                                                        foreach($cats as $cat):
                                                        echo "<a class='cat mc' href='".get_category_link($cat->cat_ID)."'>".$cat->cat_name."</a>";
                                                        endforeach;
                                                    ?>
                                                </div>
                                                <a href="<?php the_permalink(); ?>" class="link"><?php echo mb_substr(strip_tags($post->post_title),0,60); ?></a>
                                                <a href="<?php the_permalink(); ?>" class="excerpt"><?php the_excerpt(); ?></a>
                                            </li>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php wp_reset_postdata(); ?>
                                        </ul>
                                        <div class="sub-cta-area">
                                            <a href="<?php echo home_url();?>/news" class="mc">最新情報一覧に戻る</a>
                                        </div>
                                    </div>
                                </div>
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                    </section>
                    
                </article>
            </main>

            <?php get_template_part('footer-recctor'); ?>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

    </body>
</html>