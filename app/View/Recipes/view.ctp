<div class="recipes view">
<h2><?php echo __('Recipe'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['tag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['photo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Summary'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['summary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prep Time'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['prep_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cook Time'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['cook_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Yield'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['yield']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['author']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recipe'), array('action' => 'edit', $recipe['Recipe']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Recipe'), array('action' => 'delete', $recipe['Recipe']['id']), null, __('Are you sure you want to delete # %s?', $recipe['Recipe']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Methods'), array('controller' => 'methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Method'), array('controller' => 'methods', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ingredients'); ?></h3>
	<?php if (!empty($recipe['Ingredient'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Recipe Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($recipe['Ingredient'] as $ingredient): ?>
		<tr>
			<td><?php echo $ingredient['id']; ?></td>
			<td><?php echo $ingredient['name']; ?></td>
			<td><?php echo $ingredient['amount']; ?></td>
			<td><?php echo $ingredient['recipe_id']; ?></td>
			<td><?php echo $ingredient['created']; ?></td>
			<td><?php echo $ingredient['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ingredients', 'action' => 'view', $ingredient['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ingredients', 'action' => 'edit', $ingredient['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ingredients', 'action' => 'delete', $ingredient['id']), null, __('Are you sure you want to delete # %s?', $ingredient['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Methods'); ?></h3>
	<?php if (!empty($recipe['Method'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Step Number'); ?></th>
		<th><?php echo __('Method'); ?></th>
		<th><?php echo __('Recipe Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($recipe['Method'] as $method): ?>
		<tr>
			<td><?php echo $method['id']; ?></td>
			<td><?php echo $method['step_number']; ?></td>
			<td><?php echo $method['method']; ?></td>
			<td><?php echo $method['recipe_id']; ?></td>
			<td><?php echo $method['created']; ?></td>
			<td><?php echo $method['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'methods', 'action' => 'view', $method['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'methods', 'action' => 'edit', $method['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'methods', 'action' => 'delete', $method['id']), null, __('Are you sure you want to delete # %s?', $method['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Method'), array('controller' => 'methods', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
