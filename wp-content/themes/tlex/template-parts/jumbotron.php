<?php
    if( is_page() ) {
        $hero = get_field('jumbotron_content');
    }

    if( is_single() || is_archive() ) {
        if( is_single() ) {
            if(has_post_thumbnail($post)) {
                $thumb_id = get_post_thumbnail_id();
            } else {
                $thumb_id = get_field('category_image', wp_get_post_terms($post->ID, 'state')[0])['ID'];
            }
            $title = get_the_title($post->ID);
        } else {
            $object = get_queried_object();
            if($object->parent != 0) {
                $cat = get_term_by('id', $object->parent, $object->taxonomy);
                $sub = get_term_by('id', $object->term_id, $object->taxonomy);
            } else {
                $cat = get_term_by('id', $object->term_id, $object->taxonomy);
            }
           
            $thumb_id = get_field('category_image', get_queried_object() )['ID'];
        }
        $hero = array();
        $hero['image'] = array();
        $hero['image']['title'] = $title;
        $hero['image']['sizes'] = array();
        $hero['image']['sizes']['jumbotron-xl'] = wp_get_attachment_image_src( $thumb_id, 'banner-xl')[0];
        $hero['image']['sizes']['jumbotron-lg'] = wp_get_attachment_image_src( $thumb_id, 'banner-lg')[0];
        $hero['image']['sizes']['jumbotron-md'] = wp_get_attachment_image_src( $thumb_id, 'banner-md')[0];
        $hero['image']['sizes']['jumbotron-sm'] = wp_get_attachment_image_src( $thumb_id, 'jumbotron-sm')[0];
    }
    if ($hero ):
?>
<div class="jarallax" data-jarallax data-speed="0.8">
    <div class="jumbotron">
        <div class="container">
        <?php if( is_single() ): ?>
            <div class="title">
                <h1><?php the_title(); ?></h1>   
            </div>
        <?php elseif(is_archive() ): ?>
            <div class="title">
                <h1>
                    <?php 
                        echo 'State: ' . $cat->name;
                        if($sub) echo ' - ' . $sub->name;
                    ?>
                </h1>
                <h4><?php echo $cat->count; ?> Tribes</h4>
            </div>
        <?php else: ?>
            <div class="title">
                <h1>Jumbotron Header</h1>
                <h4>Jumbotron header with background image and parallax effect</h4>     
            </div>
            <div class="body-content">
                <p>Jumbotron message can go right <b>here</b></p>
            </div>
            <div class="cta">
                <a href="#" class="btn btn-secondary">This is a button</a>
            </div>
        <?php endif; ?>
        </div>
    </div>
    <div class="jarallax-img-container">
        <picture class="jarallax-img">
            <source 
                media="(min-width: 1200px)"
                srcset="<?php echo $hero['image']['sizes']['jumbotron-xl']; ?>">
            <source 
                media="(min-width: 768px)"
                srcset="<?php echo $hero['image']['sizes']['jumbotron-lg']; ?>">
            <source 
                media="(min-width: 576px)"
                srcset="<?php echo $hero['image']['sizes']['jumbotron-md']; ?>">
            <img 
                src="<?php echo $hero['image']['sizes']['jumbotron-sm']; ?>" 
                alt="<?php echo $hero['image']['title']; ?>">
        </picture>
    </div>
</div>
<?php endif; ?>