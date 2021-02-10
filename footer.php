<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package KSASAcademic
 * @since KSASAcademic 1.0.0
 */
?>

<footer class="footer">
	<div class="footer-container">

	<?php if ( has_nav_menu( 'footer-links' ) ) : ?>
		<div class="grid-x grid-padding-x hide-for-print">
			<div class="cell small-12 footer-links">
				<?php ksasacademic_footer_links(); ?>
			</div>
			<div class="small-12 cell centered">
				<a href="https://www.jhu.edu/">
				<img class="jhushield" src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/assets/images/university.logo.white.png" alt="Johns Hopkins University"  width="567" height="109" loading="lazy">
				</a>
			</div>
		</div>

	<?php else : ?>

	<div class="grid-x grid-padding-x hide-for-print">
			<div class="small-12 medium-3 cell">
				<a href="https://www.jhu.edu/">
					<img class="jhushield" src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/assets/images/university.logo.white.png" alt="Johns Hopkins University"  width="567" height="109" loading="lazy">
				</a>
			</div>
			<div class="small-12 medium-4 medium-offset-1 cell">
				<div class="footer-links">
					<ul class="menu" role="menu">
						<li role="menuitem"><a href="https://accessibility.jhu.edu/" target="_blank">Accessibility</a></li>
						<li role="menuitem"><a href="https://jobs.jhu.edu/" target="_blank">Careers</a></li>
						<li role="menuitem"><a href="https://it.johnshopkins.edu/policies/privacystatement" target="_blank">Privacy Statement</a></li>
					</ul>
				</div>
			</div>
			<div class="small-12 medium-4 cell social-media hide-for-small-only">
				<a href="http://facebook.com/JHUArtsSciences"><span class="fab fa-facebook fa-2x"></span><span class="screen-reader-text">Facebook</span></a>
				<a href="https://www.instagram.com/JHUArtsSciences/"><span class="fab fa-instagram fa-2x"></span><span class="screen-reader-text">Instagram</span></a>
				<a href="https://twitter.com/JHUArtsSciences"><span class="fab fa-twitter fa-2x"></span><span class="screen-reader-text">Twitter</span></a>
				<a href="https://www.youtube.com/jhuartssciences"><span class="fab fa-youtube fa-2x"></span><span class="screen-reader-text">YouTube</span></a>
			</div>
	<?php endif; ?>

			<div class="small-12 cell copydate">
				<?php $theme_option = flagship_sub_get_global_options(); ?>
				<p>&copy; <?php print date( 'Y' ); ?> Johns Hopkins University, <?php echo $theme_option['flagship_sub_copyright']; ?></p>
			</div>
		</div>

	</div>
</footer>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
