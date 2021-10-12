<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hello World - <?php echo $this->template->title->default("Title"); ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo site_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo site_url('assets/css/blog-home.css');?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('/');?>">Hello World</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION) && isset($_SESSION["IS_LOGIN"]) && $_SESSION["IS_LOGIN"]==TRUE): ?>
                    <li>
                        <a href="<?php echo site_url('brand');?>">Brands</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('category');?>">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('product');?>">Products</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('user');?>">Users</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('auth/logout');?>">Log Out</a>
                    </li>
                    <?php Else: ?>
                     <li>
                        <a href="<?php echo site_url('auth/login');?>">Login</a>
                    </li>
                    <?php EndIf; ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <h3><?php echo $this->template->pageTitle->default("Page Title"); ?></h3>
            <hr>
            <?php echo  $this->template->content; ?>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo site_url('assets/js/jquery.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo site_url('assets/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var pathname = window.location;
            $('.nav > li > a[href="'+pathname+'"]').parent().addClass('active');
        });
    </script>

</body>

</html>
