<div class="methods view">
<h2><?php echo __('Method'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($method['Method']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Step Number'); ?></dt>
		<dd>
			<?php echo h($method['Method']['step_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Method'); ?></dt>
		<dd>
			<?php echo h($method['Method']['method']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recipe'); ?></dt>
		<dd>
			<?php echo $this->Html->link($method['Recipe']['name'], array('controller' => 'recipes', 'action' => 'view', $method['Recipe']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($method['Method']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($method['Method']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Method'), array('action' => 'edit', $method['Method']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Method'), array('action' => 'delete', $method['Method']['id']), null, __('Are you sure you want to delete # %s?', $method['Method']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Methods'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Method'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
