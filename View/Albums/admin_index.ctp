<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Albums'); ?></h2>
    <div class="panel-body">
        <div class="toolbarMenu">
            <?php echo $this->Html->link(__('Thêm mới'), array('action' => 'add'), array('class' => 'btn btn-danger btn-sm')); ?>
        </div>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>title</th>
                    <th>slug</th>
                    <th>image</th>
                    <th>published</th>
                    <th class="actions"></th>
                </tr>
            </thead>
            <?php foreach ($albums as $album): ?>
                <tr>
                    <td><?php echo h($album['Album']['title']); ?>&nbsp;</td>
                    <td><?php echo h($album['Album']['slug']); ?>&nbsp;</td>
                    <td><?php echo h($album['Album']['image']); ?>&nbsp;</td>
                    <td><?php echo h($album['Album']['published']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $album['Album']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                        <?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $album['Album']['id']), array('class' => 'btn btn-danger btn-xs'), __('Bạn có chắc chắn muốn xóa %s?', $album['Album']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php echo $this->element('backend/pagination'); ?>    </div>
</div>
