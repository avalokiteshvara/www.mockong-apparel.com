      <div id="data_ajax" class="s_listing s_grid_view clearfix">      
      <?php 
        $i = 0;
        foreach ($products->result() as $products) { ?>                        
          <div class="s_item grid_3">
             <a class="s_thumb" href="<?php echo base_url() . 'produk/' . $products->slug;?>"><img src="<?php echo base_url() . 'assets/web/images/foto_produk/' . $products->gambar;?>" title="<?php echo $products->nama;?>" alt="<?php echo $products->nama;?>" /></a>   
             <h3><a href="<?php echo base_url() . 'produk/' . $products->slug;?>"><?php echo $products->nama;?></a></h3>
          <?php if($products->promo == 'N'):?>   
             <p class="s_price"><span class="s_currency s_before">Rp</span><?php echo format_rupiah($products->harga);?></p>
          <?php else: ?>
             <p class="s_price s_promo_price"><span class="s_old_price"><span class="s_currency s_before">Rp</span><?php echo format_rupiah($products->harga_lama);?></span><span class="s_currency s_after">Rp</span><?php echo format_rupiah($products->harga);?></p>               
          <?php endif;?>   

             <p class="s_rating s_rating_5"><span style="width: <?php echo get_percent($products->average_rating,5) ?>%;" class="s_percent"></span></p>
             
             <a class="s_button_add_to_cart" href="<?php echo base_url() .'produk/' . $products->slug;?>"><span class="s_icon_16"><span class="s_icon"></span>Beli</span></a>
          </div> 
      <?php 
        $i++;
        if($i%3 == 0 ) echo '<div class="clear"></div>';
      } ?>
      </div>
      
      <div class="pagination" id="ajax_paging">
        <div class="links" >            
          <?php echo $this->pagination->create_links();?>
         </div>
        <!-- <div class="results">Showing 1 to 12 of 20 (2 Pages)</div> -->
      </div>