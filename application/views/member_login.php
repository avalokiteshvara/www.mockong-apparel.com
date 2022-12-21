 <!-- ********************** -->
  <!--     I N T R O          -->
  <!-- ********************** -->
  <div id="intro">
    <div id="intro_wrap">
      <div class="container_12">
        <div id="breadcrumbs" class="grid_12">
          <a href="<?php echo base_url()?>">Home</a>
           &gt; <a href="<?php echo base_url() . 'shopping-cart'?>">Basket</a>
        </div>
        <h1>My account</h1>
      </div>
    </div>
  </div>
  <!-- end of intro -->


  <!-- ********************** -->
  <!--      C O N T E N T     -->
  <!-- ********************** -->
  <div id="content" class="container_16">


    <div id="login_page" class="grid_16">

      <div class="grid_8 alpha">
        <h2 class="s_title_1"><span class="s_secondary_color">Saya customer</span> Baru.</h2>
        <div class="clear"></div>
        <form id="account" action="<?php echo base_url() .'signup';?>" method="POST">
          <div class="s_row_3 clearfix">
            <p>Checkout Options:</p>
            <label class="s_radio" for="register">
              <input type="radio" name="register_grup" value="register" id="register" checked="checked" />
              <strong>Buat Akun Baru</strong>
            </label>
          <?php if($this->cart->contents()):?>
            <label for="guest">
              <input type="radio" name="register_grup" value="guest" id="guest" />
              <strong>Guest Checkout</strong>
            </label>
          <?php endif; ?>

            <br />
            <p>Dengan membuat akun, anda bisa berbelanja dengan lebih cepat dan bisa melihat status dan histori pembelian yang sebelumnya anda buat.</p>

          </div>
          <span class="clear border_ddd"></span>
          <br />
          <button class="s_button_1 s_main_color_bgr" type="submit"><span class="s_text">Lanjut</span></button>
        </form>
      </div>

      <div class="grid_8 omega">
        <h2 class="s_title_1"><span class="s_secondary_color">Returning</span> Customer</h2>

        <div class="clear"></div>
        <form id="login" action="#" method="post">
          <div class="s_row_3 clearfix">
            Saya sudah mempunyai akun.<br />
            <br />
            <label><strong>E-Mail Address:</strong></label>
            <input type="text" size="35" class="required email" name="email" value="member@gmail.com" />
            <br />
            <br />
            <label><strong>Password:</strong></label>
            <input type="password" size="35" class="required" name="password" value="member" />
            <br />
          </div>
          <span class="clear border_ddd"></span>
          <br />
          <div class="s_nav s_size_2 left">
            <ul class="clearfix">
              <!-- <li><a href="#">Forgotten Password</a></li> -->
            </ul>
          </div>
          <button class="s_button_1 s_main_color_bgr" type="submit" onclick="do_login();return false"><span class="s_text">Login</span></button>
        </form>
      </div>

      <div class="clear"></div>

    </div>

  </div>
  <!-- end of content -->
