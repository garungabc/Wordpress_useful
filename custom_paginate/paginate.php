<?php
/**
 * You should to add a add_action into function.php,
 * to use anywhere you want
 */
?>
<style type="text/css">
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
<?php
$paged = ($_GET['trang'] >= 2) ? $_GET['trang'] : 1;
$arg = [    
    'post_type' => 'post',    
    'posts_per_page' => 4,    
    'paged' => $paged,    
    'cat' => $cat_id,];
$custom_query = new WP_Query($arg);
$total_pages = $custom_query->max_num_pages;
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
wp_reset_postdata();