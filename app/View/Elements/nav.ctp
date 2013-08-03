<div class="navbar navbar-fixed-top">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><?php echo Configure::read('App.name'); ?></a>
        <div class="nav-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <?php echo $this->Html->link('Home', array('controller' => 'recipes', 'action' => 'index')); ?>
                </li>
                <li>
                    <?php echo $this->Html->link('Add', array('controller' => 'recipes', 'action' => 'add')); ?>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li>
                    <?php echo $this->Html->link('Index', array('controller' => 'pages', 'action' => 'home')); ?>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>