                            <div class="sidebar">
                                <div class="cat-list">
                                    <div class="sidebar-title">
                                        <h2>Categories</h2>
                                    </div>
                                    <ul><?php wp_list_categories('title_li='); ?></ul>
                                </div>
                                <div class="archive-list">
                                    <div class="sidebar-title">
                                        <h2>Archives</h2>
                                    </div>
                                    <div class="archive">
                                        <?php
                                        $year_prev = null;
                                        $months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,
                                                                            YEAR( post_date ) AS year,
                                                                            COUNT( id ) as post_count FROM $wpdb->posts
                                                                            WHERE post_status = 'publish' and post_date <= now( )
                                                                            and post_type = 'news'
                                                                            GROUP BY month , year
                                                                            ORDER BY post_date DESC");
                                        foreach($months as $month) :
                                        $year_current = $month->year;
                                        if ($year_current != $year_prev){
                                        if ($year_prev != null){?>
                                                    </ul></div>
                                                <?php } ?>
                                        <div>
                                            <h4><?php echo $month->year; ?>年</h4>
                                            <ul>
                                                <?php } ?>
                                                <li>
                                                    <a href="<?php bloginfo('url') ?>/news/date/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>">
                                                        <?php echo date("n", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>月
                                                        (<?php echo $month->post_count; ?>)
                                                    </a>
                                                </li>
                                                <?php $year_prev = $year_current;
                                                endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-list news-content">
                                    <div class="sidebar-title">
                                        <h2>Resent News</h2>
                                    </div>
                                    <ul>
                                        <?php 
                                            $args = array(
                                                'posts_per_page' => 4,
                                                'post_type'=>'news'
                                            );
                                            $posts = get_posts( $args );
                                        ?>
                                        <?php foreach($posts as $post): ?>
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
                                        </li>
                                        <?php endforeach; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </ul>
                                </div>
                            </div>