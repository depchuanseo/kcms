<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Add Category'); ?></h2>
    <div class="panel-body">
        <?php echo $this->Form->create('Category', array('role'=>'form', 'inputDefaults'=>array('class' => 'form-control', 'div'=>'form-group'))); ?>
        <fieldset>
            <legend></legend>
            	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('slug');
		echo $this->Form->input('image');
		echo $this->Form->input('description');
		echo $this->Form->input('published');
		echo $this->Form->input('meta_title');
		echo $this->Form->input('meta_keywords');
		echo $this->Form->input('meta_description');
		echo $this->Form->input('template');
		echo $this->Form->input('terms');
	?>
        </fieldset>
                    <?php echo $this->Form->end(array('label' => 'Thêm mới', 'class' => 'btn btn-primary btn-sm', 'div' => 'form-group')); ?>
            </div>
</div>