<!DOCTYPE html>
<html>
      <head>
           <meta charset="UTF-8">
           <link rel="Stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory') ?>/public/style.css" />
           <title></title>

     <?php wp_head(); ?> 
     <script>addEvent(window,'load',mapaStart); </script>
     </head>
     <body>
      
<div id="fb-root"></div>

           <div id="all">
               <h1><span>Boks Kraków - Boxernia Serca Krakowa</span></h1>
               <div id="tresc">
                   <div id="left">
                    <h2>&raquo; AVE BSK &laquo;</h2>

                       <a style="display: block; left: 100px; position: relative; text-align: center; width: 242px; margin-top: 20px;" target="_blank" href="https://medicoversport.pl/" rel="attachment wp-att-352"><img class="alignnone size-full wp-image-352" alt="05" src="<?= get_template_directory_uri() ?>/assets/images/mcov-spor.jpg" style="width: 166px; height: auto;"></a>

                    <!--<a target="_blank" href="http://www.boksdlawszystkich.pl/" rel="attachment wp-att-352"><img class="alignnone size-full wp-image-352" alt="05" src="<?= get_template_directory_uri() ?>/assets/images/c.jpg" style="position: relative; left: 138px; top: 20px; width: 166px; height: auto; display: block;"></a>-->

                    <a target="_blank" href="https://www.benefitsystems.pl/" rel="attachment wp-att-352"><img class="alignnone size-full wp-image-352" alt="05" src="<?= get_template_directory_uri() ?>/assets/images/ben.png" style="position: relative; left: 138px; top: 20px; width: 166px; height: auto; display: block;"></a>

                    <a target="_blank" href="http://www.jestemfit.pl/" rel="attachment wp-att-352"><img class="alignnone size-full wp-image-352" alt="05" src=http://boxernia.pl/wp-content/uploads/2016/10/05.png" style="position: relative; left: 138px; top: 40px; width: 166px; height: auto; display: block;"></a>




                       <?php //dynamic_sidebar('sidebar-1'); ?>
          
                   </div>
                   <div id="right">
                       <?php if(is_front_page()) { ?>
                           <?php
                           $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                           $args = array('posts_per_page' => 2, 'paged' => $paged );
                           query_posts($args); ?>
                           <?php if ( have_posts() ) :
                               while (have_posts()) : the_post(); ?>
                                   <h3 class="tytul-postu"><?= get_the_title() ?></h3>
                                   <p class="parametry"><span><?= get_the_time('l, F j, Y') ?></span></p>
                                   <?php the_content(); ?>
                               <?php endwhile; ?>
                                <div class="pagination">
                                    <?php previous_posts_link(); ?> | <?php next_posts_link(); ?>
                                </div>
                           <?php else : ?>
                               <p>No posts found...</p>
                           <?php endif; ?>
                       <?php } else { ?>
                           <?php
                           global $post;
                           if($post->post_type=="post") echo '<h2>Aktuaności</h2>';
                           ?>
                           <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                               <h2><?= get_the_title() ?></h2>
                               <?php the_content(); ?>
                           <?php endwhile; else: ?>
                               <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                           <?php endif; ?>
                       <?php } ?>
                       <?php
                       global $post;
                       if($post->post_type=="post") echo do_shortcode('[fb_button]');
                       ?>
                   </div>
                   <p id="st"><strong>Boks w Krakwie - BOXERNIA</strong></p>
               </div>
               <?php wp_nav_menu( array('menu' => 'main-menu', 'menu_id' => 'menu', 'container' => 'false') );  ?>

               <div id="bottom"><p>&copy; BSK Boxernia</p></div>
           </div>
           <div id="su"></div>

     <div id="fb">
        <div class="button-fb"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/fb.jpg"></div>
        <div class="fb-like-box" data-href="https://www.facebook.com/BOXERNIA.SERCA.KRAKOWA" data-width="300" data-height="500" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
     </div>
     <script>
         (function(d, s, id) {
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) return;
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&appId=150620281795445&version=v2.0";
             fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));

         document.addEventListener("click", e => {
             const eTarget = e.target;
             const fb = document.querySelector("#fb");
             if(eTarget.closest(".button-fb")) {
                 eTarget.closest("#fb").classList.toggle("active");
             }
             if(!eTarget.closest("#fb")) {
                 if(fb.classList.contains("active")) {
                     fb.classList.remove("active");
                 }
             }
         });
     </script> 
     <?php wp_footer(); ?>    
     </body>
</html>