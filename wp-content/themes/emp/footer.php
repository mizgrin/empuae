</main>
	<footer class="footer">
		<div class="container">
			<div class="footer-widgets">
				<div class="row">
					<div class="col-md-4">
						<div class="footer-desc">
							<div class="logo">
								<div class="site-branding">
									<div class="emp__logo-holder">
										<img src="<?php echo get_theme_mod('emp_logo'); ?>" alt="">
									</div>
								</div>
							</div>
							<p><?php echo get_theme_mod("emp_footer_text"); ?></p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="short-detail footer-widget-single">
							<h4>Contact links</h4>
							<div class="footer-contact">
								<ul class="list-unstyled">
									<li> <a href="tel:<?php echo get_theme_mod("emp_number");?>"> <i class="fas fa-phone-alt"></i><?php echo get_theme_mod("emp_number");?></a></li>
									<li> <a href="tel:<?php echo get_theme_mod("emp_number2");?>"></a> <i class="fas fa-phone-alt"></i><?php echo get_theme_mod("emp_number2");?></a></li>
									<li><i class="fas fa-map-marker-alt"></i><?php echo get_theme_mod("emp_address");?></li>			
									<li> <a href="mailto:<?php echo get_theme_mod("emp_mail");?>"></a> <i class="fas fa-envelope"></i><?php echo get_theme_mod("emp_mail");?></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="footer-menu footer-widget-single">
							<h4>Page menu</h4>
							<?php
									wp_nav_menu(array(
										'theme_location' => 'footer-menu',
										'container' => false,
										'menu_class' => 'menu nav-menu clearfix list-unstyled',
										'menu_id' => 'footer-menu',
										'echo' => true,
										'before' => '',
										'after' => '',
										'depth' => 0,
									));
								?>
							
						</div>
					</div>

					<div class="col-md-3">

						<div class="social-menu footer-widget-single">
							<h4>On Social Media</h4>
							<ul class="social-list list-unstyled">
								<li><a href="<?php echo get_theme_mod('emp_social_media_icon1'); ?>" class="facebook-icon"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="<?php echo get_theme_mod('emp_social_media_icon2'); ?>" class="linkedin-icon"><i class="fab fa-linkedin-in"></i></i></a></li>
								<li><a href="<?php echo get_theme_mod('emp_social_media_icon3'); ?>" class="twitter-icon"><i class="fab fa-twitter"></i></a></li>
								<li><a href="<?php echo get_theme_mod('emp_social_media_icon4'); ?>" class="instagram-icon"><i class="fab fa-instagram"></i></a></li>
								<li><a href="mailto:<?php echo get_theme_mod('emp_mail'); ?>" class="mail-icon"><i class="fas fa-envelope"></i></a></li>
							</ul>

						</div>

					</div>
				</div>
			</div>
			<div class="copyright">
				<p>Copyright © 2024 <span class='text-light'>EMP Team <sup class='text-light'>By Miz</sup></span> </p>
				
			</div>

		</div>
	</footer>
</div>
</body>
<?php wp_footer(); ?>

</html>