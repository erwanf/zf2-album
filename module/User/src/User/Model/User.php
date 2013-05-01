<?php
namespace User\Model;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class User implements InputFilterAwareInterface
{
    public $id;
    public $name;
    public $email;
    public $password;

    protected $inputFilter;

        public function exchangeArray($data)
        {
            $this->id       = (isset($data['id'])) ? $data['id'] : null;
            $this->name     = (isset($data['name'])) ? $data['name'] : null;
            $this->email    = (isset($data['email'])) ? $data['email'] : null;
            $this->password  = (isset($data['password'])) ? $data['password'] : null;
        }

        public function getArrayCopy()
        {
            return get_object_vars($this);
        }

        public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();
            $inputFilter->add($factory->createInput(array(
                'name' => 'id',
                'required' => true,
                'filters' => array(
                     array('name' => 'Int'),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'name',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                     array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 100,

                        ),
                    ),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
            'name' => 'email',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                'name' => 'StringLength',
                    'options' => array(
                    'encoding' => 'UTF-8',
                    'min' => 1,
                    'max' => 100,
                    ),
                ),
            ),
            )));
             $inputFilter->add($factory->createInput(array(
            'name' => 'password',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                'name' => 'StringLength',
                    'options' => array(
                    'encoding' => 'UTF-8',
                    'min' => 1,
                    'max' => 32,
                    ),
                ),
            ),
            )));
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
        //------------------------

}