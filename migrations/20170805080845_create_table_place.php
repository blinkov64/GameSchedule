<?php

use Phinx\Migration\AbstractMigration;

class CreateTablePlace extends AbstractMigration
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
        $place = $this->table('place');
        
        $place->addColumn('name', 'string', array('limit' => 255))
              ->addColumn('address', 'string', array('limit' => 255))
              ->addColumn('active', 'integer', array('limit' => Phinx\Db\Adapter\MysqlAdapter::INT_TINY, 'signed' => false))
              ->addIndex(array('name', 'address'), array('unique' => true))
              ->create();
    }
}
