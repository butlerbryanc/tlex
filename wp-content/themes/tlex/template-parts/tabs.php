<div class="container">
    <!-- Tab Section Intro  -->
    <div class="intro">
        <h2><?php the_sub_field('tab_headline'); ?></h2>
        <h5><?php the_sub_field('tab_subheadline'); ?></h5>
        <div class="body-content">
            <?php the_sub_field('tab_body'); ?>
        </div>
    </div>
    <!-- Tab Section Navigation -->
    <ul class="nav nav-tabs" role="tablist">
        <?php $tab_count = 0; ?>
        <?php while ( have_rows( 'tabs' ) ) : the_row(); ?>
            <li <?php if ( $tab_count == 0 ) echo 'class="active"'; ?>>
                <a
                    href="#<?php echo sanitize_html_class( get_sub_field( 'tab_item_headline' ) ); ?>"
                    role="tab"
                    data-toggle="tab"
                    class="btn btn-primary"
                    >
                    <?php the_sub_field( 'tab_item_headline' ); ?>
                </a>
            </li>
            <?php $tab_count++; endwhile; ?>
    </ul>

    <!-- Tab Section Content -->
    <div class="tab-content">
        <?php $tab_count = 0; ?>
        <?php while ( have_rows( 'tabs' ) ) : the_row(); ?>
            <div
                class="tab-pane fade <?php if ( $tab_count == 0 ) echo 'active in'; ?>"
                id="<?php echo sanitize_html_class( get_sub_field( 'tab_item_headline' ) ); ?>"
                >
                <?php the_sub_field( 'tab_item_body' ); ?>
                <?php the_sub_field( 'tab_item_button' ); ?>
            </div>
            <?php $tab_count++; endwhile; ?>
    </div>
</div>