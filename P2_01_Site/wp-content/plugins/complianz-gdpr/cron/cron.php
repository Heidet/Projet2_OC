<?php
defined('ABSPATH') or die("you do not have acces to this page!");

//switch to Cron here.

/*
  Schedule cron jobs if useCron is true
  Else start the functions.
*/
add_action('plugins_loaded','cmplz_schedule_cron');
function cmplz_schedule_cron() {
    $useCron = true;
    if ($useCron) {
        if ( ! wp_next_scheduled('cmplz_every_week_hook') ) {
            wp_schedule_event( time(), 'cmplz_weekly', 'cmplz_every_week_hook' );
        }

        if ( ! wp_next_scheduled('cmplz_every_day_hook') ) {
            wp_schedule_event( time(), 'cmplz_daily', 'cmplz_every_day_hook' );
        }

        if ( ! wp_next_scheduled('cmplz_every_month_hook') ) {
            wp_schedule_event( time(), 'cmplz_monthly', 'cmplz_every_month_hook' );
        }

        //link function to this custom cron hook
        add_action( 'cmplz_every_week_hook', array(COMPLIANZ()->document, 'cron_check_last_updated_status'));
        add_action( 'cmplz_every_month_hook', 'cmplz_cron_clean_placeholders');

        add_action( 'cmplz_every_day_hook', array(COMPLIANZ()->document, 'generate_cookie_policy_snapshot'));

        if (defined('cmplz_premium')) {
            add_action( 'cmplz_every_day_hook', array(COMPLIANZ()->statistics, 'cron_maybe_enable_best_performer'));
            add_action( 'cmplz_every_day_hook', array(COMPLIANZ()->geoip, 'cron_check_geo_ip_db'));
        }

    } else {
        add_action( 'init', 'cmplz_cron_clean_placeholders');
        add_action( 'init', array(COMPLIANZ()->document, 'generate_cookie_policy_snapshot'));

        add_action( 'init', array(COMPLIANZ()->document, 'cron_check_last_updated_status'), 100);
        if (defined('cmplz_premium')) add_action( 'init', array(COMPLIANZ()->statistics, 'cron_maybe_enable_best_performer'));
        if (defined('cmplz_premium')) add_action( 'init', array(COMPLIANZ()->geoip, 'cron_check_geo_ip_db'));

    }
}

add_filter( 'cron_schedules', 'cmplz_filter_cron_schedules' );
function cmplz_filter_cron_schedules( $schedules ) {
    $schedules['cmplz_monthly'] = array(
        'interval' => MONTH_IN_SECONDS,
        'display'  => __( 'Once every month' )
    );
    $schedules['cmplz_weekly'] = array(
        'interval' => WEEK_IN_SECONDS,
        'display'  => __( 'Once every week' )
    );
    $schedules['cmplz_daily'] = array(
        'interval' => DAY_IN_SECONDS,
        'display'  => __( 'Once every day' )
    );

    return $schedules;
}


register_deactivation_hook( __FILE__, 'cmplz_clear_scheduled_hooks' );
function cmplz_clear_scheduled_hooks(){
    wp_clear_scheduled_hook( 'cmplz_every_week_hook' );
    wp_clear_scheduled_hook( 'cmplz_every_day_hook' );
}

function cmplz_cron_clean_placeholders(){
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    $uploads = wp_upload_dir();
    $dirname =  $uploads['basedir'] . "/complianz/placeholders";

    array_map('unlink', glob("$dirname/*.*"));
}



