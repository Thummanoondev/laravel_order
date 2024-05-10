<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>สั่งผลิต</title>
    <link rel="icon" href="{{ Storage::url('images/logo_color.png') }}" type="image/x-icon">

    <link href="{{ asset('/import/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:wght@100&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('/import/css/sb-admin-2.css') }}" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        @extends('layout')
        @section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">สั่งผลิต</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-12">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">เอกสารกรอกบันทึก รับออเดอร์ลูกค้า : <a
                                        id="datetime"> </a>
                                    <p style="color: red">
                                        รหัสแบบล่าสุด : {{ $id_code }}</p>

                                </h6>


                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="">
                                    <form method="POST" enctype="multipart/form-data"
                                        action="{{ route('order_insert') }} ">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="customer_name" class="form-label">ชื่อลูกค้า</label>
                                                <input class="form-control" list="customer_name1" id="customer_name"
                                                    name="customer_name" placeholder="กรอกชื่อลูกค้า">
                                                <datalist id="customer_name1">
                                                    @foreach ($customer as $item)
                                                        <option value=" {{ $item->name }}">
                                                    @endforeach
                                                </datalist>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="id_code">รหัสแบบ </label>
                                                <input type="text" class="form-control" id="id_code" name="id_code"
                                                    placeholder="รหัสแบบล่าสุด : {{ $id_code }}  (พิมพ์เฉพาะตัวเลขระบบจะเติม - ให้)">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="car_name">ชื่อรถ</label>
                                                <input type="text" class="form-control" id="car_name" name="car_name"
                                                    placeholder="กรอกชื่อรถ">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="kind" class="form-label">ประเภท</label>
                                                <input class="form-control" list="kind_data" id="kind" name="kind"
                                                    placeholder="เลือกประเภท">
                                                <datalist id="kind_data">
                                                    <option>ตรง</option>
                                                    <option>ตอนเดียว</option>
                                                    <option>2ตอน</option>
                                                    <option>โค้งข้าง</option>
                                                    <option>หน้าเก๋ง</option>
                                                    <option>หลังเก๋ง</option>
                                                    <option>แมคโคร</option>
                                                    <option>หลังคา</option>
                                                </datalist>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="screen">สกรีน</label>
                                                <input class="form-control" list="screen_data" id="screen"
                                                    name="screen" placeholder="กรอกข้อมูล">
                                                <datalist id="screen_data">
                                                    <option> ลายน้ำ 12 " ไข่บ้านโป่ง 3 ด้าน </option>
                                                    <option> ไข่บ้านโป่งรอบตัว</option>
                                                    <option> ไข่เชิดชัยรอบตัว</option>
                                                    <option> ลายน้ำ 10 " ไข่บ้านโป่ง 3 ด้าน</option>
                                                    <option> ไข่บ้านโป่งรอบตัว ทีบล่าง 3</option>
                                                </datalist>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="color">สี</label>
                                                <input class="form-control" list="color_data" id="color"
                                                    name="color" placeholder="กรอกข้อมูล">
                                                <datalist id="color_data">
                                                    <option> ใส </option>
                                                    <option> ชาอ่อน</option>
                                                    <option> ชากลาง</option>
                                                    <option> ชาดำ</option>
                                                    <option> ย้อมฟ้า</option>
                                                    <option> น/ง 12"</option>
                                                    <option> เขียว 12"</option>
                                                    <option> น/ง 12 " ย้อมฟ้า</option>
                                                </datalist>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="cutting_type">วิธีตัด</label>
                                                <input class="form-control" list="type_data" id="cutting_type"
                                                    name="cutting_type" placeholder="กรอกข้อมูล">
                                                <datalist id="type_data">
                                                    <option> ตัดวงนอกรอบตัว </option>
                                                    <option> ตัดวงในรอบตัว</option>
                                                    <option> ตัดกลางเหล็ก</option>
                                                    <option> ตามแบบ PT</option>
                                                    <option> ตามแบบ PT โค้ง27</option>
                                                    <option> ตามตัวเลข</option>
                                                    <option> ตามตัวเลข โค้ง27</option>
                                                    <option> ตัดนอกเหล็กเพิ่ม 2 หุนรอบตัว</option>
                                                    <option> ตัดในเหล็กลด 2หุนรอบตัว</option>
                                                </datalist>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="side">ด้าน</label>
                                                <input class="form-control" list="side_data" id="side"
                                                    name="side">
                                                <datalist id="side_data">
                                                    <option>L</option>
                                                    <option>R</option>
                                                    <option>บน</option>
                                                    <option>กลาง</option>
                                                    <option>ล่าง</option>
                                                </datalist>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="thick">หนา</label>
                                                <input list="thick_data" class="form-control" name="thick"
                                                    id="thick">
                                                <datalist id="thick_data">
                                                    <option>6 มิล</option>
                                                    <option>8 มิล</option>
                                                    <option>10 มิล</option>
                                                </datalist>
                                            </div>
                                        </div>


                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">จำนวน</label>
                                                <input type="text" class="form-control" id="qty" name="qty"
                                                    placeholder="กรอกจำนวน">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">กว้าง</label>
                                                <input type="number" step="0.01" class="form-control" id="width"
                                                    name="width" placeholder="กรอกข้อมูล">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="length">ยาว</label>
                                                <input type="number" step="0.01" class="form-control" id="length"
                                                    name="length" placeholder="กรอกข้อมูล">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="exampleFormControlTextarea1">วันที่รับสินค้า</label>
                                                <textarea class="form-control" id="date_get" name="date_get" rows="2"></textarea>
                                                @error('date_get')
                                                    <div class="my-2">
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-2">
                                                <div class="form-group">
                                                    <label for="img">อัพโหลดรูปภาพ</label>
                                                    <input type="file" class="form-control-file" id="image"
                                                        name="image" onchange="previewImage(event)">
                                                </div>
                                                <div id="imagePreview"></div>
                                            </div>

                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                @error('note')
                                                    <div>
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                                <label for="exampleFormControlTextarea1">หมายเหตุ</label>
                                                <textarea class="form-control" id="note" name="note" rows="4"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="FR_MK_05"
                                                    name="FR_MK_05">
                                                <label class="form-check-label" for="gridCheck">
                                                    FR-MK-05
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" value="บันทึก"
                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; RKS 2024</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>


        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('import/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('import/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('import/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('import/js/sb-admin-2.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </body>
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: "{{ session('success') }}",
                icon: "success",
                didClose: () => {
                    // ทำการ redirect ไปยัง URL ที่ต้องการ
                    window.location.href = "{{ route('doc02.index') }}";
                }
            });
        </script>
    @endif
    <script>
        $(document).ready(function() {

            $('#qty').on('input', function() {
                var value = $(this).val();
                if (isNaN(value)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'ผิดพลาด',
                        text: 'ต้องเป็นตัวเลขเท่านั้น',
                        confirmButtonText: 'ตกลง'
                    });
                    $(this).val('');
                }
            });
            $('#id_code').on('input', function() {
                var value = $(this).val();
                if (value.length === 5 && value.charAt(4) !== '-') {
                    value = value.slice(0, 4) + '-' + value.slice(4);
                    $(this).val(value);
                }
            });


        });


        function previewImage(event) {
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.innerHTML = ''; // Clear รูปภาพที่แสดงอยู่ก่อนหน้านี้ (หากมี)

            var files = event.target.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                if (file.type.match('image.*')) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '200px'; // กำหนดขนาดรูปภาพ
                        imagePreview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            }
        }

        function updateDateTime() {
            var now = new Date();
            var dateTimeString = "วันที่ " + now.getDate() + " " + getMonthThai(now.getMonth()) + " " + (now.getFullYear() +
                    543) +
                " เวลา " + addLeadingZero(now.getHours()) + ":" + addLeadingZero(now.getMinutes()) + " น.";
            document.getElementById("datetime").textContent = dateTimeString;
        }

        function getMonthThai(month) {
            var monthsThai = [
                "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
                "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
            ];
            return monthsThai[month];
        }

        function addLeadingZero(number) {
            return (number < 10) ? "0" + number : number;
        }

        // เรียกใช้ฟังก์ชัน updateDateTime() เพื่อแสดงวันที่และเวลาปัจจุบัน
        updateDateTime();

        // อัปเดตเวลาทุก 1 วินาที
        setInterval(updateDateTime, 1000);
    </script>
@endsection

</html>
