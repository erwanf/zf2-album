<?php
namespace User\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use User\Model\User;
use User\Form\UserForm;

class UserController extends AbstractActionController
{
    protected $userTable;

    public function indexAction()
    {
        return new ViewModel(array(
        'users' => $this->getUserTable()->fetchAll(),
        ));       
    }
    public function getUserTable()
    {
        if (!$this->userTable) {
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('User\Model\UserTable');
        }
    return $this->userTable;
    }
    public function addAction()
    {
        $form = new UserForm;
        $form->get('submit')->setAttribute('value', 'Add User');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $user = new User();
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $user->exchangeArray($form->getData());
                $this->getUserTable()->saveUser($user);                
                // Redirect to list of users
                return $this->redirect()->toRoute('user',array('action'=>'index'));
            }
        }
        return array('form' => $form);
    }
    public function editAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('user', array('action'=>'add'));
        }
        $user = $this->getUserTable()->getUser($id);
        $form = new User();
        $form->bind($user); // to atach the model to the form
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getUserTable()->saveUser($user);
                // Redirect to list of users
                return $this->redirect()->toRoute('user');
            }
        }
        return array(
            'id' => $id,
            'form' => $form,
        );
    }
    public function deleteAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('user');
        }
        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost()->get('del', 'No');
            if ($del == 'Yes') {
                $id = (int)$request->getPost()->get('id');
                $this->getUserTable()->deleteUser($id);
            }
            // Redirect to list of users
            return $this->redirect()->toRoute('user');
        }
        return array(
            'id' => $id,
            'user' => $this->getUserTable()->getUser($id)
        );
    }
}
?>