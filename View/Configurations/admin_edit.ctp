<?php $this->start('script'); ?>
<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<?php $this->end(); ?>
<?php
$type = $this->data['Configuration']['type'];
$arr = array('type' => 'text', 'label' => $this->data['Configuration']['title']);
if($type === 'textarea') {
    $arr = array('type' => 'textarea', 'class' => 'ckeditor', 'label' => $this->data['Configuration']['title']);
} elseif($type == 'file') {
    $arr = array('type' => 'file', 'label' => $this->data['Configuration']['title']);
}
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <h2 class="panel-title">Sửa thông tin cấu hình</h2>
    </div>
    <div class="panel-body">
        <?php echo $this->Form->create('Configuration', array('type' => $type, 'inputDefaults' => array('div' => array('class' => 'form-group'), 'class' => 'form-control'))); ?>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('value', $arr);
        ?>
        <?php echo $this->Form->end(array('label' => 'Cập nhật', 'class' => 'btn btn-primary btn-sm', 'div' => 'form-group')); ?>
    </div>
</div>