<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
		<footer id="dunbar-footer">
			<hr class="footer-hr"/>
			<div class="footer-copyright">
				<div class="icon">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/icon.png" />
				</div>
				<p>
					<a href="mailto:info@dunbarsocial.com">info@dunbarsocial.com</a>
				</p>
				<p>
					&copy;
					<?php echo date("Y");?>
					Dunbar Social
				</p>
			</div>
		</footer>

		<?php wp_footer(); ?>

	</body>
</html>
