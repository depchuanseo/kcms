<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Banners'); ?></h2>
    <div class="panel-body">
        <div class="toolbarMenu">
            <?php echo $this->Html->link(__('Thêm mới'), array('action' => 'add'), array('class' => 'btn btn-danger btn-sm')); ?></div>
        <?php echo $this->Session->flash(); ?>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>title</th>
                    <th>published</th>
                    <th class="actions"></th>
                </tr>
            </thead>
            <?php foreach ($banners as $banner): ?>
                <tr>
                    <td><?php echo h($banner['Banner']['title']); ?></td>
                    <td><?php echo h($banner['Banner']['published']); ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $banner['Banner']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                        <?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $banner['Banner']['id']), array('class' => 'btn btn-danger btn-xs'), __('Bạn có chắc chắn muốn xóa %s?', $banner['Banner']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php echo $this->element('backend/pagination'); ?>    </div>
</div>
