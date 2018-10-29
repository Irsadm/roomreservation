<?php

use Phinx\Migration\AbstractMigration;

class Booking extends AbstractMigration
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
        $booking = $this->table('booking');
        $booking->addColumn('code_booking', 'string')
                           ->addColumn('nama', 'string')
                            ->addColumn('alamat', 'string')
                            ->addColumn('telepon', 'string')
                            ->addColumn('email', 'string')
                            ->addColumn('check_in_date', 'date')
                            ->addColumn('check_out_date', 'date')
                            ->addColumn('total', 'integer')
                            ->addColumn('status', 'integer', ['limit' => 1, 'default' => 0])
                            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                            ->addColumn('updated_at', 'datetime', ['null' => true])
                            ->create();
    }
}
