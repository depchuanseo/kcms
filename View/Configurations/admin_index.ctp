<div class="panel panel-default">
    <h2 class="panel-heading panel-title">Danh sách thành viên</h2>
    <div class="panel-body">
        <div class="toolbarMenu">
            <?php echo $this->Html->link(__('Thêm mới'), array('action' => 'add'), array('class' => 'btn btn-danger btn-sm')); ?>
        </div>
        <?php echo $this->Session->flash(); ?>
        <table class="table table-condensed table-striped">
            <tr>
                <th>Tiêu đề</th>
                <th>KEY</th>
                <th class="actions"></th>
            </tr>
            <?php foreach ($configurations as $configuration): ?>
                <tr>
                    <td><?php echo h($configuration['Configuration']['title']); ?></td>
                    <td><?php echo h($configuration['Configuration']['key']); ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $configuration['Configuration']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                        <?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $configuration['Configuration']['id']), array('class' => 'btn btn-danger btn-xs'), __('Nếu bạn xóa sẽ có thể gây lỗi website. Bạn có thực sự muốn xóa %s?', $configuration['Configuration']['key'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php echo $this->element('backend/pagination'); ?>
    </div>
</div>