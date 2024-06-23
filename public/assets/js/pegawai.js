$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});

$("#tambah-data").DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{url('tambah-data')}}",
    columns: [
        {
            data: "id",
            name: "id",
        },
        {
            data: "nama",
            name: "nama",
        },
        {
            data: "email",
            name: "email",
        },
        {
            data: "posisi",
            name: "posisi",
        },
        {
            data: "gaji",
            name: "gaji",
        },
        {
            data: "tgl_rekrutmen",
            name: "tgl_rekrutmen",
        },
        {
            data: "action",
            name: "action",
            orderable: false,
            // render: function (data, type, row) {
            //     return `
            //   <a href="javascript:void(0)" data-toggle="tooltip" onClick="editFunc('${row.id}')" data-original-title="Edit" class="edit btn btn-success edit">
            //     Edit
            //   </a>
            //   <a href="javascript:void(0);" id="delete-compnay" onClick="deleteFunc('${row.id}')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
            //     Delete
            //   </a>
            // `;
            // },
        },
    ],
    order: [[0, "desc"]],
});

function add() {
    $("#PegawaiForm").trigger("reset");
    $("#PegawaiModal").html("Add Pegawai");
    $("#pegawai-modal").modal("show");
    $("#id").val("");
}

function editFunc(id) {
    $.ajax({
        type: "POST",
        url: "{{ url('edit') }}",
        data: {
            id: id,
        },
        dataType: "json",
        success: function (res) {
            $("#PegawaiModal").html("Edit Pegawai");
            $("#pegawai-modal").modal("show");
            $("#id").val(res.id);
            $("#nama").val(res.nama);
            $("#posisi").val(res.posisi);
            $("#email").val(res.email);
            $("#gaji").val(res.gaji);
            $("#tgl_rekrutmen").val(res.tgl_rekrutmen);
        },
    });
}

function deleteFunc(id) {
    if (confirm("Delete Record?") == true) {
        var id = id;
        // ajax
        $.ajax({
            type: "POST",
            url: "{{ url('delete') }}",
            data: {
                id: id,
            },
            dataType: "json",
            success: function (res) {
                // var oTable = $('#tambah-data').dataTable();
                // oTable.fnDraw(false);
                Swal.fire({
                    title: "Anda yakin?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('delete') }}",
                            // type: "DELETE",
                            data: {
                                dataHapus: dataHapus,
                                _token: "{{ csrf_token() }}",
                                // _method: "DELETE"
                            },
                            success: function (response) {
                                console.log(response);
                                Swal.fire({
                                    title: "Berhasil",
                                    text: "Data berhasil dihapus",
                                    icon: "success",
                                    confirmButtonText: "OK",
                                });
                                tabel.ajax.reload();
                            },
                            error: function (xhr) {
                                console.log(xhr.responseJSON.message);
                                Swal.fire({
                                    title: "Gagal",
                                    text: xhr.responseJSON.message,
                                    icon: "error",
                                    confirmButtonText: "OK",
                                });
                            },
                        });
                    }
                });
            },
        });
    }
}

$("#PegawaiForm").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: "{{url('store')}}",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            $("#pegawai-modal").modal("hide");
            $("#tambah-data").DataTable().ajax.reload();
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Data Berhasil Ditambahkan",
                showConfirmButton: false,
                timer: 3000,
            });
            // Swal.fire('Sukses!', 'Data berhasil ditambahkan.', 'success');
            // var oTable = $('#tambah-data').dataTable();
            // oTable.fnDraw(false);
            // $("#btn-save").html('Submit');
            // $("#btn-save").attr("disabled", false);
        },
        error: function (data) {
            // console.log(data);
            // Swal.fire('Error!', 'Terjadi kesalahan saat menambah data.', 'error');
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Isi inputan dengan benar!",
                html: error.message,
            });
            console.error("Terjadi kesalahan:", error);
        },
    });
});
