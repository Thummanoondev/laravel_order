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
    <title>SB Admin 2 - Tables</title>
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
            background-color: #26ab6b;
            /* เปลี่ยนสีพื้นหลังเป็นสีเทาอ่อน */
        }

        /* สีข้อความของคอลัมน์ No */
        .data-table td:nth-child(1) {
            color: rgb(0, 0, 0);
            /* เปลี่ยนสีข้อความเป็นสีแดง */
        }

        .data-table th:nth-child(2),
        .data-table td:nth-child(2),
        .data-table th:nth-child(3),
        .data-table td:nth-child(3) {
            text-align: center;
            ;
            /* เปลี่ยนสีพื้นหลัง */
            color: rgb(0, 0, 0);
            /* เปลี่ยนสีข้อความ */
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
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">ตารางเอกสาร FR-MK-01</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th style="width: 10%">No</th>
                                        <th style="width: 20%">รายละเอียด</th>
                                        <th style="width: 20%">จำนวนรายการ</th>
                                        <th style="width: 20%">แสดงรายละเอียด</th>
                                        <th style="width: 15%">แก้ไขเอกสาร</th>
                                        <th style="width: 15%">ปุ่มลบ</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>รายละเอียด</th>
                                        <th>จำนวนรายการ</th>
                                        <th>แสดงรายละเอียด</th>
                                        <th>แก้ไขเอกสาร</th>
                                        <th>ปุ่มลบ</th>
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

    </body>


    </html>
    <script>
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('doc01.index') }}",
                columns: [{
                        data: 'No',
                        name: 'No'
                    },
                    {
                        data: 'timestp',
                        name: 'timestp  '
                    },
                    {
                        data: 'stm_count',
                        name: 'stm_count'
                    },
                    {
                        data: 'doc',
                        name: 'doc'

                    },
                    {
                        data: 'edit',
                        name: 'edit'

                    },
                    {
                        data: 'del',
                        name: 'del'
                    }
                ]
            });
        });
    </script>
@endsection
