<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class User_ extends ResourceController
{
    use ResponseTrait;
    public function create()
    {
        $session        = session();
        $usernameAkses  = $session->get('usernameAkses');
        $token          = $session->get('token');
        $usernameBaru   = $this->request->getPost('username');
        $namaBaru       = $this->request->getPost('nama');
        $opdBaru        = $this->request->getPost('opd');
        $hakAksesBaru   = $this->request->getPost('hakAkses');

        // proses API Pegawai
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/TambahUser',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "usernameAkses" : "'.$usernameAkses.'",
            "usernameBaru" : "'.$usernameBaru.'",
            "namaBaru" : "'.$namaBaru.'",
            "opdBaru" : "'.$opdBaru.'",
            "hakAksesBaru" : "'.$hakAksesBaru.'"
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
            return redirect()->to(base_url().'User');
        }else {
            $ses_data = [
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'User');
        }
    }

    public function editUser()
    {
        $session        = session();
        $usernameAkses  = $session->get('usernameAkses');
        $token          = $session->get('token');
        $userId         = $this->request->getPost('userId');
        $usernameBaru   = $this->request->getPost('username');
        $namaBaru       = $this->request->getPost('nama');
        $opdBaru        = $this->request->getPost('opd');
        $hakAksesBaru   = $this->request->getPost('hakAkses');
        // proses API Pegawai
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/EditUser/'.$userId,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "usernameAkses" : "'.$usernameAkses.'",
            "usernameBaru" : "'.$usernameBaru.'",
            "namaBaru" : "'.$namaBaru.'",
            "opdBaru" : "'.$opdBaru.'",
            "hakAksesBaru" : "'.$hakAksesBaru.'"
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
            return redirect()->to(base_url().'User');
        }else {
            $ses_data = [
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'User');
        }
    }

    public function gantiPassword()
    {
        $session        = session();
        $usernameAkses  = $session->get('usernameAkses');
        $token          = $session->get('token');
        $userId         = $this->request->getPost('userId');
        $passwordLama   = $this->request->getPost('passwordLama');
        $passwordBaru   = $this->request->getPost('passwordBaru');
        // proses API Pegawai
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/GantiPassword/'.$userId,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "usernameAkses" : "'.$usernameAkses.'",
            "passwordLama" : "'.$passwordLama.'",
            "passwordBaru" : "'.$passwordBaru.'"
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
            return redirect()->back();
        }else {
            $session->destroy();
            $ses_data = [
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url());
        }
    }

    public function hapus($id=null,$usernameAkses=null)
    {
        $session        = session();
        $token          = $session->get('token');
        // proses API Login
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APITandaTanganElektronik/api/HapusUser/'.$id.'/'.$usernameAkses,
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
            return redirect()->to(base_url().'User');
        }else {
            $ses_data = [
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'User');
        }
    }
 
}