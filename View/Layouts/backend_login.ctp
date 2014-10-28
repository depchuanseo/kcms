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
        echo $this->Html->css(array('bootstrap.min', 'style'));
        echo $this->Html->script(array('jquery.min', 'bootstrap.min'));
        echo $this->fetch('script');
        ?>
        <!--[if lt IE 9]>
        <?php echo $this->Html->script(array('html5shiv.min', 'respond.min')); ?>
        <![endif]-->
    </head>
    <body>
        <?php echo $this->fetch('content'); ?>
    </body>
</html>