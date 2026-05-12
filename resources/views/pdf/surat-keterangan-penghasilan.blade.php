<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $letter->letterType->name }} - {{ $letter->user->name }}</title>
    @php
        $sifat    = 'Biasa';
        $lampiran = '-';
        $hal      = 'Surat Keterangan Penghasilan';
        $data     = $letter->data ?? [];
        $date     = $letter->approved_date ?? $letter->process_date ?? $letter->request_date ?? now();
    @endphp
    @include('pdf.partials.letter-header')
</head>
<body>

<div class="content">

    {{-- META SURAT + TANGGAL --}}
    <table class="meta-tanggal-row">
        <tr>
            <td class="meta-col">
                <table class="meta-table">
                    <tr>
                        <td class="meta-label">Nomor</td>
                        <td class="meta-sep">:</td>
                        <td>{{ $letter->letter_number ?? '.......' }}</td>
                    </tr>
                    <tr>
                        <td class="meta-label">Sifat</td>
                        <td class="meta-sep">:</td>
                        <td>{{ $sifat }}</td>
                    </tr>
                    <tr>
                        <td class="meta-label">Lampiran</td>
                        <td class="meta-sep">:</td>
                        <td>{{ $lampiran }}</td>
                    </tr>
                    <tr>
                        <td class="meta-label">Hal</td>
                        <td class="meta-sep">:</td>
                        <td>{{ $hal }}</td>
                    </tr>
                </table>
            </td>
            <td class="tanggal-col">
                Tangerang, {{ $date->translatedFormat('d F Y') }}
            </td>
        </tr>
    </table>

    <p>Kelurahan Tanah Tinggi atas dengan ini menerangkan bahwa :</p>

    <table class="table-data">
        <tr>
            <td class="label-col">Nama</td>
            <td class="separator-col">:</td>
            <td><strong>{{ strtoupper($letter->user->name) }}</strong></td>
        </tr>
        <tr>
            <td class="label-col">NIK</td>
            <td class="separator-col">:</td>
            <td>{{ $letter->user->nik }}</td>
        </tr>
        <tr>
            <td class="label-col">Tempat / Tgl. Lahir</td>
            <td class="separator-col">:</td>
            <td>{{ $letter->user->birth_place ?? '-' }}, {{ $letter->user->birth_date ? \Carbon\Carbon::parse($letter->user->birth_date)->translatedFormat('d-m-Y') : '-' }}</td>
        </tr>
        <tr>
            <td class="label-col">Jenis Kelamin</td>
            <td class="separator-col">:</td>
            <td>{{ $letter->user->gender == 'L' ? 'Laki – Laki' : 'Perempuan' }}</td>
        </tr>
        <tr>
            <td class="label-col">Status Perkawinan</td>
            <td class="separator-col">:</td>
            <td>{{ $data['marital_status'] ?? ($letter->user->marital_status ?? '-') }}</td>
        </tr>
        <tr>
            <td class="label-col">Pekerjaan</td>
            <td class="separator-col">:</td>
            <td>{{ $letter->user->job ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label-col">Agama</td>
            <td class="separator-col">:</td>
            <td>{{ $letter->user->religion ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label-col">Alamat</td>
            <td class="separator-col">:</td>
            <td>{{ $letter->user->address }}</td>
        </tr>
    </table>

    <p>
        Benar nama tersebut diatas adalah Penduduk Kelurahan Tanah Tinggi Kecamatan Tangerang Kota Tangerang,
        dan yang bersangkutan benar-benar mempunyai penghasilan rata-rata perbulan sebesar :
    </p>

    <div style="text-align: center; margin: 12px 0; font-weight: bold; font-size: 14pt;">
        Rp. {{ number_format((int)($data['amount'] ?? 0), 0, ',', '.') }},-
    </div>
    <div style="text-align: center; margin-bottom: 12px; font-style: italic; font-size: 11pt;">
        ( Terbilang : {{ ucwords(\App\Helpers\Terbilang::make((int)($data['amount'] ?? 0))) }} Rupiah )
    </div>

    <p>
        Demikian Surat Keterangan Penghasilan ini dibuat dengan sebenarnya, untuk dapat dipergunakan sebagaimana mestinya.
    </p>

    {{-- TANDA TANGAN LURAH --}}
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
