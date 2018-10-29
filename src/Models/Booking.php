<?php

namespace App\Models;

class Booking extends AbstractModel
{
    protected $table = 'booking';

    public function create($data)
    {
        $code = "BX-".date('ymdhis');
        $data = [
            'code_booking'  => $code,
            'nama'  => $data['nama'],
            'alamat'  => $data['alamat'],
            'email'  => $data['email'],
            'telepon'  => $data['telepon'],
            'check_in_date'  => $data['check_in_date'],
            'check_out_date'  => $data['check_out_date'],
            'total'  => $data['total'],
        ];

         $this->createData($data);

        return $this->db->lastInsertId();
    }

   
}