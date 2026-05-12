<!DOCTYPE html>
<html>
<head>
    <title>Laporan Arsip Surat</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; font-size: 18px; }
        .header p { margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f0f0f0; }
        .footer { margin-top: 30px; text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h1>PEMERINTAH KABUPATEN TANGERANG</h1>
        <h2>PEMERINTAH KELURAHAN TANAH TINGGI</h2>
        <p>Alamat: Jl. Raya Kresek Km. 3, Kelurahan Tanah Tinggi, Kec. Kresek, Kab. Tangerang</p>
        <hr>
        <h3>LAPORAN ARSIP LAYANAN SURAT</h3>
        <p>Per Tanggal: {{ date('d F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Pemohon</th>
                <th>Jenis Surat</th>
                <th>Tanggal Pengajuan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($letters as $index => $item)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td>{{ $item->letter_number ?? '(Belum Terbit)' }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->letterType->name }}</td>
                <td>{{ \Carbon\Carbon::parse($item->request_date)->format('d F Y') }}</td>
                <td>
                    @if($item->status == 'verified') Terverifikasi
                    @elseif($item->status == 'rejected') Ditolak
                    @else Dalam Proses @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table style="width: 100%; margin-top: 50px; border-collapse: collapse; page-break-inside: avoid;">
        <tr>
            <td style="width: 60%; border: none;"></td>
            <td style="width: 40%; text-align: center; vertical-align: top; border: none;">
                <p style="margin: 0 0 5px 0;">Tanah Tinggi, {{ date('d F Y') }}</p>
                <p style="margin: 0 0 5px 0;">Mengetahui,</p>
                <p style="margin: 0 0 10px 0;"><strong>Lurah Tanah Tinggi</strong></p>
                @if($sigBase64)
                    <img src="{{ $sigBase64 }}" alt="TTD Lurah" style="width: 130px; height: auto; display: block; margin: 5px auto;">
                @else
                    <br><br><br><br>
                @endif
                <p style="margin: 5px 0 0 0;"><strong><u>DIDIN KOMARUDIN, S.Sos, M.Si</u></strong></p>
                <p style="margin: 0; font-size: 11px; color: #555;">NIP. 196711102001121003</p>
            </td>
        </tr>
    </table>
</body>
</html>
