<?php
/**
 * Template Name: Thư Viện Ảnh
 *
 */
define('ROOT_URL', get_template_directory_uri());
$paged = ($_GET['trang'] >= 2) ? $_GET['trang'] : 1;
$args = [
    'post_type' => 'thu_vien_anh',
    'posts_per_page' => 10,
    'post_status' => ['publish'],
    'paged' => $paged
];
$gallery = new WP_Query($args);
$total_pages = $gallery->max_num_pages;

get_header(); ?>
	<style type="text/css">
		.thuvienanh aside {
		    width: 100% !important;
		}

		.thuvienanh .news-list {
		    margin-bottom: 20px;
		}

		.thuvienanh .news-list .heading {
		    border-bottom: 1px solid #bdc3c7;
		    font-family: arial;
		    font-size: 14px;
		    font-weight: bold;
		    text-transform: uppercase;
		}

		.thuvienanh .news-list .heading p {
		    border-bottom: 3px solid #f39c12;
		    display: inline-block;
		    margin-bottom: 0px;
		}

		.thuvienanh .name-anh {
		    font-weight: bold;
		    font-size: 12px;
		    text-align: center;
		    text-transform: uppercase;
		    color: #2980b9;
		    margin-bottom: 0px;
		    margin-top: 10px;
		}

		.thuvienanh .date {
		    font-style: italic;
		    color: #ea6d62;
		    font-size: 12px;
		    text-align: center;
		}

		.thuvienanh .images-thuvien {
		    margin: 0 auto;
		    width: 100%;
		    height: 100%;
		    max-height: 150px;
		}

		.thuvienanh .list-thuvien {
		    margin-left: 10px;
		}

		.thuvienanh .category-image {
		    position: relative;
		    border: 3px solid #fff;
		    box-shadow: 1px 0px 8px 2px #888888;
		    cursor: pointer;
		}

		.thuvienanh .category-image .number-images {
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

		.thuvienanh .top-images {
		    margin-top: 30px;
		}

		.thuvienanh .pagination2 {
		    height: 80px;
		    position: relative;
		    margin-top: 20px;
		}

		.thuvienanh .pagination2 nav .current {
		    background: #00ADEE;
		    color: #fff;
		}

		.thuvienanh .pagination2 nav .page-numbers {
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

		.thuvienanh .pagination2 nav .current a {
		    color: #fff;
		}

		.thuvienanh .pagination2 .phantrang {
		    position: absolute;
		    left: 30%;
		}

		.thuvienanh .pagination2 nav .current {
		    background: #00ADEE;
		    color: #fff;
		}

		.thuvienanh .list-thuvien .modal-dialog {
		    padding-top: 2%;
		    max-width: 90%;
		    width: 60%;
		    height: 100%;
		    max-height: 900px;
		}

		.thuvienanh .d-block {
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
	<div class="container thuvienanh">
		<div class="row list-thuvien">
			<div class="col-md-8 list-images top-images">
				<div class="container">
					<div class="news-list">
						<div class="heading">
							<p>Thư viện ảnh</p>
						</div>
					</div>
					<?php if(!empty($gallery)): ?>
					<div class="row images-row">
						<?php foreach ($gallery->posts as $key_ga => $section_image): ?>
						<?php 
							$get_gallery = get_field('list_thu_vien_anh', $section_image->ID); 
							$count_gallery = count($get_gallery);
							$image_link = wp_get_attachment_url(get_post_thumbnail_id($section_image->ID));
							if(empty($image_link)) {
								$image_link = 'http://fakeimg.pl/250x150/';
							}	

							$get_date_event = get_field('ngay_su_kien', $section_image->ID);
							if(empty($get_date_event)) {
								$get_date_event = get_the_date( 'd/m/Y', $section_image->ID );
							}
						?>
							<div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
								<div class="category-image">
									<img class="images-thuvien img-responsive" data-toggle="modal" data-target="#gallery_image_<?php echo $key_ga; ?>" src="<?php echo $image_link; ?>" alt="Thư Viện Ảnh">
									<div class="container">
									    <div class="modal fade" id="gallery_image_<?php echo $key_ga; ?>" role="dialog">
										    <div class="modal-dialog">
										        <div class="modal-content" >
											        <div class="modal-body">
											          	<div id="carouselExampleControls_<?php echo $key_ga; ?>" class="carousel slide" data-ride="carousel">
														    <div class="carousel-inner" role="listbox">
														    	<?php 
													    		foreach ($get_gallery as $key_sub_ga => $val_ga) :
													    		?>
															    <div class="carousel-item <?php echo ($key_sub_ga == 0) ? 'active' : '';?>" >
															    	<div class="" style="background-image: url('<?php echo $val_ga['url']; ?>'); background-size: cover;    background-repeat: no-repeat; background-position: center; width: 100%; height: 100%; ">
															        	<img style="width: 100%; height: 100%;" class="d-block img-fluid img-responsive" src="<?php  echo ROOT_URL . '/resources/images/transparent.png'; ?>" alt="First slide">
															    	</div>
															    </div>
																<?php endforeach; ?>
														    </div>
														    <a class="carousel-control-prev" href="#carouselExampleControls_<?php echo $key_ga; ?>" role="button" data-slide="prev">
														        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
														        <span class="sr-only">Previous</span>
														    </a>
														    <a class="carousel-control-next" href="#carouselExampleControls_<?php echo $key_ga; ?>" role="button" data-slide="next">
														        <span class="carousel-control-next-icon" aria-hidden="true"></span>
														        <span class="sr-only">Next</span>
														    </a>
														</div>
											        </div>
											        <div class="modal-footer">
											            <button style="cursor: pointer;" type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
											        </div>
										        </div>
										    </div>
									    </div>
									</div>
									<span class="number-images text-center"><p><?php echo $count_gallery; ?> ảnh</p></span>
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