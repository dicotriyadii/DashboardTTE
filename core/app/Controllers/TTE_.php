<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class TTE_ extends ResourceController
{
    use ResponseTrait;
    public function create()
    {
        $session        = session();
        $usernameAkses  = $session->get('username');
        $token          = $session->get('token');
        $opd            = $this->request->getPost('opd');
        $namaPegawai    = $this->request->getPost('namaPegawai');
        $email          = $this->request->getPost('email');
        $nip            = $this->request->getPost('nip');
        $nik            = $this->request->getPost('nik');
        $status         = $this->request->getPost('status');
        // proses API Login
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TambahTte',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "usernameAkses" : "'.$usernameAkses.'",
            "opd" : "'.$opd.'",
            "namaPegawai" : "'.$namaPegawai.'",
            "email" : "'.$email.'",
            "nip" : "'.$nip.'",
            "nik" : "'.$nik.'",
            "status" : "'.$status.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponse = json_decode($response,true);
        // Logika 
        if($httpcode == 400){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Dashboard');
        }else {
            $ses_data = [
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Dashboard');
        }
    }

    public function editData()
    {
        $session        = session();
        $usernameAkses  = $session->get('username');
        $token          = $session->get('token');
        $idTTE          = $this->request->getPost('idTte');
        $opd            = $this->request->getPost('opd');
        $namaPegawai    = $this->request->getPost('namaPegawai');
        $email          = $this->request->getPost('email');
        $nip            = $this->request->getPost('nip');
        $nik            = $this->request->getPost('nik');
        $status         = $this->request->getPost('status');
        // proses API Login
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/EditTte/'.$idTTE,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "usernameAkses" : "'.$usernameAkses.'",
            "opd" : "'.$opd.'",
            "namaPegawai" : "'.$namaPegawai.'",
            "email" : "'.$email.'",
            "nip" : "'.$nip.'",
            "nik" : "'.$nik.'",
            "status" : "'.$status.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponse = json_decode($response,true);

        if($session->get('statusNip') == 0 && $session->get('statusNik') == 0 && $session->get('statusOpd') == 0 && $session->get('statusStatus') == 0 ){
            $ses_data = [
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'DataPengguna');
        }

        // proses API Pencarian
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/PencarianTTE/'.$session->get('statusNip').'/'.$session->get('statusNik').'/'.$session->get('statusOpd').'/'.$session->get('statusStatus'),
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
        $hasilResponsePencarian   = json_decode($response,true);
        
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
        $dataTTE    = $hasilResponsePencarian['data'];
        // Logika 
        if($httpcode == 400){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return view('dataPengguna',compact('dataTTE','dataStatus','dataOpd'));
        }else {
            $ses_data = [
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return view('dataPengguna',compact('dataTTE','dataStatus','dataOpd'));
        }
    }

    public function updateStatus()
    {
        $session        = session();
        $usernameAkses  = $session->get('username');
        $token          = $session->get('token');
        $idTTE          = $this->request->getPost('idTte');
        $status         = $this->request->getPost('status');

        // proses API Update
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/UpdateStatus/'.$idTTE.'/'.$status,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "usernameAkses" : "'.$usernameAkses.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponse = json_decode($response,true);

        if($session->get('statusNip') == 0 && $session->get('statusNik') == 0 && $session->get('statusOpd') == 0 && $session->get('statusStatus') == 0 ){
            $ses_data = [
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'DataPengguna');
        }

        // proses API Pencarian
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/PencarianTTE/'.$session->get('statusNip').'/'.$session->get('statusNik').'/'.$session->get('statusOpd').'/'.$session->get('statusStatus'),
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
        $hasilResponsePencarian   = json_decode($response,true);
        
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
        $dataTTE    = $hasilResponsePencarian['data'];


        // Logika 
        if($httpcode == 400){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return view('dataPengguna',compact('dataTTE','dataStatus','dataOpd'));
        }else {
            $ses_data = [
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return view('dataPengguna',compact('dataTTE','dataStatus','dataOpd'));
        }
    }

    public function pencarian()
    {
        $session        = session();
        $token          = $session->get('token');
        $opd            = $this->request->getPost('opd');
        $nip            = $this->request->getPost('nip');
        $nik            = $this->request->getPost('nik');
        $status         = $this->request->getPost('status');

        if($nip == null){
            $nip = 0;
        }
        if($nik == null){
            $nik = 0;
        }
        if($opd == null){
            $opd = 0;
        }
        if($status == null){
            $status = 0;
        }
        $ses_data = [
            'statusOpd'      => $opd,
            'statusNip'      => $nip,
            'statusNik'      => $nik,
            'statusStatus'   => $status
        ];
        $session->set($ses_data);
        if($nip == 0 && $nik == 0 && $opd == 0 && $status == 0){
            return redirect()->to(base_url().'DataPengguna');
        }
        // proses API Pencarian
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/PencarianTTE/'.$nip.'/'.$nik.'/'.$opd.'/'.$status,
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
        $hasilResponsePencarian   = json_decode($response,true);
        
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
        $dataTTE    = $hasilResponsePencarian['data'];
        return view('dataPengguna',compact('dataTTE','dataStatus','dataOpd'));
    }

    public function hapus($id=null,$usernameAkses)
    {
        $session        = session();
        $idPegawaiAkses = $session->get('idPegawai');
        $token          = $session->get('token');
        // proses API Login
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/HapusTte/'.$id.'/'.$usernameAkses,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponse = json_decode($response,true);
        // Logika 
        if($httpcode == 400){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Dashboard');
        }else {
            $ses_data = [
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Dashboard');
        }
    }
 
}