<p class="text-center">
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('Đang xem trang {:page} trên tổng {:pages} trang, Hiện thị {:current} bản ghi trên tổng số {:count} bản ghi, bắt đầu từ bản ghi số {:start} đến {:end}')
    ));
    ?>	</p>
<ul class="pagination pagination-sm">
    <?php echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => FALSE, 'class' => 'arrow'), '&laquo;', array('tag' => 'li', 'disabledTag' => 'a', 'escape' => FALSE, 'class' => 'disabled')); ?>
    <?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a')); ?>
    <?php echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => FALSE, 'class' => 'arrow'), '&raquo;', array('tag' => 'li', 'disabledTag' => 'a', 'escape' => FALSE, 'class' => 'disabled')); ?>
</ul>