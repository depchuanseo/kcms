<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Categories'); ?></h2>
    <div class="panel-body">
        <div class="toolbarMenu">
            <?php echo $this->Html->link(__('Thêm mới'), array('action' => 'add', $terms), array('class' => 'btn btn-danger btn-sm')); ?>                    </div>
        <table class="table table-condensed table-striped">
            <?php
            $tableHeaders = $this->Html->tableHeaders(array(
                $this->Form->checkbox('checkAll'),
                'ID',
                'Tiêu đề',
                'Slug',
                'Trạng thái',
                'Hành động'
            ));
            ?>
            <thead>
                <?php echo $tableHeaders; ?>
            </thead>
            <?php
            //print_r($categoriesStatus);
            $rows = array();
            foreach ($categoriesTree as $categoryId => $categoryTitle):
                $actions = array();
                $actions[] = $this->Html->link('', array('action' => 'moveup', $categoryId), array('class' => 'glyphicon glyphicon-chevron-up'));
                $actions[] = $this->Html->link('', array('action' => 'movedown', $categoryId), array('class' => 'glyphicon glyphicon-chevron-down'));
                $actions[] = $this->Html->link('Sửa', array('action' => 'edit', $categoryId), array('class' => 'btn btn-info btn-xs'));
                $actions[] = $this->Html->link('Xóa', array('action' => 'delete', $categoryId), array('class' => 'btn btn-danger btn-xs'), 'Bạn có chắc chắn muốn xóa?');
                $actions = $this->Html->div('item-actions', implode(' ', $actions));
                $rows[] = array(
                    $this->Form->checkbox('Category.' . $categoryId . '.id', array('class' => 'row-select')),
                    $categoryId,
                    $categoryTitle,
                    $categoriesSlug[$categoryId],
                    $categoriesStatus[$categoryId],
                    $actions
                );
            endforeach;
            echo $this->Html->tableCells($rows);
            ?>
        </table>
    </div>
