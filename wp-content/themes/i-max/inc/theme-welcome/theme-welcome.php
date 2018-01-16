<?php


if (isset($_GET['activated']) && is_admin()) {
	set_transient( '_welcome_screen_activation_redirect', true, 30 );
}

add_action( 'admin_init', 'welcome_screen_do_activation_redirect' );
function welcome_screen_do_activation_redirect() {
  // Bail if no activation redirect
    if ( ! get_transient( '_welcome_screen_activation_redirect' ) ) {
    return;
  }

  // Delete the redirect transient
  delete_transient( '_welcome_screen_activation_redirect' );

  // Bail if activating from network, or bulk
  if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
    return;
  }

  // Redirect to bbPress about page
  wp_safe_redirect( add_query_arg( array( 'page' => 'welcome-screen-about' ), admin_url( 'themes.php' ) ) );

}

add_action('admin_menu', 'welcome_screen_pages');

function welcome_screen_pages() {
	add_theme_page(
		'Welcome To Welcome i-max',
		'About i-max',
		'read',
		'welcome-screen-about',
		'welcome_screen_content',
		'dashicons-awards', 
		6 		
	);
}

function welcome_screen_content() {
	
	include get_template_directory() . '/inc/theme-welcome/tw-content.php';
	include get_template_directory() . '/inc/theme-welcome/tw-functions.php';	
	
	$logo_url = get_template_directory_uri() . '/inc/theme-welcome/i-max-welcome.jpg';
	$img_url = get_template_directory_uri() . '/inc/theme-welcome/images/';
	$active_tab = 'imax_about';
	
	/* Urls */
	$reviewURL = esc_url('//wordpress.org/support/theme/i-max/reviews/?filter=5');
	$goPremiumURL = esc_url('//templatesnext.org/ispirit/landing/');
	$videoguide = esc_url('//www.templatesnext.org/icreate/?page_id=1030');
	$supportforum = esc_url('//templatesnext.org/ispirit/landing/forums/'); 
	$toolkit = esc_url('//www.templatesnext.org/icreate/?page_id=541');
	$fb_page = esc_url('//www.facebook.com/templatesnext/');
	$pb_tutorial = esc_url('https://siteorigin.com/page-builder/documentation/');


	$ocdi_buttont = "";
	if ( class_exists('OCDI_Plugin') ) {
		$ocdi_buttont = "button-enabled";
	} else
	{
		$ocdi_buttont = "button-disabled";
	} 	
	$details_theme = wp_get_theme();
	$name_version = $details_theme->get( 'Name' ) . " - " . $details_theme->get( 'Version' );
  	?>
  	<div class="wrapp">
        <div class="nx-info-wrap-2 welcome-panel">
        	
        	<div class="nx-info-wrap">
            	
                <div class="nx-welcome"><?php _e( 'Welcome To ', 'i-max' ); echo $name_version; ?></div>
                <div class="tx-wspace-24"></div>
                <div class="tx-wspace-24"></div>                
                <div class="welcome-logo"><img src="<?php echo $logo_url; ?>" alt="" class="welcome-logo-img" width="" /></div>
                <div class="nx-info-desc">
                    <p>
						<?php _e( 'Welcome to i-max! You are about to use one of the finest and customizable WordPress theme.', 'i-max' ); ?>
                    </p>
                    <p>
                    	<a class="" href="<?php echo admin_url(); ?>themes.php?page=tgmpa-install-plugins">
                        <?php _e( 'Install Recommended Plugins', 'i-max' ); ?>
                        </a> 
                        <?php _e( 'and <b>Kick start your website in one click</b>, Setup any one of our demo websites and edit/remove/add contents.', 'i-max' ); ?>
					</p>
                    <a class="button button-primary button-hero" href="<?php echo $reviewURL; ?>">
                    <?php _e( 'Post Your Review', 'i-max' ); ?>
                    </a>  
                    <a class="button button-primary button-hero" href="<?php echo $goPremiumURL; ?>">
                    	<?php _e( 'Go Premium', 'i-max' ); ?>
                    </a>  
                </div>
                <div class="tx-wspace-12"></div>
                <div class="nx-admin-row">
                	<div class="one-four-col">
                    	<a href="<?php echo $videoguide; ?>" target="_blank">
                            <div class="nx-dash"><span class="dashicons dashicons-video-alt2"></span></div>
                            <h3 class="tx-admin-link"><?php _e( 'Video Guide', 'i-max' ); ?></h3>
                        </a>
                    </div>
                	<div class="one-four-col">
                    	<a href="<?php echo $supportforum; ?>" target="_blank">
                            <div class="nx-dash"><span class="dashicons dashicons-format-chat"></span></div>
                            <h3 class="tx-admin-link"><?php _e( 'Support Forum', 'i-max' ); ?></h3>
                        </a>
                    </div>
                	<div class="one-four-col">
                    	<a href="<?php echo $toolkit; ?>" target="_blank">
                            <div class="nx-dash"><span class="dashicons dashicons-migrate"></span></div>
                            <h3 class="tx-admin-link"><?php _e( 'TemplatesNext Toolkit', 'i-max' ); ?></h3>
                        </a>
                    </div>
                	<div class="one-four-col">
                    	<a href="<?php echo $fb_page; ?>" target="_blank">
                            <div class="nx-dash"><span class="dashicons dashicons-facebook-alt"></span></div>
                            <h3 class="tx-admin-link"><?php _e( 'Community', 'i-max' ); ?></h3>
                        </a>
                    </div>                                                            
                </div>
                <div class="tx-wspace-24"></div>
                <?php
					if( isset( $_GET[ 'tab' ] ) ) {
						$active_tab = $_GET[ 'tab' ];
					}
				?>
                <h2 class="nav-tab-wrapper">
                    <a href="?page=welcome-screen-about&tab=imax_about" class="nav-tab <?php echo $active_tab == 'imax_about' ? 'nav-tab-active' : ''; ?>">
                   		<?php _e( 'Setting Up i-max', 'i-max' ); ?>
                    </a>
                    <a href="?page=welcome-screen-about&tab=imax_plugins" class="nav-tab <?php echo $active_tab == 'imax_plugins' ? 'nav-tab-active' : ''; ?> nx-kick">
                    	<?php _e( 'Plugins', 'i-max' ); ?>
                    </a>
                    <a href="?page=welcome-screen-about&tab=imax_faq" class="nav-tab <?php echo $active_tab == 'imax_faq' ? 'nav-tab-active' : ''; ?> nx-plug">
                    	<?php _e( 'FAQs/Support', 'i-max' ); ?>
                    </a>
                </h2>
                
                <?php
					if( $active_tab == 'imax_about' )
					{
				?> 
                	<div class="nx-tab-content">
                		<p>&nbsp;</p>
                        <ol>
							<?php
									echo '<li>';
									_e( 'Install Plugins', 'i-max' );
									printf( __( 'To install and activate all the recommended plugin at once, go to menu "Appearance" > "<a href="%sthemes.php?page=tgmpa-install-plugins">Install Plugins</a>".', 'i-max' ), admin_url() );
									echo '</li>';
									
									echo '<li>';
									_e( 'One Click Demo Setup', 'i-max' );
									printf( __( 'i-max comes with "<a href="%sthemes.php?page=pt-one-click-demo-import">One Click Demo Setup</a>", You can import and setup copy of any of our demo website in one click.', 'i-max' ), admin_url() );
									echo '</li>';
									
									echo '<li>';
									_e( 'Start Customizing', 'i-max' );
									printf( __( 'To start setting up your theme go to menu "Appearance" > "<a href="%scustomize.php">Customize</a>".', 'i-max' ), admin_url() );
									echo '</li>';								
                            ?>                    
                        </ol>
                        <span style="font-size: 13px;"><?php _e( 'Page Builder Tutorials : ', 'i-max' ); ?><a href="<?php echo $pb_tutorial; ?>" target="_blank"><?php echo $pb_tutorial; ?></a></span>
        			</div>
				<?php		
					} elseif ( $active_tab == 'imax_plugins' )
					{
				?>     
                	<div class="nx-tab-content"> 
                		<p>&nbsp;</p>
                        <ol>
							<?php
			
								foreach ($tx_plugins as $plugin) {
									
									$pluginLocation = rawurlencode($plugin['slug'].'/'.$plugin['pluginfile']);
									$pluginLink = imax_plugin_activation( $pluginLocation, $plugin['slug'], $plugin['pluginfile'] );
									$nonce_install = imax_plugin_install($plugin['slug']);
															
									
									echo '<li><b>'.$plugin['name'].'</b><br />';
									echo $plugin['desc'].'<br />';
									echo _e( 'Plugin URL : ', 'i-max' ).'<a href="'.$plugin['pluginurl'].'" target="_blank">'.$plugin['pluginurl'].'</a><br />';
									if(!empty($plugin['tutorial']))
									{
										echo _e( 'Tutorial : ', 'i-max' ).'<a href="'.$plugin['tutorial'].'" target="_blank">'.$plugin['tutorial'].'</a><br />';   
									}
									
									$pluginTitle = $plugin['title'];
									if ( is_plugin_active( $plugin['slug'].'/'.$plugin['pluginfile'] ) ) {
										echo '<a href="#" class="button disabled">' . __( 'Plugin installed and active', 'i-max' ) . '</a>';  
									} elseif( imax_is_plugin_installed($pluginTitle) == false )
									{
										echo '<a data-slug="' . $plugin['slug'] . '" data-active-lebel="' . __( 'Installing...', 'i-max' ) . '" class="install-now button" href="' . esc_url( $nonce_install ) . '" data-name="' . $plugin['slug'] . '" aria-label="Install ' . $plugin['slug'] . '">' . __( 'Install and activate', 'i-max' ) . '</a>';
									} else
									{
										echo '<a class="button activate-now button-primary" data-active-lebel="' . __( 'Activating...', 'i-max' ) . '" data-slug="' . $plugin['slug'] . '" href="' . esc_url( $pluginLink ) . '" aria-label="Activate ' . $plugin['slug'] . '">Activate</a>';
									}
									
									echo '</li>';
									
								}
                            ?>                    
                        </ol>
        			</div>       
                        
				<?php	
					} elseif ( $active_tab == 'imax_faq' )
					{
				?>     
                	<div class="nx-tab-content"> 
                		<p>&nbsp;</p>
                        <?php
							foreach ($tx_faqs as $faq) {
								echo '<b>'._e( 'Q. ', 'i-max' ).$faq['question'].'</b><br />';
								echo _e( 'A. ', 'i-max' ).$faq['answeer'].'<br /><br />';									   
							}
                        ?>                    
                        
        			</div>      
                        
				<?php	
					}
				?>
  
                <div class="tx-wspace-24"></div><div class="tx-wspace-24"></div>    
 	
            </div>

                <div id="dashboard_right_now" class="postbox" style="display: block; float: right; width: 33%; max-width: 320px; margin: 16px;">
                    <h2 class="hndle nxw-title" style="padding: 12px 24px;"><span><?php echo $review_pop['title']; ?></span></h2>
                    <div class="inside">
                        <div class="main" style="padding: 24px;">
							<?php echo $review_pop['desc']; ?>
                    		<a class="button button-primary button-hero" target="_blank" href="<?php echo $reviewURL; ?>">
                            	<?php echo $review_pop['link']; ?>
                            </a> 
                            <?php echo $review_pop['conclusion']; ?>
                        </div>
                    </div>
                </div>   

            <div class="tx-wspace"></div>
        
            
            
        </div>
        
  	</div>
  
  	<?php
}

add_action( 'admin_head', 'welcome_screen_remove_menus' );
function welcome_screen_remove_menus() {
    remove_submenu_page( 'index.php', 'welcome-screen-about' );
}


// Add Stylesheet
add_action( 'admin_enqueue_scripts', 'imax_welcome_scripts' );
function imax_welcome_scripts() {
	wp_enqueue_style( 'nx-welcome-style', get_template_directory_uri() . '/inc/theme-welcome/css/nx-welcome.css', array(), '1.01' );
	wp_enqueue_script( 'nx-welcome-script', get_template_directory_uri() . '/inc/theme-welcome/js/nx-welcome.js' );
}
