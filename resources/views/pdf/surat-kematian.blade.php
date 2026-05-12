<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $letter->letterType->name }} - {{ $letter->user->name }}</title>
    @php
        $sifat    = 'Biasa';
        $lampiran = '-';
        $hal      = 'Surat Keterangan Kematian';
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
        <tr><td class="label-col">Nama</td><td class="separator-col">:</td><td><strong>{{ strtoupper($data['deceased_name'] ?? '-') }}</strong></td></tr>
        <tr><td class="label-col">NIK</td><td class="separator-col">:</td><td>{{ $data['deceased_nik'] ?? '-' }}</td></tr>
        <tr><td class="label-col">No KK</td><td class="separator-col">:</td><td>{{ $data['deceased_kk'] ?? $letter->user->kk ?? '-' }}</td></tr>
        <tr><td class="label-col">Tempat / Tgl. Lahir</td><td class="separator-col">:</td><td>{{ $data['deceased_birth_place'] ?? '-' }}, {{ isset($data['deceased_birth_date']) ? \Carbon\Carbon::parse($data['deceased_birth_date'])->translatedFormat('d-m-Y') : '-' }}</td></tr>
        <tr><td class="label-col">Umur</td><td class="separator-col">:</td><td>{{ $data['deceased_age'] ?? '-' }} Tahun</td></tr>
        <tr><td class="label-col">Alamat Terakhir</td><td class="separator-col">:</td><td>{{ $data['deceased_address'] ?? '-' }}</td></tr>
    </table>

    <p>Telah meninggal dunia pada :</p>
    <table class="table-data">
        <tr><td class="label-col">Hari</td><td class="separator-col">:</td><td>{{ strtoupper($data['death_day'] ?? '-') }}</td></tr>
        <tr><td class="label-col">Tanggal</td><td class="separator-col">:</td><td>{{ isset($data['death_date']) ? \Carbon\Carbon::parse($data['death_date'])->translatedFormat('d F Y') : '-' }}</td></tr>
        <tr><td class="label-col">Meninggal di</td><td class="separator-col">:</td><td>{{ $data['death_place'] ?? '-' }}</td></tr>
        <tr><td class="label-col">Disebabkan karena</td><td class="separator-col">:</td><td>{{ $data['death_cause'] ?? '-' }}</td></tr>
    </table>

    <p>Yang melapor :</p>
    <table class="table-data">
        <tr><td class="label-col">Nama</td><td class="separator-col">:</td><td>{{ strtoupper($letter->user->name) }}</td></tr>
        <tr><td class="label-col">Hubungan dengan almarhum/ah</td><td class="separator-col">:</td><td>{{ $data['reporter_relationship'] ?? '-' }}</td></tr>
    </table>

    <p>Demikian Surat Keterangan ini kami buat dengan sesungguhnya, untuk dapat diketahui dan dipergunakan sebagaimana mestinya.</p>

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
