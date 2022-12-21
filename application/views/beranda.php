 <!-- ********************** -->
  <!--     I N T R O          -->
  <!-- ********************** -->

  <div id="intro">
    <div id="intro_wrap">
      <div class="container_12">
        <div id="breadcrumbs" class="grid_12">
          <a href="">Home</a>
          &gt;
          <a href="">Static page</a>
        </div>
        <h1>Static page</h1>
      </div>
    </div>
  </div>
  <!-- end of intro -->


  <!-- ********************** -->
  <!--      C O N T E N T     -->
  <!-- ********************** -->
  <div id="content" class="container_12">
    <div class="grid_9">
      <h2>Histori Pembelian</h2>
      <table class="s_table" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <th>Tanggal Transaksi</th>
          <th>Nomor</th>
          <th>Status</th>
          <th>Quantity</th>
          <th>Total Harga</th>
          <th></th>
        </tr>

        <tr>
          <td>2013-11-26</td>
          <td>0000001</td>
          <td>WAITING_PAYMENT</td>
          <td>10</td>
          <td>Rp100.000</td>
          <td><a href="#"> Konfirmasi</a></td>
        </tr>
      </table>
    </div>
    <div id="right_col" class="grid_3">
      <div id="cart_side" class="s_box_1 s_cart_holder">
        <h2 class="s_secondary_color">Keranjang Belanja</h2>
        <div id="cart_side_contents">
      <?php if(!$this->cart->contents()) : ?>
          <p class="s_mb_0">0 items</p>
      <?php else : ?>
        <?php foreach ($this->cart->contents() as $item) { ?>
          <?php echo form_hidden('rowid[]', $item['rowid']); ?>
          <div class="s_cart_item">
              <a id="hremove_<?php echo $item['id'];?>" class="s_button_remove" href="#" onclick="delete_cart('<?php echo $item['rowid'];?>')">&nbsp;</a>
              <span class="block"><?php echo $item['qty'];?>x <a href="<?php echo base_url() .'produk/' .$item['slug']; ?>"><?php echo $item['name'];?></a></span>
          </div>

        <?php } ?>
          <span class="clear s_mb_15 border_eee"></span>
          <!-- <div class="s_total clearfix"><strong class="cart_module_total left">Sub-Total:</strong><span class="cart_module_total">Rp <?php echo format_rupiah($item['subtotal']); ?><span class="s_currency s_after"></span></span></div>                     -->
          <div class="s_total clearfix"><strong class="cart_module_total left">Total:</strong><span class="cart_module_total">Rp <?php echo format_rupiah($this->cart->total()); ?><span class="s_currency s_after"></span></span></div>

          <span class="clear s_mb_15"></span>
          <div class="align_center clearfix">
            <a class="s_button_1 s_secondary_color_bgr s_ml_0" href="<?php echo base_url() . 'shopping-cart';?>"><span class="s_text">Lihat</span></a>
            <?php if($this->session->userdata('sudah_login') == 1):?>
            <a class="s_button_1 s_main_color_bgr" href="<?php echo base_url() . 'member/checkout'; ?>"><span class="s_text">Lanjut</span></a>
            <?php else :?>
            <a class="s_button_1 s_main_color_bgr" href="<?php echo base_url() . 'member/login';?>"><span class="s_text">Lanjut</span></a>
            <?php endif;?>
          </div>

      <?php endif; ?>
        </div>
      </div>

      <?php if($best_seller_product->num_rows() > 0){ ?>
        <div id="bestseller_side" class="s_box clearfix">
          <h2>Best Sellers</h2>
        <?php foreach ($best_seller_product->result() as $best_seller) { ?>
          <div class="s_item s_size_1 clearfix">
            <a class="s_thumb" href="<?php echo base_url() . 'produk/' . $best_seller->slug;?>"><img src="<?php echo base_url() . 'assets/web/images/foto_produk/' . $best_seller->gambar;?>" width="38" height="38" alt="<?php echo $best_seller->nama;?>" /></a>
            <h3><a href="<?php echo base_url() . 'produk/' . $best_seller->slug;?>"><?php echo $best_seller->nama;?></a></h3>
          <?php if($best_seller->promo === 'N'): ?>
            <p><a href="<?php echo base_url() . 'produk/' . $best_seller->slug;?>"><span class="s_main_color"><span class="s_currency s_before">Rp</span><?php echo format_rupiah($best_seller->harga);?></span></a></p>
          <?php else: ?>
            <p><a href="<?php echo base_url() . 'produk/' . $best_seller->slug;?>"><span class="s_old"><span class="s_currency s_before">Rp</span><?php echo format_rupiah($best_seller->harga_lama);?></span> <span class="s_secondary_color"><span class="s_currency s_after">Rp</span><?php echo format_rupiah($best_seller->harga);?></span></a></p>
          <?php endif; ?>
          <div class="s_rating_holder clearfix"><p class="s_rating s_rating_small s_rating_5 left"><span style="width: <?php echo get_percent($best_seller->average_rating,5) ?>%;" class="s_percent"></span></p><span class="left">&nbsp;<?php echo $best_seller->average_rating;?>/5</span></div>
          </div>
        <?php } ?>
        </div>
      <?php } ?>



    </div>

  </div>
  <!-- end of content -->
