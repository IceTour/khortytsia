<?php

//Clear header

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

show_admin_bar(false);

//Theme setup

function theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    register_nav_menus(array(
        'secondary_menu' => 'Footer'
    ));
}

add_action('after_setup_theme', 'theme_setup');

//Enqueue scripts

function theme_scripts()
{
    wp_deregister_script('wp-embed');
    wp_deregister_script('jquery');
    wp_deregister_script('jquery-migrate');
    wp_enqueue_script('app', get_theme_file_uri('dist/app.js'), null, '', true);
}

add_action('wp_enqueue_scripts', 'theme_scripts');


// Enqueue styles

function theme_styles()
{
    wp_enqueue_style('theme-app', get_theme_file_uri('dist/app.css'), null, null);
}

add_action('wp_enqueue_scripts', 'theme_styles');


// Contact list

function theme_customize_register($wp_customize)
{
    $wp_customize->add_section('contacts', [
        'title' => 'Социальные ссылки',
        'priority' => 30,
    ]);
    $wp_customize->add_setting('facebook');
    $wp_customize->add_control('facebook', [
        'section' => 'contacts',
        'label' => 'Facebook',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('instagram');
    $wp_customize->add_control('instagram', [
        'section' => 'contacts',
        'label' => 'Instagram',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('youtube');
    $wp_customize->add_control('youtube', [
        'section' => 'contacts',
        'label' => 'YouTube',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('email');
    $wp_customize->add_control('email', [
        'section' => 'contacts',
        'label' => 'E-mail',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('email2');
    $wp_customize->add_control('email2', [
        'section' => 'contacts',
        'label' => 'E-mail бухгалтерии',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('phone1');
    $wp_customize->add_control('phone1', [
        'section' => 'contacts',
        'label' => 'Телефон',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('phone2');
    $wp_customize->add_control('phone2', [
        'section' => 'contacts',
        'label' => 'Телефон',
        'type' => 'text',
    ]);
}

add_action('customize_register', 'theme_customize_register');

// DD

function dd($args)
{
    echo '<pre>';
    var_dump($args);
    echo '</pre>';

    die();
}

// Post types

require_once('post-types/tourist.php');
require_once('post-types/partners.php');

//Vue
function get_ajax_posts()
{
    $args = [
        'category_name' => $_POST['category'],
        'posts_per_page' => 4,
        'paged' => $_POST['paged'],
    ];

    // The Query
    $ajaxposts = new WP_Query($args); // changed to get_posts from wp_query, because `get_posts` returns an array

    echo json_encode([
        'posts' => format_posts($ajaxposts->posts),
        'last_page' => $ajaxposts->max_num_pages,
    ]);

    exit;
}

// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_get_ajax_posts', 'get_ajax_posts');
add_action('wp_ajax_nopriv_get_ajax_posts', 'get_ajax_posts');

function format_posts($posts)
{
    if (!is_array($posts)) {
        return null;
    }

    $computed = [];

    foreach ($posts as $post) {
        array_push($computed, [
            'title' => $post->post_title,
            'image' => get_the_post_thumbnail_url($post->ID, 'large'),
            'posted_at' => get_the_date('j.m.Y', $post->ID),
            'description' => wp_trim_words($post->post_content, 30, '...'),
            'permalink' => get_the_permalink($post->ID),
        ]);
    }

    return $computed;
}
