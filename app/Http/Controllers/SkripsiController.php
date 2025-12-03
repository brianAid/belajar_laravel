<?php

namespace App\Http\Controllers;

use Crypt;
use Illuminate\Http\Request;

class SkripsiController extends Controller
{
    public function data()
    {

        $parameter = [
            'nama' => 'Diki Alfarabi Hadi',
            'pekerjaan' => 'Programmer',
        ];
        $enkripsi = Crypt::encrypt($parameter);
        echo "<a href='/data/" . $enkripsi . "'>Klik</a>";
    }

    public function data_proses($data)
    {
        $data = Crypt::decrypt($data);

        echo "Nama : " . $data['nama'];
        echo "<br/>";
        echo "Pekerjaan : " . $data['pekerjaan'];
    }
}
