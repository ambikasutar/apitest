<?php
/* @var $this StudentDetailsController */
/* @var $model StudentDetails */

$this->breadcrumbs=array(
	'Student Details'=>array('index'),
	'Manage',
);
$user_id = Yii::app()->user->id;
if(Yii::app()->user->user_role =='admin' || Yii::app()->user->user_role =='teacher'){

$this->menu=array(
	array('label'=>'List StudentDetails', 'url'=>array('index')),
	array('label'=>'Create StudentDetails', 'url'=>array('create')),
);
}else{
	$this->menu=array(
	array('label'=>'List StudentDetails', 'url'=>array('index')),
	//array('label'=>'Create StudentDetails', 'url'=>array('create')),
);
}
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#student-details-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Student Details</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 

if(Yii::app()->user->user_role =='admin' || Yii::app()->user->user_role =='teacher'){

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-details-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'sname',
		'age',
		'm_math',
		'm_science',
		'm_english',
		
		'total_marks',
		'percentage',
		/*'rank',
		*/
		array(
			'class'=>'CButtonColumn',
			  
		),
	),
)); 

}else{
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-details-grid',
	'dataProvider'=>$model->search($user_id),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'sname',
		'age',
		'm_math',
		'm_science',
		'm_english',
		/*
		'total_marks',
		'percentage',
		'rank',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
				  
		),
	),
)); 

}


 ?>
