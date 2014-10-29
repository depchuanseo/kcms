<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Add Link'); ?></h2>
    <div class="panel-body">
        <?php echo $this->Form->create('Link', array('role' => 'form', 'inputDefaults' => array('class' => 'form-control', 'div' => 'form-group'))); ?>
        <?php echo $this->Session->flash(); ?>
        <fieldset>
            <?php
            echo $this->Form->input('menu_id', array('label' => 'Vị trí Menu ', 'selected' => $menuId));
            echo $this->Form->input('parent_id', array('label' => 'Menu cha ', 'options' => $parentLinks, 'empty' => TRUE));
            echo $this->Form->input('title', array('label' => 'Tiêu đề'));
            echo $this->Form->input('slug', array('label' => 'Slug thân thiện'));
            echo $this->Form->input('link', array('label' => 'Liên kết'));
            echo $this->Form->input('published', array('class' => false, 'label' => '&nbsp;Hiển thị', 'checked' => 'checked'));
            ?>
        </fieldset>
        <?php echo $this->Form->end(array('label' => 'Thêm mới', 'class' => 'btn btn-primary btn-sm', 'div' => 'form-group')); ?>
    </div>
</div>