<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $letter->letterType->name }} - {{ $letter->user->name }}</title>
    @php
        $sifat    = 'Biasa';
        $lampiran = '-';
        $hal      = 'Surat Pengantar Permohonan KTP';
        $data     = $letter->data ?? [];
        $ktpType  = $data['ktp_type'] ?? 'Baru';
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

    <p>Kelurahan Tanah Tinggi atas dengan ini menerangkan bahwa :</p>

    <table class="table-data">
        <tr><td style="width:20px;">1.</td><td class="label-col">Nama Lengkap</td><td class="separator-col">:</td><td><strong>{{ strtoupper($letter->user->name) }}</strong></td></tr>
        <tr><td>2.</td><td class="label-col">NIK</td><td class="separator-col">:</td><td>{{ $letter->user->nik }}</td></tr>
        <tr><td>3.</td><td class="label-col">Nomor KK</td><td class="separator-col">:</td><td>{{ $letter->user->kk ?? '-' }}</td></tr>
        <tr><td>4.</td><td class="label-col">Jenis Kelamin</td><td class="separator-col">:</td><td>{{ $letter->user->gender == 'L' ? 'Laki – Laki' : 'Perempuan' }}</td></tr>
        <tr><td>5.</td><td class="label-col">Tempat / Tgl. Lahir</td><td class="separator-col">:</td><td>{{ $letter->user->birth_place ?? '-' }}, {{ $letter->user->birth_date ? \Carbon\Carbon::parse($letter->user->birth_date)->translatedFormat('d F Y') : '-' }}</td></tr>
        <tr><td>6.</td><td class="label-col">Kewarganegaraan</td><td class="separator-col">:</td><td>Indonesia</td></tr>
        <tr><td>7.</td><td class="label-col">Agama</td><td class="separator-col">:</td><td>{{ $letter->user->religion ?? '-' }}</td></tr>
        <tr><td>8.</td><td class="label-col">Pekerjaan</td><td class="separator-col">:</td><td>{{ $letter->user->job ?? '-' }}</td></tr>
        <tr><td>9.</td><td class="label-col">Alamat</td><td class="separator-col">:</td><td>{{ $letter->user->address ?? '-' }}</td></tr>
    </table>

    <p>
        Orang tersebut diatas adalah benar-benar warga Kelurahan Tanah Tinggi Kecamatan Tangerang Kota Tangerang.
        Surat pengantar ini diberikan kepada yang bersangkutan untuk keperluan <strong>pembuatan KTP</strong>.
    </p>
    <p>Demikian surat pengantar ini kami buat dengan sebenar-benarnya, agar dapat dipergunakan sebagaimana mestinya.</p>

    {{-- Tanda tangan Lurah (Kanan) --}}
    <table style="width: 100%; margin-top: 20px; border-collapse: collapse; page-break-inside: avoid;">
        <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%; text-align: center; vertical-align: top;">
                <p style="margin-bottom: 2px;">Lurah Kelurahan Tanah Tinggi</p>
                @if($sigBase64)
                    <img src="{{ $sigBase64 }}" alt="TTD Lurah" style="width: 160px; height: auto; display: block; margin: 5px auto;">
                @else
                    <br><br><br><br>
                @endif
                <p style="font-weight: bold; text-decoration: underline; margin: 0;">{{ $lurahName }}</p>
                <p style="margin: 0; font-size: 10.5pt;">NIP.{{ $lurahNip }}</p>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
