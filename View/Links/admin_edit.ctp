<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Edit Link'); ?></h2>
    <div class="panel-body">
        <?php echo $this->Form->create('Link', array('role' => 'form', 'inputDefaults' => array('class' => 'form-control', 'div' => 'form-group'))); ?>
        <fieldset>
            <legend></legend>
            <?php
            echo $this->Form->input('id');
            echo $this->Form->input('menu_id', array('label' => 'Vị trí Menu ', 'selected' => $menuId));
            echo $this->Form->input('parent_id', array('label' => 'Menu cha ', 'options' => $parentLinks, 'empty' => TRUE));
            echo $this->Form->input('title', array('label' => 'Tiêu đề'));
            echo $this->Form->input('slug', array('label' => 'Slug thân thiện'));
            echo $this->Form->input('link', array('label' => 'Liên kết'));
            echo $this->Form->input('published', array('label' => '&nbsp;Hiển thị', 'class' => NULL));
            ?>
        </fieldset>
        <div class="btn-group btn-sm">
            <?php echo $this->Form->submit(__('Cập nhật'), array('class' => 'btn btn-primary btn-sm', 'label' => FALSE, 'div' => FALSE)); ?>                <?php echo $this->Html->link(__('Xóa dữ liệu'), array('action' => 'delete', $this->Form->value('Link.id')), array('class' => 'btn btn-danger btn-sm'), __('Bạn có chắc chắn muốn xóa # %s?', $this->Form->value('Link.id'))); ?>            </div>
            <?php echo $this->Form->end(); ?>
    </div>
</div>