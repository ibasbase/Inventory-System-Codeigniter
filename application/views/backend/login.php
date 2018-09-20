<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hofz | Log in</title>

    <link rel="stylesheet" href="<?php echo base_url()."assets/bootstrap/css/bootstrap.min.css"; ?>" >
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/dist/css/AdminLTE.min.css"; ?>">
    <link rel="shorcut icon" href="<?php echo base_url()."assets/images/hofz.png"; ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/bower_components/bootstrap/dist/css/bootstrap.min.css"; ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/bower_components/font-awesome/css/font-awesome.min.css"; ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/bower_components/Ionicons/css/ionicons.min.css"; ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/dist/css/AdminLTE.min.css"; ?>">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  <body class="hold-transition login-page" style="background-image: url(../../../assets/images/sm52_login.jpg); width: 100%; height: auto;">
    <div class="login-box">
      <div class="login-logo">
        <img src="<?php echo base_url()."assets/images/hofzz.jpg"; ?>" style="width: 40%; height: auto;">
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg"><h1 align="center">Sistem Inventory Please Login</h1></p>

        <?php 
          if(isset($_POST['masuk'])){
            $u = $this->input->post("username");
            $p = $this->input->post("password");  

            //$this->load->model('m_login');
            $this->model_login->getLogin($u, $p);
          }
        ?>

        <form method="post">
          <div>
            <td>Username</td>
            <p>
            <input type="text" name="username" class="form-control" placeholder="Username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div>
            <td>Password</td>
            <p>
            <input type="password" name="password" class="form-control" placeholder="Password" required data-eye/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            
            <div class="col-xs-12">
              <button type="submit" name="masuk" class="btn btn-primary btn-block form-control">SIGN IN</button>
              <button type="reset" name="reset" class="btn btn-primary btn-block form-control">CANCEL</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="<?php echo base_url()."assets/bower_components/jquery/dist/jquery.min.js"; ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url()."assets/bower_components/bootstrap/dist/js/bootstrap.min.js"; ?>"></script>
    <script src="<?php echo base_url()."assets/bootstrap/js/bootstrap.min.js"; ?>"></script>

    <!-- Star Java Script Show Password -->
    <script>
$(function() {
  $("input[type='password'][data-eye]").each(function(i) {
    let $this = $(this);

    $this.wrap($("<div/>", {
      style: 'position:relative'
    }));
    $this.css({
      paddingRight: 60
    });
    $this.after($("<div/>", {
      html: 'Show',
      class: 'btn btn-danger btn-sm',
      id: 'passeye-toggle-'+i,
      style: 'position:absolute;right:0px;top:10%;transform:translate(0,-50%);padding: 2px 7px;font-size:12px;cursor:pointer;'
    }));
    $this.after($("<input/>", {
      type: 'hidden',
      id: 'passeye-' + i
    }));
    $this.on("keyup paste", function() {
      $("#passeye-"+i).val($(this).val());
    });
    $("#passeye-toggle-"+i).on("click", function() {
      if($this.hasClass("show")) {
        $this.attr('type', 'password');
        $this.removeClass("show");
        $(this).removeClass("btn-outline-primary");
      }else{
        $this.attr('type', 'text');
        $this.val($("#passeye-"+i).val());        
        $this.addClass("show");
        $(this).addClass("btn-outline-primary");
      }
    });
  });
});
</script>
    <!-- End Java Script Show Password -->

  </body>
</html>
