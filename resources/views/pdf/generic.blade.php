<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $letter->letterType->name }} - {{ $letter->user->name }}</title>
    @php
        $sifat    = 'Biasa';
        $lampiran = '-';
        $hal      = $letter->letterType->name ?? 'Surat Keterangan';
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
        <tr><td class="label-col">Tempat / Tgl. Lahir</td><td class="separator-col">:</td><td>{{ $letter->user->birth_place ?? '-' }}, {{ $letter->user->birth_date ? \Carbon\Carbon::parse($letter->user->birth_date)->translatedFormat('d F Y') : '-' }}</td></tr>
        <tr><td class="label-col">Jenis Kelamin</td><td class="separator-col">:</td><td>{{ $letter->user->gender == 'L' ? 'Laki – Laki' : 'Perempuan' }}</td></tr>
        <tr><td class="label-col">Pekerjaan</td><td class="separator-col">:</td><td>{{ $letter->user->job ?? '-' }}</td></tr>
        <tr><td class="label-col">Alamat</td><td class="separator-col">:</td><td>{{ $letter->user->address }}</td></tr>

        {{-- Dynamic fields dari data surat --}}
        @if(!empty($data))
            @foreach($data as $key => $value)
                @if(!in_array($key, ['ktp_file_path', 'kk_file_path', 'applicant_signature']))
                    @php $label = ucwords(str_replace('_', ' ', $key)); @endphp
                    <tr>
                        <td class="label-col">{{ $label }}</td>
                        <td class="separator-col">:</td>
                        <td>{{ is_array($value) ? implode(', ', $value) : $value }}</td>
                    </tr>
                @endif
            @endforeach
        @endif
    </table>

    @php
        $slug = strtoupper($letter->letterType->slug ?? '');
        $purpose = $letter->purpose;
        
        $template = "Surat keterangan ini diberikan untuk keperluan <strong>{$purpose}</strong>.";
        
        if (str_contains($slug, 'SKD') || str_contains(strtolower($letter->letterType->name), 'domisili')) {
            $template = "Surat keterangan tempat tinggal ini diberikan untuk keperluan <strong>{$purpose}</strong>.";
        } elseif (str_contains($slug, 'SKTM') || str_contains(strtolower($letter->letterType->name), 'tidak mampu')) {
            $template = "Surat keterangan tidak mampu ini diberikan untuk keperluan <strong>{$purpose}</strong>.";
        } elseif (str_contains($slug, 'SKU') || str_contains(strtolower($letter->letterType->name), 'usaha')) {
            $template = "Surat keterangan usaha ini diberikan untuk keperluan <strong>{$purpose}</strong>.";
        } elseif (str_contains($slug, 'SKL') || str_contains(strtolower($letter->letterType->name), 'kelahiran')) {
            $template = "Surat keterangan kelahiran ini diberikan untuk keperluan <strong>{$purpose}</strong>.";
        } elseif (str_contains($slug, 'SKM') || str_contains(strtolower($letter->letterType->name), 'kematian')) {
            $template = "Surat keterangan kematian ini diberikan untuk keperluan <strong>{$purpose}</strong>.";
        } elseif (str_contains($slug, 'SKP') || str_contains(strtolower($letter->letterType->name), 'penghasilan')) {
            $template = "Surat keterangan penghasilan ini diberikan untuk keperluan <strong>{$purpose}</strong>.";
        } elseif (str_contains($slug, 'SIK') || str_contains(strtolower($letter->letterType->name), 'keramaian')) {
            $template = "Surat izin keramaian ini diberikan untuk keperluan <strong>{$purpose}</strong>.";
        }
    @endphp

    <p>{!! $template !!}</p>

    <p>Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>

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
