<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('pdf.css') }}" type="text/css">
    <title>sticker</title>
</head>
<style>
    @page {
        size: 50mm 80mm;
        /* กำหนดขนาดหน้าเป็น 50mm กว้าง 80mm สูง */
    }

    body {
        font-family: "THSarabunNew";


    }

    .logo {
        width: 110px;
        height: auto;
        position: absolute;
        top: 80%;
        right: 40%;
        transform: rotate(270deg);

    }

    .customer {

        position: absolute;
        top: 20%;
        right: 60%;
        transform: rotate(270deg);
    }

    .id_code {


        position: absolute;
        top: 20%;
        right: -8%;
        transform: rotate(270deg);
    }

    .item {


        position: absolute;
        top: 20%;
        left: 15%;
        transform: rotate(270deg);
    }

    .iso {

        position: absolute;
        top: 20%;
        left: 18%;
        transform: rotate(270deg);
    }

    .font {
        white-space: nowrap;
        font-size: 22px;
        font-weight: bold;
    }
</style>

<body>
    <div> <img src="{{ asset('images/logo.jpg') }}" alt="รูปภาพ" class="logo">
    </div>

    <div class="customer font">
        <p>ชื่อลูกค้่า :&nbsp;&nbsp;{{ $sticker->name_c }}</p>
    </div>
    <div class="id_code font">
        <p>เลขที่แบบ :&nbsp;&nbsp;{{ $sticker->id_code }}</p>
    </div>
    <div class="item font">
        <p>ชนิดสินค้า :&nbsp;&nbsp;{{ $sticker->K_N }}</p>
    </div>
    <div class="iso font">
        <p>FR-QC-02.Rev.00_10-02-2018</p>
    </div>
</body>

</html>
