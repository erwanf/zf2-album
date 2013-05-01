<?php
namespace User\Form;
use Zend\Form\Form;
class UserForm extends Form
{
    public function __construct()
    {
    parent::__construct();
    $this->setName('user');
    $this->setAttribute('method', 'post');
    $this->add(array(
        'name' => 'id',
        'attributes' => array(
            'type' => 'hidden',
        ),
    ));
    $this->add(array(
        'name' => 'name',
        'attributes' => array(
             'type' => 'text',
        ),
        'options' => array(
            'label' => 'Name :',
        ),
    ));
    $this->add(array(
        'name' => 'email',
        'attributes' => array(
            'type' => 'text',
        ),
        'options' => array(
            'label' => 'Email :',
        ),
    ));
     $this->add(array(
        'name' => 'password',
        'attributes' => array(
            'type' => 'password',
        ),
        'options' => array(
            'label' => 'Password :',
        ),
    ));
    $this->add(array(
        'name' => 'submit',
        'attributes' => array(
            'type' => 'submit',
            'value' => 'Go',
             'id' => 'submitbutton',
        ),
     ));
    }
}