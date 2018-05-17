<?php if ( ! get_sub_field( 'full_width' )) : ?>
<div class="container">
<?php endif; ?>

<div id="bootstrap-carousel-<?php echo $section_id; ?>" class="carousel slide" data-ride="carousel">

    <?php if ( get_sub_field( 'carousel_indicators' ) ) : ?>
        <ol class="carousel-indicators">
            <?php for ($i = 0; $i < count( get_sub_field('slides') ); $i++ ) : ?>
                <li
                    data-target="#bootstrap-carousel-<?php echo $section_id; ?>"
                    data-slide-to="<?php echo $i; ?>"
                    <?php if ( $i == 0 ) echo 'class="active"'; ?>
                ></li>
            <?php endfor; ?>
        </ol>
    <?php endif; ?>

    <div class="carousel-inner">
        <?php $slide_count = 0; while ( have_rows( 'slides' ) ) : the_row(); ?>
            <div class="carousel-item <?php if ( $slide_count == 0 ) echo 'active'; ?>">
                <picture>
                    <source 
                        media="(min-width: 1200px)"
                        srcset="<?php echo get_sub_field('image')['sizes']['banner-xl']; ?>">
                    <source 
                        media="(min-width: 768px)"
                        srcset="<?php echo get_sub_field('image')['sizes']['banner-lg']; ?>">
                    <source 
                        media="(min-width: 576px)"
                        srcset="<?php echo get_sub_field('image')['sizes']['banner-md']; ?>">
                    <img 
                        class="img-fluid"
                        src="<?php echo get_sub_field('image')['sizes']['banner-sm']; ?>" 
                        alt="<?php echo get_sub_field('image')['title']; ?>">
                </picture>

                <?php if ( get_sub_field( 'caption' ) ) : ?>
                    <div class="carousel-caption">
                        <?php the_sub_field( 'caption' ); ?>
                    </div>
                <?php endif; ?>

            </div>
        <?php $slide_count++; endwhile; ?>
    </div>

    <?php if ( get_sub_field( 'carousel_controls' ) ) : ?>
        <a class="left carousel-control" href="#bootstrap-carousel-<?php echo $section_id; ?>" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#bootstrap-carousel-<?php echo $section_id; ?>" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    <?php endif; ?>
</div>

<?php if ( ! get_sub_field( 'full_width' )) : ?>
</div>
<?php endif; ?>