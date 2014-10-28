<div class="panel panel-success">
    <h2 class="panel-heading panel-title">Thêm cấu hình</h2>
    <div class="panel-body">
        <?php echo $this->Form->create('Configuration', array('inputDefaults' => array('div' => array('class' => 'form-group'), 'class' => 'form-control'))); ?>
        <?php
        echo $this->Form->input('title');
        echo $this->Form->input('key');
        echo $this->Form->input('type', array('options' => array('text' => 'Text', 'textarea' => 'Textarea', 'checkbox' => 'Checkbox', 'file' => 'File')));
        ?>
        <?php echo $this->Form->end(array('label' => 'Thêm mới', 'class' => 'btn btn-primary btn-sm', 'div' => 'form-group')); ?>
    </div>
</div>