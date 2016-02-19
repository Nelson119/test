<?php 

function create_post_type_category()
{
    $labels = array(
        'name'              => _x( '人物專訪分類', 'taxonomy general name' ),
        'singular_name'     => _x( '人物專訪分類', 'taxonomy singular name' ),
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
            'slug' => '人物專訪'
        )
    );
    register_taxonomy( '人物專訪', '人物專訪', $args );// Register Taxonomies for Category
    $labels = array(
        'name'              => _x( '專題報導分類', 'taxonomy general name' ),
        'singular_name'     => _x( '專題報導分類', 'taxonomy singular name' ),
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
            'slug' => '專題報導'
        )
    );
    register_taxonomy( '專題報導', '專題報導', $args );// Register Taxonomies for Category
    $labels = array(
        'name'              => _x( '精選活動分類', 'taxonomy general name' ),
        'singular_name'     => _x( '精選活動分類', 'taxonomy singular name' ),
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
            'slug' => '精選活動'
        )
    );
    register_taxonomy( '精選活動', '精選活動', $args );// Register Taxonomies for Category
   
    $labels = array(
        'name'              => _x( '婚禮DIY分類', 'taxonomy general name' ),
        'singular_name'     => _x( '婚禮DIY分類', 'taxonomy singular name' ),
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
            'slug' => '婚禮DIY'
        )
    );
    register_taxonomy( '婚禮DIY', '婚禮DIY', $args );// Register Taxonomies for Category
    $labels = array(
        'name'              => _x( '廠商資訊分類', 'taxonomy general name' ),
        'singular_name'     => _x( '廠商資訊分類', 'taxonomy singular name' ),
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
            'slug' => '廠商資訊'
        )
    );
    register_taxonomy( '廠商資訊', '廠商資訊', $args );// Register Taxonomies for Category
    $labels = array(
        'name'              => _x( '禮俗教室分類', 'taxonomy general name' ),
        'singular_name'     => _x( '禮俗教室分類', 'taxonomy singular name' ),
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
            'slug' => '禮俗教室'
        )
    );
    register_taxonomy( '禮俗教室', '禮俗教室', $args );// Register Taxonomies for Category

    $labels = array(
        'name'              => _x( '置頂項目分類', 'taxonomy general name' ),
        'singular_name'     => _x( '置頂項目分類', 'taxonomy singular name' ),
        'search_items'      => __( '搜尋分類' ),
        'all_items'         => __( '所有' ),
        'parent_item'       => __( '選擇上層分類' ),
        'parent_item_colon' => __( '選擇上層分類:' ),
        'edit_item'         => __( '編輯上層分類' ), 
        'update_item'       => __( '更新上層分類' ),
        'add_new_item'      => __( '新增分類' ),
        'new_item_name'     => __( '新分類' ),
        'menu_name'         => __( '置頂設定' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,  
        'label' => 'Themes store',  //Display name
        'query_var' => true,
        'rewrite' => array(
            'slug' => '置頂項目'
        )
    );
    register_taxonomy( '置頂項目', '置頂項目', $args );// Register Taxonomies for Category

    
    $labels = array(
        'name'              => _x( '優質首選分類', 'taxonomy general name' ),
        'singular_name'     => _x( '優質首選分類', 'taxonomy singular name' ),
        'search_items'      => __( '搜尋分類' ),
        'all_items'         => __( '所有' ),
        'parent_item'       => __( '選擇上層分類' ),
        'parent_item_colon' => __( '選擇上層分類:' ),
        'edit_item'         => __( '編輯上層分類' ), 
        'update_item'       => __( '更新上層分類' ),
        'add_new_item'      => __( '新增分類' ),
        'new_item_name'     => __( '新分類' ),
        'menu_name'         => __( '優質首選' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,  
        'label' => 'Themes store',  //Display name
        'query_var' => true,
        'rewrite' => array(
            'slug' => '優質首選'
        )
    );
    register_taxonomy( '優質首選', '優質首選', $args );// Register Taxonomies for Category
    
    $labels = array(
        'name'              => _x( 'Popular 分類', 'taxonomy general name' ),
        'singular_name'     => _x( 'Popular 分類', 'taxonomy singular name' ),
        'search_items'      => __( '搜尋分類' ),
        'all_items'         => __( '所有' ),
        'parent_item'       => __( '選擇上層分類' ),
        'parent_item_colon' => __( '選擇上層分類:' ),
        'edit_item'         => __( '編輯上層分類' ), 
        'update_item'       => __( '更新上層分類' ),
        'add_new_item'      => __( '新增分類' ),
        'new_item_name'     => __( '新分類' ),
        'menu_name'         => __( 'Popular' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,  
        'label' => 'Themes store',  //Display name
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'Popular'
        )
    );
    register_taxonomy( 'Popular', 'Popular', $args );// Register Taxonomies for Category
}
add_action('init', 'create_post_type_category');



?>