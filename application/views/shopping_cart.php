<!-- ********************** -->
  <!--     I N T R O          -->
  <!-- ********************** -->
  <div id="intro">
    <div id="intro_wrap">
      <div class="container_12">
        <div id="breadcrumbs" class="grid_12">
          <a href="<?php echo base_url()?>">Home</a>
           &gt; <a href="">Keranjang Belanja</a>
        </div>
        <h1>Keranjang Belanja</h1>
      </div>
    </div>
  </div>
  <!-- end of intro -->


  <!-- ********************** -->
  <!--      C O N T E N T     -->
  <!-- ********************** -->
  <div id="content" class="container_12">
    <div id="shopping_cart" class="grid_12">

    <?php if(!$this->cart->contents()): ?>
      <div id="welcome" class="grid_12">
        <h2><span class="s_secondary_color">Keranjang Belanja Masih Kosong</span></h2>
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
                 <a class="s_button_add_to_cart" href="<?php echo base_url() . 'produk/' . $best_seller_product->slug;?>"><span class="s_icon_16"><span class="s_icon"></span>Beli</span></a>
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



    <?php else: ?>

      <form id="cart" method="POST" class="clearfix" action="<?php echo base_url() .'update-cart';?>">
        <table class="s_table_1" width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th width="30">Gambar</th>
            <th width="320">Nama</th>
            <th>Banyak</th>
            <th>Harga</th>
            <th>Sub Total</th>
            <th width="25">Hapus</th>
          </tr>
          <?php

            $i = 1;
            foreach ($this->cart->contents() as $item) {
          ?>

          <?php echo form_hidden('rowid[]', $item['rowid']); ?>

          <tr class="<?php if($i&1){echo 'even';} else {echo 'odd';};?>">
            <td valign="middle"><a href="<?php echo base_url() . 'produk/' .$item['slug']; ?>"><img src="<?php echo base_url() .'assets/web/images/foto_produk/' . $item['gambar']; ?>" width="60" height="60" alt="Panasonic Lumix" /></a></td>
            <td valign="middle"><a href="<?php echo base_url() . 'produk/' .$item['slug']; ?>"><strong><?php echo $item['name'];?></strong></a></td>
            <td valign="middle"><input name="qty[]" type="text" size="3" value="<?php echo $item['qty'];?>" /></td>
            <td valign="middle">Rp<span class="s_currency s_after"> <?php echo format_rupiah($item['price']);?></span></td>
            <td valign="middle">Rp<span class="s_currency s_after"> <?php echo format_rupiah($item['subtotal']);?></span></td>
            <td valign="middle"><a href="#" onclick="delete_cart('<?php echo $item['rowid'];?>')"><img src="<?php echo base_url(); ?>assets/web/images/hapus.png" width="20" height="20"></td>
          </tr>
          <?php $i++; } ?>

        </table>
        <br />

        <p class="s_total s_secondary_color last"><strong>Total:</strong>Rp <?php echo format_rupiah($this->cart->total());?><span class="s_currency s_after"></span></p>

        <div class="clear"></div>
        <br />

        <a class="s_button_1 s_ddd_bgr left" href="<?php echo base_url();?>"><span class="s_text">Lanjut Belanja</span></a>

        <!-- jika udah login, maka 'member/checkout', jika belum maka 'member/login' -->
      <?php if($this->session->userdata('sudah_login') == 1):?>
        <a class="s_button_1 s_main_color_bgr" href="<?php echo base_url() . 'member/checkout'; ?>"><span class="s_text">Lanjut</span></a>
      <?php else :?>
        <a class="s_button_1 s_main_color_bgr" href="<?php echo base_url() . 'member/login';?>"><span class="s_text">Lanjut</span></a>
      <?php endif;?>

        <button class="s_button_1 s_main_color_bgr" type="submit"><span class="s_text">Update</span></button>

      </form>
    <?php endif; ?>
    </div>

    <div class="clear"></div>
    <br />
    <br />

  </div>
  <!-- end of content -->
