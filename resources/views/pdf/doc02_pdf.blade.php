<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>doc02</title>

    <link rel="stylesheet" href="{{ asset('pdf.css') }}" type="text/css">
</head>
<style>
    @page {
        margin: 0mm;

    }

    body {
        font-family: "THSarabunNew";
        display: flex;
        flex-direction: column;

    }


    p.headerorder {
        margin-top: 20px;
        /* ลบ margin ด้านบนของ <p> */
        margin-bottom: 0;
        /* ลบ margin ด้านล่างของ <p> */
    }

    td {
        border: none;
    }

    .container {
        position: relative;
        /* ตั้งค่าตำแหน่งเป็น relative เพื่อให้สามารถใช้ position: absolute; ใน .image-container ได้ */
    }

    .image-container {
        position: absolute;
        border: 2px solid black;
        top: 9rem;
        left: 39rem;
        width: 150px;
        /* กำหนดความกว้างของกรอบ */
        height: 120px;
        /* กำหนดความสูงของกรอบ */
        overflow: hidden;

        /* จัดการให้รูปภาพอยู่ตรงกลางแนวตั้ง */
    }

    .image-container2 {
        position: absolute;
        border: 2px solid black;
        padding: 57px 114px 55px 45px;
        top: 150px;
        left: 620px;
        display: block;
        /* เพิ่มบรรทัดนี้เพื่อให้กรอบยังแสดงอยู่ */
    }



    .pdf-image {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }

    .footer {

        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;

        /* ความห่างของเนื้อหาภายใน footer */
        text-align: center;
        /* การจัดตำแหน่งของเนื้อหาภายใน footer */

        margin-top: 38%;
        /* ชิดด้านล่าง */
    }

    .text-p {
        font-size: 22px;
        font-weight: bold;
    }

    .box {
        position: absolute;

        /* กำหนดความสูงของกล่อง */
        border: 1px solid black;
        /* เพิ่มเส้นขอบสีดำ */
        background-color: transparent;
        /* ตั้งค่าสีพื้นหลังเป็นโปร่ง */
    }

    .box1 {
        top: 22%;
        left: 19.5%;
        width: 92px;
        /* กำหนดความกว้างของกล่อง */
        height: 30px;
    }

    .box2 {
        top: 41%;
        left: 19.5%;
        width: 92px;
        /* กำหนดความกว้างของกล่อง */
        height: 30px;
    }

    .box3 {
        top: 34%;
        left: 60.5%;
        width: 115px;
        /* กำหนดความกว้างของกล่อง */
        height: 30px;
    }

    .box4 {
        top: 41%;
        left: 60.5%;
        width: 115px;
        /* กำหนดความกว้างของกล่อง */
        height: 30px;
    }

    .box5 {
        top: 14%;
        left: 61%;
        width: 115px;
        /* กำหนดความกว้างของกล่อง */
        height: 30px;
    }

    .logo {
        position: absolute;
        top: 5%;
        left: 80%;
        width: 130px;
        /* กำหนดความกว้างของกล่อง */
        height: auto;
    }
</style>

<body>

    @if (is_file(public_path($doc02->img)))
        <div class="image-container">
            <img src="{{ asset($doc02->img) }}" alt="รูปภาพ" class="pdf-image">
        </div>
    @else
        <div class="image-container2">

        </div>
    @endif
    </div>

    <div class="container">
        <div class="box box1"></div>
        <div class="box box2"></div>
        <div class="box box3"></div>
        <div class="box box4"></div>
        <div class="box box5"></div>
        <div class="move-logo">
            <img src="{{ asset('images/logo.jpg') }}" alt="รูปภาพ" class="logo">
        </div>
    </div>
    <p class="headerorder" style="text-align: center;  ">ใบสั่งผลิต </p>
    <div class="font-all">
        <div>
            <p class="text-p" style="position: absolute; top:8%; left:7%">วันที่รับออเดอร์</p>
            <p class="text-p" style="position: absolute; top:8% ; left:20%">{{ $doc02->stm }}</p>
            <p class="text-p" style="position: absolute; top:8%; left:52%">เลขที่แบบ : </p>
            <p class="text-p" style="position: absolute; top:8% ; left:62%"> {{ $doc02->id_code }}</p>
        </div>
        <div>
            <p class="text-p" style="position: absolute; ; top:16%; left:11.5%">ชื่อลูกค้า</p>
            <p class="text-p" style="position: absolute; top:16% ; left:20%">{{ $doc02->name_c }}</p>
            <p class="text-p" style="position: absolute; top:16%; left:55.5%">ชื่อรถ</p>
            <p class="text-p" style="position: absolute; top:16% ; left:61%">{{ $doc02->name_car }}</p>
        </div>
        <div>
            <p class="text-p" style="position: absolute; ; top:22%; left:11.5%">ประเภท</p>
            <p class="text-p" style="position: absolute; top:22% ; left:20%">{{ $doc02->K_N }}</p>
            <p class="text-p" style="position: absolute; top:22%; left:56.5%">ด้าน</p>
            <p class="text-p" style="position: absolute; top:22% ; left:61%">{{ $doc02->side }}</p>
        </div>
        <div>
            <p class="text-p" style="position: absolute; ; top:28%; left:15%">หนา</p>
            <p class="text-p" style="position: absolute; top:28% ; left:20%">{{ $doc02->thick }}</p>
            <p class="text-p" style="position: absolute; top:28%; left:58.5%">สี</p>
            <p class="text-p" style="position: absolute; top:28% ; left:61%">{{ $doc02->color }}</p>
        </div>
        <div>
            <p class="text-p" style="position: absolute; ; top:34%; left:11.5%">จำนวน : </p>
            <p class="text-p" style="position: absolute; top:34% ; left:20%">{{ $doc02->cnt_order }}</p>
            <p class="text-p" style="position: absolute; top:34%; left:55%">ขนาด</p>
            <p class="text-p" style="position: absolute; top:34% ; left:62%"> {{ $doc02->wide }}</p>
            <p class="text-p" style="position: absolute; top:34% ; left:66%">x</p>
            <p class="text-p" style="position: absolute; top:34% ; left:68%"> {{ $doc02->long_side }}</p>
        </div>
        <div>
            <p class="text-p" style="position: absolute; ; top:40%; left:11.5%">หมายเหตุ </p>
            <p class="text-p" style="position: absolute; top:40% ; left:20%">{{ $doc02->note }}</p>
            <p class="text-p" style="position: absolute; top:40%; left:55%">ลงบิล </p>
            <p class="text-p" style="position: absolute; top:40% ; left:60%"></p>
        </div>
        <div>
            <p class="text-p" style="position: absolute; ; top:46%; left:14%">สกรีน </p>
            <p class="text-p" style="position: absolute; top:46% ; left:20%">{{ $doc02->screen }}</p>

        </div>
        <div>
            <p class="text-p" style="position: absolute; ; top:52%; left:14%">วิธีตัด </p>
            <p class="text-p" style="position: absolute; top:52% ; left:20%">{{ $doc02->type }}</p>

        </div>


        <div class="footer">

            <div>
                <p class="text-p" style="position: absolute; bottom:107%; left:11%">แผ่นตัดโค้ง</p>
                <p class="text-p" style="position: absolute;bottom:107%; left:40%">หมายเหตุ</p>
                <p class="text-p" style="position: absolute;bottom:107%; left:70%">ลงชื่อผู้รับชอบ</p>

            </div>
            <hr style=" width: 92%; position: absolute; bottom:108%;left:4% ">
            <div>
                <p class="text-p" style="position: absolute; bottom:88%; left:7%">แผนกตัด/สกรีน/ประกอบ</p>
                <p class="text-p" style="position: absolute;bottom:88%; left:40%">หมายเหตุ</p>
                <p class="text-p" style="position: absolute;bottom:88%; left:70%">ลงชื่อผู้รับชอบ</p>

            </div>
            <hr style=" width: 92%; position: absolute; top:5%;left:4% ">
            <div>
                <p class="text-p" style="position: absolute; bottom:70%; left:12%">แผนกQC</p>
                <p class="text-p" style="position: absolute;bottom:70%; left:40%">หมายเหตุ</p>
                <p class="text-p" style="position: absolute;bottom:70%; left:70%">ลงชื่อผู้รับชอบ</p>

            </div>

            <hr style=" width: 92%; position: absolute; top:22%;left:4% ">
            <div>
                <p class="text-p" style="position: absolute; top:13%; left:4%">หมายเหตุ :
                    สินค้าสั่งผลิตใช้เวลาประมาณ 10-14 วันทำการ</p>
                <p class="text-p" style="position: absolute; top:13%; ; left:73%">FR-MK-02_Rev.00_10-02-2018</p>

            </div>
            <hr style="margin-top: 0px; margin-bottom: 2px; width: 92%;">
            <hr style="margin-top: 0px; margin-bottom: 8px; width: 92%;">
        </div>

    </div>



</body>

</html>
