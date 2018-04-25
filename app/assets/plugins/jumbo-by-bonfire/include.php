<!-- BEGIN JUMBO BUTTONS -->
<div class="jumbo-buttons-wrapper<?php if ( is_admin_bar_showing() ) { ?> jumbo-wp-toolbar<?php } ?>">
    
    <!-- BEGIN MAIN MENU BUTTON -->
    <?php if( get_theme_mod('jumbo_hide_main_menu_button') == '') { ?>
    <div class="jumbo-menu-button<?php if(get_theme_mod('jumbo_menu_open_on_front_page')!='' && is_front_page() ) { ?> jumbo-menu-button-active<?php } ?>">
        <div class="jumbo-menu-button-middle"></div>
    </div>
    <?php } ?>
    <!-- END MAIN MENU BUTTON -->
    
    <!-- BEGIN SECONDARY MENU BUTTON -->
    <?php if ( has_nav_menu('jumbo-by-bonfire-secondary') ) { ?>
    <div class="jumbo-secondary-menu-button">
        <div class="jumbo-menu-tooltip"></div>
    </div>
    <?php } ?>
    <!-- END SECONDARY MENU BUTTON -->

    <!-- BEGIN AUTHOR GRAVATAR -->
    <?php if( get_theme_mod('jumbo_gravatar_email') != '' || get_theme_mod('jumbo_custom_profile_image') !='' ) { ?>
    <div class="jumbo-gravatar-wrapper">
        <a href="<?php echo get_theme_mod('jumbo_profile_link'); ?>" rel="author">					
            <?php if( get_theme_mod('jumbo_custom_profile_image') != '') { ?>
                <img width="62px" height="62px" src="<?php echo get_theme_mod('jumbo_custom_profile_image'); ?>">
            <?php } else { ?>
                <?php echo get_avatar( get_theme_mod('jumbo_gravatar_email'), 62 ); ?>
            <?php } ?>
        </a>

        <!-- BEGIN AUTHOR GRAVATAR TOOLTIP -->
        <?php if( get_theme_mod('jumbo_tooltip_label') != '') { ?>
            <div class="jumbo-gravatar-tooltip-wrapper">
                <?php echo get_theme_mod('jumbo_tooltip_label'); ?>
            </div>
        <?php } ?>
        <!-- END AUTHOR GRAVATAR TOOLTIP -->

    </div>
    <?php } ?>
    <!-- END AUTHOR GRAVATAR -->

</div>
<!-- END BEGIN JUMBO BUTTONS -->

<!-- BEGIN SECONDARY MENU -->
<?php if ( has_nav_menu('jumbo-by-bonfire-secondary') ) { ?>
<div class="jumbo-by-bonfire-secondary-wrapper<?php if ( is_admin_bar_showing() ) { ?> jumbo-wp-toolbar<?php } ?>">
    <div class="jumbo-by-bonfire-secondary smooth-scroll">

        <?php $walker = new Jumbo_Secondary_Menu_Description; ?>
        <?php wp_nav_menu( array( 'theme_location' => 'jumbo-by-bonfire-secondary', 'walker' => $walker, 'fallback_cb' => '' ) ); ?>
        
    </div>
</div>
<?php } ?>
<!-- END SECONDARY MENU -->

<!-- BEGIN MAIN MENU BACKGROUND -->
<div class="jumbo-by-bonfire-wrapper <?php $jumbo_main_menu_appearance = get_theme_mod( 'jumbo_main_menu_appearance' ); if( $jumbo_main_menu_appearance != '' ) { switch ( $jumbo_main_menu_appearance ) { case 'top': echo 'jumbo-appearance-top'; break; case 'bottom': echo 'jumbo-appearance-bottom'; break; case 'left': echo 'jumbo-appearance-left'; break; case 'right': echo 'jumbo-appearance-right'; break; } } ?><?php if(get_theme_mod('jumbo_menu_open_on_front_page')!='' && is_front_page() ) { ?> jumbo-menu-active<?php } ?>">
    
    <!-- BEGIN LOGO + MAIN MENU -->
    <div class="jumbo-main-menu-wrapper">
        <div class="jumbo-main-menu-wrapper-inner">
            <div class="jumbo-main-menu-wrapper-inner-inner">
                <div class="jumbo-by-bonfire">
                    
                    <!-- BEGIN HEADING IMAGE -->
                    <?php if( get_theme_mod('jumbo_heading_image') != '') { ?>
                    <div class="jumbo-heading-image-wrapper">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod('jumbo_heading_image'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
                    </div>
                    <?php } ?>
                    <!-- END HEADING IMAGE -->
                    
                    <!-- BEGIN MENU -->
                    <?php $walker = new Jumbo_Menu_Description; ?>
                    <?php wp_nav_menu( array( 'theme_location' => 'jumbo-by-bonfire', 'walker' => $walker, 'fallback_cb' => '', 'depth' => '2' ) ); ?>
                    <!-- END MENU -->
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGO + MAIN MENU -->

    <!-- BEGIN DOT OVERLAY -->
    <div class="jumbo-dot-overlay"></div>
    <!-- END DOT OVERLAY -->

    <!-- BEGIN BACKGROUND IMAGE -->
    <?php if( get_theme_mod('jumbo_main_menu_background_image') != '') { ?>
    <div class="jumbo-background-image"></div>
    <?php } ?>
    <!-- END BACKGROUND IMAGE -->
    
    <!-- BEGIN BACKGROUND COLOR -->
    <div class="jumbo-background-color"></div>
    <!-- END BACKGROUND COLOR -->

</div>
<!-- END MAIN MENU BACKGROUND -->