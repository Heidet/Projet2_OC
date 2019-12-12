<?php
    $logo_src = One_And_One_Assistant_Config::get( 'logo_default', 'branding' );
    $logo_alt = sprintf(
        __( 'by %' ),
        One_And_One_Assistant_Config::get( 'name', 'branding' )
    );
    $visual = One_And_One_Assistant_Config::get( 'visual_1', 'branding' );
?>
<div class="dashboard-column dashboard-column1 branded-wordpress-column">
    <div class="inside">
        <div class="branded-wordpress-img">
            <img src="<?php echo $visual; ?>" alt="WordPress" />
        </div>
        <?php if ( $logo_src ): ?>
            <img src="<?php echo $logo_src; ?>" alt="<?php echo $logo_alt; ?>" class="logo" />
		<?php endif; ?>
    </div>
</div>