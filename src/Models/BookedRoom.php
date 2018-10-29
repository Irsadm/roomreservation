<?php

namespace App\Models;

class BookedRoom extends AbstractModel
{
    protected $table = 'booked_room';

    public function create($data)
    {
        $data = [
            'booking_id'  => $data['booking_id'],
            'room_type_id'  => $data['room_type_id'],
            'jumlah'  => $data['jumlah'],
            'status'  => 0,
        ];

         $this->createData($data);

        return $this->db->lastInsertId();
    }

   
}