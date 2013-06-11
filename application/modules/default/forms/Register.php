<?php
require_once 'Zend/Form.php';
class Default_Form_Register extends Twitter_Form
{

    public function init()
    {
          $firstname = new Zend_Form_Element_Text('firstname');
        $firstname->setLabel('First Name:');
        
	$lastname = $this->createElement('text','lastname');
        $lastname->setLabel('Last Name:')
                ->setAttrib('size',25);
        $username = $this->createElement('text','username');
        $username->setLabel('Username:')
                ->setAttrib('size',25);
		$password = $this->createElement('password','password');
        $password->setLabel('Password:')
                    ->setAttrib('size',25);

        $password2 = $this->createElement('password','password2');
        $password2->setLabel('Confirm Password:')
                    ->setAttrib('size',25);
        $email = $this->createElement('text','email');
        $email->setLabel('Email:')
                ->setAttrib('size',25);
       
        $register = $this->createElement('submit','register');
        $register->setLabel("Register")
                ->setIgnore(true);


		$this->setMethod('post');
		$this->setAttrib('id','Regform');
		$this->setAttrib('action','index/save');
		 
        $this->addElements(array(	
            $firstname,
            $lastname,
            $username,
	    $password,
            $password2,
	    $email,
            $register
        ));
		
		
    }
	



}

