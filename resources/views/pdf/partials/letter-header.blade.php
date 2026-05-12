{{--
    ======================================================
    TEMPLATE MASTER SURAT — KELURAHAN TANAH TINGGI
    Kecamatan Tangerang, Kota Tangerang, Banten 15119
    Lurah : DIDIN KOMARUDIN, S.Sos,M.Si
    NIP   : 196711102001121003
    ======================================================
    @include('pdf.partials.letter-header')
    Variabel dari parent: $letter (wajib), $sifat, $lampiran, $hal (opsional)
--}}

<style>
    @page { size: A4; margin: 1.5cm 2.5cm 3.5cm 2.5cm; }
    * { box-sizing: border-box; }
    body {
        font-family: 'Times New Roman', Times, serif;
        font-size: 11pt;
        line-height: 1.3;
        margin: 0; padding: 0; color: #000;
    }

    /* FOOTER GLOBAL */
    .global-footer {
        position: fixed;
        bottom: -2.8cm;
        left: 0;
        right: 0;
        text-align: center;
        width: 100%;
        line-height: 1.2;
    }
    .footer-address {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10pt;
        color: #000;
        margin-bottom: 8px;
    }
    .footer-bsre {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 8.5pt;
        color: #777;
    }

    /* KOP SURAT */
    .kop-surat {
        display: table;
        width: 100%;
        border-bottom: 4px double #000;
        padding-bottom: 6px;
        margin-bottom: 12px;
    }
    .kop-logo {
        display: table-cell;
        width: 80px;
        vertical-align: middle;
        text-align: center;
    }
    .kop-logo img { width: 72px; height: auto; }
    .kop-text {
        display: table-cell;
        vertical-align: middle;
        text-align: center;
        padding: 0 10px;
    }
    .kop-pemerintah {
        font-size: 11pt; font-weight: bold;
        text-transform: uppercase; margin: 0 0 1px 0; line-height: 1.2;
    }
    .kop-kelurahan {
        font-size: 17pt; font-weight: bold;
        text-transform: uppercase; margin: 0; line-height: 1.1;
    }
    .kop-kecamatan {
        font-size: 11pt; font-weight: bold;
        text-transform: uppercase; margin: 0 0 3px 0; line-height: 1.2;
    }
    .kop-alamat {
        font-size: 9pt; font-weight: normal;
        margin: 0; line-height: 1.3;
    }

    /* META & TANGGAL */
    .meta-tanggal-row {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 8px;
    }
    .meta-tanggal-row td { vertical-align: top; font-size: 11pt; }
    .meta-col { width: 55%; }
    .tanggal-col { width: 45%; text-align: right; }
    .meta-table { border-collapse: collapse; }
    .meta-table td { font-size: 11pt; padding: 1px 0; vertical-align: top; }
    .meta-label { width: 80px; white-space: nowrap; }
    .meta-sep { width: 12px; }

    /* ISI SURAT */
    .content { text-align: justify; }
    .content > p { margin: 6px 0; }
    .table-data {
        width: 100%;
        margin: 3px 0 3px 15px;
        border-collapse: collapse;
    }
    .table-data td {
        vertical-align: top;
        padding: 1px 0;
        font-size: 11pt;
        line-height: 1.3;
    }
    .label-col { width: 155px; white-space: nowrap; }
    .separator-col { width: 12px; }

    /* TANDA TANGAN */
    .signature-wrap { margin-top: 15px; width: 100%; page-break-inside: avoid; }
    .signature-box { float: right; width: 230px; text-align: center; }
    .signature-box p { margin: 2px 0; line-height: 1.4; }
    .signature-img { width: 160px; height: auto; display: block; margin: 5px auto; }
    .signature-name { text-decoration: underline; font-weight: bold; margin: 0; display: block; }
    .signature-nip { font-weight: normal; margin: 1px 0 0 0; font-size: 10.5pt; display: block; }
    .signature-table { width: 100%; border-collapse: collapse; }
    .signature-cell-left { width: 50%; text-align: center; vertical-align: top; }
    .signature-cell-right { width: 50%; text-align: center; vertical-align: top; }
    .clearfix::after { content: ""; display: table; clear: both; }

    /* UTILITY */
    .bold { font-weight: bold; }
    .underline { text-decoration: underline; }
    .italic { font-style: italic; }
    .text-center { text-align: center; }
    .section-label { font-size: 11pt; margin: 5px 0 2px 0; }
</style>


{{-- FOOTER GLOBAL (Ditampilkan di semua halaman pada posisi fixed bottom) --}}
<div class="global-footer">
    <div class="footer-address">
        Jalan Satria Sudirman Nomor 1 Sukaasih, Tangerang, Kota Tangerang<br>
        Banten (15111) Telepon (021)55770275, Faksimile (021)55764957
    </div>
    <div class="footer-bsre">
        Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat elektronik<br>
        yang diterbitkan oleh Balai Besar Sertifikasi Elektronik (BSrE), Badan Siber dan Sandi Negara (BSSN).
    </div>
</div>

{{-- KOP SURAT --}}
<div class="kop-surat">
    <div class="kop-logo">
        @if($logoBase64)
            <img src="{{ $logoBase64 }}" alt="Logo Kelurahan Tanah Tinggi">
        @endif
    </div>
    <div class="kop-text">
        <p class="kop-pemerintah">PEMERINTAH KOTA TANGERANG</p>
        <p class="kop-kelurahan">KELURAHAN TANAH TINGGI</p>
        <p class="kop-kecamatan">KECAMATAN TANGERANG</p>
        <p class="kop-alamat">
            Jl. Meteorologi, RT.005/RW.013, Tanah Tinggi, Kec. Tangerang, Kota Tangerang, Banten 15119, Indonesia
        </p>
    </div>
</div>
