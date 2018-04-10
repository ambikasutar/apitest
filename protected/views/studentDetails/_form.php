<?php
/* @var $this StudentDetailsController */
/* @var $model StudentDetails */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-details-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sname'); ?>
		<?php echo $form->textField($model,'sname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'sname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'m_math'); ?>
		<?php echo $form->textField($model,'m_math'); ?>
		<?php echo $form->error($model,'m_math'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'m_science'); ?>
		<?php echo $form->textField($model,'m_science'); ?>
		<?php echo $form->error($model,'m_science'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'m_english'); ?>
		<?php echo $form->textField($model,'m_english'); ?>
		<?php echo $form->error($model,'m_english'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->