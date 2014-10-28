<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Control Panel</title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->fetch('css');
        echo $this->Html->css(array('bootstrap.min', 'style', 'metisMenu.min', 'font-awesome.min'));
        echo $this->Html->script(array('jquery.min', 'bootstrap.min', 'metisMenu.min', 'sb-admin-2'));
        echo $this->fetch('script');
        ?>
        <!--[if lt IE 9]>
        <?php echo $this->Html->script(array('html5shiv.min', 'respond.min')); ?>
        <![endif]-->
    </head>
    <body>
        <div class="well">dsf</div>
        <div id="wrapper" class="container">
            <div class="col-xs-3 sidebar">
                <div class="panel panel-success">
                    <div class="panel-heading panel-title"><strong>Danh mục quản lý</strong></div>
                    <div class="panel-body">
                        <ul class="row nav" id="side-menu">
                            <li>
                                <?php echo $this->Html->link('<i class="fa fa-home"></i> Trang chủ', '/admin', array('class' => 'text-success', 'escape' => FALSE)); ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('<i class="fa fa-bar-chart-o fa-fw"></i> Quản trị nội dung<span class="fa arrow"></span>', '#', array('class' => 'text-success', 'escape' => FALSE)); ?>
                                <ul class="nav nav-second-level collapse">
                                    <li><?php echo $this->Html->link('<i class="fa fa-angle-right"></i> Danh mục', '/admin/categories/add?terms=post', array('class' => 'text-success', 'escape' => FALSE)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-angle-right"></i> Thêm danh mục', '/admin/categories/add/post', array('class' => 'text-success', 'escape' => FALSE)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-angle-right"></i> Bài viết', '/admin/posts/?terms=post', array('class' => 'text-success', 'escape' => FALSE)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-angle-right"></i> Thêm bài viết', '/admin/posts/add/post', array('class' => 'text-success', 'escape' => FALSE)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-angle-right"></i> Trang cố định', '/admin/posts/?terms=page', array('class' => 'text-success', 'escape' => FALSE)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-angle-right"></i> Thêm trang cố định', '/admin/posts/add/page', array('class' => 'text-success', 'escape' => FALSE)); ?></li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <?php echo $this->Html->link('<i class="fa fa-bar-chart-o fa-fw"></i> Quản trị sản phẩm<span class="fa arrow"></span>', '#', array('class' => 'text-success', 'escape' => FALSE)); ?>
                                <ul class="nav nav-second-level collapse">
                                    <li><?php echo $this->Html->link('<i class="fa fa-angle-right"></i> Danh mục', '/admin/categories/?terms=product', array('class' => 'text-success', 'escape' => FALSE)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-angle-right"></i> Thêm danh mục', '/admin/categories/add/product', array('class' => 'text-success', 'escape' => FALSE)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-angle-right"></i> Sản phẩm', '/admin/products', array('class' => 'text-success', 'escape' => FALSE)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-angle-right"></i> Thêm sản phẩm', '/admin/products/add', array('class' => 'text-success', 'escape' => FALSE)); ?></li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <?php echo $this->Html->link('<i class="fa fa-home"></i> Cấu hình website', '/admin/configurations', array('class' => 'text-success', 'escape' => FALSE)); ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('<i class="fa fa-home"></i> Quản lý Menu', '/admin/menus', array('class' => 'text-success', 'escape' => FALSE)); ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('<i class="fa fa-bar-chart-o fa-fw"></i> Quản lý quảng cáo<span class="fa arrow"></span>', '#', array('class' => 'text-success', 'escape' => FALSE)); ?>
                                <ul class="nav nav-second-level collapse">
                                    <li><?php echo $this->Html->link('<i class="fa fa-angle-right"></i> Slideshow', '/admin/banners/?terms=slideshow', array('class' => 'text-success', 'escape' => FALSE)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-angle-right"></i> Thêm slideshow', '/admin/banners/add/slideshow', array('class' => 'text-success', 'escape' => FALSE)); ?></li>
<!--                                    <li><?php echo $this->Html->link('<i class="fa fa-angle-right"></i> Sản phẩm', '/admin/products', array('class' => 'text-success', 'escape' => FALSE)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-angle-right"></i> Thêm sản phẩm', '/admin/products/add', array('class' => 'text-success', 'escape' => FALSE)); ?></li>-->
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <?php echo $this->Html->link('<i class="fa fa-home"></i> Quản lý thành viên', '/admin/users', array('class' => 'text-success', 'escape' => FALSE)); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-9">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
    </body>
</html>