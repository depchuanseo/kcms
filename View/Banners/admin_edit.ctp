<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Edit Banner'); ?></h2>
    <div class="panel-body">
        <?php echo $this->Form->create('Banner', array('role'=>'form', 'inputDefaults'=>array('class' => 'form-control', 'div'=>'form-group'))); ?>
        <fieldset>
            <legend></legend>
            	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('terms');
		echo $this->Form->input('title');
		echo $this->Form->input('slug');
		echo $this->Form->input('image');
		echo $this->Form->input('description');
		echo $this->Form->input('published', array('class' => false, 'label'=> '&nbsp;Hiển thị'));
		echo $this->Form->input('params');
	?>
        </fieldset>
                    <div class="btn-group btn-sm">
                <?php echo $this->Form->submit(__('Cập nhật'), array('class' => 'btn btn-primary btn-sm', 'label' => FALSE, 'div' => FALSE)); ?>                <?php echo $this->Html->link(__('Xóa dữ liệu'), array('action' => 'delete', $this->Form->value('Banner.id')), array('class' => 'btn btn-danger btn-sm'), __('Bạn có chắc chắn muốn xóa # %s?', $this->Form->value('Banner.id'))); ?>            </div>
            <?php echo $this->Form->end(); ?>
            </div>
</div>