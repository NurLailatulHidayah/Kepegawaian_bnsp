<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="../assets/img/logo.jfif">
  <!-- Vendors Style-->
  <link rel="stylesheet" href="../assets/css/vendors_css.css">

  <!-- Style-->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/skin_color.css">

  <!-- Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

  <!-- Data table -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
  <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <!-- Vendor JS -->
  <script src="../assets/js/vendors.min.js"></script>
  <script src="../assets/icons/feather-icons/feather.min.js"></script>
  <script src="../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>
  <script src="../assets/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
  <script src="../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>

  <!-- Sunny Admin App -->
  <script src="../assets/js/template.js"></script>
  <script src="../assets/js/pages/dashboard.js"></script>

  <!-- Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Jquery dan Data table -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Data pegawai -->
  <!-- <script src="../assets/js/pegawai.js"></script> -->

  <!-- @include('layout.style') -->

  <title>Kelola Data Pegawai</title>
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
  <div class="wrapper">

    <!-- Header Navbar -->
    <header class="main-header">
      @include('layout.header')
    </header>

    <!-- sidebar-->
    <aside class="main-sidebar">
      @include('layout.sidebar')
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="container-full">

        <!-- Main content -->
        <section class="content">
          <div class="container ">
            <div class="row">
              <div class="col-lg-12 margin-tb">
                <h2>Halaman Admin</h2>
              </div>
              <div class="pull-right mb-2">
                <a class="btn btn-success" onClick="add()" href="javascript:void(0)">Tambah Data</a>
              </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif
            <div class="table-responsive">
              <table class="table table-bordered" id="tambah-data">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Posisi Jabatan</th>
                    <th>Gaji</th>
                    <th>Tanggal Rekrutmen</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>

          <!-- Modal Tambah-->
          <div class="modal fade" id="pegawai-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Kepegawaian</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="javascript:void(0)" id="PegawaiForm" name="PegawaiForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama" maxlength="50" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-12">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" maxlength="50" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="posisi" class="col-sm-2 control-label">Posisi</label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Enter Posisi" maxlength="50" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="gaji" class="col-sm-2 control-label">Gaji</label>
                      <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" id="gaji" name="gaji" placeholder="Masukkan gaji" required="">
                      </div>
                      <div class="form-group">
                        <label for="tgl_rekrutmen" class=" control-label">Tanggal Rekrutmen</label>
                        <input type="date" class="form-control" id="tgl_rekrutmen" name="tgl_rekrutmen" placeholder="Masukkan tanggal rekrutmen" required="">
                      </div>
                      <div class="col-sm-offset-2 col-sm-10"><br />
                        <button type="submit" class="btn btn-primary" id="btn-save">Submit</button>
                      </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <!-- <button type="submit" class="btn btn-primary" id="btn-save">Submit</button> -->
                </div>
              </div>
            </div>
          </div>
          <!-- end Modal Tambah-->
        </section>
        <!-- /.content -->
      </div>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
      @include('layout.footer')
    </footer>
  </div>
  <!-- ./wrapper -->
  @include('layout.script')
  <script type="text/javascript">
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    });

    // $('#tambah-data').DataTable({
    //   processing: true,
    //   serverSide: true,
    //   ajax: "{{url('tambah-data')}}",
    //   columns: [{
    //       data: 'id',
    //       name: 'id'
    //     },
    //     {
    //       data: 'nama',
    //       name: 'nama'
    //     },
    //     {
    //       data: 'email',
    //       name: 'email'
    //     },
    //     {
    //       data: 'posisi',
    //       name: 'posisi'
    //     },
    //     {
    //       data: 'gaji',
    //       name: 'gaji'
    //     },
    //     {
    //       data: 'tgl_rekrutmen',
    //       name: 'tgl_rekrutmen'
    //     },
    //     {
    //       data: 'action',
    //       name: 'action',
    //       orderable: false
    //     },
    //   ],
    //   order: [
    //     [0, 'desc']
    //   ],
    // })

    function initializeDataTable() {
      console.log("Initializing DataTable");
      if ($.fn.DataTable.isDataTable('#tambah-data')) {
        $('#tambah-data').DataTable().destroy();
      }

      $('#tambah-data').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('tambah-data') }}",
        columns: [{
            data: 'id',
            name: 'id'
          },
          {
            data: 'nama',
            name: 'nama'
          },
          {
            data: 'email',
            name: 'email'
          },
          {
            data: 'posisi',
            name: 'posisi'
          },
          {
            data: 'gaji',
            name: 'gaji'
          },
          {
            data: 'tgl_rekrutmen',
            name: 'tgl_rekrutmen'
          },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            render: function(data, type, full, meta) {
              return `
              <div class="btn-group" role="group" aria-label="Employee Actions">
            <a href="javascript:void(0)" onClick="editFunc('${full.id}')" class="btn btn-success mx-2">Edit</a>
            <a href="javascript:void(0)" onClick="deleteFunc('${full.id}')" class="btn btn-danger mx-2">Delete</a>
            <a href="javascript:void(0)" onClick="detailFunc('${full.id}')" class="btn btn-info mx-2">Detail</a>
        </div>
                    `;
            }
          }
        ],
        order: [
          [0, 'desc']
        ],
      });
    }

    $(document).ready(function() {
      initializeDataTable();
    });


    function add() {
      $('#PegawaiForm').trigger("reset");
      $('#PegawaiModal').html("Add Pegawai");
      // $('#pegawai-modal').html("Add Pegawai");
      $('#pegawai-modal').modal('show');
      $('#id').val('');
    }

    // function editFunc(id) {
    //   $.ajax({
    //     type: "POST",
    //     url: "{{ url('edit') }}",
    //     data: {
    //       id: id
    //     },
    //     dataType: 'json',
    //     success: function(res) {
    //       $('#PegawaiModal').html("Edit Pegawai");
    //       $('#pegawai-modal').modal('show');
    //       $('#id').val(res.id);
    //       $('#nama').val(res.nama);
    //       $('#posisi').val(res.posisi);
    //       $('#email').val(res.email);
    //       $('#gaji').val(res.gaji);
    //       $('#tgl_rekrutmen').val(res.tgl_rekrutmen);
    //     }
    //   });
    // }
    function editFunc(id) {
      $.ajax({
        type: "POST",
        url: "{{ url('edit') }}",
        data: {
          id: id,
          _token: "{{ csrf_token() }}"
        },
        dataType: 'json',
        success: function(res) {
          $('#PegawaiModal').html("Edit Pegawai");
          $('#pegawai-modal').modal('show');
          $('#id').val(res.id);
          $('#nama').val(res.nama);
          $('#posisi').val(res.posisi);
          $('#email').val(res.email);
          $('#gaji').val(res.gaji);
          $('#tgl_rekrutmen').val(res.tgl_rekrutmen);
          // Swal.fire({
          //   title: 'Berhasil',
          //   text: 'Data berhasil diupdate',
          //   icon: 'success',
          //   confirmButtonText: 'OK'
          // });
        },
        error: function(xhr) {
          Swal.fire({
            title: 'Gagal',
            text: 'Terjadi kesalahan saat mengambil data',
            icon: 'error',
            confirmButtonText: 'OK'
          });
        }
      });
    }


    // function deleteFunc(id) {
    //   if (confirm("Delete Record?") == true) {
    //     var id = id;
    //     // ajax
    //     $.ajax({
    //       type: "POST",
    //       url: "{{ url('delete') }}",
    //       data: {
    //         id: id
    //       },
    //       dataType: 'json',
    //       success: function(res) {
    //         // var oTable = $('#tambah-data').dataTable();
    //         // oTable.fnDraw(false);
    //         Swal.fire({
    //           title: 'Anda yakin?',
    //           text: 'Data yang dihapus tidak dapat dikembalikan!',
    //           icon: 'warning',
    //           showCancelButton: true,
    //           confirmButtonColor: '#d33',
    //           cancelButtonColor: '#6c757d',
    //           confirmButtonText: 'Ya, hapus!',
    //           cancelButtonText: 'Batal'
    //         }).then((result) => {
    //           if (result.isConfirmed) {
    //             $.ajax({
    //               url: "{{ url('delete') }}",
    //               // type: "DELETE",
    //               data: {
    //                 dataHapus: dataHapus,
    //                 _token: "{{ csrf_token() }}"
    //                 // _method: "DELETE"
    //               },
    //               success: function(response) {
    //                 console.log(response);
    //                 $('#tambah-data').DataTable().ajax.reload();
    //                 Swal.fire({
    //                   title: 'Berhasil',
    //                   text: 'Data berhasil dihapus',
    //                   icon: 'success',
    //                   confirmButtonText: 'OK'
    //                 });
    //                 // tabel.ajax.reload();
    //               },
    //               error: function(xhr) {
    //                 console.log(xhr.responseJSON.message);
    //                 Swal.fire({
    //                   title: 'Gagal',
    //                   text: xhr.responseJSON.message,
    //                   icon: 'error',
    //                   confirmButtonText: 'OK'
    //                 });
    //               }
    //             });
    //           }
    //         });
    //       }
    //     });
    //   }
    // }
    function deleteFunc(id) {
      Swal.fire({
        title: 'Anda yakin?',
        text: 'Data yang dihapus tidak dapat dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "POST",
            url: "{{ url('delete') }}",
            data: {
              id: id
            },
            dataType: 'json',
            success: function(res) {
              $('#tambah-data').DataTable().ajax.reload();
              Swal.fire({
                title: 'Berhasil',
                text: 'Data berhasil dihapus',
                icon: 'success',
                confirmButtonText: 'OK'
              });
            },
            error: function(xhr) {
              console.log(xhr.responseJSON.message);
              Swal.fire({
                title: 'Gagal',
                text: xhr.responseJSON.message,
                icon: 'error',
                confirmButtonText: 'OK'
              });
            }
          });
        }
      });
    }

    function detailFunc(id) {
      $.ajax({
        type: "POST",
        url: "{{ url('detail') }}",
        data: {
          id: id,
          _token: "{{ csrf_token() }}"
        },
        dataType: 'json',
        success: function(res) {
          $('#id').val(res.id);
          $('#nama').val(res.nama);
          $('#email').val(res.email);
          $('#posisi').val(res.posisi);
          $('#gaji').val(res.gaji);
          $('#tgl_rekrutmen').val(res.tgl_rekrutmen);

          $('#pegawai-modal').modal('show');
          $('#pegawai-modal .modal-title').html("Detail Pegawai");
          $('#btn-save').hide(); // Sembunyikan tombol "Submit"
        },
        error: function(xhr) {
          console.log(xhr.responseJSON.message);
          Swal.fire({
            title: 'Gagal',
            text: 'Terjadi kesalahan saat mengambil data',
            icon: 'error',
            confirmButtonText: 'OK'
          });
        }
      });
    }


    $('#PegawaiForm').submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        type: 'POST',
        url: "{{url('store')}}",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
          $("#pegawai-modal").modal('hide');
          $('#tambah-data').DataTable().ajax.reload();
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Data Berhasil Ditambahkan",
            showConfirmButton: false,
            timer: 3000
          });
          // Swal.fire('Sukses!', 'Data berhasil ditambahkan.', 'success');
          // var oTable = $('#tambah-data').dataTable();
          // oTable.fnDraw(false);
          // $("#btn-save").html('Submit');
          // $("#btn-save").attr("disabled", false);
        },
        error: function(data) {
          // console.log(data);
          // Swal.fire('Error!', 'Terjadi kesalahan saat menambah data.', 'error');
          Swal.fire({
            position: "center",
            icon: "error",
            title: "Isi inputan dengan benar!",
            html: error.message
          });
          console.error('Terjadi kesalahan:', error);
        }
      });
    });
  </script>
</body>

</html>