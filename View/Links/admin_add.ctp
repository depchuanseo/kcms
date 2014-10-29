<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Add Link'); ?></h2>
    <div class="panel-body">
        <?php echo $this->Form->create('Link', array('role'=>'form', 'inputDefaults'=>array('class' => 'form-control', 'div'=>'form-group'))); ?>
        <fieldset>
            <legend></legend>
            	<?php
		echo $this->Form->input('menu_id');
		echo $this->Form->input('title');
		echo $this->Form->input('slug');
		echo $this->Form->input('link');
		echo $this->Form->input('published', array('class' => false, 'label'=> '&nbsp;Hiển thị', 'checked' => 'checked'));
	?>
        </fieldset>
                    <?php echo $this->Form->end(array('label' => 'Thêm mới', 'class' => 'btn btn-primary btn-sm', 'div' => 'form-group')); ?>
            </div>
</div>