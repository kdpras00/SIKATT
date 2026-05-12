<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $letter->letterType->name }} - {{ $letter->user->name }}</title>
    @php
        $sifat    = 'Biasa';
        $lampiran = '-';
        $hal      = 'Surat Keterangan Ijin Keramaian';
        $data     = $letter->data ?? [];
        $date     = $letter->approved_date ?? $letter->process_date ?? $letter->request_date ?? now();
    @endphp
    @include('pdf.partials.letter-header')
</head>
<body>
<div class="content">
    <table class="meta-tanggal-row">
        <tr>
            <td class="meta-col">
                <table class="meta-table">
                    <tr><td class="meta-label">Nomor</td><td class="meta-sep">:</td><td>{{ $letter->letter_number ?? '.......' }}</td></tr>
                    <tr><td class="meta-label">Sifat</td><td class="meta-sep">:</td><td>{{ $sifat }}</td></tr>
                    <tr><td class="meta-label">Lampiran</td><td class="meta-sep">:</td><td>{{ $lampiran }}</td></tr>
                    <tr><td class="meta-label">Hal</td><td class="meta-sep">:</td><td>{{ $hal }}</td></tr>
                </table>
            </td>
            <td class="tanggal-col">Tangerang, {{ $date->translatedFormat('d F Y') }}</td>
        </tr>
    </table>

    <p>Pemerintah Kelurahan Tanah Tinggi Kecamatan Tangerang Kota Tangerang, dalam rangka memenuhi Permohonan Ijin Keramaian dari :</p>

    <table class="table-data">
        <tr><td class="label-col">Nama</td><td class="separator-col">:</td><td><strong>{{ strtoupper($letter->user->name) }}</strong></td></tr>
        <tr><td class="label-col">NIK</td><td class="separator-col">:</td><td>{{ $letter->user->nik }}</td></tr>
        <tr><td class="label-col">Tempat / Tgl. Lahir</td><td class="separator-col">:</td><td>{{ $letter->user->birth_place ?? '-' }}, {{ $letter->user->birth_date ? \Carbon\Carbon::parse($letter->user->birth_date)->translatedFormat('d-m-Y') : '-' }}</td></tr>
        <tr><td class="label-col">Pekerjaan</td><td class="separator-col">:</td><td>{{ $letter->user->job ?? '-' }}</td></tr>
        <tr><td class="label-col">Alamat</td><td class="separator-col">:</td><td>{{ $letter->user->address }}</td></tr>
        <tr><td colspan="3" style="height:6px;"></td></tr>
        <tr><td class="label-col">Waktu Pelaksanaan</td><td class="separator-col"></td><td></td></tr>
        <tr><td class="label-col">Hari</td><td class="separator-col">:</td><td>{{ $data['event_day'] ?? '-' }}</td></tr>
        <tr><td class="label-col">Tanggal</td><td class="separator-col">:</td><td>{{ isset($data['event_date']) ? \Carbon\Carbon::parse($data['event_date'])->translatedFormat('d F Y') : '-' }}</td></tr>
        <tr><td class="label-col">Pukul</td><td class="separator-col">:</td><td>{{ $data['event_time'] ?? '-' }}</td></tr>
        <tr><td class="label-col">Tempat</td><td class="separator-col">:</td><td>{{ $data['event_place'] ?? '-' }}</td></tr>
        <tr><td class="label-col">Acara</td><td class="separator-col">:</td><td><strong>{{ isset($data['event_name']) ? strtoupper($data['event_name']) : '-' }}</strong></td></tr>
        <tr><td class="label-col">Hiburan</td><td class="separator-col">:</td><td>{{ $data['event_entertainment'] ?? '-' }}</td></tr>
    </table>

    <p>Dengan ini menerangkan bahwa nama diatas yang bertanggung jawab atas acara tersebut. Pada prinsipnya tidak keberatan atas permohonan yang bersangkutan, dengan ketentuan sebagai berikut :</p>
    <ol style="margin: 5px 0 5px 20px; padding: 0;">
        <li style="text-align: justify; margin-bottom: 4px;"><em>Pada waktu dilaksanakan keramaian harus disertai dengan ketentraman dan ketertiban dalam lingkungannya baik hubungan dengan tetangga, menghargai waktu-waktu ibadah dalam menciptakan kerukunan umat beragama maupun kebersihan lingkungan setelah selesai kegiatan.</em></li>
        <li style="text-align: justify;"><em>Pada waktu dilaksanakan keramaian tidak dibenarkan/dilarang melakukan hal-hal yang bertentangan dengan ketentuan yang berlaku dan adat istiadat bangsa.</em></li>
    </ol>

    {{-- Tanda tangan Lurah (kanan atas) + Mengetahui (bawah) --}}
    <div class="signature-wrap">
        <div class="signature-box">
            <p>Lurah Kelurahan Tanah Tinggi</p>
            @if($sigBase64)<img src="{{ $sigBase64 }}" alt="TTD Lurah" class="signature-img">@else<br><br><br>@endif
            <p class="signature-name">{{ $lurahName }}</p>
            <p class="signature-nip">NIP.{{ $lurahNip }}</p>
        </div>
    </div>

    <div style="clear: both; text-align: center; font-weight: bold; margin: 12px 0 8px 0;">Mengetahui;</div>
    <table style="width: 100%; border-collapse: collapse; text-align: center;">
        <tr>
            <td style="width: 50%; vertical-align: top; padding-bottom: 40px;"><strong>BINAMAS KELURAHAN TANAH TINGGI</strong></td>
            <td style="width: 50%; vertical-align: top; padding-bottom: 40px;"><strong>BABINSA KELURAHAN TANAH TINGGI</strong></td>
        </tr>
        <tr>
            <td style="text-decoration: underline; font-weight: bold;">AIPDA UCU MULYANA</td>
            <td style="text-decoration: underline; font-weight: bold;">KOPTU. AHMAD BUHORI</td>
        </tr>
        <tr>
            <td>NRP. 83100971</td>
            <td>NRP. 31071518250886</td>
        </tr>
    </table>
</div>
</body>
</html>
