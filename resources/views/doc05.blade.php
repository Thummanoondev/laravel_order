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
    <title>Order RKS</title>
    <!-- Custom fonts for this template -->


    <link href="{{ asset('import/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('import/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{ asset('import/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @extends('layout')
        @section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">FR MK 05</h1>
                <p class="mb-4">เอกสารใบสั่งผลิตสินค้า FR MK 05 </p>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">รายการเอกสาร FR_MK_05</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th style="width:20%">ลำดับรายการ</th>
                                        <th style="width:20% ;width: 100px; text-align: center;">รายการวันที่</th>
                                        <th style="width:10%">จำนวนรายการ</th>
                                        <th style="width:20%">แสดงรายการ</th>
                                        <th style="width:20%">แก้ไขรายการ</th>
                                        <th style="width:10">ลบรายการ</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="width:20%">ลำดับรายการ</th>
                                        <th style="width:20% ;width: 100px; text-align: center;">รายการวันที่</th>
                                        <th style="width:10%">จำนวนรายการ</th>
                                        <th style="width:20%">แสดงรายการ</th>
                                        <th style="width:20%">แก้ไขรายการ</th>
                                        <th style="width:10">ลบรายการ</th>
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
                ajax: "{{ route('doc05.index') }}", // URL ของเราที่เรากำหนดใน Controller Laravel
                columns: [{
                        data: 'No',
                        name: 'No'
                    }, // ใช้คอลัมน์ 'id' ที่เราได้ระบุไว้ใน Controller
                    {
                        data: 'timestp',
                        name: 'timestp'

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
                        name: 'del',

                    }
                ]
            });
        });
    </script>
@endsection
