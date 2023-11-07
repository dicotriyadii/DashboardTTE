<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function login()
    {
        $session    = session();
        $login      = $session->get('login');
        if($login == 1){
            return redirect()->to(base_url().'Dashboard');
          }
        return view('login');
    }
    public function dashboard()
    {
        $session = session();
        $login      = $session->get('login');
        $token      = $session->get('token');
        $hakAkses   = $session->get('hakAkses');
        $opd        = $session->get('opd');
        if($login == 0){
          return redirect()->to(base_url());
        }
        if($hakAkses == 1){
            // Api Data Jumlah Keseluruhan
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilJumlahKeseluruhan',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $dataKeseluruhan   = json_decode($response,true);

            // Api Data Belum Verifikasi
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilJumlahByStatus/5',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $dataBelumAktivasi   = json_decode($response,true);

            // Api Data Sudah Verifikasi
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilJumlahByStatus/2',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $dataSudahAktivasi   = json_decode($response,true);

            // Api Data Belum Set Passphrases
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilJumlahByStatus/6',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $dataBelumSetPassphrase   = json_decode($response,true);

            // Api Data Belum Daftar
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilJumlahByStatus/7',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $dataBelumDaftar   = json_decode($response,true);
        }else if($hakAkses == 2){
            // Api Data Jumlah Keseluruhan
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilJumlahKeseluruhan',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $dataKeseluruhan   = json_decode($response,true);

            // Api Data Belum Verifikasi
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilJumlahByStatusDanOpd/5/'.$opd,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $dataBelumAktivasi   = json_decode($response,true);

            // Api Data Sudah Verifikasi
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilJumlahByStatusDanOpd/2/'.$opd,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $dataSudahAktivasi   = json_decode($response,true);

            // Api Data Belum Set Passphrases
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilJumlahByStatusDanOpd/6/'.$opd,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $dataBelumSetPassphrase   = json_decode($response,true);

            // Api Data Belum Daftar
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilJumlahByStatusDanOpd/7/'.$opd,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $dataBelumDaftar   = json_decode($response,true);
        }
        
        // Api Tampil Master OPD
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilOpd',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseOpd   = json_decode($response,true);

        // Api Tampil Seluruh Data Status
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilStatus',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseStatus   = json_decode($response,true);

        $dataOpd          = $hasilResponseOpd['data'];
        $dataStatus       = $hasilResponseStatus['data'];
        $sudahAktivasi    = $dataSudahAktivasi;
        $belumAktivasi    = $dataBelumAktivasi;
        $belumSetPassphrase = $dataBelumSetPassphrase;
        $belumDaftar      = $dataBelumDaftar;
        $dataKeseluruhan  = $dataKeseluruhan;
        return view('dashboard',compact('dataKeseluruhan','sudahAktivasi','belumAktivasi','belumSetPassphrase','belumDaftar','dataOpd','dataStatus'));
    }
    public function dataPengguna()
    {
        $session    = session();
        $login      = $session->get('login');
        $token      = $session->get('token');
        $hakAkses   = $session->get('hakAkses');
        $opd        = $session->get('opd');
        if($login == 0){
          return redirect()->to(base_url());
        }
        if($hakAkses == 1){
            // Api Tampil Seluruh Data TTE
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilTte',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $hasilResponseTTE   = json_decode($response,true);
            $ses_data = [
                'statusOpd'      => 0,
                'statusNip'      => 0,
                'statusNik'      => 0,
                'statusStatus'   => 0
            ];
            $session->set($ses_data);
        }else if($hakAkses == 2){
            // Api Tampil Seluruh Data TTE
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilTteByOpd/'.$opd,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $hasilResponseTTE   = json_decode($response,true);
        }
        
        // Api Tampil Master OPD
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilOpd',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseOpd   = json_decode($response,true);

        // Api Tampil Seluruh Data Status
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilStatus',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseStatus   = json_decode($response,true);

        $dataOpd    = $hasilResponseOpd['data'];
        $dataStatus = $hasilResponseStatus['data'];
        $dataTTE    = $hasilResponseTTE['data'];
        return view('dataPengguna',compact('dataTTE','dataOpd','dataStatus'));
    }
    public function masterStatus()
    {
        $session = session();
        $login   = $session->get('login');
        $token   = $session->get('token');
        if($login == 0){
          return redirect()->to(base_url());
        }

        // Api Master Status
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilStatus',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseStatus   = json_decode($response,true);
        $dataStatus            = $hasilResponseStatus['data'];
        return view('masterStatus',compact('dataStatus'));
    }
    public function user()
    {
        $session = session();
        $login   = $session->get('login');
        $token   = $session->get('token');
        if($login == 0){
          return redirect()->to(base_url());
        }

        // Api Master Pekerjaan
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilUser',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseUser  = json_decode($response,true);

        // Api Tampil Master OPD
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilOpd',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseOpd   = json_decode($response,true);

        // Api Tampil Master Hak Akses
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TampilHakAkses',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseHakAkses   = json_decode($response,true);
        $dataOpd            = $hasilResponseOpd['data'];
        $dataHakAkses       = $hasilResponseHakAkses['data'];
        $dataUser           = $hasilResponseUser['data'];
        return view('masterUser',compact('dataUser','dataOpd','dataHakAkses'));
    }
}
