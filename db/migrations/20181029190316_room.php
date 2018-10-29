<?php

use Phinx\Migration\AbstractMigration;

class Room extends AbstractMigration
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
            $room = $this->table('room');
            $room->addColumn('name', 'string')
                            ->addColumn('room_type_id', 'integer')
                            ->addColumn('status', 'integer')
                            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                            ->addColumn('updated_at', 'datetime', ['null' => true])
                            ->addForeignKey('room_type_id', 'room_type','id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
                            ->create();

    }
}
