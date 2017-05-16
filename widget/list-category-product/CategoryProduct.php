<?php
namespace App\Widgets;

use MSC\Widget;

/**
 * Get category by id
 * Author: Garung
 * Company: VMMS
 */

class CategoryProduct extends Widget
{
    public function __construct()
    {
        $widget = [
            'id'          => 'product_category_widget',
            'label'       => __('Product Category Widget', 'hmp'),
            'description' => 'This widget shows product by category',
        ];

        $fields = [
            [
                'label' => __('ID các category', 'hmp'),
                'name'  => 'IDs',
                'type'  => 'text',
            ],
            [
                'label' => __('Text link more', 'hmp'),
                'name'  => 'text_link_more',
                'type'  => 'text',
            ],
            [
                'label' => __('Icon link mở rộng', 'hmp'),
                'name'  => 'icon_link_more',
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
        $categories = get_terms(
            [
                'taxonomy' => 'product_cat',
                'hide_empty' => 0,
                'include'    => $instance['IDs'],
                'parent'    => 0
            ]
        );
        ?>
        <style type="text/css">
            .garung-widget-container .product-cate-box {
                margin-bottom: 33px;
            }

            .garung-widget-container .product-cate-box .product-cate-list {
                margin: 0;
                border: 1px solid #eae9e9;
            }

            .garung-widget-container .product-cate-box .product-cate-list .product-column {
                border-left: 1px solid #eae9e9;
                position: relative;
            }

            .garung-widget-container .product-cate-box .product-cate-list .product-column:first-child {
                border-left: 0;
            }

            .garung-widget-container .product-cate-box .product-cate-list .product-column .product-item {
                padding: 23px 10px;
                text-align: center;
            }

            .garung-widget-container .product-cate-box .product-cate-list .product-column .product-item .product-cate-title {
                color: #636363;
                padding: 23px 0 0;
            }

            .garung-widget-container .product-cate-box .product-cate-list .product-column .product-item .product-contact {
                color: #f47f1d;
                text-transform: uppercase;
                font-weight: bold;
                display: block;
                margin: 12px 0;
            }

            .garung-widget-container .product-cate-box .product-cate-list .product-column .product-item .btn {
                background-color: #f47f1d;
                color: #fff;
                text-transform: uppercase;
                font-weight: bold;
            }

            .garung-widget-container .product-cate-heading {
                background-color: #2EC066;
                height: 40px;
                line-height: 40px;
                padding: 0 15px 0 0;
            }

            .garung-widget-container .product-cate-heading h3 {
                margin: 0;
                float: left;
                font-size: 0.9286rem;
                font-weight: bold;
                text-transform: uppercase;
                line-height: 40px;
                color: #fff;
                background-color: #1d984c;
                padding: 0 20px;
                position: relative;
                white-space: nowrap;
            }

            .garung-widget-container .product-cate-heading h3:after {
                content: "";
                background-image: url(../../assets/img/cate_title_gb.png);
                width: 24px;
                position: absolute;
                bottom: 0px;
                height: 40px;
                right: -23px;
                background-repeat: no-repeat;
            }

            .garung-widget-container .product-cate-heading p {
                float: right;
                text-transform: uppercase;
                margin-bottom: 0;
            }

            .garung-widget-container .product-cate-heading p a {
                color: #fff;
                font-size: 0.9286rem;
                text-decoration: none;
            }

            .garung-widget-container .product-cate-heading.product-cate-heading__no-bg-color {
                background-color: transparent;
            }

            .garung-widget-container .product-item-hidden {
                position: absolute;
                background: linear-gradient(#ffffff, #91ff96);
                z-index: 10;
                padding: 15px;
                box-shadow: 0 0 5px 3px #ccc;
                display: none;
                top: 0;
                right: 0;
                width: 100%;
            }

            .garung-widget-container .product-item-hidden h3 {
                color: #008f45;
                font-size: 1.1429rem;
                font-weight: bold;
                margin: 0 0 18px 0;
            }

            .garung-widget-container .product-item-hidden .popup-meta {
                text-align: right;
                font-size: 0.9571rem;
            }

            .garung-widget-container .product-item-hidden .product-list-parameter {
                font-size: 0.7807rem;
            }

            .garung-widget-container .product-item-hidden .product-parameters label {
                color: red;
                font-size: 0.7807rem;
            }
        </style>
        <?php
        echo '<div class="garung-widget-container">';
        if (!empty($categories)) {
            foreach ($categories as $cate) {
                ?>
                <div class="product-cate-box">
                    <div class="product-cate-heading">
                        <h3>
                            <i class="fa fa-star-o"></i>
                            <?php echo $cate->name; ?>
                        </h3>
                        <p>
                            <a href="<?php echo get_term_link($cate->term_id); ?>">
                                <b><?php echo (!empty($instance['text_link_more']) ? $instance['text_link_more'] : 'Tất cả' );  ?></b>
                                <i class="<?php echo (!empty($instance['icon_link_more']) ? $instance['icon_link_more'] : 'fa fa-angle-double-right' );  ?>"></i>
                            </a>
                        </p>
                    </div>
                    <?php 
                    $args_pro = [
                        'post_type'             => 'product',
                        'post_status'           => 'publish',
                        'posts_per_page'        => '4',
                        'tax_query' => array(
                            array(
                                'taxonomy'      => 'product_cat',
                                'field' => 'term_id',
                                'terms'         => $cate->term_id
                            )
                        )
                    ];
                    $get_products = new \WP_Query($args_pro);
                    if (!empty($get_products)) {
                        echo '<div class="row product-cate-list">';

                        foreach ($get_products->posts as $key => $pro) {
                            $id = $pro->ID;
                            $title = $pro->post_title;
                            $img = wp_get_attachment_url(get_post_thumbnail_id($id));
                            $img = ($img) ? $img : 'http://placehold.it/128x164';
                            $url = get_permalink();

                            $data = [
                                    'id' => $id,
                                    'title' => $title,
                                    'img'   => $img,
                                    'url'   => $url
                                ];

                            $col = 3;
                            ?>
                            <div class="col-md-<?php echo $col; ?> col-sm-<?php echo $col; ?> col-xs-12 product-column">
                                <div class="product-item">
                                    <a href="<?php echo $url; ?>">
                                        <div class="product-cate-img"><img src="<?php echo $img; ?>" alt="" /></div>
                                        <div class="product-cate-title">
                                            <b><?php echo $title; ?></b>
                                        </div>
                                        <a href="<?php echo $url; ?>" class="product-contact">
                                            <?php _e('Liên hệ'); ?>
                                        </a>
                                        <a class="btn" href="<?php echo $url; ?>">
                                            <?php _e('Đặt hàng', 'hmp'); ?>
                                        </a>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                        echo '</div>';
                    }
                    ?>
                </div>
                <?php
            }
        }
        echo '</div>';
    }
}