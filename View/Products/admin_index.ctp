<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Products'); ?></h2>
    <div class="panel-body">
        <div class="toolbarMenu">
            <?php echo $this->Html->link(__('Thêm mới'), array('action' => 'add'), array('class' => 'btn btn-danger btn-sm')); ?>            		<?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index'), array('class' => 'btn btn-info btn-sm')); ?> </li>
		<?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add'), array('class' => 'btn btn-warning btn-sm')); ?> </li>
        </div>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                                            <th>id</th>
                                            <th>category_id</th>
                                            <th>title</th>
                                            <th>slug</th>
                                            <th>image</th>
                                            <th>price</th>
                                            <th>price_sales</th>
                                            <th>description</th>
                                            <th>published</th>
                                            <th>meta_title</th>
                                            <th>meta_keywords</th>
                                            <th>meta_description</th>
                                            <th>created</th>
                                            <th>modified</th>
                                        <th class="actions"></th>
                </tr>
            </thead>
            <?php foreach ($products as $product): ?>
	<tr>
		<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($product['Category']['title'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
		</td>
		<td><?php echo h($product['Product']['title']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['slug']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['image']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['price']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['price_sales']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['description']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['published']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['meta_title']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['meta_keywords']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['meta_description']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['created']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Xem'), array('action' => 'view', $product['Product']['id']), array('class'=>'btn btn-info btn-xs')); ?>
			<?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $product['Product']['id']), array('class'=>'btn btn-success btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-danger btn-xs'), __('Bạn có chắc chắn muốn xóa %s?', $product['Product']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php echo $this->element('backend/pagination'); ?>    </div>
</div>
