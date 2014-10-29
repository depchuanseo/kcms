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
    <h2 class="panel-heading panel-title"><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h2>
    <div class="panel-body">
        <div class="toolbarMenu">
            <?php echo "<?php echo \$this->Html->link(__('Thêm mới'), array('action' => 'add'), array('class' => 'btn btn-danger btn-sm')); ?>"; ?>
            <?php
            $done = array();
            foreach ($associations as $type => $data) {
                foreach ($data as $alias => $details) {
                    if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
                        echo "\t\t<?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index'), array('class' => 'btn btn-info btn-sm')); ?> </li>\n";
                        echo "\t\t<?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('class' => 'btn btn-warning btn-sm')); ?> </li>\n";
                        $done[] = $details['controller'];
                    }
                }
            }
            ?>
        </div>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <?php foreach ($fields as $field): ?>
                        <th><?php echo $field; ?></th>
                    <?php endforeach; ?>
                    <th class="actions"></th>
                </tr>
            </thead>
            <?php
            echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
            echo "\t<tr>\n";
            foreach ($fields as $field) {
                $isKey = false;
                if (!empty($associations['belongsTo'])) {
                    foreach ($associations['belongsTo'] as $alias => $details) {
                        if ($field === $details['foreignKey']) {
                            $isKey = true;
                            echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
                            break;
                        }
                    }
                }
                if ($isKey !== true) {
                    echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                }
            }

            echo "\t\t<td class=\"actions\">\n";
            echo "\t\t\t<?php echo \$this->Html->link(__('Xem'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'btn btn-info btn-xs')); ?>\n";
            echo "\t\t\t<?php echo \$this->Html->link(__('Sửa'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'btn btn-success btn-xs')); ?>\n";
            echo "\t\t\t<?php echo \$this->Form->postLink(__('Xóa'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-danger btn-xs'), __('Bạn có chắc chắn muốn xóa %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
            echo "\t\t</td>\n";
            echo "\t</tr>\n";

            echo "<?php endforeach; ?>\n";
            ?>
        </table>
        <?php echo "<?php echo \$this->element('backend/pagination'); ?>"; ?>
    </div>
</div>
