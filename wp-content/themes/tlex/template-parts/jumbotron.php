<?php
    if( get_field('jumbotron_content') ) {
        $hero = get_field('jumbotron_content');
    } 
    if( get_sub_field('jumbotron_content') ){
        $hero = get_sub_field('jumbotron_content');
    }
    
    if ($hero ):
?>
<div class="jarallax" data-jarallax data-speed="0.8">
    <div class="jumbotron">
        <div class="container">
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
        </div>
    </div>
    <div >
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