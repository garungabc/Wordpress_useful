<?php
/**
 * Template Name: Thư Viện Video
 *
 */

$paged = ($_GET['trang'] >= 2) ? $_GET['trang'] : 1;
$args = [
    'post_type' => 'thu_vien_video',
    'posts_per_page' => 10,
    'post_status' => ['publish'],
    'paged' => $paged
];
$gallery = new WP_Query($args);
$total_pages = $gallery->max_num_pages;

get_header(); ?>
	<style type="text/css">
		.thuvienvideo aside {
		    width: 100% !important;
		}

		.thuvienvideo .news-list {
		    margin-bottom: 20px;
		}

		.thuvienvideo .news-list .heading {
		    border-bottom: 1px solid #bdc3c7;
		    font-family: arial;
		    font-size: 14px;
		    font-weight: bold;
		    text-transform: uppercase;
		}

		.thuvienvideo .news-list .heading p {
		    border-bottom: 3px solid #f39c12;
		    display: inline-block;
		    margin-bottom: 0px;
		}

		.thuvienvideo .name-anh {
		    font-weight: bold;
		    font-size: 12px;
		    text-align: center;
		    text-transform: uppercase;
		    color: #2980b9;
		    margin-bottom: 0px;
		    margin-top: 10px;
		}

		.thuvienvideo .date {
		    font-style: italic;
		    color: #ea6d62;
		    font-size: 12px;
		    text-align: center;
		}

		.thuvienvideo .images-thuvien {
		    margin: 0 auto;
		    width: 100%;
		    height: 100%;
		    max-height: 150px;
		}

		.thuvienvideo .list-thuvien {
		    margin-left: 10px;
		}

		.thuvienvideo .category-image {
		    position: relative;
		    border: 3px solid #fff;
		    box-shadow: 1px 0px 8px 2px #888888;
		    cursor: pointer;
		}

		.thuvienvideo .category-image .number-images {
		    position: absolute;
		    border: 1px solid #a1a1a1;
		    background: #645f5f;
		    border-radius: 5px;
		    left: 10px;
		    bottom: 10px;
		    height: 21px;
		    padding-bottom: 25px;
		    width: 57px;
		    font-style: italic;
		    color: #fff;
		}

		.thuvienvideo .category-image iframe {
		    width: 100%;
		}

		.thuvienvideo .top-images {
		    margin-top: 30px;
		}

		.thuvienvideo .pagination2 {
		    height: 80px;
		    position: relative;
		    margin-top: 20px;
		}

		.thuvienvideo .pagination2 nav .current {
		    background: #00ADEE;
		    color: #fff;
		}

		.thuvienvideo .pagination2 nav .page-numbers {
		    position: relative;
		    display: inline-block;
		    padding: .5rem .75rem;
		    margin-left: -1px;
		    line-height: 1.25;
		    color: #0275d8;
		    background-color: #fff;
		    border: 1px solid #ddd;
		    margin-left: 0;
		    border-bottom-left-radius: .25rem;
		    border-top-left-radius: .25rem;
		}

		.thuvienvideo .pagination2 nav .current a {
		    color: #fff;
		}

		.thuvienvideo .pagination2 .phantrang {
		    position: absolute;
		    left: 30%;
		}

		.thuvienvideo .pagination2 nav .current {
		    background: #00ADEE;
		    color: #fff;
		}

		.thuvienvideo .list-thuvien .modal-dialog {
		    padding-top: 2%;
		    max-width: 90%;
		    width: 60%;
		    height: 100%;
		    max-height: 900px;
		}

		.thuvienvideo .d-block {
		    width: 100%;
		    height: 100%;
		    margin: 0 auto;
		}
		
		.paginate {
	        margin-top: 10px;
	    }
	    .paginate .page-numbers {
	        position: relative;
	        float: left;
	        padding: 6px 12px;
	        margin-left: -1px;
	        line-height: 1.42857143;
	        color: #337ab7;
	        text-decoration: none;
	        background-color: #fff;
	        border: 1px solid #ddd;
	    }
	    .paginate .current {
	        background: #07418E;
	        color: #fff;
	    }
	</style>
	<div class="container thuvienvideo">
		<div class="row list-thuvien">
			<div class="col-md-8 list-images top-images">
				<div class="container">
					<div class="news-list">
						<div class="heading">
							<p>Thư viện video</p>
						</div>
					</div>
					<?php if(!empty($gallery)): ?>
					<div class="row images-row">
						<?php foreach ($gallery->posts as $key_ga => $section_image): ?>
						<?php 
							$get_video = get_field('link_youtube', $section_image->ID); 
							$get_date_event = get_field('ngay_su_kien', $section_image->ID);
							if(empty($get_date_event)) {
								$get_date_event = get_the_date( 'd/m/Y', $section_image->ID );
							}
						?>
							<div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
								<div class="category-image">
									<?php echo $get_video; ?>
								</div>
								<p class="name-anh"><?php echo get_the_title($section_image->ID); ?></p>
								<div class="date">Ngày <?php echo $get_date_event; ?></div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="row">
						<div class="col-md-12 pagination2">
							<nav class="phantrang">
								<?php 
									echo "<div class='paginate pull-right'>";
									if ($total_pages > 1){
									    $current_page = max(1, $paged);
									    echo paginate_links(array(
									        'base' => @add_query_arg('trang','%#%'),
									        'format' => '?trang=%#%',
									        'current' => $current_page,
									        'total' => $total_pages,
									    ));
									                            
									}
									echo "</div>";
								?>
							</nav>
						</div>
					</div>
					<?php  
					else: 
						echo 'Không có dữ liệu nào !';
					endif;
					?>
				</div>
			</div>
			<div class="col-md-4 sidebar">
				<section class="main-content">
					<?php get_template_part('sidebar'); ?>
				</section>
			</div>
		</div>
	</div>
<?php get_footer(); ?>