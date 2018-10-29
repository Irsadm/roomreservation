<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Booking;
use App\Models\BookedRoom;


class HotelController extends BaseController
{
    public function index(Request $request, Response $response)
    {
        // $obat = new Obat($this->db);

        // $getObat = $obat->getAll();
        return $this->view->render($response, 'dashboard.twig');
    }

    public function booking(Request $request, Response $response)
    {
        $booking = new Booking($this->db);
        $bookedRoom = new BookedRoom($this->db);
        $post = $request->getParams();
        // var_dump($post);

        $nama                = $post['nama'];
        $email                = $post['email'];
        $alamat              = $post['alamat'];
        $telepon             = $post['telepon'];
        $check_in_date = $post['check_in_date'];
        $check_out_date = $post['check_out_date'];

        $start = strtotime($check_in_date);
        $end = strtotime($check_out_date);

        $jumlahHari = ceil(abs($end - $start) / 86400);

        $hargaSuperior = 1000000;
        $hargaDeluxe= 1500000;
        $hargaExecutive = 2500000;

        $superior = (int )$post['superior'];
        $deluxe     = (int )$post['deluxe'];
        $executive = (int )$post['executive'];

        $biayaSuperior = $superior * $hargaSuperior * (int)$jumlahHari;
        $biayaDeluxe = $deluxe * $hargaDeluxe * (int)$jumlahHari;
        $biayaExecutive = $executive * $hargaExecutive * (int)$jumlahHari;

        $total = $biayaSuperior  + $biayaDeluxe + $biayaExecutive;

        $bookingData = [
            'code_booking'   => $code,
            'nama'   => $nama,
            'email'   => $email,
            'alamat'   => $alamat,
            'telepon'   => $telepon,
            'check_in_date'   => $check_in_date,
            'check_out_date'   => $check_out_date,
            'total'   => $total,
        ];


        $submit = $booking->create($bookingData);

        $bookedData = [
            'booking_id' => $submit,
            'room_type_id' => $room_type_id,
            'jumlah' => $jumlah
        ];

        if ($superior !== 0) {
            $bookedData['jumlah'] = $superior;
            $bookedData['room_type_id'] = 1;
            $bookedRoom->create($bookedData);
        } elseif ($deluxe !== 0) {
            $bookedData['jumlah'] = $deluxe;
            $bookedData['room_type_id'] = 2;
            $bookedRoom->create($bookedData);
        } elseif ($executive !== 0) {
            $bookedData['jumlah'] = $executive;
            $bookedData['room_type_id'] = 3;
            $bookedRoom->create($bookedData);
        }

        return $response->withRedirect($this->router->pathFor('home'));


    }

}