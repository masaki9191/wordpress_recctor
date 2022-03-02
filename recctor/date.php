<?php get_template_part('header-recctor'); ?>

            <main class="page-news">
                <article>

                    <section class="page-fv">
                        <div class="bg mc-bg"></div>
                        <div class="l-inner clearfix">
                            <div class="section-je-title">
                                <h2>News</h2>
                                <h3 class="mb">最新情報</h3>
                            </div>
                        </div>
                    </section>

                    <section class="news-area">
                        <div class="l-inner clearfix">
                            <div class="m-inner clearfix">
                                <div class="mainbar">
                                    <div class="news-content">
                                        <div class="page-news-title">
                                            <h2>aaaAll News<span>- 最新情報一覧</span></h2>
                                        </div>
                                        <ul>
                                            <?php $paged = (int) get_query_var('paged'); ?>
                                            <?php 
                                                $args = array(
                                                    'post_type'=>'news',
                                                    'posts_per_page' => 15,
                                                    'paged' => $paged
                                                );
                                                $the_query = new WP_Query($args);
                                                if ( $the_query->have_posts() ) :
                                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                            ?>
                                            <?php if ( has_post_thumbnail() ): ?><!-- if文による条件分岐 アイキャッチが有る時-->
                                            <li class="clearfix">
                                                <div class="image"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
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
                                            <?php endwhile; ?>
                                            <?php else: ?>
                                            <?php endif; ?>
                                        </ul>
                                        <div class="pagination">
                                        <?php
                                            if ($the_query->max_num_pages > 1) {
                                                echo paginate_links(array(
                                                    'base' => get_pagenum_link(1) . '%_%',
                                                    'format' => '/page/%#%/',
                                                    'current' => max(1, $paged),
                                                    'total' => $the_query->max_num_pages,
                                                    'prev_text' => false,
                                                    'next_text' => false
                                                ));
                                            }
                                        ?>
                                        </div>
                                        <?php wp_reset_postdata(); ?>
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