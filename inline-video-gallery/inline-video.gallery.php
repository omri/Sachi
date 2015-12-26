<?php
/*
Plugin Name: Inline Video Gallery
Plugin URI: https://github.com/omri/Sachi
Description: Creates a video gallery for the Sachi project
Author: Yuval Kohavi
Version: 0.1
Author URI: http://yuval.kohavi.info/
*/

function arr_get($array, $key, $default = ""){
    return isset($array[$key]) ? $array[$key] : $default;
}


class Gallery_Shortcode {
	static $gallery_add_script;

	static function init() {
		add_shortcode('videoitem', array(__CLASS__, 'handle_shortcode'));
  	add_shortcode('videogallery', array(__CLASS__, 'handle_gallery_shortcode'));
		add_action('init', array(__CLASS__, 'register_script'));
		add_action('wp_footer', array(__CLASS__, 'print_script'));
    add_action('wp_enqueue_scripts', array(__CLASS__, 'inline_gallery_enqueue_style'));
	}

  static function inline_gallery_enqueue_style() {
  	wp_enqueue_style('galleryvid', plugins_url('style.css', __FILE__), false );
  }

	static function handle_gallery_shortcode($atts, $content = null) {
    ?>
    <div class="wrap">
      <?php echo do_shortcode($content); ?>
    </div>
    <?php
  }

	static function handle_shortcode($atts) {
		self::$gallery_add_script = true;

		// actual shortcode handling here

?>

<div class="box">
  <div class="boxInner">
    <div class="player" data-vid="<?php echo $atts["vid"]; ?>">
    </div>
  <div class="titleBox">
    <div class="titleBoxFlex">
      <div class="titleBoxFlexContainer">
        <div class="playbutton">

          <svg class="video-overlay-play-button" viewBox="0 0 200 200" alt="Play video">
                             <circle cx="100" cy="100" r="90" fill="none" stroke-width="15" stroke="#fff"/>
                             <polygon points="70, 55 70, 145 145, 100" fill="#fff"/>
                         </svg>

        </div>
      </div>

			<div class="titleBoxInfo" >
				<?php echo arr_get($atts, "name"); ?> <br />
				<?php echo arr_get($atts, "title"); ?>

				<?php if (isset($atts["link"])) {
				?>
				<a href="<?php echo arr_get($atts, "link"); ?>">עוד</a>
				<?php
				} ?>

			</div>


    </div>

  </div>
  </div>

</div>

<?php

	}

	static function register_script() {
		wp_register_script('gallery-script', plugins_url('script.js', __FILE__), array('jquery'), '1.0', true);
	}

	static function print_script() {
		if ( ! self::$gallery_add_script )
			return;

		wp_print_scripts('gallery-script');
	}
}

Gallery_Shortcode::init();

/* End of File */
