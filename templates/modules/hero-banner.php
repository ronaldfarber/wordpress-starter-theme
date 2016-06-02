<?php if((get_field("background_type") == "solid_color") || (get_field("background_type") == "image")):?>
    <?php $hero_header_classes = $hero_header_classes . " " . get_field("background_color");?>
<?php endif;?>

<?php if (get_field("background_type") == "pattern"):?>
    <?php $hero_header_classes = $hero_header_classes . " " . get_field("pattern_type") . " " . get_field("background_color");?>
<?php endif;?>

<section class="banner-fluid hero-banner <?php echo $hero_header_classes;?>" <?php if(get_field("banner_image")):?>style="background-image:url('<?php the_field("banner_image");?>')"<?php endif;?>>
    <div class="content-wrapper">
        
        <?php if ($hero_preheader) :?>
            <span class="preheader">
                <?php echo $hero_preheader; ?>
            </span>
        <?php endif;?>

        <?php if(get_field("title")):?>
            <h1><?php the_field("title");?></h1>
        <?php else: ?>
            <h1><?php the_title();?></h1>
        <?php endif;?>

        <?php if(get_field("subtitle")):?>
            <h2 class="h3"><?php the_field("subtitle");?></h2>
        <?php endif;?>

        <?php if(get_field("paragraph")):?>
            <?php the_field("paragraph");?>
        <?php endif;?>

        <?php if(get_field("show_button")):?>

            <?php $btn_href;?>
            <?php $btn_target;?>
            <?php $btn_class;?>

            <?php if(get_field("button_link_type") == "internal"):?>
                <?php $btn_href = get_field("button_page_link");?>
            <?php elseif (get_field("button_link_type") == "external"):?>
                <?php $btn_href = get_field("button_url");?>
                <?php $btn_target = "target='_blank'";?>
            <?php endif;?>

            <?php if(get_field("background_color") == "bg-white"):?>
                <?php $btn_class = "btn-outlined";?>
            <?php else:?>
                <?php $btn_class = "btn-outlined-inverted";?>
            <?php endif;?>

            <a href="<?php echo $btn_href;?>" class="btn <?php echo $btn_class;?>" <?php echo $btn_target;?>>
                <?php the_field("button_text");?>
            </a>
        <?php endif;?>
    </div>
</section>