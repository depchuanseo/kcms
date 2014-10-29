<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Links'); ?></h2>
    <div class="panel-body">
        <div class="toolbarMenu">
            <?php echo $this->Html->link(__('Thêm mới'), array('action' => 'add', $menu['Menu']['id']), array('class' => 'btn btn-danger btn-sm')); ?>
        </div>
        <?php echo $this->Session->flash(); ?>
        <table class="table table-condensed table-striped">
            <?php
            $tableHeaders = $this->Html->tableHeaders(array(
                $this->Form->checkbox('checkAll'),
                'ID',
                'Tiêu đề',
                'Trạng thái',
                'Hành động'
            ));
            ?>
            <thead>
                <?php echo $tableHeaders; ?>
            </thead>
            <?php
            $rows = array();
            foreach ($linksTree as $linkId => $linkTitle):
                $actions = array();
                $actions[] = $this->Html->link('', array('action' => 'moveup', $linkId), array('class' => 'glyphicon glyphicon-chevron-up'));
                $actions[] = $this->Html->link('', array('action' => 'movedown', $linkId), array('class' => 'glyphicon glyphicon-chevron-down'));
                $actions[] = $this->Html->link('Sửa', array('action' => 'edit', $linkId), array('class' => 'btn btn-info btn-xs'));
                $actions[] = $this->Html->link('Xóa', array('action' => 'delete', $linkId), array('class' => 'btn btn-danger btn-xs'), 'Bạn có chắc chắn muốn xóa?');
                $actions = $this->Html->div('item-actions', implode(' ', $actions));
                $rows[] = array(
                    $this->Form->checkbox('Link.' . $linkId . '.id', array('class' => 'row-select')),
                    $linkId,
                    $linkTitle,
                    $linksStatus[$linkId],
                    $actions
                );
            endforeach;
            echo $this->Html->tableCells($rows);
            ?>
        </table>
    </div>
