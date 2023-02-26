<?php get_header(); ?>
<script>
	let p = getCookie("preference");
	console.log(p);
	if (p == "light") {
		document.body.classList.toggle("light");
	}
</script>
<div class="micro-slider">

    <style>
        <?php
        $categories = get_categories();
        for ($i=0; $i < count($categories); $i++) { 
            $category_color = get_field('color', 'category_' . $categories[$i]->term_id);
            ?>
            .pils span.cat-<?php echo $categories[$i]->slug; ?> {
                background-color: <?php echo $category_color; ?>;
            }
        <?php } ?>
    </style>

    <button id="toggle-theme" type="button">
        <svg
            version="1.1"
            id="Livello_1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px"
            y="0px"
            viewBox="0 0 474.6 474.5"
            style="enable-background: new 0 0 474.6 474.5"
            xml:space="preserve"
        >
            <path
                class="st0"
                d="M469,223.7l-58.2-58.2V83c0-5.1-2-10-5.7-13.6c-3.6-3.6-8.5-5.6-13.6-5.6H309L250.8,5.6
                C247.2,2,242.3,0,237.3,0c-5.1,0-9.9,2-13.5,5.6l-58.2,58.2H83c-5.1,0-10,2-13.6,5.6s-5.6,8.5-5.6,13.6v82.4L5.6,223.6l0,0
                C2,227.2,0,232.1,0,237.2s2,10,5.6,13.6L63.8,309v82.5c0,5.1,2,10,5.6,13.6s8.5,5.6,13.6,5.6h82.5l58.2,58.2
                c3.6,3.6,8.5,5.6,13.6,5.6s10-2,13.6-5.6l58.2-58.2h82.5c5.1,0,10-2,13.6-5.6s5.6-8.5,5.6-13.6v-82.3L469,251
                c3.6-3.6,5.6-8.5,5.6-13.6S472.6,227.4,469,223.7L469,223.7z M241.6,377.5V97c49.1,1.5,93.8,28.6,117.9,71.3s24.1,95,0,137.8
                S290.7,376,241.6,377.5L241.6,377.5z"
            />
        </svg>
    </button>

    <!-- LOOP -->
    <?php
    if (have_posts()){
        while (have_posts()){
            the_post();
            $title = get_the_title();
            $content = get_the_content();
            $date = get_field("date");
            $location = get_field("location");
            $info = get_field("info");
            $categories = get_the_category();
            $eventImg = get_the_post_thumbnail_url(get_the_ID(), 'large');
            $qr = get_field('qr_code');
            $link = get_field('link');
            ?>

            <div class="slider-item">
                <div class="gradient">
                    <div class="bg_img" style="background-image: url(<?php echo $eventImg; ?>);">
                    <div class="pils">
                                <?php
                                if (!empty($categories)) {
                                for ($i = 0; $i < count($categories); $i++) {
                                    echo '<span class="cat-' . $categories[$i]->slug . '">' . $categories[$i]->name . '</span> ';
                                }
                                }
                                ?>
                            </div>
                    

                        <?php
                        /* CHECK IF THERE'S A LOCATION FIELD */
                        /* NOT EVERY SLIDE HAS A LOCATION */
                        if(!empty($location)) { ?>
                            <div class="where"><?php echo $location; ?></div>
                        <?php } ?>

                        <?php
                        /* CHECK IF THERE'S A DATE FIELD */
                        /* NOT EVERY SLIDE HAS A DATE */
                        if(!empty($date)) { ?>
                            <div class="date"><strong><?php echo $date; ?></strong></div>
                        <?php } ?>

                    </div>
                    <div class="contenuto">
                        <div>
                            <h2><?php echo $title; ?></h2>
                            <?php echo $content; ?>

                            <?php
                            /* CHECK IF THERE'S A INFO FIELD */
                            /* NOT EVERY SLIDE HAS A INFO */
                            if(!empty($info)) { ?>
                                <div class="info"><p><?php echo $info; ?></p></div>
                            <?php } ?>

                            <?php
                            /* CHECK IF THERE'S A LINK FIELD */
                            /* NOT EVERY SLIDE HAS A LINK */
                            if(!empty($link)) { ?>
                                <div class="link"><p><a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?> 
                            
                                <svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 700 700" style="enable-background:new 0 0 700 700;" xml:space="preserve">
                                <g>
                                    <path class="st1" d="M535.9,516.3c0,11.2-9,20.2-20.2,20.2H183.1c-11.2,0-20.2-9-20.2-20.2V183.7c0-11.2,9-20.2,20.2-20.2h131v-40.3h-131
                                        c-33.6,0-60.5,26.9-60.5,60.5v332.6c0,33.6,26.9,60.5,60.5,60.5h332.6c33.6,0,60.5-26.9,60.5-60.5v-131h-40.3V516.3z"/>
                                    <path class="st1" d="M383.7,123.2v40.3h123.6L348.9,322l28.6,28.6l158.5-158.5v123.6h40.3V123.2L383.7,123.2z"/>
                                </g>
                                </svg>
                            
                            </a></p></div>
                            <?php } ?>
                                
                        
<!--                             <div class="pils">
                                <?php
                                // if (!empty($categories)) {
                                // for ($i = 0; $i < count($categories); $i++) {
                                //     echo '<span class="cat-' . $categories[$i]->slug . '">' . $categories[$i]->name . '</span> ';
                                // }
                                // }
                                ?>
                            </div> -->
                        </div>
                        <?php
                        if( !empty($qr) ): ?>
                            <img class="qr" src="<?php echo esc_url($qr['url']); ?>" alt="QR" width=200px height=200px/>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <?php
        }
    } 
    ?>



</div>

<?php get_footer(); ?>