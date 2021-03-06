<?php
require_once 'Zend/Controller/Action.php';
require_once 'Zend/Auth.php';
require_once 'Zend/Auth/Adapter/DbTable.php';
require_once 'Zend/Session/Abstract.php';
$session = new Zend_Session_Namespace('session');
class Admin_LoginController extends Zend_Controller_Action
{
    public function indexAction()
    {
       		
		$form = new Default_Form_Login();
		$this->view->form = $form;
    }
	
	   
	  public function authAction(){
	  
		  if ($this->getRequest()->isPost())
			{
			  $form = new Default_Form_Login();
				$this->view->form = $form;
				$formData  = $this->_request->getPost();
				
				if(!strlen($formData['username']) || !strlen($formData['password'])) {
					$this->_redirect('/login'); 
            		return false;
        		}
			  
				$request    = $this->getRequest();
				$registry   = Zend_Registry::getInstance();
				$auth       = Zend_Auth::getInstance();
				 
				$DB = $registry['DB'];
					 
				$authAdapter = new Zend_Auth_Adapter_DbTable($DB);
				$authAdapter->setTableName('users')
							->setIdentityColumn('username')
							->setCredentialColumn('password');   
				 
				// Set the input credential values
				$uname = $request->getParam('username');
				$paswd = $request->getParam('password');
				$authAdapter->setIdentity($uname);
				$authAdapter->setCredential($paswd);
			 
				// Perform the authentication query, saving the result
				$result = $auth->authenticate($authAdapter);
				$data = $authAdapter->getResultRowObject(null,'password');

				$session = new Zend_Session_Namespace('session');
				$session->username = $this->getRequest ()->getParam ( 'username');
				  
				if($result->isValid()){
				  $auth->getStorage()->write($data);
				  $this->_helper->redirector('welcome', 'Login');
				}
				else{
				  $this->_redirect('/login');
				}
				 
			}		 
		
	  }
	  
	  
	  public function delAction()
	  {
	     $registry = Zend_Registry::getInstance(); 
	     $DB = $registry['db'];
		 $object = new Admin_Model_Login();
	     $request = $this->getRequest();
	     $object->delete('users',$request->getParam('id'));   
	     $this->_helper->redirector('welcome', 'Login');
	  }
	  
	  
	  public function editAction()
	  {
	  	$users = new Admin_Model_Login();
	   	$request = $this->getRequest();
		$id = $request->getParam('id');
		$session = new Zend_Session_Namespace('session');
		$session->id = $id;
		$result_set = $users->find('users',$id);
		$session->result_set = $result_set;
		$this->_helper->redirector('update', 'Login');
		
	  }  
	  
	  
	  public function welcomeAction()
	  {
			//$request = $this->getRequest();
			//$result1 = $request->getParam('result');
			//$this->view->result = $result1;
			
			$session = new Zend_Session_Namespace('session');
			$session->username = $this->getRequest ()->getParam ( 'username');
			$this->view->result = $session->result;
			
			$request = $this->getRequest();
			$res = $request->getParam('result');
			
			$this->view->result = $res;
			
			
	  }
	  
	  public function updateAction()
	  {
	  		$session = new Zend_Session_Namespace('session');
		 	$form = new Default_Form_Update();
			$this->view->form = $form;
			$this->view->result_set = $session->result_set;
	  }
	
	 public function logoutAction()
    {
      //clear the Zend_Auth identity
      $auth = Zend_Auth::getInstance();
      $auth->clearIdentity();

      //clear the session
      Zend_Session::destroy();

      //redirect to the home page
      $this->_helper->redirector('index', 'index','default');
    }
	 
	  
	  public function insertAction()
	  { 
		if ($this->getRequest()->isPost())
		{
			$database_object = new Admin_Model_Register();
			$formData  = $this->_request->getPost();
			$form = new Default_Form_Register();
			$this->view->form = $form;
			
            if ($form->isValid($formData)) {
				
				if(!strlen($formData['username']) || !strlen($formData['password']) ) {
					$this->_redirect('/index/'); 
            		return false;
        		}
			
                if ($formData['password'] != $formData['password2']) {
				  $this->_redirect('/index/'); 
				    return false;
                }
				else{
					unset($formData['password2']);
					unset($formData['register']);
					$database_object->insert($formData);
					$this->_helper->redirector('index', 'Login');
            	}
	
			}
		 }
	  }
	  
	  
	 
	  public function saveAction()
	{
		$session = new Zend_Session_Namespace('session');
		if ($this->getRequest()->isPost())
		{
			$form = new Default_Form_Update();
			$database_object = new Admin_Model_Login();
			$formData  = $this->_request->getPost();
			
            if ($form->isValid($formData)) {
				
			
				if(!strlen($formData['username']) || !strlen($formData['firstname']) ) {
				
					$this->_redirect('/Login/Update'); 
            		return false;
        		}
				else{
					
					unset($formData['update']);
					
					$database_object->update($session->id,$formData,'users');
					$this->_helper->redirector('welcome', 'Login');
            	}
			
	
			}
		
		}
	}
	  


}

