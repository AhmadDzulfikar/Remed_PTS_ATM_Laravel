<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Models\tarikTunai;
use App\Models\Pembayaran;
use App\Models\User;

class AtmController extends Controller
{
    public function cek_saldo(Request $request)
    {

        $validate_user = User::where('username', $request->username)->where('password', $request->password)->first();



        if ($validate_user != "") {
            return response()->json(
                [
                    "Username" => $validate_user->username,
                    "Jumlah Saldo" => $validate_user->saldo->jumlah,
                    "Status" => "Berhasil Cek Saldo"
                ],
                202
            );
        }

        return response()->json(
            [
                "status" => "Failed Cek Saldo",




            ],
            500
        );
    }

    public function tarik_tunai(Request $request)
    {

        $validate_user = User::where('username', $request->username)->where('password', $request->password)->first();

        if ($validate_user  != null) {

            // Logic Penarikan Uang
            $saldo_user = $validate_user->saldo;

            if ($saldo_user->jumlah >= $request->nominal) {

                $saldo_user->decrement('jumlah', $request->nominal);
                return response()->json(
                    [
                        "Username" => $validate_user->username,
                        "Nominal Yang ditarik" => $request->nominal,
                        "Sisa Saldo Sekarang" => $saldo_user->jumlah
                    ],
                    202
                );
            }
        }


        return response()->json(
            [
                "status" => "Failed Tarik Tunai"
            ],
            500
        );
    }

    public function transfer(Request $request)
    {

        $validate_user = User::where('username', $request->username)->where('password', $request->password)->first();

        $validate_rekening = Transfer::where('no_rek', $request->rek_tujuan)->first();



        if ($validate_user  != null && $validate_rekening != null) {

            $saldo_user = $validate_user->saldo;
            $saldo_rek_tujuan = $validate_rekening->user->saldo;


            if ($saldo_user->jumlah >= $request->nominal) {

                $saldo_user->decrement('jumlah', $request->nominal);
                $saldo_rek_tujuan->increment('jumlah', $request->nominal);
                //Create Pembayaran
                Pembayaran::create([
                    "user_id" => $validate_user->id,
                    "rek_tujuan" => $validate_rekening->no_rek,
                    "nominal" => $request->nominal
                ]);
                    //Operasi Matematika

                ;

                return response()->json(
                    [
                        "Username Pengirim" => $validate_user->username,
                        "Username Penerima" => $validate_rekening->user->username,
                        "No Rek Penerima" => $validate_rekening->no_rek,
                        "Nominal Yang ditransfer" => $request->nominal,

                        "Sisa Saldo Sekarang" => $saldo_user->jumlah
                    ],
                    202
                );
            }
        }

        return response()->json(
            [
                "status" => "Failed Transfer"
            ],
            500
        );
    }

    public function tarikTunai(Request $request)
    {

        $validate_user = User::where('username', $request->username)->where('password', $request->password)->first();



        if ($validate_user != null) {
            $saldo_user = $validate_user->saldo;

            if ($saldo_user->jumlah >= $request->nominal) {

                $saldo_user->decrement('jumlah', $request->nominal);

                tarikTunai::create([
                    "nominal" => $request->nominal,
                    "user_id" => $validate_user->id,
                    "jenis" => $request->jenis,
                    "payment_numb" => $request->nomor
                ]);

                return response()->json(
                    [
                        "Total Pembayaran" => $request->nominal,
                        "jenis" => $request->jenis,
                        "Sisa Saldo" => $saldo_user->jumlah,
                        "Nomor Pelanggan" => $request->nomor

                    ]
                );
            }
        }


        return response()->json(
            [
                "status" => "Failed Pay"
            ],
            500
        );
    }
}
