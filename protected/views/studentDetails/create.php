<?php
/* @var $this StudentDetailsController */
/* @var $model StudentDetails */

$this->breadcrumbs=array(
	'Student Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StudentDetails', 'url'=>array('index')),
	array('label'=>'Manage StudentDetails', 'url'=>array('admin')),
);
?>

<h1>Create StudentDetails</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>