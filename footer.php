		<a href="#page" class="back-top">↑<span>Retour en haut</span></a>
		</main><!-- /#main-content -->
		<?php $footer = get_field('footer', 'option'); ?>
		<?php if (!empty($footer)) : extract($footer) ?>
			<?php if (is_front_page()) : ?>
				<footer class="main" role="contentinfo">
					<span class="logo_footer"><a href="/" alt="Retour à l'accueil"> <img src="<?php echo get_template_directory_uri(); ?>/dist/image/LOGO_KYO.png" alt="Kyodai Logo" class="footer-logo"></a></span>
					<p>
						<span class="legal">2024 &copy;
							<strong><a target="_blank" alt="Kyodai" href="/">Kyodai</a></strong>
							- &copy; <strong><a target="_blank" alt="Paiheme studio" href="https://paihemestudio.com">Paiheme Studio</a></strong>
							- <strong><a target="_blank" alt="Kyodai" href="/mentions-legales">Mentions légales</a></strong>
							-
							<strong><a target="_blank" alt="Kyodai" href="/mentions-legales">RGPD</a></strong>
							- Site web par <strong><a target="_blank" href="https://le-tengu.fr" alt="Tanguy le Tengu">TYLT</a></strong>
						</span>
						<span class="instagram">
							<a href="<?php echo $lien ?>" target="_blank" alt="Instagram Kyodai"><i class="icon"></i>@kyodai.print</a>
						</span>
						<span class="mail">
							<a href="mailto:<?php echo $mail ?>" target="_blank" alt="Linkedin Kyodai"><i class="icon"></i><?php echo $mail ?></a>
						</span>
					</p>
				</footer>
			<?php else : ?>
				<footer class="other" role="contentinfo">
					<div class="hand_contact">
						<span class="hand_left"></span>
						<span class="link red"><a href="/contact" alt="contact">Contact</a></span>
						<span class="hand_right"></span>
					</div>
					<div class="under">
						<div class="left"></div>
						<div class="right"></div>
					</div>
				</footer>
			<?php endif; ?>
		<?php endif; ?>
		<?php wp_footer(); ?>
		</body>

		</html>