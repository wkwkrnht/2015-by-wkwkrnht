<style>
    .hide-nav-prev,.hide-nav-next{height:100%;width:10vw;position:fixed;top:0;z-index:5;}
    .hide-nav-prev{left:0;}
    .hide-nav-next{right:0;}
    .hide-nav-prev a,.hide-nav-next a{display:table-cell;height:100vh;width:10vw;font-size:4rem;text-align:center;vertical-align:middle;opacity:.85;color:<?php echo get_option('hover_nav_a_color','#fff');?>;background-color:<?php echo get_option('hover_nav_a_background','#03a9f4');?>;transition:transform 0.2s linear;}
    .hide-nav-prev a{transform:translateX(-10vw);}
    .hide-nav-next a{transform:translateX(10vw);}
    .hide-nav-prev:hover a,.hide-nav-next:hover a{transform:translate(0);}
    .hide-nav-next a:hover,.hide-nav-prev a:hover{color:<?php echo get_option('hover_nav_a_color','#fff');?>;background-color:<?php echo get_option('hover_nav_a_background','#03a9f4');?>;}
</style>
<?php if(is_singular()===true):?>
    <?php  if(get_previous_post()):?>
        <div class="hide-nav-prev"><?php previous_post_link('%link','◀');?></div>
    <?php  endif;?>
    <?php if(get_next_post()):?>
        <div class="hide-nav-next"><?php next_post_link('%link','▶');?></div>
    <?php endif;?>
<?php else:?>
    <?php if(get_previous_posts_link()):?>
        <div class="hide-nav-prev"><?php previous_posts_link('◀');?></div>
    <?php endif;?>
    <?php if(get_next_posts_link()):?>
        <div class="hide-nav-next"><?php next_posts_link('▶');?></div>
    <?php endif;?>
<?php endif;?>
