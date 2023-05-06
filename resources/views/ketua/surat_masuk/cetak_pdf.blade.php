<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Masuk</title>
    <link rel="stylesheet" href="{{ public_path('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ public_path('/assets/css/app.min.css') }}">

    <style>
        .kop {
            font-size: 30px
        }

        .logo {
            position: absolute;
        }

        hr {
            margin: 0;
        }

        hr.hr-2 {
            margin-top: 3px;
            border: black 1px solid;
        }
    </style>

    @php
        use Carbon\Carbon;
    @endphp
</head>

<body>
    <div>
        <img class="logo" width="80px" src="{{ public_path('/assets/images/auth-bg.jpg') }}" alt=""
            srcset="">
        <div>
            <p class="text-center m-0 text-uppercase" style="font-size: 18px">BADAN KESATUAN BANGSA DAN POLITIK KOTA
                BOGOR</p>
            {{-- <p class="text-center m-0 text-uppercase" style="font-size: 18px">Jemaat Gratia Waena</p> --}}
            <p class="text-center m-0" style="font-size: 18px">Laporan Surat Masuk</p>
            <hr class="hr-1">
            <hr class="hr-2">
        </div>
        <div class="mt-3">
            <table class="table table-bordered p-2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Surat</th>
                        <th>Tgl. Surat</th>
                        <th>Perihal</th>
                        <th>Asal Surat</th>
                        <th>Tgl. Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->surat->no_surat }}</td>
                            <td>
                                {{ Carbon::createFromFormat('Y-m-d', $item->surat->tgl_surat)->isoFormat('D MMM Y') }}
                            </td>
                            <td>{{ $item->surat->perihal }}</td>
                            <td>{{ $item->asal_surat }}</td>
                            <td>
                                {{ Carbon::createFromFormat('Y-m-d', $item->tgl_masuk)->isoFormat('D MMM Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>
