<?php
/* @var $this StudentDetailsController */
/* @var $model StudentDetails */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sname'); ?>
		<?php echo $form->textField($model,'sname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m_math'); ?>
		<?php echo $form->textField($model,'m_math'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m_science'); ?>
		<?php echo $form->textField($model,'m_science'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m_english'); ?>
		<?php echo $form->textField($model,'m_english'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_marks'); ?>
		<?php echo $form->textField($model,'total_marks'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'percentage'); ?>
		<?php echo $form->textField($model,'percentage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rank'); ?>
		<?php echo $form->textField($model,'rank'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->