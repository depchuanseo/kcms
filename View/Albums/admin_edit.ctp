<?php $this->start('script'); ?>
<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<?php $this->end(); ?>
<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Edit Album'); ?></h2>
    <div class="panel-body">
        <?php echo $this->Form->create('Album', array('type' => 'file', 'role' => 'form', 'inputDefaults' => array('class' => 'form-control', 'div' => 'form-group'))); ?>
        <fieldset>
            <legend></legend>
            <?php
            echo $this->Form->input('id');
            echo $this->Form->input('category_id');
            echo $this->Form->input('title');
            echo $this->Form->input('slug');
            echo $this->Form->input('image', array('type' => 'file'));
            echo $this->Form->input('AlbumsImage.attachment.remove', array('type' => 'checkbox', 'label' => 'Remove existing file', 'class' => false));
            echo $this->Form->input('AlbumsImage..attachment', array('type' => 'file', 'label' => 'Gallery', 'multiple' => 'true'));
            echo $this->Form->input('AlbumsImage.model', array('type' => 'hidden'));
            echo $this->Form->input('description', array('class' => 'ckeditor'));
            echo $this->Form->input('published', array('class' => false, 'label' => '&nbsp;Hiển thị'));
            echo $this->Form->input('meta_title');
            echo $this->Form->input('meta_keywords');
            echo $this->Form->input('meta_description');
            ?>
        </fieldset>
        <div class="btn-group btn-sm">
            <?php echo $this->Form->submit(__('Cập nhật'), array('class' => 'btn btn-primary btn-sm', 'label' => FALSE, 'div' => FALSE)); ?>                <?php echo $this->Html->link(__('Xóa dữ liệu'), array('action' => 'delete', $this->Form->value('Album.id')), array('class' => 'btn btn-danger btn-sm'), __('Bạn có chắc chắn muốn xóa # %s?', $this->Form->value('Album.id'))); ?>            </div>
            <?php echo $this->Form->end(); ?>
    </div>
</div>