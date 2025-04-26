<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #666;
        }
        .filter-info {
            margin-bottom: 15px;
            font-size: 12px;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        table th {
            background-color: #f8f9fa;
            text-align: left;
            padding: 8px;
            border: 1px solid #dee2e6;
        }
        table td {
            padding: 8px;
            border: 1px solid #dee2e6;
        }
        .badge {
            padding: 3px 6px;
            border-radius: 3px;
            font-size: 11px;
            font-weight: normal;
        }
        .badge-primary {
            background-color: #4e73df;
            color: white;
        }
        .badge-info {
            background-color: #36b9cc;
            color: white;
        }
        .footer {
            margin-top: 30px;
            font-size: 11px;
            text-align: right;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $title }}</h1>
        <p>RRI Pro 2 Sumenep - {{ $date }}</p>
    </div>

    @if($filter['search'] || $filter['hari'])
    <div class="filter-info">
        <strong>Filter:</strong>
        @if($filter['search'])
            Pencarian: "{{ $filter['search'] }}"
        @endif
        @if($filter['hari'])
            @if($filter['search']) | @endif
            Hari: {{ $filter['hari'] }}
        @endif
    </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penyiar</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Naskah Siaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shifts as $index => $shift)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $shift->penyiar->nama ?? '-' }}</td>
                <td>
                    <span class="badge badge-{{ $shift->hari == 'Sabtu' || $shift->hari == 'Minggu' ? 'info' : 'primary' }}">
                        {{ $shift->hari }}
                    </span>
                </td>
                <td>{{ \Carbon\Carbon::parse($shift->jam_mulai)->format('H:i') }}</td>
                <td>{{ \Carbon\Carbon::parse($shift->jam_selesai)->format('H:i') }}</td>
                <td>{{ $shift->naskah_siaran }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dokumen dihasilkan pada {{ date('d/m/Y H:i:s') }}
    </div>
</body>
</html>
