<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUmum extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'data_umum';
    protected $guarded = [];

    public function detail()
    {
        $detail = $this->hasOne('App\Models\Backend\DataUmumDetail', 'data_umum_id')->where('is_active', 1);
        return $detail->with('konsultan')->with('kontraktor')->with('ppkDetail')->with('ruas');
    }
    public function jadual()
    {
        $detail = $this->hasOne('App\Models\Backend\DataUmumDetail', 'data_umum_id')->where('is_active', 1);
        return $detail->with('jadualItems');
    }

    public function laporan()
    {
        return $this->hasMany('App\Models\Backend\Laporan', 'data_umum_id')->with('LaporanBahanBeton', 'LaporanBahanHotmix', 'LaporanBahanMaterial', 'LaporanCuaca', 'LaporanPeralatan', 'LaporanTenagaKerja','historyStatusLaporan');
    }

    public function laporanApproved()
    {
        return $this->hasMany('App\Models\Backend\Laporan', 'data_umum_id')->where('status', 5);
    }

    public function list_details()
    {
        return $this->hasMany('App\Models\Backend\DataUmumDetail', 'data_umum_id');
    }
    public function uptd()
    {
        return $this->belongsTo('App\Models\Backend\Uptd', 'id_uptd', 'id');
    }
    public function kategori_paket()
    {
        return $this->belongsTo('App\Models\Backend\KategoriPaket', 'kategori_paket_id', 'id');
    }

    public function fileDataUmum()
    {
        return $this->hasMany('App\Models\Backend\FileDataUmum', 'data_umum_id')->orderBy('created_at', 'DESC'); 
    }
    
    public function fileDkh()
    {
        return $this->fileDataUmum()->where('file_label', 'file_dkh')->orderBy('created_at', 'DESC');
    }

    public function fileKontrak()
    {
        return $this->fileDataUmum()->where('file_label', 'file_kontrak')->orderBy('created_at', 'DESC');
    }

    public function fileSpmk()
    {
        return $this->fileDataUmum()->where('file_label', 'file_spmk')->orderBy('created_at', 'DESC');
    }

    public function fileUmum()
    {
        return $this->fileDataUmum()->where('file_label', 'file_umum')->orderBy('created_at', 'DESC');
    }

    public function fileSyaratUmum()
    {
        return $this->fileDataUmum()->where('file_label', 'file_syarat_umum')->orderBy('created_at', 'DESC');
    }

    public function fileSyaratKhusus()
    {
        return $this->fileDataUmum()->where('file_label', 'file_syarat_khusus')->orderBy('created_at', 'DESC');
    }

    public function fileJadual()
    {
        return $this->fileDataUmum()->where('file_label', 'file_jadual')->orderBy('created_at', 'DESC');
    }

    public function fileGambarRencana()
    {
        return $this->fileDataUmum()->where('file_label', 'file_gambar_rencana')->orderBy('created_at', 'DESC');
    }

    public function fileSppbj()
    {
        return $this->fileDataUmum()->where('file_label', 'file_sppbj')->orderBy('created_at', 'DESC');
    }

    public function fileSpl()
    {
        return $this->fileDataUmum()->where('file_label', 'file_spl')->orderBy('created_at', 'DESC');
    }

    public function fileSpeckUmum()
    {
        return $this->fileDataUmum()->where('file_label', 'file_speck_umum')->orderBy('created_at', 'DESC');
    }

    public function fileJaminan()
    {
        return $this->fileDataUmum()->where('file_label', 'file_jaminan')->orderBy('created_at', 'DESC');
    }

    

    public function fileBapl()
    {
        return $this->fileDataUmum()->where('file_label', 'file_bapl')->orderBy('created_at', 'DESC');
    }


    
}
