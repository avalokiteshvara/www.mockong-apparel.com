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
         var baseURL = '<?php echo base_url();?>';

         function do_login(){

            $.ajax({
             url: baseURL + 'admin-login',
             type:"POST",
             data : $('form').serialize(),
             async: false,
             cache   : false,
             success: function(msg){
                 $.jGrowl(msg);
                 if(msg.trim() =='Login Sukses'){
                     setTimeout(function(){
                         window.location.href = baseURL + 'admin/beranda';
                       },1000);
                     }
                 }
             })
         }
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
                  <div class="row-fluid login">
                     <div class="dialog">
                        <p class="brand" href="index.html">.: ADMIN PAGE :.</p>
                        <div class="block">
                           <div class="block-header">
                              <h2>Sign In</h2>
                           </div>
                           <form method="POST" action="#" />
                              <label>Username</label>
                              <input type="text" class="span12" name="email" value="admin@admin.com" />
                              <!-- <a class="reset-password" href="reset-password.html">Forgot your password?</a> -->
                              <label>Password</label>
                              <input type="password" class="span12" name="password" value="admin" />
                              <div class="form-actions">
                                 <button class="btn btn-success pull-right" type="submit" onclick="do_login();return false">Login</button>
                                 <div class="clearfix"></div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
   </body>
</html>
