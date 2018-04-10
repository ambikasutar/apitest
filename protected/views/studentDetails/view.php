<?php
/* @var $this StudentDetailsController */
/* @var $model StudentDetails */

$this->breadcrumbs=array(
	'Student Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StudentDetails', 'url'=>array('index')),
	array('label'=>'Create StudentDetails', 'url'=>array('create')),
	array('label'=>'Update StudentDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StudentDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentDetails', 'url'=>array('admin')),
);
?>

<h1>View StudentDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sname',
		'age',
		'm_math',
		'm_science',
		'm_english',
		'total_marks',
		'percentage',
		//'rank',
	),
)); ?>
