<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Posts'); ?></h2>
    <div class="panel-body">
        <div class="toolbarMenu">
            <?php echo $this->Html->link(__('Thêm mới'), array('action' => 'add', $terms), array('class' => 'btn btn-danger btn-sm')); ?>
        </div>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>title</th>
                    <th>published</th>
                    <th class="actions"></th>
                </tr>
            </thead>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
                    <td><?php echo h($post['Post']['published']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Xem'), array('action' => 'view', $post['Post']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                        <?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $post['Post']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                        <?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $post['Post']['id']), array('class' => 'btn btn-danger btn-xs'), __('Bạn có chắc chắn muốn xóa %s?', $post['Post']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php echo $this->element('backend/pagination'); ?>    </div>
</div>
