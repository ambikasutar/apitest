<?php

class StudentDetailsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','admin','GetSummary'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new StudentDetails;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StudentDetails']))
		{
			$model->attributes=$_POST['StudentDetails'];
			
			$m_math=$_POST['StudentDetails']['m_math'];
			$m_science=$_POST['StudentDetails']['m_science'];
			$m_english=$_POST['StudentDetails']['m_english'];
			
			$sum=$m_math+$m_science+$m_english;
			$per= round(($sum /300)*100,2);
			
			$model->total_marks=$sum;
			$model->percentage=$per;
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StudentDetails']))
		{
			$model->attributes=$_POST['StudentDetails'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionGetSummary(){
		$connection=Yii::app()->db;
		$sql="SELECT *, FIND_IN_SET( total_marks, ( SELECT GROUP_CONCAT( total_marks ORDER BY total_marks DESC ) FROM student_details ) ) AS rank1 FROM student_details";
		$result=$connection->createCommand($sql)->queryAll();
		//$dataReader=$command->query();
		echo '<pre>';
		//print_R($dataReader);
		print_R($result);
		echo '</pre>';
		

		$this->render('index',array(
			'dataProvider'=>$result,
		));
		
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		/*if(Yii::app()->user->userrole =='admin' || Yii::app()->user->userrole =='teacher'){     $this->redirect(array("index"));
		}elseif(Yii::app()->user->userType=='User'){
			  $this->redirect(array("home"));
		}*/
		$dataProvider=new CActiveDataProvider('StudentDetails');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StudentDetails('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentDetails']))
			$model->attributes=$_GET['StudentDetails'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return StudentDetails the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=StudentDetails::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param StudentDetails $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-details-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
