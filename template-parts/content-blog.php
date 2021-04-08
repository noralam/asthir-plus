<?php 
/*
*
* The file for display blog content for asthir theme
*
*/
$asthir_blog_style = get_theme_mod( 'asthir_blog_style', 'style2');
$asthir_blogdate = get_theme_mod( 'asthir_blogdate', 1);
$asthir_blogauthor = get_theme_mod( 'asthir_blogauthor', 1);
$asthir_postcat = get_theme_mod( 'asthir_postcat', 1);
$asthir_posttag = get_theme_mod( 'asthir_posttag', 1);

if($asthir_blog_style == 'style1'){
	$asthir_stclass = 'bshop-list-flex';
}else{
	$asthir_stclass = 'bshop-simple-list';
}

if($asthir_blog_style != 'style3' ):
?>
<div class="bshop-blog-list">
	<?php if(has_post_thumbnail()): ?>
	<div class="<?php echo esc_attr($asthir_stclass); ?> hasimg">
		<div class="asthir-blog-img">
			<?php asthir_post_thumbnail(); ?>
		</div>
	<?php else: ?>
	<div class="<?php echo esc_attr($asthir_stclass); ?> no-img">
	<?php endif; ?>

		<div class="asthir-blog-text">
			<div class="asthir-btext">
				<header class="entry-header">
					<?php
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

					if ( 'post' === get_post_type() && ( !empty($asthir_blogdate) || !empty($asthir_blogauthor) ) ) :
						?>
						<div class="entry-meta">
							<?php
							if($asthir_blogdate){
							asthir_posted_on();
							}
							if($asthir_blogauthor){
							asthir_posted_by();
							}
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
			</header><!-- .entry-header -->

				

				<div class="entry-content">
					<?php
					the_excerpt();
					?>
				</div><!-- .entry-content -->
				
			</div>

		</div>
	</div>	
</div>
<?php else: ?>
<div class="bshop-single-list">
	<header class="entry-header text-center mb-5">
			<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

			if ( 'post' === get_post_type() && ( !empty($asthir_blogdate) || !empty($asthir_blogauthor) ) ) :
						?>
						<div class="entry-meta">
							<?php
							if($asthir_blogdate){
							asthir_posted_on();
							}
							if($asthir_blogauthor){
							asthir_posted_by();
							}
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
		</header><!-- .entry-header -->

		<?php asthir_post_thumbnail(); ?>

			<div class="entry-content">
					<?php
					the_excerpt();
					?>
			</div><!-- .entry-content -->
<?php if ( !empty($asthir_postcat) || !empty($asthir_posttag)  ) : ?>
		<footer class="entry-footer">
			<?php asthir_entry_footer($asthir_postcat, $asthir_posttag); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
		
</div>	
<?php endif; ?>