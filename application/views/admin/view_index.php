<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Bootstrap Admin</title>
      <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <!-- For sample logo only-->
      <!--Remove if you no longer need this font-->
      <!-- <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Aguafina+Script" /> -->
      <!--For sample logo only-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/lib/bootstrap/css/bootstrap.css" />
      <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/lib/font-awesome/css/font-awesome.css" />
      <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/jquery.jgrowl.css" />
      <script src="<?php echo base_url()?>assets/admin/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url()?>assets/admin/js/jquery.jgrowl.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url()?>assets/admin/js/site.js" type="text/javascript"></script>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/css/theme.css" />
      <script src="<?php echo base_url()?>assets/admin/lib/bootstrap/js/bootstrap.js"></script>
      <script src="<?php echo base_url() . 'ckeditor/ckeditor.js'?>"></script>
      <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
      <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
      <!-- Le fav and touch icons -->
      <link rel="shortcut icon" href="../assets/ico/favicon.ico" />
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png" />
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png" />
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png" />
      <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

      <script type="text/javascript">
        $(function() {
              applyPagination();

              function applyPagination() {
                $("#paging a").click(function() {
                  var url = $(this).attr("href");
                  $.ajax({
                    type: "POST",
                    data: "ajax=1",
                    url: url,
                    beforeSend: function() {
                      $("#content-ajax").html("");
                    },
                    success: function(msg) {
                      $('#content-ajax').fadeOut(100,function(){
                          $('#content-ajax').html(msg);
                          applyPagination();
                      }).fadeIn(500);
                    }
                  });
                  return false;
                });
              }

        $('table.data-table.sort').dataTable( {
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": false,
            "bAutoWidth": false
        });
       $('table.data-table.full').dataTable( {
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "sPaginationType": "full_numbers",
            "sDom": '<""f>t<"F"lp>',
            "sPaginationType": "bootstrap"
        });
             });
      </script>
   </head>
   <!--[if lt IE 7 ]>
   <body class="ie ie6">
      <![endif]-->
      <!--[if IE 7 ]>
      <body class="ie ie7 ">
         <![endif]-->
         <!--[if IE 8 ]>
         <body class="ie ie8 ">
            <![endif]-->
            <!--[if IE 9 ]>
            <body class="ie ie9 ">
               <![endif]-->
               <!--[if (gt IE 9)|!(IE)]><!-->
               <body class="">
                  <!--<![endif]-->
                  <div class="navbar">
                     <div class="navbar-inner">
                        <ul class="nav pull-right">
                           <li class="hidden-phone"><a href="<?php echo base_url() . 'admin/settings'?>" role="button">Settings</a></li>
                           <li id="fat-menu" class="dropdown">
                              <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="icon-user"></i> <?php echo $this->session->userdata('nama_lengkap'); ?>
                              <i class="icon-caret-down"></i>
                              </a>
                              <ul class="dropdown-menu">
                                 <li><a tabindex="-1" href="#">My Account</a></li>
                                 <li class="divider"></li>
                                 <li><a tabindex="-1" class="visible-phone" href="#">Settings</a></li>
                                 <li class="divider visible-phone"></li>
                                 <li><a tabindex="-1" href="<?php echo base_url() . 'admin-logout'?>">Logout</a></li>
                              </ul>
                           </li>
                        </ul>
                        <!-- <a class="brand" href="index.html">Awesome.</a> -->
                     </div>
                  </div>
                  <div id="main-menu">
                     <!-- <div id="phone-navigation">
                        <select class="selectnav" id="phone-menu">
                           <option value="index.html" selected="selected" /> Beranda
                           <option value="reports.html" /> Reports
                           <option value="components.html" /> Components
                           <option value="pricing.html" /> Pricing
                           <option value="" /> Settings
                           <option value="sign-in.html" />- Sign In Page
                           <option value="sign-up.html" />- Sign Up Page
                           <option value="reset-password.html" />- Reset Password Page
                           <option value="" />----------------------

                           <option value="index.html" selected="selected" /> Beranda
                           <option value="reports.html" /> Reports
                           <option value="components.html" /> UI Features
                           <option value="pricing.html" /> Pricing
                           <option value="media.html" /> Media
                           <option value="blog.html" /> Blog
                           <option value="help.html" /> Help
                           <option value="faq.html" /> Faq
                           <option value="calendar.html" /> Calendar
                           <option value="forms.html" /> Forms
                           <option value="tables.html" /> Tables
                           <option value="icons.html" /> Font Awesome
                        </select>
                     </div> -->
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="<?php echo base_url()?>admin/beranda"><i class="icon-dashboard"></i> <span>Beranda</span></a></li>
                        <!-- <li><a href="reports.html"><i class="icon-bar-chart"></i> <span>Laporan</span></a></li> -->
                        <!-- <li><a href="components.html"><i class="icon-cogs"></i> <span>Components</span></a></li> -->
                        <!-- <li><a href="pricing.html"><i class="icon-magic"></i> <span>Pricing</span></a></li> -->
                        <!-- <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i> Master Data <b class="caret"></b></a>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url() . 'admin/produk'?>"><span><i class="icon-th-large"></i> Produk</span></a></li>
                              <li class="divider"></li>
                              <li><a href="<?php echo base_url() . 'admin/kategori'?>"><span><i class="icon-th-large"></i> Kategori</span></a></li>

                           </ul>
                        </li> -->

                        <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i> Laporan <b class="caret"></b></a>
                           <ul class="dropdown-menu">
                              <!--<li><a href="<?php echo base_url() . 'admin/produk'?>"><span><i class="icon-th-large"></i> Konfirmasi Pembayaran</span></a></li> -->
                              <!-- <li class="divider"></li> -->
                              <li><a href="<?php echo base_url() . 'admin/stok'?>"><span><i class="icon-th-large"></i> Stok Barang</span></a></li>
                              <li><a href="<?php echo base_url() . 'admin/penjualan'?>"><span><i class="icon-th-large"></i> Penjualan Total</span></a></li>
                              <li><a href="<?php echo base_url() . 'admin/penjualan_per_hari'?>"><span><i class="icon-th-large"></i> Penjualan Per Hari</span></a></li>
                              <!-- <li><a href="<?php echo base_url() . 'admin/motif'?>"><span><i class="icon-th-large"></i> Motif</span></a></li>                               -->
                           </ul>
                        </li>

                     </ul>
                  </div>
                  <?php

                    function menulike($str){
                      $CI =& get_instance();
                      $uri = $CI->uri->segment(2,'beranda');

                      return strpos($uri,$str);

                    }



                  ?>
                  <div id="sidebar-nav">
                     <ul id="dashboard-menu" class="nav nav-list">
                        <li class="<?php echo menulike('beranda') === 0 ? 'active' : ''; ?>"><a href="<?php echo base_url()?>admin/beranda"><i class="icon-home"></i> <span>Beranda</span></a></li>
                        <li class="<?php echo menulike('produk') === 0 ? 'active' : '';  ?> "><a href="<?php echo base_url() . 'admin/produk'?>"><i class="icon-bar-chart"></i> <span>Produk</span></a></li>
                        <li class="<?php echo menulike('kategori') === 0 ? 'active' : ''; ?> "><a href="<?php echo base_url() . 'admin/kategori'?>"><i class="icon-th-large"></i> <span>Kategori</span></a></li>
                        <li class="<?php echo menulike('barang-masuk') === 0 ? 'active' : '';?>"><a href="<?php echo base_url() . 'admin/barang-masuk'?>"><i class="icon-briefcase"></i> <span>Barang Masuk</span></a></li>
                        <li class="<?php echo menulike('transaksi') === 0 ? 'active' : '';  ?>"><a href="<?php echo base_url() . 'admin/transaksi'?>"><i class="icon-magic"></i> <span>Transaksi</span></a></li>
                        <li class="<?php echo menulike('review') === 0 ? 'active' : '';  ?>"><a href="<?php echo base_url() . 'admin/produk/review'?>"><i class="icon-film"></i> <span>Review</span></a></li>
                        <!--<li class=" "><a href="<?php echo base_url() . 'admin/laporan'?>"><i class="icon-beaker"></i> <span>Laporan</span></a></li>-->

                        <!-- <li class=" "><a href="help.html"><i class="icon-question-sign"></i> <span>Help</span></a></li>
                        <li class=" "><a href="faq.html"><i class="icon-book"></i> <span>Faq</span></a></li>
                        <li class=" "><a href="calendar.html"><i class="icon-calendar"></i> <span>Calendar</span></a></li>
                        <li class=" "><a href="forms.html"><i class="icon-tasks"></i> <span>Forms</span></a></li>
                        <li class=" "><a href="tables.html"><i class="icon-table"></i> <span>Tables</span></a></li>
                        <li class=" theme-mobile-hack"><a href="mobile.html"><i class="icon-comment-alt"></i> <span>Mobile</span></a></li>
                        <li class=" "><a href="icons.html"><i class="icon-heart"></i> <span>Font Awesome</span></a></li> -->
                     </ul>
                  </div>
                   <!-- end of header -->
                    <?php
                        $page_name .= ".php";
                        include $page_name;
                    ?>


   </body>
</html>
