<?php

use Phinx\Migration\AbstractMigration;

class CreateTableAdmin extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $admin = $this->table('admin');
        
        $admin->addColumn('login', 'string', array('limit' => 30))
              ->addColumn('password', 'string', array('limit' => 60))
              ->addColumn('token', 'string', array('limit' => 60, 'null' => true))
              ->addIndex(array('login', 'token'), array('unique' => true))
              ->create();
    }
}
