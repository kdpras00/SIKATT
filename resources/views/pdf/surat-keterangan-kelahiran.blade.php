<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $letter->letterType->name }} - {{ $letter->user->name }}</title>
    @php
        $sifat    = 'Biasa';
        $lampiran = '-';
        $hal      = 'Surat Keterangan Kelahiran';
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

    <p>Kelurahan Tanah Tinggi atas dengan ini menerangkan bahwa telah lahir seorang anak :</p>

    <table class="table-data">
        <tr><td class="label-col">Nama</td><td class="separator-col">:</td><td><strong>{{ strtoupper($data['child_name'] ?? '-') }}</strong></td></tr>
        <tr><td class="label-col">NIK</td><td class="separator-col">:</td><td>{{ $data['child_nik'] ?? '-' }}</td></tr>
        <tr><td class="label-col">Jenis Kelamin</td><td class="separator-col">:</td><td>{{ isset($data['child_gender']) ? ($data['child_gender'] == 'L' ? 'Laki – Laki' : 'Perempuan') : '-' }}</td></tr>
        <tr><td class="label-col">Tempat / Tgl. Lahir</td><td class="separator-col">:</td><td>{{ $data['child_birth_place'] ?? '-' }}, {{ isset($data['child_birth_date']) ? \Carbon\Carbon::parse($data['child_birth_date'])->translatedFormat('d-m-Y') : '-' }}</td></tr>
        <tr><td class="label-col">Alamat</td><td class="separator-col">:</td><td>{{ $data['child_address'] ?? $letter->user->address }}</td></tr>
    </table>

    <p class="section-label">Adalah anak dari pernikahan seorang suami :</p>
    <table class="table-data">
        <tr><td class="label-col">Nama</td><td class="separator-col">:</td><td><strong>{{ strtoupper($data['father_name'] ?? '-') }}</strong></td></tr>
        <tr><td class="label-col">Tempat / Tgl. Lahir</td><td class="separator-col">:</td><td>{{ $data['father_birth_place'] ?? '-' }}, {{ isset($data['father_birth_date']) ? \Carbon\Carbon::parse($data['father_birth_date'])->translatedFormat('d-m-Y') : '-' }}</td></tr>
        <tr><td class="label-col">Alamat</td><td class="separator-col">:</td><td>{{ $data['father_address'] ?? '-' }}</td></tr>
    </table>

    <p class="section-label">Dengan seorang istri :</p>
    <table class="table-data">
        <tr><td class="label-col">Nama</td><td class="separator-col">:</td><td><strong>{{ strtoupper($data['mother_name'] ?? '-') }}</strong></td></tr>
        <tr><td class="label-col">Tempat / Tgl. Lahir</td><td class="separator-col">:</td><td>{{ $data['mother_birth_place'] ?? '-' }}, {{ isset($data['mother_birth_date']) ? \Carbon\Carbon::parse($data['mother_birth_date'])->translatedFormat('d-m-Y') : '-' }}</td></tr>
        <tr><td class="label-col">Alamat</td><td class="separator-col">:</td><td>{{ $data['mother_address'] ?? '-' }}</td></tr>
    </table>

    <p>Demikian Surat Keterangan Kelahiran ini dibuat dengan sesungguhnya untuk dapat diketahui dan dipergunakan sebagaimana mestinya.</p>

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
