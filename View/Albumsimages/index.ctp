<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Albumsimages'); ?></h2>
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
            <?php foreach ($albumsimages as $albumsimage): ?>
	<tr>
		<td><?php echo h($albumsimage['Albumsimage']['id']); ?>&nbsp;</td>
		<td><?php echo h($albumsimage['Albumsimage']['model']); ?>&nbsp;</td>
		<td><?php echo h($albumsimage['Albumsimage']['foreign_key']); ?>&nbsp;</td>
		<td><?php echo h($albumsimage['Albumsimage']['name']); ?>&nbsp;</td>
		<td><?php echo h($albumsimage['Albumsimage']['attachment']); ?>&nbsp;</td>
		<td><?php echo h($albumsimage['Albumsimage']['dir']); ?>&nbsp;</td>
		<td><?php echo h($albumsimage['Albumsimage']['type']); ?>&nbsp;</td>
		<td><?php echo h($albumsimage['Albumsimage']['size']); ?>&nbsp;</td>
		<td><?php echo h($albumsimage['Albumsimage']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Xem'), array('action' => 'view', $albumsimage['Albumsimage']['id']), array('class'=>'btn btn-info btn-xs')); ?>
			<?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $albumsimage['Albumsimage']['id']), array('class'=>'btn btn-success btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $albumsimage['Albumsimage']['id']), array('class' => 'btn btn-danger btn-xs'), __('Bạn có chắc chắn muốn xóa %s?', $albumsimage['Albumsimage']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php echo $this->element('backend/pagination'); ?>    </div>
</div>
