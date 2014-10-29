<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Menus'); ?></h2>
    <div class="panel-body">
        <div class="toolbarMenu">
            <?php echo $this->Html->link(__('Thêm mới'), array('action' => 'add'), array('class' => 'btn btn-danger btn-sm')); ?>
        </div>
        <?php echo $this->Session->flash(); ?>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Slug</th>
                    <th class="actions"></th>
                </tr>
            </thead>
            <?php foreach ($menus as $menu): ?>
                <tr>
                    <td><?php echo h($menu['Menu']['id']); ?></td>
                    <td><?php echo h($menu['Menu']['title']); ?></td>
                    <td><?php echo h($menu['Menu']['slug']); ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Thêm Link'), array('controller' => 'links', 'action' => 'add', $menu['Menu']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                        <?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $menu['Menu']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                        <?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $menu['Menu']['id']), array('class' => 'btn btn-danger btn-xs'), __('Bạn có chắc chắn muốn xóa %s?', $menu['Menu']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php echo $this->element('backend/pagination'); ?>    </div>
</div>
