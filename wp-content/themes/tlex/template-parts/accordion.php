<div class="container">
    <!-- Accordion Section Intro -->
    <div class="intro">
        <h2><?php the_sub_field('accordion_headline'); ?></h2>
        <h5><?php the_sub_field('accordion_subheadline'); ?></h5>
        <div class="body-content">
            <?php the_sub_field('accordion_body'); ?>
        </div>
    </div>
    <!-- Accordion Section -->
    <div class="accordion" id="accordion-<?php echo $section_id; ?>">
        <?php $accordion_count = 0; ?>
        <?php while ( have_rows( 'accordion_section' ) ) : the_row(); ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <a data-toggle="collapse"
                        data-parent="#accordion-<?php echo $section_id; ?>"
                        href="#collapse-<?php echo $section_id; ?>-<?php echo $accordion_count; ?>"
                            <?php if ( $accordion_count != 0 ) : ?>
                                class="collapsed"
                            <?php endif; ?>
                            >
                            <?php the_sub_field( 'accordion_item_headline' ); ?>
                        </a>
                    </h4>
                </div>
                <div
                    id="collapse-<?php echo $section_id; ?>-<?php echo $accordion_count; ?>"
                    class="collapse <?php if ( $accordion_count == 0 ) echo 'show'; ?> card-body"
                    > 
                        <?php the_sub_field( 'accordion_item_body' ); ?>
                </div>
            </div>
        <?php $accordion_count++; endwhile; ?>
    </div>
</div>