<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ Storage::url('images/logo_color.png') }}" type="image/x-icon">
    <title>รายชื่อลูกค้า</title>
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
            <!-- Sidebar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">รายชื่อลูกค้า</h1>
                <p class="mb-4">ตารางแสดงรายการชื่อลูกค้า บริษัท รุ่งเกษมบัสคาร์ (RKS)</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">รายชื่อลูกค้า</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th style="width:20% ">ชื่อ</th>
                                        <th style="width:5%; ">จำนวนรายการ</th>
                                        <th style="width:5%; ">แสดงรายการ</th>
                                        <th style="width:25%;text-align: center; ">อีเมล์</th>
                                        <th style="width:20%;text-align: center; ">เบอร์โทรศัพท์</th>
                                        <th style="width:30% ">ที่อยู่</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อ</th>
                                        <th>จำนวนรายการ</th>
                                        <th style="width:5%; ">แสดงรายการ</th>
                                        <th style="width:20%;text-align: center; ">อีเมล์</th>
                                        <th style="width:20%;text-align: center; ">เบอร์โทรศัพท์</th>
                                        <th>ที่อยู่</th>

                                    </tr>
                                </tfoot>
                                <tbody>

                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td style="width:10%;text-align: center; color:red; ">{{ $item->cnt_order }}
                                            <td style="width:15%"><a class="btn  btn-info btn-sm btn-block" target="_blank"
                                                    href="   " data-id=""> <i class="far fa-file-pdf"
                                                        style="font-size:20px;color:red"></i>
                                                    แสดงข้อมูล</a></td>

                                            </td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->adress }}</td>


                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
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
                    <span>Copyright &copy; Your Website 2020</span>
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
        <script src="{{ asset('import/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('import/js/sb-admin-2.min.js') }}"></script>
        <script src="{{ asset('import/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('import/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('import/js/demo/datatables-demo.js') }}"></script>

    </body>
@endsection

</html>
