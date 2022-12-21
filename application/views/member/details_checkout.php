 <!-- ********************** -->
  <!--     I N T R O          -->
  <!-- ********************** -->

  <div id="intro">
    <div id="intro_wrap">
      <div class="container_12">
        <div id="breadcrumbs" class="grid_12">
          <a href="">Home</a>
          &gt;
          <a href="">Member Area</a>
        </div>
        <h1>Details Checkout</h1>
      </div>
    </div>
  </div>
  <!-- end of intro -->


  <!-- ********************** -->
  <!--      C O N T E N T     -->
  <!-- ********************** -->
  <div id="content" class="container_12">
    <div class="grid_9">
      <div class="clear"></div>
      <h2>Details Checkout</h2>

    <?php foreach ($details_checkout->result() as $checkout_detail) {} ;?>
      <div class="grid_9 alpha">
        <h3><span class="s_secondary_color">Informasi</span> Pembeli</h3>

        <div class="s_row_2 clearfix">
          <label class="required">*Kode Pembelian:</label>
          <label class="required"><?php echo str_pad($checkout_detail->id, 7,"0",STR_PAD_LEFT);?></label>
        </div>

        <div class="s_row_2 clearfix">
          <label class="required">Nama Lengkap:</label>
          <label class="required"><?php echo $checkout_detail->nama;?></label>
        </div>

        <div class="s_row_2 clearfix">
          <label class="required">Email:</label>
          <label class="required"><?php echo $checkout_detail->email;?></label>
        </div>

        <div class="s_row_2 clearfix">
          <label class="required">Nomor Telephon:</label>
          <label class="required"><?php echo $checkout_detail->telp;?></label>
        </div>

        <div class="s_row_2 clearfix">
            <label>Pesan</label>
            <textarea rows="5" cols="31" name="pesan" readonly=""><?php echo $checkout_detail->pesan;?></textarea>
        </div>
        <span class="clear border_ddd"></span>

      </div>


      <div id="content_ajax">
      <h3><span class="s_secondary_color">Informasi</span> Items</h3>
          <div id="data_ajax">
            <table class="s_table" width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Quantity</th>
                <th>Harga Satuan</th>
                <th>Sub Total</th>
              </tr>

            <?php
              $total_harga = 0;
              foreach ($trans_detail->result() as $trans_detail) {
            ?>
              <tr>
                <td><?php echo $trans_detail->kode_produk;?></td>
                <td><?php echo $trans_detail->nama; ?></td>
                <td><?php echo $trans_detail->quantity;?></td>
                <td>Rp<?php echo format_rupiah($trans_detail->harga_satuan);?></td>
                <td>Rp<?php echo format_rupiah($trans_detail->sub_total);?></td>
              </tr>
             <?php
               $total_harga += intval($trans_detail->sub_total);
              }
             ?>
             <tr>
                <td colspan="4" style="text-align:right">**Total</td>
                <td colspan="1" style="text-align:center">Rp<?php echo format_rupiah($total_harga);?></td>
              </tr>
            </table>
        </div>
      </div>
      <span class="clear border_ddd"></span>
        <br />
        <p>Catatan:<br>
        * Ingat kode pembelian anda, karena akan dibutuhkan saat anda melakukan konfirmasi pembayaran.<br>
        **Total belum termasuk ongkos kirim. Nilai total yang harus dibayar akan dikirimkan melalui SMS. Mohon untuk tidak melakukan confirmasi pembayaran, jika belum mendapat SMS dari pihak kami</p>

      <button class="s_button_1 s_main_color_bgr" onclick="window.location.href = baseURL"><span class="s_text">Lanjut</span></button>

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
