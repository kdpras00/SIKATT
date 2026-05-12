<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $letter->letterType->name }} - {{ $letter->user->name }}</title>
    @php
        $sifat    = 'Biasa';
        $lampiran = '-';
        $hal      = 'Surat Keterangan Ijin (Cuti)';
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

    <p>Kelurahan Tanah Tinggi atas dengan ini menerangkan bahwa :</p>

    <table class="table-data">
        <tr><td class="label-col">Nama</td><td class="separator-col">:</td><td><strong>{{ strtoupper($letter->user->name) }}</strong></td></tr>
        <tr><td class="label-col">NIK</td><td class="separator-col">:</td><td>{{ $letter->user->nik }}</td></tr>
        <tr><td class="label-col">Tempat / Tgl. Lahir</td><td class="separator-col">:</td><td>{{ $letter->user->birth_place ?? '-' }}, {{ $letter->user->birth_date ? \Carbon\Carbon::parse($letter->user->birth_date)->translatedFormat('d-m-Y') : '-' }}</td></tr>
        <tr><td class="label-col">Pekerjaan</td><td class="separator-col">:</td><td>{{ $letter->user->job ?? '-' }}</td></tr>
        <tr><td class="label-col">Perusahaan</td><td class="separator-col">:</td><td>{{ $data['company_name'] ?? '-' }}</td></tr>
        <tr><td class="label-col">Alamat Tinggal</td><td class="separator-col">:</td><td>{{ $letter->user->address }}</td></tr>
    </table>

    <p>
        Nama tersebut diatas adalah Penduduk Kelurahan Tanah Tinggi Kecamatan Tangerang Kota Tangerang,
        dengan ini mengajukan permohonan izin tidak masuk kerja (Cuti) pada :
    </p>

    <table class="table-data">
        <tr><td class="label-col">Hari</td><td class="separator-col">:</td><td>{{ strtoupper($data['leave_day'] ?? '-') }}</td></tr>
        <tr><td class="label-col">Tanggal</td><td class="separator-col">:</td><td>{{ isset($data['leave_date']) ? \Carbon\Carbon::parse($data['leave_date'])->translatedFormat('d F Y') : '-' }}</td></tr>
        <tr><td class="label-col">Maksud Tujuan</td><td class="separator-col">:</td><td>{{ $data['leave_purpose'] ?? '-' }}</td></tr>
        @if(!empty($data['child_name']))
        <tr><td class="label-col">Nama Anak</td><td class="separator-col">:</td><td><strong>{{ strtoupper($data['child_name']) }}</strong></td></tr>
        @endif
    </table>

    <p>Demikian keterangan ini dibuat dengan sebenarnya untuk dapat diketahui semestinya.</p>

    <div class="signature-wrap">
    <table class="signature-table">
        <tr>
            <td class="signature-cell-left"></td>
            <td class="signature-cell-right">
                <p>Lurah Kelurahan Tanah Tinggi</p>
                @if($sigBase64)<img src="{{ $sigBase64 }}" alt="TTD Lurah" class="signature-img">@else<br><br><br>@endif
                <span class="signature-name">{{ $lurahName }}</span>
                <span class="signature-nip">NIP.{{ $lurahNip }}</span>
            </td>
        </tr>
    </table>
</div>
</div>
</body>
</html>
