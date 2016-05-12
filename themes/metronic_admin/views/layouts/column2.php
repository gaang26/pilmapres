<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
	<div class="span8">
		<?php echo $content; ?>
	</div>
	<div class="span4 well">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'<h4>OPERATIONS</h4>',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
	</div>
</div>
<?php $this->endContent(); ?>