<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $letter->letterType->name }} - {{ $letter->user->name }}</title>
    @php
        $sifat    = 'Biasa';
        $lampiran = '-';
        $hal      = 'Surat Keterangan (SKTM)';
        $date     = $letter->approved_date ?? $letter->process_date ?? $letter->request_date ?? now();
    @endphp
    @include('pdf.partials.letter-header')
</head>
<body>

<div class="content">
    @php $data = $letter->data ?? []; @endphp

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
            <td class="label-col">Nik</td>
            <td class="separator-col">:</td>
            <td>{{ $letter->user->nik }}</td>
        </tr>
        <tr>
            <td class="label-col">Tempat / tanggal lahir</td>
            <td class="separator-col">:</td>
            <td>{{ $letter->user->birth_place ?? '-' }}, {{ $letter->user->birth_date ? \Carbon\Carbon::parse($letter->user->birth_date)->translatedFormat('d-m-Y') : '-' }}</td>
        </tr>
        <tr>
            <td class="label-col">Jenis kelamin</td>
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
        Berdasarkan Surat pengantar dari Rt {{ $data['rt'] ?? ($letter->user->rt ?? '...') }}/ Rw {{ $data['rw'] ?? ($letter->user->rw ?? '...') }},
        Regmo :{{ $letter->letter_number ?? '.......' }}<br>
        Tanggal {{ $date->translatedFormat('d F Y') }}, bahwa benar yang bersangkutan keluarga tidak mampu.
    </p>

    @if(!empty($data['child_name']) || !empty($data['child_birth_date']) || !empty($data['school_name']))
    <table class="table-data">
        @if(!empty($data['child_name']))
        <tr>
            <td class="label-col">Nama</td>
            <td class="separator-col">:</td>
            <td>{{ $data['child_name'] }}</td>
        </tr>
        @endif
        @if(!empty($data['child_birth_date']))
        <tr>
            <td class="label-col">Tempat / Tanggal Lahir</td>
            <td class="separator-col">:</td>
            <td>{{ $data['child_birth_place'] ?? '-' }}, {{ \Carbon\Carbon::parse($data['child_birth_date'])->translatedFormat('d-m-Y') }}</td>
        </tr>
        @endif
        @if(!empty($data['school_name']))
        <tr>
            <td class="label-col">Nama sekolah</td>
            <td class="separator-col">:</td>
            <td>{{ $data['school_name'] }}</td>
        </tr>
        @endif
    </table>
    @endif

    <p>Surat Keterangan ini hanya berlaku satu kali keperluan.</p>

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
