<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <?php echo $this->Html->charset(); ?><title><?php echo isset($meta_title) ? $meta_title : NULL ?></title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
        echo $this->Html->meta('keywords', isset($meta_keywords) ? $meta_keywords : NULL);
        echo $this->Html->meta('description', isset($meta_description) ? $meta_description : NULL);
        echo $this->Html->css(array('bootstrap.min'));
        echo $this->fetch('css');
        echo $this->Html->css('style');
        echo $this->Html->script(array('jquery-1.11.1.min', 'bootstrap.min', 'jquery.flexisel'));
        echo $this->fetch('script');
        ?>
        <!--[if lt IE 9]>
        <?php echo $this->Html->script(array('html5shiv.min', 'respond.min')); ?>
        <![endif]-->
    </head>
    <body>
        <div id="container">
            <div id="header">
            </div>
            <div id="content">
                <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">
            </div>
        </div>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>
