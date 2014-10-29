<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Productsimages'); ?></h2>
    <div class="panel-body">
        <div class="toolbarMenu">
            <?php echo $this->Html->link(__('Thêm mới'), array('action' => 'add'), array('class' => 'btn btn-danger btn-sm')); ?>                    </div>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                                            <th>id</th>
                                            <th>model</th>
                                            <th>foreign_key</th>
                                            <th>name</th>
                                            <th>attachment</th>
                                            <th>dir</th>
                                            <th>type</th>
                                            <th>size</th>
                                            <th>active</th>
                                        <th class="actions"></th>
                </tr>
            </thead>
            <?php foreach ($productsimages as $productsimage): ?>
	<tr>
		<td><?php echo h($productsimage['Productsimage']['id']); ?>&nbsp;</td>
		<td><?php echo h($productsimage['Productsimage']['model']); ?>&nbsp;</td>
		<td><?php echo h($productsimage['Productsimage']['foreign_key']); ?>&nbsp;</td>
		<td><?php echo h($productsimage['Productsimage']['name']); ?>&nbsp;</td>
		<td><?php echo h($productsimage['Productsimage']['attachment']); ?>&nbsp;</td>
		<td><?php echo h($productsimage['Productsimage']['dir']); ?>&nbsp;</td>
		<td><?php echo h($productsimage['Productsimage']['type']); ?>&nbsp;</td>
		<td><?php echo h($productsimage['Productsimage']['size']); ?>&nbsp;</td>
		<td><?php echo h($productsimage['Productsimage']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Xem'), array('action' => 'view', $productsimage['Productsimage']['id']), array('class'=>'btn btn-info btn-xs')); ?>
			<?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $productsimage['Productsimage']['id']), array('class'=>'btn btn-success btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $productsimage['Productsimage']['id']), array('class' => 'btn btn-danger btn-xs'), __('Bạn có chắc chắn muốn xóa %s?', $productsimage['Productsimage']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php echo $this->element('backend/pagination'); ?>    </div>
</div>
