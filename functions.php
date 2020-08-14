<?php

add_action('wp_enqueue_scripts', 'fdc_enqueue_styles');
function fdc_enqueue_styles()
{
    $parenthandle = 'twentytwenty';
    $theme = wp_get_theme();
    wp_enqueue_style(
        $parenthandle,
        get_template_directory_uri() . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );

    wp_enqueue_style(
        'fdc-style',
        get_stylesheet_uri(),
        array('twentytwenty'),
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}

// add Google Analytics to the footer
add_action('wp_footer', 'fdc_add_google_analytics_tag');
function fdc_add_google_analytics_tag()
{
    echo '<!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-175458080-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag(\'js\', new Date());

        gtag(\'config\', \'UA-175458080-1\');
        </script>
    ';
}
