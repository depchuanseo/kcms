<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Đăng nhập quản trị website</h3>
                </div>
                <div class="panel-body">
                    <?php echo $this->Session->flash('auth'); ?>
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->Form->create('User', array('role' => 'form', 'inputDefaults' => array('div' => 'form-group', 'class' => 'form-control'))); ?>
                    <fieldset>
                        <?php
                        echo $this->Form->input('username', array('label' => 'Tên đăng nhập'));
                        echo $this->Form->input('password', array('label' => 'Mật khẩu'));
                        ?>
                        <?php echo $this->Form->end(array('label' => 'Đăng nhập', 'class' => 'btn btn-lg btn-success btn-block')); ?>
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>