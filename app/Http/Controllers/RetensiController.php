<?php

namespace App\Http\Controllers;

use App\Models\RetensiModel;

class RetensiController extends Controller
{
    // retensi function
    public function __construct()
    {
        $this->RetensiModel = new RetensiModel();
        $this->middleware('auth');
    }
    public function index()
    {
        $data = [
            'title' => 'Retensi Arsip',
            'retensi' => $this->RetensiModel->allData(),
        ];
        return view('/retensi_arsip/v_retensi', $data);
    }

    public function detail($id_retensi)
    {
        if (!$this->RetensiModel->detailData($id_retensi)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'retensi' => $this->RetensiModel->detailData($id_retensi),
        ];
        return view('/retensi_arsip/v_detail_retensi', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/retensi_arsip/v_add_retensi', $data);
    }

    public function insert()
    {
        Request()->validate([
            'pa_pengaju' => 'required',
            'no_banding' => 'required|unique:tb_retensi_arsip,pa_pengaju|max:255',
            'jenis_perkara' => 'required',
            'pembanding' => 'required',
            'terbanding' => 'required',
            'tgl_put_banding' => 'required',
            'status_put' => 'required',
            'putusan' => 'required|mimes:pdf|max:6000',
        ], [
            'pa_pengaju.required' => 'Satker wajib diisi!!',
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'no_banding.unique' => 'Nomor perkara sudah ada!!',
            'no_banding.max' => 'Max 255 Karakter!!',
            'jenis_perkara.required' => 'Jenis perkara wajib diisi!!',
            'pembanding.required' => 'Nama Pembanding wajib diisi!!',
            'terbanding.required' => 'Nama Terbanding wajib diisi!!',
            'tgl_put_banding.required' => 'Tanggal putus wajib diisi!!',
            'status_put.required' => 'Status Putusan wajib diisi!!',
            'putusan.required' => 'Doc Putusan retensi wajib diupload!!',
            'putusan.mimes' => 'Jenis file harus pdf!!',
            'putusan.max' => 'Ukuran file max 6Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload file
        $file = Request()->putusan;
        $fileName = str_replace("/", "_",  Request()->no_banding) . '_' . 'Jo' . '_' . str_replace("/", "_",  Request()->no_pa) . '_' . date('dmY') . '.' . $file->extension();
        $file->move(public_path('retensi_arsip_perkara'), $fileName);

        $data = [
            'pa_pengaju' => Request()->pa_pengaju,
            'no_banding' => Request()->no_banding,
            'no_pa' => Request()->no_pa,
            'no_kasasi' => Request()->no_kasasi,
            'no_pk' => Request()->no_pk,
            'no_banding' => Request()->no_banding,
            'jenis_perkara' => Request()->jenis_perkara,
            'no_kasasi' => Request()->no_kasasi,
            'pembanding' => Request()->pembanding,
            'terbanding' => Request()->terbanding,
            'tgl_put_banding' => Request()->tgl_put_banding,
            'status_put' => Request()->status_put,
            'tgl_put_pa' => Request()->tgl_put_pa,
            'tgl_put_kasasi' => Request()->tgl_put_kasasi,
            'tgl_put_pk' => Request()->tgl_put_pk,
            'buku' => Request()->buku,
            'tingkat' => Request()->tingkat,
            'tahun' => Request()->tahun,
            'putusan' => $fileName,
        ];

        $this->RetensiModel->addData($data);
        return redirect()->route('retensi')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    public function edit($id_retensi)
    {
        if (!$this->RetensiModel->detailData($id_retensi)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'retensi' => $this->RetensiModel->detailData($id_retensi),
        ];
        return view('/retensi_arsip/v_edit_retensi', $data);
    }

    public function update($id_retensi)
    {
        Request()->validate([
            'pa_pengaju' => 'required',
            'no_banding' => 'required|unique:tb_retensi_arsip,pa_pengaju|max:255',
            'jenis_perkara' => 'required',
            'pembanding' => 'required',
            'terbanding' => 'required',
            'tgl_put_banding' => 'required',
            'status_put' => 'required',
            'putusan' => 'mimes:pdf|max:6000',
        ], [
            'pa_pengaju.required' => 'Satker wajib diisi!!',
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'no_banding.unique' => 'Nomor perkara sudah ada!!',
            'no_banding.max' => 'Max 255 Karakter!!',
            'jenis_perkara.required' => 'Jenis perkara wajib diisi!!',
            'pembanding.required' => 'Nama Pembanding wajib diisi!!',
            'terbanding.required' => 'Nama Terbanding wajib diisi!!',
            'tgl_put_banding.required' => 'Tanggal putus wajib diisi!!',
            'status_put.required' => 'Status Putusan wajib diisi!!',
            'putusan.mimes' => 'Jenis file harus pdf!!',
            'putusan.max' => 'Ukuran file max 6Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->putusan <> "") {
            //Jika ganti file
            //upload file
            $file = Request()->putusan;
            $fileName = str_replace("/", "_",  Request()->no_banding) . '_' . 'Jo' . '_' . str_replace("/", "_",  Request()->no_pa) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('retensi_arsip_perkara'), $fileName);


            $data = [
                'pa_pengaju' => Request()->pa_pengaju,
                'no_banding' => Request()->no_banding,
                'no_pa' => Request()->no_pa,
                'no_kasasi' => Request()->no_kasasi,
                'no_pk' => Request()->no_pk,
                'no_banding' => Request()->no_banding,
                'jenis_perkara' => Request()->jenis_perkara,
                'no_kasasi' => Request()->no_kasasi,
                'pembanding' => Request()->pembanding,
                'terbanding' => Request()->terbanding,
                'tgl_put_banding' => Request()->tgl_put_banding,
                'status_put' => Request()->status_put,
                'tgl_put_pa' => Request()->tgl_put_pa,
                'tgl_put_kasasi' => Request()->tgl_put_kasasi,
                'tgl_put_pk' => Request()->tgl_put_pk,
                'buku' => Request()->buku,
                'tingkat' => Request()->tingkat,
                'tahun' => Request()->tahun,
                'putusan' => $fileName,
            ];

            $this->RetensiModel->editData($id_retensi, $data);
        } else {
            //Jika tidak ganti file
            //upload file
            $data = [
                'pa_pengaju' => Request()->pa_pengaju,
                'no_banding' => Request()->no_banding,
                'no_pa' => Request()->no_pa,
                'no_kasasi' => Request()->no_kasasi,
                'no_pk' => Request()->no_pk,
                'no_banding' => Request()->no_banding,
                'jenis_perkara' => Request()->jenis_perkara,
                'no_kasasi' => Request()->no_kasasi,
                'pembanding' => Request()->pembanding,
                'terbanding' => Request()->terbanding,
                'tgl_put_banding' => Request()->tgl_put_banding,
                'status_put' => Request()->status_put,
                'tgl_put_pa' => Request()->tgl_put_pa,
                'tgl_put_kasasi' => Request()->tgl_put_kasasi,
                'tgl_put_pk' => Request()->tgl_put_pk,
                'buku' => Request()->buku,
                'tingkat' => Request()->tingkat,
                'tahun' => Request()->tahun,
            ];

            $this->RetensiModel->editData($id_retensi, $data);
        }
        return redirect()->route('retensi')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id_retensi)
    {
        //hapus file
        $retensi = $this->RetensiModel->detailData($id_retensi);
        if ($retensi->putusan <> "") {
            unlink(public_path('retensi_arsip_perkara') . '/' . $retensi->putusan);
        }

        $this->RetensiModel->deleteData($id_retensi);
        return redirect()->route('retensi')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
