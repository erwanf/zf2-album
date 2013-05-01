<?php
namespace User\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;

class UserTable extends AbstractTableGateway
{
    // to set table name
    protected $table ='user';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new User());
        $this->initialize();
    }
    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }
    public function getAlbum($id)
    {
        $id = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
    public function saveUser(User $user)
    {
        $data = array(
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
        );
        $id = (int)$user->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getUser($id)) {
                $this->update($data, array('id' => $id));
        } else {
            throw new \Exception('Form id does not exist');
            }
        }
    }
    public function deleteUser($id)
    {
        $this->delete(array('id' => $id));
    }
}
