<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


/*------------------------------------*\
    增加主題支援
\*------------------------------------*/

if (!isset($content_width)) {
    $content_width = 900;
}
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true);                                                                                 // 大尺寸縮圖
    add_image_size('medium', 250, '', true);                                                                                // 中尺寸縮圖
    add_image_size('small', 120, '', true);                                                                                 // 小尺寸縮圖
    add_image_size('custom-size', 700, 200, true);                                                                          // 自定義縮圖 the_post_thumbnail('custom-size');
    add_theme_support('automatic-feed-links');
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
    要載入的檔案
\*------------------------------------*/

include_once "include/post-type/cpt1.php";                                                                                  // 載入自定義文章
include_once "include/nav/nav.php";                                                                                         // 載入選單
include_once "include/widget/widget.php";
include_once "include/shortcode/shortcode.php";                                                                                   // 載入側邊欄小工具

/*------------------------------------*\
    要移除的功能
\*------------------------------------*/
function html5_style_remove($tag){return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);}                           // 移除 text/css
function my_wp_nav_menu_args($args = ''){$args['container'] = false;return $args;}                                          // 移除選單的div
function my_css_attributes_filter($var){return is_array($var) ? array() : '';}                                              // 移除選單多餘的ID
function remove_category_rel_from_category_list($thelist){return str_replace('rel="category tag"', 'rel="tag"', $thelist);} // 移除分類invalid rel
function my_remove_recent_comments_style() {                                                                                // 移除最新留言style
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}
function remove_thumbnail_dimensions( $html ) {                                                                             // 移除特色圖片長寬屬性
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

/*------------------------------------*\
    修改原有的功能
\*------------------------------------*/
function html5blankgravatar ($avatar_defaults) {                                                                            // 自定大頭貼
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}
function enable_threaded_comments() {                                                                                       // 自定留言格式
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}
function html5blankcomments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
    <br />
<?php endif; ?>
    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
        <?php
            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
        ?>
    </div>
    <?php comment_text() ?>
    <div class="reply">
    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php }

/*------------------------------------*\
    新加入的功能
\*------------------------------------*/

// 加入 body class 名稱
function add_slug_to_body_class($classes) {
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }
    return $classes;
}

// 分頁導覽
function html5wp_pagination() {
    global $wp_query;
    $big = 999999999;
    $paged = (get_query_var('paged') !== 0) ? get_query_var('paged') : 1;
    $pages = paginate_links( array(
        'base'      =>  @add_query_arg('page','%#%'),
        'format'    => '?paged=%#%',
        'current'   => $paged,
        'total'     => $wp_query->max_num_pages,
        'type'      => 'array',
        'prev_next' => true,
        'prev_text' => __('<img src="/wp-content/themes/sage-theme/dist/images/common/prev.png">'),
        'next_text' => __('<img src="/wp-content/themes/sage-theme/dist/images/common/next.png">'),
    ) );
    if( is_array( $pages ) ) {
        $i = 0;
        echo "<li><a href=\"?paged=1\" class=\"first page-numbers\"><img src=\"/wp-content/themes/sage-theme/dist/images/common/dual-prev.png\"></a></li>"; 
        foreach ( $pages as $page ) {
            $active = '';
            if($i == $paged){
                $active = ' class="active"';
            }
            echo "<li".$active.">$page</li>"; 
            $i++;
        }
        $i--;
        echo "<li><a href=\"?paged=$i\" class=\"first page-numbers\"><img src=\"/wp-content/themes/sage-theme/dist/images/common/dual-next.png\"></a></li>";
    }
}
function html5wp_index($length){return 20;}         // 首頁文章摘要 html5wp_excerpt('html5wp_index');
function html5wp_custom_post($length){return 240;}   // 內頁文章摘要 html5wp_excerpt('html5wp_custom_post');
function html5wp_excerpt($length_callback = '', $more_callback = '') {
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    $output = get_the_excerpt();
    $output = '' . $output . '';
    echo $output;
}
function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// 允許上傳 SVG
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');




/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'print_emoji_detection_script', 7 );
remove_action('wp_print_styles', 'print_emoji_styles' );

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('show_admin_bar', '__return_false'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether




/* 自訂登入畫面LOGO */ 
add_action( 'login_head', 'new_login_logo' );
function new_login_logo() {
     echo '<style type="text/css">
              .login h1 a {
                 background-image:url('.get_template_directory_uri().'/dist/images/common/login-logo.png) !important;
                 background-size: 270px 164px !important;
                 width:270px !important;
                 height:164px !important;
              }
           </style>';
}


/* 變更自訂登入畫面上LOGO的連結 */ 
function custom_loginlogo_url($url) {
    return get_bloginfo('url');
}
add_filter( 'login_headerurl', 'custom_loginlogo_url' );



/* 變更自訂登入畫面上LOGO的Hover所出現的標題 */ 
function put_my_title(){
    return ('LongVision'); // 原本預設是"Powered by WordPress"
}
add_filter('login_headertitle', 'put_my_title');



/* 移除控制台左上角WP-LOGO */ 
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function remove_wp_logo( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'wp-logo' );
}

/* 修改後台底下的wordpress文字宣告 */ 
function custom_dashboard_footer () {
     echo '官網維護單位 : <a href="http://nongdesign.com/">弄弄設計</a>。後台如有任何問題, 請聯絡<a href="http://nongdesign.com/">弄弄設計</a>';
  }
add_filter('admin_footer_text', 'custom_dashboard_footer');


/* 隱藏後台右下角wp版本號 */ 
function change_footer_admin () {return '&nbsp;';}
add_filter('admin_footer_text', 'change_footer_admin', 9999);
function change_footer_version() {return ' ';}
add_filter( 'update_footer', 'change_footer_version', 9999);


/* 強制關閉後台登入首頁的小工具 */ 
function wpc_dashboard_widgets() {
    global $wp_meta_boxes;
 
    // 現況
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
 
    // 近期迴響
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
 
    // 收到新鏈結
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
 
    // 外掛
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
 
    //////
 
    // 快貼
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
 
    // 近期草稿
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
 
    // WordPress Blog
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
 
    // Other WordPress News
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');

remove_action('welcome_panel', 'wp_welcome_panel');
/*
 * Replace Taxonomy slug with Post Type slug in url
 * Version: 1.1
 */
function taxonomy_slug_rewrite($wp_rewrite) {
    $rules = array();
    // get all custom taxonomies
    $taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
    // get all custom post types
    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects');
     
    foreach ($post_types as $post_type) {
        foreach ($taxonomies as $taxonomy) {
         
            // go through all post types which this taxonomy is assigned to
            foreach ($taxonomy->object_type as $object_type) {
                 
                // check if taxonomy is registered for this custom type
                if ($object_type == $post_type->rewrite['slug']) {
             
                    // get category objects
                    $terms = get_categories(array('type' => $object_type, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0));
             
                    // make rules
                    foreach ($terms as $term) {
                        $rules[$object_type . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
                    }
                }
            }
        }
    }
    // merge with global rules
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'taxonomy_slug_rewrite');

remove_filter('term_description','wpautop');

function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = '禮俗教室';
    $submenu['edit.php'][5][0] = '禮俗教室';
    $submenu['edit.php'][10][0] = '新增禮俗教室';
    $submenu['edit.php'][15][0] = '禮俗教室分類'; // Change name for categories
    $submenu['edit.php'][16][0] = '禮俗教室標籤'; // Change name for tags
    echo '';
}

function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = '禮俗教室';
        $labels->singular_name = '禮俗教室';
        $labels->add_new = '新增禮俗教室';
        $labels->add_new_item = '新增禮俗教室';
        $labels->edit_item = '修改';
        $labels->new_item = '新增';
        $labels->view_item = '檢視';
        $labels->search_items = '尋找…';
        $labels->not_found = '找不到項目';
        $labels->not_found_in_trash = '找不到垃圾桶中的項目';
    }
    add_action( 'init', 'change_post_object_label' );
    add_action( 'admin_menu', 'change_post_menu_label' );

/* 隱藏後台上放Admin Bar 的新增與comments功能 */ 
function remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');         // Remove the comments link
    $wp_admin_bar->remove_menu('new-content');      // Remove the content link
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );



// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}
/**
 * Add prev and next links to a numbered page link list
 */
function wp_link_pages_args_prevnext_add($args)
{
    global $page, $numpages, $more, $pagenow;

    if (!$args['next_or_number'] == 'next_and_number') 
        return $args; # exit early

    $args['next_or_number'] = 'number'; # keep numbering for the main part
    if (!$more)
        return $args; # exit early

    if($page-1) # there is a previous page
        $args['before'] .= _wp_link_page($page-1)
            . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'
        ;

    if ($page<$numpages) # there is a next page
        $args['after'] = _wp_link_page($page+1)
            . $args['link_before'] . ' ' . $args['nextpagelink'] . $args['link_after'] . '</a>'
            . $args['after']
        ;

    return $args;
}
add_filter('wp_link_pages_args', 'wp_link_pages_args_prevnext_add');

 /* Add Next Page Button in First Row */
add_filter( 'mce_buttons', 'my_add_next_page_button', 1, 2 ); // 1st row
 
/**
 * Add Next Page/Page Break Button
 * in WordPress Visual Editor
 * 
 * @link https://shellcreeper.com/?p=889
 */
function my_add_next_page_button( $buttons, $id ){
 
    /* only add this for content editor */
    if ( 'content' != $id )
        return $buttons;
 
    /* add next page after more tag button */
    array_splice( $buttons, 13, 0, 'wp_page' );
 
    return $buttons;
}

function alter_query_so_15250127($qry) {
    $tax = get_query_var( 'taxonomy' );
    $posttype = $qry->query_vars['post_type'];
    $cpt = (
        $posttype == 'interview' ||
        $posttype == 'report' ||
        $posttype == 'customs' ||
        $posttype == 'creativity' ||
        $posttype == 'event'
    );

    if ( $qry->is_main_query() && $cpt) {
        $list_exclude = array();
        if($tax == '' || $tax == null){
            $hot_args =  array(
                array(
                    'taxonomy'  => '置頂項目',
                    'field'     => 'slug',
                    'terms'     => 'hot',
                )
            );
            $highlight_args =  array(
                array(
                    'taxonomy'  => '置頂項目',
                    'field'     => 'slug',
                    'terms'     => 'highlight',
                )
            );
            $select_args =  array(
                array(
                    'taxonomy'  => '置頂項目',
                    'field'     => 'slug',
                    'terms'     => 'select',
                )
            );
        }else{
            $hot_args =  array(
                array(
                    'taxonomy'  => '置頂項目',
                    'field'     => 'slug',
                    'terms'     => 'hot',
                ),
                array(
                    'taxonomy'  => $tax,
                    'field'     => 'slug',
                    'terms'     => $term->name
                )
            );
            $highlight_args =  array(
                array(
                    'taxonomy'  => '置頂項目',
                    'field'     => 'slug',
                    'terms'     => 'highlight',
                ),
                array(
                    'taxonomy'  => $tax,
                    'field'     => 'slug',
                    'terms'     => $term->name
                )
            );
            $select_args =  array(
                array(
                    'taxonomy'  => '置頂項目',
                    'field'     => 'slug',
                    'terms'     => 'select',
                ),
                array(
                    'taxonomy'  => $tax,
                    'field'     => 'slug',
                    'terms'     => $term->name
                )
            );
        }
        $hot = new WP_Query (array (
            'post_type' => $posttype,
            'tax_query' => $hot_args,
            'posts_per_page' => 1,
            'orderby' => 'date',
            'order' => 'desc',
            'paged' => 1
        ));
        $highlight = new WP_Query (array (
            'post_type' => $posttype,
            'tax_query' => $highlight_args,
            'posts_per_page' => 1,
            'orderby' => 'date',
            'order' => 'desc',
            'paged' => 1
        ));
        $select = new WP_Query (array (
            'post_type' => $posttype,
            'tax_query' => $select_args,
            'posts_per_page' => 1,
            'orderby' => 'date',
            'order' => 'desc',
            'paged' => 1
        ));

        if ($highlight->have_posts()) : $highlight->the_post();
            array_push($list_exclude,get_the_id());
        endif;
        if ($select->have_posts()) : $select->the_post();
            array_push($list_exclude,get_the_id());
        endif;
        if ($hot->have_posts()) : $hot->the_post();
            array_push($list_exclude,get_the_id());
        endif;

        $qry->set('post__not_in', $list_exclude);
        $qry->set('orderby', 'date');
        $qry->set('order', 'desc');
        $qry->set('posts_per_page', 6);
    }

}
add_action('pre_get_posts','alter_query_so_15250127');