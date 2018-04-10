
 <?php
 
 class WebServicesController extends Controller
 {
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
				'actions'=>array('index','view','TestLogin'),
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

	public function actionIndex()
	{
$this->redirect(array('WebServices/TestLogin'));
	}
 
 /**
  * This action serves as a test SOAP client to verify our Web service
  * login method.
  */
 public function actionTestLogin()
 {
   //use the Yii application to build the proper request url format
   $wsdlUrl=Yii::app()->request->hostInfo.$this->createUrl('demo');
 
   //create the php soap client passing in a parameter to instruct
   //it not to cache the wsdl for testing purposes
   $client=new SoapClient($wsdlUrl, array('cache_wsdl' => 0));                             
 
   echo "<pre>";
   echo "login...\n";
   if($client->login('admin','admin')) echo "Successful Login!";
   else echo "Sorry, the username and/or password supplied is invalid.";
   echo "</pre>";
 }
 
 
 /**
  * @param string username
  * @param string password         
  * @return boolean whether login is valid    
  * @soap
  */
 public function login($username,$password)
 {
     $identity=new UserIdentity($username,$password);
     if($identity->authenticate())
         Yii::app()->user->login($identity);
     return $identity->isAuthenticated;  
 }
 } 