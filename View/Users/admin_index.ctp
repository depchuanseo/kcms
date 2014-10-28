<div class="panel panel-default">
    <h2 class="panel-heading panel-title">Danh sách thành viên</h2>
    <div class="panel-body">
        <div class="toolbarMenu">
            <?php echo $this->Html->link(__('Thêm mới'), array('action' => 'add'), array('class' => 'btn btn-danger btn-sm')); ?>
        </div>
        <?php echo $this->Session->flash(); ?>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>Tài khoản</th>
                    <th>Email</th>
                    <th>Hiển thị</th>
                    <th class="actions"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['published']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Đổi mật khẩu'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                            <?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                            <?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger btn-xs'), __('Bạn có chắc chắn muốn xóa tài khoản %s?', $user['User']['username'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $this->element('pagination'); ?>
    </div>
</div>
