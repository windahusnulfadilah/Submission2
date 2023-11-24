<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getDataUser(Request $request) {
        $nama = $request->get('nama');
        $email = $request->get('email');

        $arrNama = [
            'nama' => $nama,
            'email' => $email
        ];

        return json_encode($arrNama);
    }

    public function createDataUser(Request $request) {
        $post = $request->post();
        $arr = [];
        $arr['username'] = $request->post('username');
        $arr['email'] = $request->post('email');
        $arr['no_telp'] = $request->post('no_telp');

        $isValid = self::cekUser($arr['username']);
        if ($isValid){
            $res['status'] = true;
            $res['message'] = 'Username Valid!';
            $code = 200;
        } else {
            $res['status'] = false;
            $res['message'] = 'Username Tidak Valid!';
            $code = 401;
        }

        //Contoh response json
        return response()->json($res, $code);
    }

    private static function cekUser($username) {
        if ($username == 'winda') {
            return true;
        } else {
            return false;
        }
    }

    public function updateDataUser(Request $request) {
        $post = $request->post();
        $arr = [];
        $arr['username'] = $request->post('username');
        $arr['email'] = $request->post('email');
        $arr['no_telp'] = $request->post('no_telp');

        //response json

        return response()->json($arr, 200);
    }

    public function deleteDataUser(Request $request) {
        $arr = [];
        $arr['username'] = $request->get('username');

        $isValid = self::cekUser($arr['username']);
        if ($isValid){
            $res['status'] = true;
            $res['message'] = 'Data berhasil dihapus!';
            $code = 200;
        } else {
            $res['status'] = false;
            $res['message'] = 'Data tidak ditemukan / username tidak valid!';
            $code = 401;
        }

        return response()->json($res, $code);
    }
}
