<?php
/*
 Template Name:Wellcome Template
*/
$enable_home_title    = cs_get_option('enable_home_title');
$enable_promo_title   = cs_get_option('enable_promo_title');
$home_title           = cs_get_option('home_title');
$home_content         = cs_get_option('home_content');
$home_image           = cs_get_option('home_image');
$home_image_array     = wp_get_attachment_image_src(cs_get_option('home_image'),'large');
get_header();
 
if(!empty($home_image)){
	$home_image =$home_image_array['0'];
}else{
	$home_image =''.get_template_directory_uri().'/assets/img/homepageblock.jpg';
}
 ?>

		<!-- ::::::::::::::::::::: start slider section:::::::::::::::::::::::::: -->
		<section class="slider-area">
			<?php
				global $post;

				$args =array(
					'post_per_page' =>5,
					'post_type'     =>'slide',
					'order_by'      =>'menu_order',
					'order'         =>'ASC'
				);
				$mypost =get_posts($args);
				foreach($mypost as $post): setup_postdata($post);?>
				<?php
					$btn_link =get_post_meta($post ->ID, 'btn_link', true );
					$btn_text =get_post_meta($post ->ID, 'btn_text', true );
				?>			
			<!-- slide item one -->
			<div style="background-image:url(<?php the_post_thumbnail_url('large');?>)" class="homepage-slider">
				<div class="display-table">
					<div class="display-table-cell">
						<div class="container">
							<div class="row">
								<div class="col-sm-7">
									<div class="slider-content">
										<h1><?php the_title();?></h1>
										<p><?php the_content();?></p>
										<a href="<?php echo $btn_link;?>"><?php echo $btn_text;?><i class="fa fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; wp_reset_query();?>
		</section><!-- slider area end -->
	
	
		<?php if($enable_promo_title == true) { get_template_part('content/promo'); } ?>
	
	
		<!-- ::::::::::::::::::::: start block content area:::::::::::::::::::::::::: -->
		<?php if($enable_home_title ==true) :?>
		<section class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="block-text">
							<h2><?php echo $home_title?></h2>
							<?php echo wpautop($home_content);?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="block-img">
							<img src="<?php echo $home_image;?>" alt="" />
						</div>
					</div>
				</div>
			</div>
		</section><!-- block area end -->
			<?php endif;?>
	
		<?php get_template_part('content/service')?>
	<?php get_footer();?>