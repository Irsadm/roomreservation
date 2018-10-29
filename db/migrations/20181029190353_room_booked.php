<?php

use Phinx\Migration\AbstractMigration;

class RoomBooked extends AbstractMigration
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
            $bookedRoom= $this->table('booked_room');
            $bookedRoom->addColumn('booking_id', 'integer')
                            ->addColumn('room_type_id', 'integer')
                            ->addColumn('jumlah', 'integer')
                            ->addColumn('status', 'integer')
                            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                            ->addColumn('updated_at', 'datetime', ['null' => true])
                            ->addForeignKey('booking_id', 'booking','id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
                            ->addForeignKey('room_type_id', 'room_type','id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
                            ->create();
    }
}
