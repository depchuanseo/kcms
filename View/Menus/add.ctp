<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Add Menu'); ?></h2>
    <div class="panel-body">
        <?php echo $this->Form->create('Menu', array('role'=>'form', 'inputDefaults'=>array('class' => 'form-control', 'div'=>'form-group'))); ?>
        <fieldset>
            <legend></legend>
            	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('slug');
	?>
        </fieldset>
                    <?php echo $this->Form->end(array('label' => 'Thêm mới', 'class' => 'btn btn-primary btn-sm', 'div' => 'form-group')); ?>
            </div>
</div>