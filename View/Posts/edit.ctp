<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Edit Post'); ?></h2>
    <div class="panel-body">
        <?php echo $this->Form->create('Post', array('role'=>'form', 'inputDefaults'=>array('class' => 'form-control', 'div'=>'form-group'))); ?>
        <fieldset>
            <legend></legend>
            	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('title');
		echo $this->Form->input('slug');
		echo $this->Form->input('image');
		echo $this->Form->input('description');
		echo $this->Form->input('meta_title');
		echo $this->Form->input('meta_keywords');
		echo $this->Form->input('meta_description');
		echo $this->Form->input('published');
		echo $this->Form->input('terms');
	?>
        </fieldset>
                    <div class="btn-group btn-sm">
                <?php echo $this->Form->submit(__('Cập nhật'), array('class' => 'btn btn-primary btn-sm', 'label' => FALSE, 'div' => FALSE)); ?>                <?php echo $this->Html->link(__('Xóa dữ liệu'), array('action' => 'delete', $this->Form->value('Post.id')), array('class' => 'btn btn-danger btn-sm'), __('Bạn có chắc chắn muốn xóa # %s?', $this->Form->value('Post.id'))); ?>            </div>
            <?php echo $this->Form->end(); ?>
            </div>
</div>