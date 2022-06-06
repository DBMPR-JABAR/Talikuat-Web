<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Request</title>
        <link rel="stylesheet" href="{{ asset('assets/css/print.css') }}" />
    </head>
    <body>
        <div class="container">
            <div class="kertas">
                <div class="header">
                    <span
                        ><strong
                            >PENGAJUAN MEMULAI PEKERJAAN ( REQUEST )</strong
                        ></span
                    >
                </div>
                <div class="tgl-pengajuan">
                    <span style="border: none">Tanggal Pengajuan : </span>
                </div>
                <table class="sub-header">
                    <thead>
                        <th style="border: none"></th>
                        <th style="border: none"></th>
                        <th style="border: none"></th>
                    </thead>
                    <tbody></tbody>
                </table>
                <table class="jenis-pekerjaan" style="width: 100%">
                    <thead>
                        <th>No</th>
                        <th>Jenis Pekerjaan</th>
                        <th>Satuan</th>
                        <th>Perkiraaan Kuantitas</th>
                        <th>Lokasi</th>
                        <th>ki_ka</th>
                        <th>Tanggal</th>
                    </thead>
                </table>
                <table class="data-pendukung">
                    <thead>
                        <tr>
                            <th>Data Pendukung</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Referensi</th>
                            <th colspan="2">
                                Vertifikasi Pengawas <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YA
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TIDAK
                            </th>
                        </tr>
                    </thead>
                    <tbody style="text-transform: capitalize"></tbody>
                </table>
                <div class="flex-container">
                    <div class="diajukan">
                        <span>DIAJUKAN PENYEDIA</span>
                        <br /><br /><br /><br /><br /><br /><br /><br />
                        <span>( )</span>
                    </div>
                    <div class="diajukan">
                        <span>DIPERIKSA KONSULTAN PENGAWAS</span>
                        <br /><br /><br /><br /><br /><br /><br /><br />
                        <span style="text-align: center">( )</span>
                    </div>
                    <div class="diajukan">
                        <span>CATATAN REKOMENDASI</span>
                        <div class="text"></div>
                    </div>
                </div>
                <div class="flex-container">
                    <div class="disetujui">
                        <span>MENGETAHUI PEJABAT PEMBUAT KOMITMEN ( PPK )</span>
                        <br /><br /><br /><br /><br /><br /><br />
                        <span>( )</span>
                    </div>
                    <div class="catatan">
                        <span>CATATAN / KESIMPULAN PERSETUJUAN</span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
