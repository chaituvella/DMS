</div><!-- .main_wrapper -->

<?php if (strlen(get_theme_option('footer_tweet_line'))>0) { ?>
<div class="footer_twitter">
    <div class="container">
        <div class="twitter_line"></div>
        <script>
            $(document).ready(function(){
                $('.twitter_line').tweet({
                    modpath: themerooturl+"/js/core/twitter/index.php",
                    count: 1,
                    username : "<?php echo get_theme_option('footer_tweet_line'); ?>"
                });
            });
        </script>
    </div>
</div><!-- .footer_twitter -->
<?php } ?>

<?php if (get_theme_option("footer_widgets_area") == "on") { ?>
<div class="pre_footer">
    <div class="container">
        <aside id="footer_bar" class="row">
            <?php get_sidebar('footer'); ?>
        </aside>
    </div>
</div><!-- .pre_footer -->
<?php } ?>

<footer>
    <div class="footer_line container">
        <div class="copyright">
            <?php
            if (get_theme_option("translator_status") == "enable") {
                the_theme_option("copyright");
            } else {
                _e('&copy; 2020 Business Theme. All Rights Reserved.','theme_localization');
            }
            ?>
        </div>
        <div class="socials">
            <ul class="socials_list">
                <?php echo socsm("social_facebook", $class = "ico_social-facebook", $title = "Facebook"); ?>
                <?php echo socsm("social_vimeo", $class = "ico_social-vimeo", $title = "Vimeo"); ?>
                <?php echo socsm("social_tumblr", $class = "ico_social-tumblr", $title = "Tumblr"); ?>
                <?php echo socsm("social_twitter", $class = "ico_social-twitter", $title = "Twitter"); ?>
                <?php echo socsm("social_delicious", $class = "ico_social-delicious", $title = "Delicious"); ?>
                <?php echo socsm("social_flickr", $class = "ico_social-flickr", $title = "Flickr"); ?>
                <?php echo socsm("social_pinterest", $class = "ico_social-pinterest", $title = "Pinterest"); ?>
                <?php echo socsm("social_dribbble", $class = "ico_social-dribbble", $title = "Dribbble"); ?>
                <?php echo socsm("social_linked_in", $class = "ico_social-linked", $title = "LinkedIn"); ?>
                <?php echo socsm("social_youtube", $class = "ico_social-youtube", $title = "YouTube"); ?>
                <?php echo socsm("social_gplus", $class = "ico_social-gplus", $title = "Google Plus"); ?>
                <?php echo socsm("social_instagram", $class = "ico_social-instagram", $title = "Instagram"); ?>
            </ul>
        </div>
        <div class="clear"></div>
        <a class="btn2top" href="javascript:void(0)"></a>
    </div>
    <div class="footer_border"></div>
    <?php if (get_theme_option("scrollable_menu")!=="off") { ?><header class="fixed-menu"></header><?php } ?>
</footer>

<?php the_theme_option("code_before_body"); wp_footer(); ?>
</body>
</html>