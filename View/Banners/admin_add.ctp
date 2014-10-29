<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Add Banner'); ?></h2>
    <div class="panel-body">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Form->create('Banner', array('type' => 'file', 'role' => 'form', 'inputDefaults' => array('class' => 'form-control', 'div' => 'form-group'))); ?>
        <fieldset>
            <?php
            echo $this->Form->input('terms', array('type' => 'hidden', 'value' => $terms));
            echo $this->Form->input('title');
            echo $this->Form->input('slug');
            echo $this->Form->input('image', array('type' => 'file'));
            echo $this->Form->input('description');
            echo $this->Form->input('published', array('class' => false, 'label' => '&nbsp;Hiển thị', 'checked' => 'checked'));
            echo $this->Form->input('params');
            ?>
        </fieldset>
        <?php echo $this->Form->end(array('label' => 'Thêm mới', 'class' => 'btn btn-primary btn-sm', 'div' => 'form-group')); ?>
    </div>
</div>