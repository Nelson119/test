<?php 

function create_post_type_category()
{
    $labels = array(
        'name'              => _x( '聽場演講分類', 'taxonomy general name' ),
        'singular_name'     => _x( '聽場演講分類', 'taxonomy singular name' ),
        'search_items'      => __( '搜尋分類' ),
        'all_items'         => __( '所有' ),
        'parent_item'       => __( '選擇上層分類' ),
        'parent_item_colon' => __( '選擇上層分類:' ),
        'edit_item'         => __( '編輯上層分類' ), 
        'update_item'       => __( '更新上層分類' ),
        'add_new_item'      => __( '新增分類' ),
        'new_item_name'     => __( '新分類' ),
        'menu_name'         => __( '分類' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,  
        'label' => 'Themes store',  //Display name
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'video'
        )
    );
    register_taxonomy( '聽場演講', '聽場演講', $args );// Register Taxonomies for Category
    $labels = array(
        'name'              => _x( '來點專欄分類', 'taxonomy general name' ),
        'singular_name'     => _x( '來點專欄分類', 'taxonomy singular name' ),
        'search_items'      => __( '搜尋分類' ),
        'all_items'         => __( '所有' ),
        'parent_item'       => __( '選擇上層分類' ),
        'parent_item_colon' => __( '選擇上層分類:' ),
        'edit_item'         => __( '編輯上層分類' ), 
        'update_item'       => __( '更新上層分類' ),
        'add_new_item'      => __( '新增分類' ),
        'new_item_name'     => __( '新分類' ),
        'menu_name'         => __( '分類' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,  
        'label' => 'Themes store',  //Display name
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'column'
        )
    );
    register_taxonomy( '來點專欄', '來點專欄', $args );// Register Taxonomies for Category

}
add_action('init', 'create_post_type_category');



?>