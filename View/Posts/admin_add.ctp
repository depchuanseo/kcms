<?php $this->start('script'); ?>
<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<?php $this->end(); ?>
<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Add Post'); ?></h2>
    <div class="panel-body">
        <?php echo $this->Form->create('Post', array('type' => 'file', 'role' => 'form', 'inputDefaults' => array('class' => 'form-control', 'div' => 'form-group'))); ?>
        <fieldset>
            <legend></legend>
            <?php
            echo $this->Form->input('category_id');
            echo $this->Form->input('title');
            echo $this->Form->input('slug');
            echo $this->Form->input('image', array('type' => 'file'));
            echo $this->Form->input('description', array('class' => 'ckeditor'));
            echo $this->Form->input('meta_title');
            echo $this->Form->input('meta_keywords');
            echo $this->Form->input('meta_description');
            echo $this->Form->input('published', array('class' => false, 'label' => '&nbsp;Hiển thị', 'checked' => 'checked'));
            echo $this->Form->input('terms', array('type' => 'hidden', 'value' => $terms));
            ?>
        </fieldset>
        <?php echo $this->Form->end(array('label' => 'Thêm mới', 'class' => 'btn btn-primary btn-sm', 'div' => 'form-group')); ?>
    </div>
</div>