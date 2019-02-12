<?php
/*
Plugin Name: greeting widget
Plugin URI: http://wordpress.org/extend/plugins/#
Description: This is an example plugin
Author: Nijhum jawad
Version: 1.0.0
Author URI: http://njawad.techlaunch.io/Portfolio/
*/
// register Greeting_Widget
add_action('widgets_init', function(){
   register_widget( 'Greeting_Widget' );
});
class Greeting_Widget extends WP_Widget {
 /**
 * To create the example widget all four methods will be
 * nested inside this single instance of the WP_Widget class.
 **/
 public function __construct() {
   $widget_options = array(
     'classname' => 'greeting_widget',
     'description' => 'This is a Greeting Widget example for WP class',
   );
   parent::__construct( 'greeting_widget', 'greeting widget', $widget_options );
 }
public function widget( $args, $instance ) {
   $title = apply_filters( 'widget_title', $instance[ 'title' ] );
   $blog_title = get_bloginfo( 'name' );
   $tagline = get_bloginfo( 'description' );
   echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; 
   
   $a=array("welcome"=>"a","helo"=>"b","nice to meet you"=>"c","how are you"=>"d");
   print_r(array_rand($a ,1));
   ?>

   <?php echo $args['after_widget'];
 }
 public function form( $instance ) {
   $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
   <p>
     <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
     <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
   </p><?php
 }
 public function update( $greeting_instance, $old_instance ) {
   $instance = $old_instance;
   $instance[ 'title' ] = strip_tags( $greeting_instance[ 'title' ] );
   return $instance;
 }
}