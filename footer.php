<!-- end footer -->
		</div> <!-- end #container -->
        <hr />
        <div class="fotter-container">
            <div class="navbar-form navbar-left">
                <?php  //dynamic_sidebar('customareaforcoding'); ?>
                <?php if(get_option( 'footer_choice_image' )!=''){?>
                <img src="<?php echo get_template_directory_uri()."/uploads/".get_option( 'footer_choice_image' );?>" style="width:200px;" />
                <?php }?>
            </div>
            <div class="navbar-form navbar-left">
                <div class="container-footer" id="container">
                    <footer role="contentinfo">
                        <div id="inner-footer" class="clearfix">
                          <div id="widget-footer" class="clearfix row">
                            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
                            <?php endif; ?>
                            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
                            <?php endif; ?>
                            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
                            <?php endif; ?>
                          </div>
                            
                            <p class="attribution pull-left">&copy; <?php bloginfo('name'); ?></p>
                            <nav class="clearfix footer-liks-list" >
                                <?php wp_bootstrap_footer_links(); // Adjust using Menus in Wordpress Admin ?>
                            </nav>
                        </div> <!-- end #inner-footer -->
                    </footer>
                </div>
            </div>
        </div>
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		<?php wp_footer(); // js scripts are inserted using this function ?>
		<!-- remove this for production -->
		<script src="//localhost:35729/livereload.js"></script>
	</body>
</html>