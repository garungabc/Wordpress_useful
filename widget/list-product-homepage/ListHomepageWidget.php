<?php 

namespace App\Widget;

use MSC\Widget;

/**
* Show title as a line on homepage
*/
class ListHomepageWidget extends Widget
{
	public function __construct()
    {
        $widget = [
            'id'          => 'product_category_widget',
            'label'       => __('Product Category Widget', 'thaoduoc'),
            'description' => 'This widget shows product by category',
        ];

        $fields = [
            [
                'label' => __('ID các category', 'thaoduoc'),
                'name'  => 'IDs',
                'type'  => 'text',
            ],
            [
                'label' => __('Text link more', 'thaoduoc'),
                'name'  => 'text_link_more',
                'type'  => 'text',
            ],
            [
                'label' => __('Icon link mở rộng', 'thaoduoc'),
                'name'  => 'icon_link_more',
                'type'  => 'text',
            ],
            [
                'label' => __('Số cột chia sản phẩm (max: 12)', 'thaoduoc'),
                'name'  => 'number_column',
                'type'  => 'text',
            ]
        ];

        parent::__construct($widget, $fields);
    }

    /**
     * [handle description]
     * @param  [type] $instance [description]
     * @return [type]           [description]
     */
    public function handle($instance)
    {

        global $post, $wp_query, $product;
        ?>
        <div class="homepage-product-list container">
            <div class="product-cate-box">
                <?php 
                $args_pro = [
                    'post_type'             => 'product',
                    'post_status'           => 'publish',
                    'posts_per_page'        => '4'
                ];
                $get_products = new \WP_Query($args_pro);
                if (!empty($get_products)) {
                    echo '<div class="row product-cate-list">';

                    foreach ($get_products->posts as $key => $pro) {
                        $id = $pro->ID;
                        $title = $pro->post_title;
                        $img = wp_get_attachment_url(get_post_thumbnail_id($id));
                        $img = ($img) ? $img : 'http://placehold.it/128x164';
                        $url = get_permalink($pro->ID);

                        $data = [
                                'id' => $id,
                                'title' => $title,
                                'img'   => $img,
                                'url'   => $url
                            ];

                        $col = $instance['number_column'];
                        if(empty($col)) {
                        	$col = 3;
                        }

                        $product = new \WC_Product($pro->ID);
                        $price = $product->get_price();
                        ?>
                        <div class="col-md-<?php echo $col; ?> col-sm-<?php echo $col; ?> col-xs-12 product-column">
                            <div class="product-item">
                                    <div class="product-cate-img">
                                		<a href="<?php echo $url; ?>">
	                                    	<img src="<?php echo asset('images/transparent-product.png'); ?>" style="background: url('<?php echo $img; ?>') no-repeat center center; background-size: cover;width: 100%;max-height: 235px;overflow: hidden;height: 235px;" />
	                                	</a>
	                                </div>
                                    <div class="product-cate-title">
                                        <a href=""><?php echo $title; ?></a>
                                    </div>
                                    <div class="product-price">
                                        <span class="title-price">Giá bán: </span>
                                        <span class="price-main"><?php echo wc_price($price); ?></span>
                                    </div>
                                   	<div class="row more-info">
                                   		<div class="col-md-6 col-sm-6 col-xs-12 pull-left sub-more-left">
                                   			<i class="fa fa-calendar" aria-hidden="true"></i> 
                                   			<span class="datetime-post"><?php echo get_the_date( 'd/m/Y', $post_id ); ?></span>
                                   		</div>
                                   		<div class="col-md-6 col-sm-6 col-xs-12 pull-right sub-more-right">
                                   			<i class="fa fa-comments" aria-hidden="true"></i>
                                   			<span class="comment-post">
                                   				Không có phản hồi
                                   			</span>
                                   		</div>
                                   	</div>
                            </div>
                        </div>
                        <?php
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div>
	<?php
    }
}