         <!-- ********************** -->
         <!--     I N T R O          -->
         <!-- ********************** -->
         <div id="intro">
            <div id="intro_wrap">
               <div id="product_intro" class="container_12">
                  <div id="product_intro_info" class="grid_5">
                  <?php
                     $str = ""; $i = 1;
                     foreach ($slides->result() as $slide) { ?>
                  <?php if($i == 1): ?>
                     <div style="position: relative;">
                  <?php else: ?>
                     <div style="position: relative; display: none;">
                  <?php endif; ?>

                     <h2><a href="<?php echo base_url() . 'produk/' . $slide->slug; ?>"><?php echo $slide->nama;?></a></h2>
                        <!-- hanya tampilkan rating >= 3 -->
                     <?php if($slide->average_rating >= 3): ?>
                        <div class="s_rating_holder">
                           <p class="s_rating s_rating_big s_rating_5">
                              <span style="width: <?php echo get_percent($slide->average_rating,5) ?>%;" class="s_percent"></span>
                           </p>
                           <span class="s_average"><?php echo $slide->average_rating;?> dari 5</span>
                        </div>
                     <?php endif; ?>

                        <p class="s_desc"> <?php echo $slide->deskripsi;?></p>
                        <div class="s_price_holder">
                        <?php if($slide->promo == 'N'):?>
                           <p class="s_price"> <span class="s_currency s_before">Rp </span><?php echo format_rupiah($slide->harga);?> </p>
                        <?php else: ?>
                           <p class="s_price s_promo_price"><span class="s_old_price"><span class="s_currency s_before">Rp </span><?php echo format_rupiah($slide->harga_lama); ?></span><span class="s_currency s_after">Rp </span><?php echo format_rupiah($slide->harga);?></p>
                        <?php endif;?>
                        </div>
                     </div>
                     <?php $str .= "<div class='slideItem' style='display: none'><a href='".base_url() . "produk/". $slide->slug . "'><img src='".image(base_url() ."assets/web/images/foto_produk/" . $slide->gambar,"slideshow") . "' alt='' /></a></div>"; ?>

                  <?php $i++; } ?>

                  <!-- end slides -->

                  </div>
                  <div id="product_intro_preview">
                     <div class="slides_container">

                        <?php echo $str;?>
                     </div>
                     <a class="s_button_prev" href="javascript:;"></a>
                     <a class="s_button_next" href="javascript:;"></a>
                  </div>
               </div>
            </div>
         </div>
         <script type="text/javascript" src="<?php echo base_url();?>assets/web/js/jquery/jquery.slides.js"></script>
         <script type="text/javascript" src="<?php echo base_url();?>assets/web/js/shoppica.products_slide.js"></script>
         <!-- end of intro -->

         <!-- ********************** -->
         <!--      C O N T E N T     -->
         <!-- ********************** -->
         <div id="content" class="container_12">
            <div id="welcome" class="grid_12">
            <?php echo settings('welcome_greets');?>
            </div>
            <div class="clear"></div>

            <?php if($best_seller_product->num_rows() > 0){ ?>
              <div id="special_home" class="grid_12">
                 <h2 class="s_title_1"><span class="s_main_color">Produk</span> Best Seller</h2>
                 <div class="clear"></div>
                 <div class="s_listing s_grid_view clearfix">

              <?php
                 foreach ($best_seller_product->result() as $best_seller_product) { ?>
                    <div class="s_item grid_2">
                       <a class="s_thumb" href="<?php echo base_url() . 'produk/' . $best_seller_product->slug;?>"><img src="<?php echo base_url() . 'assets/web/images/foto_produk/' . $best_seller_product->gambar;?>" title="<?php echo $best_seller_product->nama;?>" alt="<?php echo $best_seller_product->nama;?>" /></a>
                       <h3><a href="<?php echo base_url() . 'produk/' . $best_seller_product->slug;?>"><?php echo $best_seller_product->nama;?></a></h3>
                    <?php if($best_seller_product->promo == 'N'):?>
                       <p class="s_price"><span class="s_currency s_before">Rp</span><?php echo format_rupiah($best_seller_product->harga);?></p>
                    <?php else: ?>
                       <p class="s_price s_promo_price"><span class="s_old_price"><span class="s_currency s_before">Rp</span><?php echo format_rupiah($best_seller_product->harga_lama);?></span><span class="s_currency s_after">Rp</span><?php echo format_rupiah($best_seller_product->harga);?></p>
                    <?php endif;?>
                    <?php if($best_seller_product->average_rating >= 3): ?>
                       <p class="s_rating s_rating_5"><span style="width: <?php echo get_percent($best_seller_product->average_rating,5) ?>%;" class="s_percent"></span></p>
                    <?php endif; ?>
                       <a class="s_button_add_to_cart" href="product.html"><span class="s_icon_16"><span class="s_icon"></span>Beli</span></a>
                    </div>
              <?php } ?>
                    <div class="clear"></div>
                 </div>
              </div>
            <?php } ?>


            <div id="latest_home" class="grid_12">
               <h2 class="s_title_1"><span class="s_main_color">Produk</span> Terbaru</h2>
               <div class="clear"></div>
               <div class="s_listing s_grid_view clearfix">
            <?php
               foreach ($latest_products->result() as $latest_product) { ?>
                  <div class="s_item grid_2">
                     <a class="s_thumb" href="<?php echo base_url() . 'produk/' . $latest_product->slug;?>"><img src="<?php echo base_url() . 'assets/web/images/foto_produk/' . $latest_product->gambar;?>" title="<?php echo $latest_product->nama;?>" alt="<?php echo $latest_product->nama;?>" /></a>
                     <h3><a href="<?php echo base_url() . 'produk/' . $latest_product->slug;?>"><?php echo $latest_product->nama;?></a></h3>
                  <?php if($latest_product->promo == 'N'):?>
                     <p class="s_price"><span class="s_currency s_before">Rp</span><?php echo format_rupiah($latest_product->harga);?></p>
                  <?php else: ?>
                     <p class="s_price s_promo_price"><span class="s_old_price"><span class="s_currency s_before">Rp</span><?php echo format_rupiah($latest_product->harga_lama);?></span><span class="s_currency s_after">Rp</span><?php echo format_rupiah($latest_product->harga);?></p>
                  <?php endif;?>
                  <?php if($latest_product->average_rating >= 3) : ?>
                     <p class="s_rating s_rating_5"><span style="width: <?php echo get_percent($latest_product->average_rating,5) ?>%;" class="s_percent"></span></p>
                  <?php endif; ?>
                     <a class="s_button_add_to_cart" href="product.html"><span class="s_icon_16"><span class="s_icon"></span>Beli</span></a>
                  </div>
            <?php } ?>
                  <div class="clear"></div>
               </div>
            </div>
         </div>
         <!-- end of content -->
