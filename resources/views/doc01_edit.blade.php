<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ Storage::url('images/logo_color.png') }}" type="image/x-icon">
    <title>แก้ไขข้อมูล FR-MK-01</title>
    <!-- Custom fonts for this template -->


    <link href="{{ asset('import/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('import/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{ asset('import/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <style>
        /* สีพื้นหลังของคอลัมน์ No */
        .data-table td:nth-child(1) {
            background-color: #ffffff;
            /* เปลี่ยนสีพื้นหลังเป็นสีเทาอ่อน */
        }

        /* สีข้อความของคอลัมน์ No */
        .data-table td:nth-child(3) {
            color: rgb(185, 0, 0);
            /* เปลี่ยนสีข้อความเป็นสีแดง */
        }

        .data-table td:nth-child(1) {
            color: rgb(0, 0, 0);
            /* เปลี่ยนสีข้อความเป็นสีแดง */
        }

        .data-table td {
            text-align: center;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @extends('layout')
        @section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">FR-MK-01</h1>
                <p class="mb-4">เอกสารสรุปยอดสั่งผลิต</p>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">วันที่ออกรายการ</label>
                        <input type="date" class="form-control" id="stm" name="stm">
                    </div>
                </div>



                <div id="result"></div>
                <!-- DataTales Example -->

                <div class="card shadow mb-4" id="success">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <button type="button" value="บันทึก" id="update"
                        class="btn btn-warning float-right">อัพเดทข้อมูล</button>
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">ตารางเอกสาร FR-MK-01</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th style="width: 10%">ลำดับ</th>
                                        <th style="width: 10%">เลือก</th>
                                        <th style="width: 10%">รหัสแบบ</th>
                                        <th style="width: 10%">แสดงเอกสาร</th>
                                        <th style="width: 10%">ชื่อลูกค้า</th>
                                        <th style="width: 20%">วันที่ออกรายการ</th>
                                        <th style="width: 20%">วิธีตัด</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="width: 10%">ลำดับ</th>
                                        <th style="width: 10%">เลือก</th>
                                        <th style="width: 10%">รหัสแบบ</th>
                                        <th style="width: 10%">แสดงเอกสาร</th>
                                        <th style="width: 10%">ชื่อลูกค้า</th>
                                        <th style="width: 20%">วันที่ออกรายการ</th>
                                        <th style="width: 20%">วิธีตัด</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
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
        <!-- jQuery -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('import/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('import/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('import/js/sb-admin-2.min.js') }}"></script>
        <!-- DataTables -->
        <script src="{{ asset('import/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('import/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Page level custom scripts -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>


    </html>

    <script>
        $(document).ready(function() {
            $('#update').click(function(event) {
                // ป้องกันการโหลดหน้าเว็บใหม่
                //   event.preventDefault();

                // รับค่าจาก multiple checkbox
                var selectedItems = [];
                $('input[name="check[]"]:checked').each(function() {
                    selectedItems.push($(this).val());
                });

                // รับค่าอื่น ๆ จาก input อื่น ๆ ได้ตามต้องการ
                var stm = $('input[name="stm"]').val();

                // ส่งข้อมูลโดยใช้ AJAX
                $.ajax({
                    type: 'POST',
                    url: "{{ route('update_date_doc01') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        check: selectedItems,
                        stm: stm
                    },
                    success: function(response) {
                        // การประมวลผลเมื่อสำเร็จ
                        if (response.success) {
                            Swal.fire({
                                title: "Good job!",
                                text: "{{ session('success') }}",
                                icon: "success",
                            }).then(() => {
                                // ทำการ redirect ไปยัง URL ที่ต้องการ
                                window.location.reload();
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        // การประมวลผลเมื่อเกิดข้อผิดพลาด
                        console.error(xhr.responseText);
                    }
                });

            });

        });


        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('doc01_edit.index', $index) }}",
                columns: [{
                        data: 'No',
                        name: 'No'
                    }, {
                        data: 'check',
                        name: 'check'
                    }, {
                        data: 'id_code',
                        name: 'id_code'
                    }, {
                        data: 'doc02',
                        name: 'doc02'
                    }, {
                        data: 'name_c',
                        name: 'name_c'
                    },
                    {
                        data: 'stm',
                        name: 'stm'
                    }, {
                        data: 'type',
                        name: 'type'
                    }
                ],
                drawCallback: function(settings) {
                    // เพิ่ม event listener สำหรับ checkbox ที่ถูกสร้างขึ้นใหม่หลังจาก DataTables โหลดข้อมูลเสร็จสิ้น
                    $('input[name="check[]"]').change(function() {
                        console.log('test2');
                        // สร้าง array เพื่อเก็บค่า checkbox ที่ถูกเลือก
                        var selectedItems = [];
                        // วน loop ผ่าน checkbox ที่ถูกเลือกและเพิ่มค่าเข้าไปใน array
                        $('input[name="check[]"]:checked').each(function() {
                            selectedItems.push($(this).val());
                        });
                        // แสดงค่าใน console log
                        console.log("ข้อมูลที่เลือก: " + selectedItems.join(", "));
                    });
                }
            });
        });
    </script>
@endsection
