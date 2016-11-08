


<!-- start map -->
	<section>
		<div id="map">

		</div>
		<div class="info-map">
			<?php if ( is_active_sidebar( 'info_map' ) ) : ?>
					<?php dynamic_sidebar( 'info_map' ); ?>
			<?php endif; ?>
		</div>
	</section>
<!-- over map -->

<footer>
<div id="scrollTop">
	<a></a>
</div>

	<div class="footer__menu-top">
		<?php
				wp_nav_menu( array(
							 'menu_class'=>'container footer__menu-top-menu',
							 'theme_location'=>'footer',
							 'menu_id' => 'footer-menu',
							 'menu'            => '',
							 'container'       => false,
							 'container_class' => '',
							 'container_id'    => '',
							 'echo'            => true,
							 'fallback_cb'     => 'wp_page_menu',
							 'before'          => '',
							 'after'           => '',
							 'link_before'     => '',
							 'link_after'      => '',
							 'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
							 'depth'           => 1,
							 'walker'          => '',
					 )
		); ?>
	</div>
	<div class="footer__menu-bottom">
		<p class="copyright">© 2005 - 2016, Киев, Украина - рartytime.com.ua</p>
	</div>
</footer>


<div id="under_construction" class="modal_div modal_construction" >
		<span class="modal_close modal-window__container__close construction_close"></span>
		<span class="icons__servis modal-window_iconTop"></span>
		<p>Данный раздел находится в разработке.</p>
		<p>Воспользуйтесь онлайн-заказом. </p>

		<a href="#order" class="open_modal button__modal button_zakaz">Онлайн - заказ</a>
</div>

<!--

<div id="order" class="modal_div modal_order">
		<form action="" method="post">
			<h3>Простое модальное окно 2</h3>
			<p>Тут может быть рандомная обычная форма например.</p>
			<p>Ваше имя<br>
				<input type="text" name="your-name" value="" size="40">
			</p>
			<p>Ваш телефон<br>
				<input type="text" name="your-name" value="" size="40">
			</p>
			<p style="text-align: center; padding-bottom: 10px;">
				<input type="submit" value="Отправить">
			</p>
		</form>
</div> -->


<div id="overlay"></div>




	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jQuery.v3.1.0.min.js" type="text/javascript"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js" type="text/javascript"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/classie.js" type="text/javascript"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/clipboard.min.js" type="text/javascript"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/owl.carousel.js" type="text/javascript"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.featureCarousel.js" type="text/javascript"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/map.js" type="text/javascript"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsYaYJAkTYvpetZz0NmrR4K6ZAk-NjLG4" async defer></script>

	<!-- Initialize Common -->

	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/common.js"></script>

	<?php wp_footer(); ?>

	</body>
</html>
