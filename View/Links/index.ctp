<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Links'); ?></h2>
    <div class="panel-body">
        <div class="toolbarMenu">
            <?php echo $this->Html->link(__('Thêm mới'), array('action' => 'add'), array('class' => 'btn btn-danger btn-sm')); ?>            		<?php echo $this->Html->link(__('List Menus'), array('controller' => 'menus', 'action' => 'index'), array('class' => 'btn btn-info btn-sm')); ?> </li>
		<?php echo $this->Html->link(__('New Menu'), array('controller' => 'menus', 'action' => 'add'), array('class' => 'btn btn-warning btn-sm')); ?> </li>
        </div>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                                            <th>id</th>
                                            <th>menu_id</th>
                                            <th>title</th>
                                            <th>slug</th>
                                            <th>link</th>
                                            <th>published</th>
                                            <th>created</th>
                                            <th>modified</th>
                                        <th class="actions"></th>
                </tr>
            </thead>
            <?php foreach ($links as $link): ?>
	<tr>
		<td><?php echo h($link['Link']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($link['Menu']['title'], array('controller' => 'menus', 'action' => 'view', $link['Menu']['id'])); ?>
		</td>
		<td><?php echo h($link['Link']['title']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['slug']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['link']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['published']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['created']); ?>&nbsp;</td>
		<td><?php echo h($link['Link']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Xem'), array('action' => 'view', $link['Link']['id']), array('class'=>'btn btn-info btn-xs')); ?>
			<?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $link['Link']['id']), array('class'=>'btn btn-success btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $link['Link']['id']), array('class' => 'btn btn-danger btn-xs'), __('Bạn có chắc chắn muốn xóa %s?', $link['Link']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php echo $this->element('backend/pagination'); ?>    </div>
</div>
