<?php
/* @var $this StudentDetailsController */
/* @var $data StudentDetails */
?>
<?php 
$connection=Yii::app()->db;
		$sql="SELECT count(*) as cnt, if ((m_math >=40 and m_science >=40 and m_english >=40),'Pass', 'Fail') as status FROM student_details group by status";
		$result=$connection->createCommand($sql)->queryAll();
		//$dataReader=$command->query();
		//echo '<pre>';
		//print_R($dataReader);
		//print_R($result);
		//echo '</pre>';
$fail = $result[0]['cnt'];
$pass = $result[1]['cnt'];	

?>

<div class="view">

	<b>Total Failed :</b>
	<?php echo $fail;?><br>

	<b>Total Pass:</b>
	<?php echo $pass;?><br>
	 

</div>
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sname')); ?>:</b>
	<?php echo CHtml::encode($data->sname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
	<?php echo CHtml::encode($data->age); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('m_math')); ?>:</b>
	<?php echo CHtml::encode($data->m_math); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('m_science')); ?>:</b>
	<?php echo CHtml::encode($data->m_science); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('m_english')); ?>:</b>
	<?php echo CHtml::encode($data->m_english); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_marks')); ?>:</b>
	<?php echo CHtml::encode($data->total_marks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('percentage')); ?>:</b>
	<?php echo CHtml::encode($data->percentage); ?>
	<br />


	 

</div>