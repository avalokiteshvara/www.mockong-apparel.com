<?php
  function settings($title){
    $CI =& get_instance();
    return $CI->db->get_where('settings',array('title' => $title))->row()->value;
  }
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en" xml:lang="en" >
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <title><?php echo $page_title . ' - ' . $this->config->item('store_name');?></title>
      <meta http-equiv="cache-control" content="max-age=0" />
      <meta http-equiv="cache-control" content="no-cache" />
      <meta http-equiv="expires" content="0" />
      <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
      <meta http-equiv="pragma" content="no-cache" />
      <?php if(isset($og_image)):?>
      <meta property="og:image" content="<?php echo base_url() .'assets/web/images/foto_produk/'.$og_image;?>" />
      <?php endif; ?>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/web/stylesheet/960.css" media="all" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/web/stylesheet/screen.css" media="screen" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/web/stylesheet/color.css" media="screen" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/web/stylesheet/prettyPhoto.css" media="all" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/web/stylesheet/jquery-ui.css" media="all" />
      <!--[if lt IE 9]>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/web/stylesheet/ie.css" media="screen" />
      <![endif]-->
      <script type="text/javascript" src="<?php echo base_url();?>assets/web/js/jquery/jquery.1.5.2.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>assets/web/js/jquery/jquery-ui.1.8.11.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>assets/web/js/jquery/jquery.prettyPhoto.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>assets/web/js/shoppica.js"></script>
      <!--jgrowl -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/web/stylesheet/jquery.jgrowl.css" type="text/css"/>
      <!--<link rel="stylesheet" href="<?php echo base_url();?>assets/web/stylesheet/jgrowl-theme.css" type="text/css"/>-->
      <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/web/stylesheet/demo.css" type="text/css"/> -->
      <script type="text/javascript" src="<?php echo base_url();?>assets/web/js/jquery.jgrowl.js"></script>
      <!--<script type="text/javascript" src="<?php echo base_url();?>assets/web/js/jgrowl-theme.js"></script>-->
      <script>
         var baseURL = '<?php echo base_url();?>';


         function do_login(){
           $.ajax({
             url: baseURL + 'member/login',
             type:"POST",
             data : $('form').serialize(),
             async: false,
             cache   : false,
               success: function(msg){
                   $.jGrowl(msg);
                   if(msg.trim() == 'Login Sukses'){
                     setTimeout(function(){
                       window.location.href = baseURL + 'shopping-cart';
                     },1000);
                   }
               }
           })
         }

         function do_signup(){
           $.ajax({
             url: baseURL + 'do-signup',
             type:"POST",
             data : $('form').serialize(),
             async: false,
             cache   : false,
             success: function(msg){
                   if(msg.trim() == 'OK'){
                     $.jGrowl('Pendaftaran telah berhasil.\nSilahkan Login dengan username dan password anda');
                     setTimeout(function(){
                       window.location.href = baseURL + 'member/login';
                     },1000);

                   }else{
                     $.jGrowl(msg);
                   }
               }
           })
         }

         function do_guestcheckout(){
           $.ajax({
             url: baseURL + 'checkout',
             type:"POST",
             data : $('form').serialize(),
             async: false,
             cache   : false,
             success: function(msg){
                   if(!isNaN(msg)){
                     $.jGrowl('Checkout Berhasil.\nJangan lupa untuk melakukan konfirmasi pembayaran setelah mendapat SMS konfirmasi dari kami');
                     setTimeout(function(){
                       window.location.href = baseURL + 'checkout/details/' + msg;
                     },3000);
                   }else{
                     $.jGrowl(msg);
                   }
               }
           })
         }

        function kirim_review(){

           $.ajax({
             url: baseURL + 'kirim-review',
             type:"POST",
             data : $('form').serialize(),
             async: false,
             cache   : false,
               success: function(msg){

                   if(msg.trim() == 'OK'){
                     $.jGrowl('Terimakasih atas review anda');
                     setTimeout(function(){
                       window.location.reload();
                     },1000);
                   }else{
                     $.jGrowl(msg);
                   }
               }
           })
         }

        function kirim_konfirmasi_guest(){

           $.ajax({
             url: baseURL + 'send-konfirmasi',
             type :"POST",
             data : $('form').serialize(),
             async: false,
             cache: false,
               success: function(msg){
                   if(msg.trim() == 'OK'){
                     $.jGrowl('Terimakasih atas konfirmasi anda');
                     setTimeout(function(){
                       window.location.href = baseURL;
                     },2000);
                   }else{
                     $.jGrowl(msg);
                   }

               }
           })
         }

        function delete_cart(rowid){
           $.ajax({
               url: baseURL + 'delete-cart/' + rowid,
               type:"POST",
               success : function(msg){
                 if(msg.trim() == 'OK'){
                   $.jGrowl('Item dihapus');
                   setTimeout(function(){
                     location.reload();
                   },2000);
                 }
               }
           })
         }

         function change_sort(sort_type){
           $.ajax({
               url: baseURL + 'sort/' + sort_type,
               type:"POST",
               success : function(msg){
                 if(msg.trim() == 'OK'){
                   location.reload();
                 }
               }
           })
         }

         function change_view(view_type){
           $.ajax({
               url: baseURL + view_type,
               type:"POST",
               success : function(msg){
                 if(msg.trim() == 'OK'){
                   location.reload();
                 }
               }
           })
         }

    <?php if($this->session->userdata('sudah_login') == 1): ?>

         function do_checkout(){
           $.ajax({
             url: baseURL + 'member/checkout',
             type:"POST",
             data : $('form').serialize(),
             async: false,
             cache   : false,
             success: function(msg){
                   if(!isNaN(msg)){
                     $.jGrowl('Checkout Berhasil.\nJangan lupa untuk melakukan konfirmasi pembayaran setelah mendapat SMS konfirmasi dari kami');
                     setTimeout(function(){
                       window.location.href = baseURL + 'member/checkout/details/' + msg;
                     },3000);

                   }else{
                     $.jGrowl(msg);
                   }
               }
           })
         }

         function update_profile(){
           $.ajax({
             url: baseURL + 'member/profile',
             type :"POST",
             data : $('form').serialize(),
             async: false,
             cache: false,
               success: function(msg){
                   if(msg.trim() == 'OK'){
                     $.jGrowl('Profile telah berhasil diupdate');

                     setTimeout(function(){
                       window.location.reload();
                     },1000);
                   }else{
                     $.jGrowl(msg);
                   }

               }
           })
         }

         function change_password(){
           $.ajax({
             url: baseURL + 'member/password',
             type :"POST",
             data : $('form').serialize(),
             async: false,
             cache: false,
               success: function(msg){
                   if(msg.trim() == 'OK'){
                     $.jGrowl('Password telah berhasil diubah');

                     setTimeout(function(){
                       window.location.reload();
                     },1000);
                   }else{
                     $.jGrowl(msg);
                   }
               }
           })
         }


         function kirim_konfirmasi(){

           $.ajax({
             url: baseURL + 'member/send-konfirmasi',
             type :"POST",
             data : $('form').serialize(),
             async: false,
             cache: false,
               success: function(msg){
                   if(msg.trim() == 'OK'){
                     $.jGrowl('Terimakasih atas konfirmasi anda',baseURL + 'assets/web/images/logo-msg.png');

                     setTimeout(function(){
                       window.location.href = baseURL + 'member/trans/histori';
                     },1000);
                   }else{
                     $.jGrowl(msg);
                   }

               }
           })
         }



         function batal_trans(trans_id){
           $.ajax({
               url: baseURL + 'member/trans/batal/' + trans_id,
               type:"POST",
               success : function(msg){
                 if(msg.trim() == 'OK'){
                   $.jGrowl('Transaksi Berhasil Dibatalkan');
                   setTimeout(function(){
                     location.reload();
                   },2000);
                 }
               }
           })
         }

         function fill_billing(f){
           if(f.shipping_too.checked == true){
             f.nama.value = f.billing_nama.value;
             f.email.value = f.billing_email.value;
             f.telp.value = f.billing_telp.value;
             f.propinsi.value = f.billing_propinsi.value;
             f.kota.value = f.billing_kota.value;
             f.kode_pos.value = f.billing_kode_pos.value;
             f.alamat.value = f.billing_alamat.value;

           }
         }

      <?php endif; ?>

         $(function() {
             applyPagination();

           function applyPagination() {
             $("#ajax_paging a").click(function() {

               var url = $(this).attr("href");
               $.ajax({
                 type: "POST",
                 data: "ajax=1",
                 url: url,
                 beforeSend: function() {
                   $("#content_ajax").html("");
                 },
                 success: function(msg) {
                   $('#content_ajax').fadeOut(100,function(){
                       $('#content_ajax').html(msg);
                       applyPagination();
                   }).fadeIn(500);
                 }
               });
               return false;
             });
           }
         });

         $(document).ready(function() {

           $(".s_tabs").tabs({ fx: { opacity: 'toggle', duration: 300 } });
           $("#product_images a[rel^='prettyPhoto'], #product_gallery a[rel^='prettyPhoto']").prettyPhoto({
               theme: 'light_square',
               opacity: 0.5
             });
         });

      </script>
   </head>
   <body class="s_layout_fixed">
      <div id="wrapper">
         <!-- ********************** -->
         <!--      H E A D E R       -->
         <!-- ********************** -->
         <div id="header" class="container_12">
            <div class="grid_12">
               <a id="site_logo" href="<?php echo base_url();?>" style="margin-top: 5px;margin-bottom: 1px;margin-right: 1px; height: 120px;">Shoppica store - Premium e-Commerce Theme</a>
               <div id="system_navigation" class="s_nav">
                  <ul class="s_list_1 clearfix">
                     <li><a href="<?php echo base_url();?>">Home</a></li>
                     <?php if($this->session->userdata('sudah_login') == 0): ?>
                     <li><a href="<?php echo base_url() . 'member/login';?>">Log In</a></li>
                     <?php else: ?>
                     <li><a href="<?php echo base_url() . 'member/logout';?>">Log Out</a></li>
                     <?php endif;?>
                     <li><a href="<?php echo base_url() . 'shopping-cart' ?>">Keranjang Belanja</a></li>
                     <li><a href="<?php echo base_url() . 'konfirmasi' ?>">Konfirmasi Pembayaran</a></li>
                     <li><a href="<?php echo base_url() . 'cara-belanja';?>">Cara Belanja</a></li>
                     <li><a href="<?php echo base_url() . 'tentang-kami';?>">Tentang Kami</a></li>
                     <!-- <li><a href="<?php echo base_url() . 'hubungi-kami';?>">Hubungi Kami</a></li>  -->
                     <!-- <li><a href="static.html">About Us</a></li> -->
                     <!-- <li><a href="contacts.html">Contact</a></li> -->
                  </ul>
               </div>

               <div id="categories" class="s_nav">
                  <ul>
                     <li id="menu_home"> <a href="<?php echo base_url()?>" onclick="">Home</a> </li>
                     <!-- bahan -->
                     <li>
                        <a href="#">Cowok</a>
                        <div class="s_submenu">
                           <ul class="s_list_1 clearfix">
                              <?php foreach ($menu_cowok->result() as $mn) { ?>
                              <li><a href="<?php echo base_url() . $mn->slug?>"><?php echo $mn->nama; ?></a></li>
                              <?php } ?>
                           </ul>
                        </div>
                     </li>

                     <li>
                        <a href="#">Cewek</a>
                        <div class="s_submenu">
                           <ul class="s_list_1 clearfix">
                              <?php foreach ($menu_cewek->result() as $mn) { ?>
                              <li><a href="<?php echo base_url() . $mn->slug?>"><?php echo $mn->nama; ?></a></li>
                              <?php } ?>
                           </ul>
                        </div>
                     </li>


                     <!-- range harga -->
                     <li>
                        <a href="#">Kisaran Harga</a>
                        <div class="s_submenu">
                           <ul class="s_list_1 clearfix">
                              <?php foreach ($menu_rangeharga->result() as $mn_rangeharga) { ?>
                              <li><a href="<?php echo base_url() . $mn_rangeharga->slug?>"><?php echo $mn_rangeharga->title; ?></a></li>
                              <?php } ?>
                           </ul>
                        </div>
                     </li>
                     <li><a href="<?php echo base_url() . 'produk-terbaru';?>">Terbaru</a></li>
                     <?php if($this->session->userdata('sudah_login') == 1): ?>
                     <li>
                        <a href="#">Member Area</a>
                        <div class="s_submenu">
                           <h3>Transaksi</h3>
                           <ul class="s_list_1 clearfix">
                              <li><a href="<?php echo base_url() . 'member/trans/histori';?>">Histori</a></li>
                              <li><a href="<?php echo base_url() . 'member/konfirmasi';?>">Konfirmasi</a></li>
                           </ul>
                           <span class="clear border_eee"></span>
                           <h3>Profile</h3>
                           <ul class="s_list_1 clearfix">
                              <li><a href="<?php echo base_url() . 'member/profile';?>">Pengaturan</a></li>
                              <li><a href="<?php echo base_url() . 'member/password';?>">Ganti Password</a></li>
                           </ul>
                        </div>
                     </li>
                     <?php endif; ?>
                  </ul>
               </div>
               <div id="cart_menu" class="s_nav">
                  <a href="<?php echo base_url() . 'shopping-cart';?>"><span class="s_icon"></span> <small class="s_text">Cart</small><span class="s_grand_total s_main_color">Rp <?php echo  ($this->cart->total() == 0) ? '0.00' : format_rupiah($this->cart->total())?></span></a>
                  <?php if(!$this->cart->contents()):?>
                  <div class="s_submenu s_cart_holder">
                     0 items
                  </div>
                  <?php else: ?>
                  <div class="s_submenu s_cart_holder">
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
                        <?php if($this->session->userdata('sudah_login') == 1) :?>
                        <a class="s_button_1 s_secondary_color_bgr" href="<?php echo base_url() . 'member/checkout';?>"><span class="s_text">Lanjut</span></a>
                        <?php else:?>
                        <a class="s_button_1 s_secondary_color_bgr" href="<?php echo base_url() . 'member/login';?>"><span class="s_text">Lanjut</span></a>
                        <?php endif; ?>
                     </div>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
         </div>
         <!-- end of header -->
         <?php
            $page_name .= ".php";
               include $page_name;
            ?>
         <!-- ********************** -->
         <!--   S H O P   I N F O    -->
         <!-- ********************** -->
         <div id="shop_info">
            <div id="shop_info_wrap">
               <div class="container_12">
                  <div id="shop_description" class="grid_6">
                     <h2>mockong-apparel</h2>
                     <p><?php echo settings('tentang_kami_1')?></p>
                  </div>
                  <div id="shop_contacts" class="grid_6">
                     <h2>Contact Us</h2>
                     <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                           <td valign="middle"><span class="s_icon_32"><span class="s_icon s_phone_32"></span>123456789012 <br /></span></td>

                           <td valign="middle"><span class="s_icon_32"><span class="s_icon s_mail_32"></span>mockong-apparel@gmail.com <br /> mockong-apparel@yahoo.com</span></td>                        </tr>
                        <tr>
                          <td valign="middle"><span class="s_icon_32"><span class="s_icon s_fax_32"></span>123456789012 <br /></span></td>
                        </tr>
                        <tr>

                        </tr>

                     </table>
                  </div>


                  <div class="clear"></div>
               </div>
            </div>
         </div>
         <!-- end of shop info -->
         <!-- ********************** -->
         <!--      F O O T E R       -->
         <!-- ********************** -->
         <div id="footer" class="container_12">
            <!-- <div id="payments" class="right clearfix">
               <img src="images/payments/discover_straight_32px.png" alt="" />
               <img src="images/payments/american_express_straight_32px.png" alt="" />
               <img src="images/payments/moneybookers_straight_32px.png" alt="" />
               <img src="images/payments/paypal_straight_32px.png" alt="" />
               <img src="images/payments/visa_straight_32px.png" alt="" />
               <img src="images/payments/american_express_straight_32px.png" alt="" />
               </div> -->
            <!-- <p id="copy">&copy; Copyright 2011. Powered by <a class="blue" href="">Open Cart</a>.<br /> <a class="s_main_color" href="http://www.shoppica.net">Shoppica theme</a> made by <a href="http://www.themeburn.com">ThemeBurn.com</a></p> -->
         </div>
         <!-- end of FOOTER -->
      </div>
      <div id="fb-root"></div>
   </body>
</html>
