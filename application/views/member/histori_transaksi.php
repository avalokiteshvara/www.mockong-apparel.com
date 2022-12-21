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
        <h1>Histori Pembelian</h1>
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
      <!-- <h2>Histori Pembelian</h2> -->
      <div id="content_ajax">
          <div id="data_ajax">
            <table class="s_table" width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <th>Tanggal Transaksi</th>
                <th>No.Transaksi</th>
                <!-- <th>Status</th> -->
                <th>Quantity</th>
                <th>Total Harga</th>
                <th>Detail</th>
                <th>Status</th>
              </tr>

            <?php foreach ($histori_transaksi->result() as $histori_item) { ?>
              <tr>
                <td><?php echo $histori_item->created_at;?></td>
                <td><?php echo str_pad($histori_item->id, 7,"0",STR_PAD_LEFT); ?></td>
                <!--<td><?php echo $histori_item->status;?></td>-->
                <td><?php echo $histori_item->quantity;?></td>
                <td>Rp<?php echo format_rupiah($histori_item->total_trans);?></td>
                <td><a href="<?php echo base_url() . 'member/trans/detail/' . $histori_item->id; ?>" style="color:blue;text-decoration:underline"> Lihat Detail</a></td>
              <?php if($histori_item->status === "WAITING_PAYMENT") : ?>
                <td>
                  <a href="<?php echo base_url() . 'member/konfirmasi/'. $histori_item->id; ?>" style="color:blue;text-decoration:underline"> KONFIRMASI</a> |
                  <a href="#" onclick="batal_trans(<?php echo $histori_item->id;?>)" style="color:blue;text-decoration:underline"> BATAL</a>
                </td>
              <?php else: ?>
                <td><?php echo $histori_item->status;?></td>
              <?php endif; ?>
              </tr>
             <?php } ?>
            </table>
        </div>

        <div class="pagination" id="ajax_paging">
          <div class="links">
            <?php echo $pagination;?>
           </div>
          <!-- <div class="results">Showing 1 to 12 of 20 (2 Pages)</div> -->
        </div>

      </div>
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
          <div class="s_total clearfix"><strong class="cart_module_total left">Total:</strong><span class="cart_module_total">Rp <?php echo format_rupiah($this->cart->total()); ?><span class="s_currency s_after"></span></span></div>

          <span class="clear s_mb_15"></span>
          <div class="align_center clearfix">
            <a class="s_button_1 s_secondary_color_bgr s_ml_0" href="<?php echo base_url() . 'shopping-cart';?>"><span class="s_text">Lihat</span></a>
            <a class="s_button_1 s_secondary_color_bgr" href="<?php echo base_url() . 'member/checkout';?>"><span class="s_text">Lanjut</span></a>
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
