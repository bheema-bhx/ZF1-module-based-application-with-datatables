<?php
require_once 'Zend/Form.php';
class Default_Form_Login extends Twitter_Form
{

    public function init()
    {
       
		//$this->setAttrib('controller','Login');
		$this->setAttrib('action','login/auth');
		$this->setMethod('post');
		$this->setAttrib('id','Loginform');
 
        $this->addElement(
            'text', 'username', array(
                'label' => 'Username:',
                'required' => true,
                'filters'    => array('StringTrim'),
            ));
 
        $this->addElement('password', 'password', array(
            'label' => 'Password:',
            'required' => true,
            ));
 
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Login',
            ));
		
		
		
    }


}

