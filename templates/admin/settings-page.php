<div class="wrap">
    <h1><?php esc_html_e( get_admin_page_title(), 'eventspractice' ); ?></h1>
    <p><?php esc_html_e( 'All Options:', 'eventspractice' ); ?></p>
    <?php $options = get_option( 'eventspractice_option' ); ?>
    <ul>
        <?php foreach( $options as $key => $value ): ?>
            <li><?php echo $key . ": " . $value; ?></li>
        <?php endforeach; ?>
    </ul> 

    <form method="post" action="options.php">
    <!-- Display necessary hidden fields for settings -->
    <?php settings_fields( 'eventspractice_settings' ); ?>
    <!-- Display the settings sections for the page -->
    <?php do_settings_sections( 'eventspractice-settings' ); ?>
    <!-- Default Submit Button -->
    <?php submit_button(); ?>
  </form>

  <h2>PlayGround</h2>
  <p>WPINC: <?php echo WPINC; ?></p>
  <p>ABSPATH: <?php echo ABSPATH; ?></p>
  <p>WP_CONTENT_DIR: <?php echo WP_CONTENT_DIR; ?></p>
  <p>__FILE__: <?php echo __FILE__; ?></p>
  <p>dirname( __FILE__ ): <?php echo dirname( __FILE__ ); ?></p>



</div>