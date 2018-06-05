
<?php
if($resource_section_id > 0 && $resource_section_id % 2 == 0) {
    echo '<div class="w-100"></div>';
}
?>

<div class="col-lg-6">
    <div class="tlex-card">
        <h3><?php the_sub_field('resource_headline'); ?></h3>
        <?php 
        if ( have_rows('resource_list') ) {
            $list_id = 0;
            set_query_var( 'list_id', $list_id );
            while ( have_rows('resource_list') ) { 
                the_row();
                
                get_template_part( 'template-parts/tribe/resource', 'list');
                
                $list_id++;
            }
        }
        ?>
    </div>
</div>
