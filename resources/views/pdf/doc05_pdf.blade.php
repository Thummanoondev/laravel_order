<!doctype html>
<html lang="th">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link rel="stylesheet" href="{{ asset('pdf.css') }}" type="text/css">
    <style>
        /**
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            font-family: "THSarabunNew";
            margin-top: 2.25cm;
            margin-left: 0.75cm;
            margin-right: 0.75cm;
            margin-bottom: 1cm;

        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000000;
            padding-top: 6.5px;
            padding-bottom: 6.5px;

        }


        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 2cm;
            right: 0cm;
            height: 1.75cm;
        }




        .logo {
            width: 100px;
            height: auto;
            position: fixed;
            top: 2.5%;
            left: 16.5cm;


        }
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        <div style="position: absolute; top:40%; left:46% ;font-size:28px"><b>ใบสั่งตั้งแบบ</b> </div>
        <div style="position: absolute; top:40%; left:10% ;font-size:28px"><b>2023/01/28</b> </div>
        <div> <img src="{{ asset('images/logo.jpg') }}" alt="รูปภาพ" class="logo">
        </div>

    </header>

    <footer>
        <b style="font-size:18px">หมายเหตุ : สินค้่าสั่งผลิตใช้เวลาประมาณ 10-14 วันที่ทำาการ</b>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>

        <table style="font-size:18px">
            <thead>
                <tr>
                    <th style="width:5% ;text-align:center">No.</th>
                    <th style="width:14% ; text-align:center">รหัส</th>
                    <th style="width:15% ;text-align:center">ลูกค้า</th>
                    <th style="width:30% ;text-align:center">ประเภท</th>
                    <th style="width:35% ;text-align:center">วิธีตัด</th>
                    <th style="width:8% ;text-align:center">จำนวน</th>
                    <th style="width:15% ;text-align:center">หมายเหตุ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doc05 as $index)
                    <tr>
                        <td style="text-align:center"><b>{{ $loop->iteration }}</b></td>
                        <td style="text-align:center"><b>{{ $index->id_code }}</b></td>
                        <td style="text-align:center"><b>{{ $index->name_c }}</b></td>
                        <td style="text-align:center"><b>{{ $index->K_N }}</b></td>
                        <td style="text-align:center"><b>{{ $index->type }}</b></td>
                        <td style="text-align:center"><b>{{ $index->cnt_order }}</b></td>
                        <td style="text-align:center"><b>{{ $index->note }}</b></td>
                    </tr>
                @endforeach

                @php
                    $totalRows = count($doc05);
                    $remainingRows = 8 - ($totalRows % 8);
                    $nextRecordNumber = $totalRows + 1; // เลข record ต่อจาก record ล่าสุดในข้อมูล
                    $shouldAddNewPage = $totalRows > 0 && $remainingRows < 8;
                @endphp

                @if ($shouldAddNewPage)
                    @for ($i = 0; $i < $remainingRows; $i++)
                        <tr>
                            <td style="text-align:center">{{ $nextRecordNumber++ }}</td>
                            @for ($j = 0; $j < 6; $j++)
                                {{-- ลดลงเพราะไม่มีเลข record --}}
                                <td>&nbsp;</td>
                            @endfor
                        </tr>
                    @endfor
                @endif
            </tbody>

        </table>
    </main>
</body>

</html>
