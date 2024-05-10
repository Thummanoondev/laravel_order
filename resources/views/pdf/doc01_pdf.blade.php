<!doctype html>
<html lang="en">



<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>

    <link rel="stylesheet" href="{{ asset('pdf.css') }}" type="text/css">
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #000000;
            padding-top: 0px;
        }


        td,
        tr {

            padding: 0;
            border: 1px solid #000000;
        }

        tbody tr:nth-child(odd) {
            background-color: #C0C0C0;

        }

        td {
            margin: 0;
            padding: 0;
            /* กำหนดการเว้นระยะของเนื้อหาในเซลล์ */
        }

        thead tr,
        th {
            border: 1px solid #000000;
        }

        html,
        body {
            margin: 0.75rem;
            padding: 0;
            height: 100%;
        }

        .image-container {
            position: absolute;
            /* ตั้งค่าตำแหน่งเป็น absolute เพื่อให้สามารถควบคุมตำแหน่งได้โดยไม่มีผลกระทบกับองค์ประกอบอื่น */

            /* สร้างเส้นขอบสี่เหลี่ยม 4px สีดำ */
            margin: 0;
            /* เพิ่มช่องว่างระหว่างขอบและรูปภาพ */
            top: 10px;
            /* ย้ายกรอบไปทางบน 50px */
            left: 20px;
            /* ย้ายกรอบไปทางขวา 100px */
        }

        .pdf-image {
            width: 140px;
            /* กำหนดความกว้างของรูปภาพ */
            height: auto;
        }

        body {
            font-family: "THSarabunNew";
            font-weight: bold;
        }

        hr {

            top: 0;
            width: 100%;
            /* ขยายเส้นคั่นให้เต็มความกว้างของคอนเทนเนอร์ */
            border: none;
            border-top: 1px solid black;
            /* เส้นคั่นสีดำ */
        }
    </style>
</head>

<body>
    @php

        $imagePath = 'images/logo.jpg';
    @endphp
    <div class="image-container">
        <img src="{{ asset($imagePath) }}" alt="{{ $imagePath }}รูปภาพผิดพลาด" class="pdf-image">
    </div>
    <div style="text-align: center; margin-top:0; padding:0;">
        <p style="  line-height: 0.75;"><b style="font-size: 20px">บริษัท รุ่งเกษมบัสคาร์ จำกัด </b><br> <b>เลขที่ 50
                หมู่
                2 ถนนบางบัวทอง-สุพรรณบุรี
                ตำบลหน้าไม้
                อำเภอลาดหลุมแก้ว
                จังหวัดปทุมธานี 12140 <br> TEL.: 02-9793491-2 FAX.:02979-3494 </b></p>
        <br>
        <hr style="margin: 0; padding:0px">
        <h2 style="margin: 0; padding:0px">ใบบันทึกการรับงาน</h2>
    </div>

    <p style="text-align: right;   border: 1px solid #000000; margin: 0px 0px 5px 0px ;  padding: 0;">
        วันที่
        Date: 2024/04/11 &nbsp;
    </p>
    <table style="padding:0px; margin:0px;">
        <thead style="line-height: 0.75; font-size:17px">
            <tr>
                <th rowspan="2" style="width:3%">ลำดับ</th>
                <th rowspan="2"style="width:4%">ลูกค้า</th>
                <th rowspan="2"style="width:6%; ">รหัสแบบ</th>
                <th rowspan="2"style="width:3%">ชื่อรถ</th>
                <th colspan="6" style="text-align: center ;width:57%">รายการ</th>
                <th colspan="2" style="width:5%">ขนาด</th>
                <th rowspan="2" style="width:3%">จำนวน</th>
                <th rowspan="2" style="width:5%">หมายเหตุ</th>
                <th rowspan="2" style="width:7%">วันรับสินค้า</th>
            </tr>
            <tr>
                <th style="width:5%">ประเภท</th>
                <th style="width:5%">ด้าน</th>
                <th style="width:3%; ">หนา</th>
                <th style="width:5%">สี</th>
                <th style="width:14%">สกรีน</th>
                <th style="width:12%">วิธีตัด</th>
                <th style="width:4%">ก</th>
                <th style="width:4%">ย</th>
            </tr>
        </thead>
        <tbody style="font-size: 13px;   line-height: 0.76;">
            @for ($i = 0; $i < 28; $i++)
                @if (isset($doc01[$i]))
                    <tr>
                        <td style="text-align:center">{{ $i + 1 }} </td>
                        <td style="text-align: center;">{{ $doc01[$i]->name_c }}</td>
                        <td style="text-align: center;">{{ $doc01[$i]->id_code }}</td>
                        <td style="text-align: center;">{{ $doc01[$i]->name_car }} </td>
                        <td style="text-align: center;">{{ $doc01[$i]->K_N }}</td>
                        <td style="text-align: center;">{{ $doc01[$i]->side }}</td>
                        <td style="text-align: center;">{{ $doc01[$i]->thick }}</td>
                        <td style="text-align: center;">{{ $doc01[$i]->color }}</td>
                        <td style="text-align: center;">{{ $doc01[$i]->screen }}</td>
                        <td style="text-align: center;">{{ $doc01[$i]->type }}</td>
                        <td style="text-align: center;">{{ $doc01[$i]->wide }}</td>
                        <td style="text-align: center;">{{ $doc01[$i]->long_side }}</td>
                        <td style="text-align: center;">{{ $doc01[$i]->cnt_order }}</td>
                        <td style="text-align: center;">{{ $doc01[$i]->note }}</td>
                        <td style="text-align: center;">{{ $doc01[$i]->date_get }}</td>
                    </tr>
                @else
                    <tr>
                        <td style="text-align:center">{{ $i + 1 }} </td>
                        <td colspan=""> </td>
                        <td colspan=""> </td>
                        <td colspan=""> </td>
                        <td colspan=""> </td>
                        <td colspan=""> </td>
                        <td colspan=""> </td>
                        <td colspan=""> </td>
                        <td colspan=""> </td>
                        <td colspan=""> </td>
                        <td colspan=""> </td>
                        <td colspan=""> </td>
                        <td colspan=""> </td>
                        <td colspan=""> </td>
                        <td colspan=""> </td>

                    </tr>
                @endif
            @endfor

        </tbody>
    </table>
    <p style="  font-weight: bold; border: 1px solid #000000; margin: 0px; padding-top:0px">&nbsp;เงื่อนไข: ราคาตามเรท
    </p>


    <p style="  font-weight: bold;padding-left:100px ;margin: 0px;font-sty"> หมายเหตุ : สินค้่าสั่งผลิตใช้เวลาประมาณ
        10-14 วันทำการ
        <a style="padding-left:14cm ;margin: 0px;">FR-MK-02_Rev.00_10-02-2018</a>
    </p>


</body>

</html>
