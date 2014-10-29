<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Edit Menu'); ?></h2>
    <div class="panel-body">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Form->create('Menu', array('role' => 'form', 'inputDefaults' => array('class' => 'form-control', 'div' => 'form-group'))); ?>
        <fieldset>
            <?php
            echo $this->Form->input('id');
            echo $this->Form->input('title');
            echo $this->Form->input('slug');
            ?>
        </fieldset>
        <div class="btn-group btn-sm">
            <?php echo $this->Form->submit(__('Cập nhật'), array('class' => 'btn btn-primary btn-sm', 'label' => FALSE, 'div' => FALSE)); ?>                <?php echo $this->Html->link(__('Xóa dữ liệu'), array('action' => 'delete', $this->Form->value('Menu.id')), array('class' => 'btn btn-danger btn-sm'), __('Bạn có chắc chắn muốn xóa # %s?', $this->Form->value('Menu.id'))); ?>            </div>
            <?php echo $this->Form->end(); ?>
    </div>
</div>