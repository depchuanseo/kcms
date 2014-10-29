<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></h2>
    <div class="panel-body">
        <?php echo "<?php echo \$this->Form->create('{$modelClass}', array('role'=>'form', 'inputDefaults'=>array('class' => 'form-control', 'div'=>'form-group'))); ?>\n"; ?>
        <fieldset>
            <legend></legend>
            <?php
            echo "\t<?php\n";
            foreach ($fields as $field) {
                if (strpos($action, 'add') !== false && $field === $primaryKey) {
                    continue;
                } elseif (!in_array($field, array('created', 'modified', 'updated'))) {
                    echo "\t\techo \$this->Form->input('{$field}');\n";
                }
            }
            if (!empty($associations['hasAndBelongsToMany'])) {
                foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                    echo "\t\techo \$this->Form->input('{$assocName}');\n";
                }
            }
            echo "\t?>\n";
            ?>
        </fieldset>
        <?php if (strpos($action, 'add') === false): ?>
            <div class="btn-group btn-sm">
                <?php echo "<?php echo \$this->Form->submit(__('Cập nhật'), array('class' => 'btn btn-primary btn-sm', 'label' => FALSE, 'div' => FALSE)); ?>"; ?>
                <?php echo "<?php echo \$this->Html->link(__('Xóa dữ liệu'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), array('class' => 'btn btn-danger btn-sm'), __('Bạn có chắc chắn muốn xóa # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>"; ?>
            </div>
            <?php echo "<?php echo \$this->Form->end(); ?>\n"; ?>
        <?php else: ?>
            <?php echo "<?php echo \$this->Form->end(array('label' => 'Thêm mới', 'class' => 'btn btn-primary btn-sm', 'div' => 'form-group')); ?>\n"; ?>
        <?php endif; ?>
    </div>
</div>