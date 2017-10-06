// Add custom Theme Functions here																									
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );																									
																									
function remove_wp_logo( $wp_admin_bar ) {																									
																									
}																									
//Change the Standard WordPress Greeting																									
																									
add_action( 'admin_bar_menu', 'wp_admin_bar_my_custom_account_menu', 11 );																									
																									
function wp_admin_bar_my_custom_account_menu( $wp_admin_bar ) {																									
$user_id = get_current_user_id();																									
$current_user = wp_get_current_user();																									
$profile_url = get_edit_profile_url( $user_id );																									
																									
if ( 0 != $user_id ) {																									
/* Add the "My Account" menu */																									
$avatar = get_avatar( $user_id, 28 );																									
$howdy = sprintf( __('Welcome, %1$s'), $current_user->display_name );																									
$class = empty( $avatar ) ? '' : 'with-avatar';																									
																									
$wp_admin_bar->add_menu( array(																									
id' => 'my-account',																									
parent' => 'top-secondary',																									
title' => $howdy . $avatar,																									
href' => $profile_url,																									
meta' => array(																									
class' => $class,																									
),																									
) );																									
																									
}																									
}																									
//Change the Footer																									
function remove_footer_admin () {																									
echo "This site is created by -Veekli ";																									
}																									
																									
add_filter('admin_footer_text', 'remove_footer_admin');																									
																									
// Remove update options																									
																									
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );																									
																									
// remove screen option																									
function remove_screen_options_tab()																									
{																									
return false;																									
}																									
add_filter('screen_options_show_screen', 'remove_screen_options_tab');																									
																									
function hide_help() {																									
echo '																									
; } add_action('admin_head', 'hide_help');																									
																									
//Disable Update Reminders																									
																									
if ( !current_user_can( 'edit_users' ) ) {																									
add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );																									
add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );																									
}																									
																									
//remove help																									
add_action('admin_head', 'mytheme_remove_help_tabs');																									
function mytheme_remove_help_tabs() {																									
$screen = get_current_screen();																									
$screen->remove_help_tabs();																									
																									
																									
																									
