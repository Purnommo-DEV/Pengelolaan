@extends('Manajemen.Layout.master', ['title' => 'Manajemen Pengguna'])
@section('konten')
    <div class="row mb-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-light btn-sm mt-1 mb-2 tambah-role"><i class="bi bi-plus"></i>
                        Tambah Role
                    </button>
                    <div class="modal fade text-left" id="modal-form" data-bs-backdrop="static" data-bs-keyboard="false"
                        aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content">
                                <form id="form-role-pengguna" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel33">Tambah Role</h5>
                                            <button type="button" class="btn-close text-dark batal" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group input-group-outline my-2">
                                                    <label class="form-label">Nama</label>
                                                    <input name="name" id="name" class="form-control"
                                                        type="text">
                                                    <div class="input-group has-validation">
                                                        <label
                                                            style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                            class="text-danger error-text name_error">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer"
                                        style="border-top: none!important;justify-content: flex-start;">
                                        <button type="button" class="btn btn-sm btn-primary batal">
                                            Cancel
                                        </button>

                                        <button type="submit" class="btn btn-sm btn-info btn-sm" name="action-button"
                                            id="action-button" value="Tambah">
                                            <i id="icon-action-button"></i>
                                            <span id="text-submit-port" class="d-sm-block">
                                                Submit</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered user_datatable">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th width="180px">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <div class="modal fade text-left" id="modal-form-edit" data-bs-backdrop="static"
                        data-bs-keyboard="false" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content">
                                <form id="form-edit-role-pengguna" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel33">Edit Pengguna</h5>
                                            <button type="button" class="btn-close text-dark batal" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group input-group-outline my-2">
                                                    <label class="form-label">Nama</label>
                                                    <input name="name_edit" id="name_edit" class="form-control"
                                                        type="text">
                                                    <div class="input-group has-validation">
                                                        <label
                                                            style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                            class="text-danger error-text name_edit_error">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="hidden_id" id="hidden_id" hidden>
                                    <div class="modal-footer"
                                        style="border-top: none!important;justify-content: flex-start;">
                                        <button type="button" class="btn btn-sm btn-primary batal">
                                            Cancel
                                        </button>

                                        <button type="submit" class="btn btn-sm btn-info btn-sm" name="action-button-edit"
                                            id="action-button-edit" value="Tambah">
                                            <i id="icon-action-button-edit"></i>
                                            <span id="text-submit-pengguna-edit" class="d-sm-block">
                                                Submit</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        var table = $('.user_datatable').DataTable({
            processing: true,
            serverSide: true,
            scrollX: "100%",
            sScrollXInner: "100%",
            bScrollCollapse: true,
            ajax: "{{ route('ManajemenPengguna.HalamanUser.Role') }}",
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'aksi',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('.batal').on('click', function() {
            $(document).find('label.error-text').text('');
            $("#form-ubah-port").trigger('reset');
            $('#modal-form').modal('hide');
            $('#modal-form-edit').modal('hide');
            $("#form-role-pengguna")[0].reset();
            $(".input-group-outline").removeClass("is-filled");
        });

        $('.tambah-role').on('click', function() {
            $('#action-button').val('Tambah');
            $('#action').val('Tambah');
            $("#modal-form").modal('show')
            $(".input-group-outline").removeClass("is-filled");
        });

        $(document).on('click', '.edit-role-pengguna', function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            $.ajax({
                url: "/data-role-pengguna/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                success: function(data) {
                    $('#name_edit').val(data.result.name);
                    $(".input-group-outline").addClass("is-filled");
                    $('#hidden_id').val(id);
                    $('#action-button').val('Perbarui');
                    $('#action').val('Edit');
                    $('#modal-form-edit').modal('show');
                },
                error: function(data) {
                    var errors = data.responseJSON;

                }
            })
        });

        $('#form-role-pengguna').on('submit', function(e) {
            e.preventDefault();
            var $search = $("#icon-action-button")
            $("#icon-action-button").addClass("fa fa-spinner fa-spin")
            $("#text-submit-port").html('')
            $("#action-button").prop('disabled', true);

            $.ajax({
                url: "{{ route('ProsesTambahRolePengguna') }}",
                method: "POST",
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $(document).find('label.error-text').text('');
                },
                success: function(data) {
                    if (data.status_form_kosong == 1) {
                        $.each(data.error, function(prefix, val) {
                            $("label." + prefix + '_error').text(val[0]);
                        });

                        $search.removeClass("fa fa-spinner fa-spin")
                        $("#text-submit-port").html(
                            '<span id="text-submit-port" class="d-sm-block">Submit</span>'
                        )
                        $("#action-button").prop('disabled', false);
                    } else if (data.status_berhasil == 1) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal
                                    .stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: data.msg
                        })
                        $search.removeClass("fa fa-spinner fa-spin")
                        $("#text-submit-port").html(
                            '<span id="text-submit-port" class="d-sm-block">Submit</span>'
                        )
                        $("#modal-form").modal('hide')
                        $("#form-role-pengguna")[0].reset();
                        $("#action-button").prop('disabled', false);
                        $(document).find('label.error-text').text('');
                        $(".input-group-outline").removeClass("is-filled");
                        table.draw();
                    }
                },
            });
        });

        $('#form-edit-role-pengguna').on('submit', function(e) {
            e.preventDefault();
            var $search = $("#icon-action-button-edit")
            $("#icon-action-button-edit").addClass("fa fa-spinner fa-spin")
            $("#text-submit-pengguna-edit").html('')
            $("#action-button-edit").prop('disabled', true);

            var id = $('#hidden_id').val();
            $.ajax({
                url: "/proses-edit-role-pengguna/" + id,
                method: "POST",
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $(document).find('label.error-text').text('');
                },
                success: function(data) {
                    if (data.status_form_kosong == 1) {
                        $.each(data.error, function(prefix, val) {
                            $("label." + prefix + '_error').text(val[0]);
                        });

                        $search.removeClass("fa fa-spinner fa-spin")
                        $("#text-submit-pengguna-edit").html(
                            '<span id="text-submit-pengguna-edit" class="d-sm-block">Submit</span>'
                        )
                        $("#action-button-edit").prop('disabled', false);
                    } else if (data.status_berhasil == 1) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal
                                    .stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: data.msg
                        })
                        $search.removeClass("fa fa-spinner fa-spin")
                        $("#text-submit-pengguna-edit").html(
                            '<span id="text-submit-pengguna-edit" class="d-sm-block">Submit</span>'
                        )
                        $("#modal-form-edit").modal('hide')
                        $("#form-edit-role-pengguna")[0].reset();
                        $("#action-button-edit").prop('disabled', false);
                        $(document).find('label.error-text').text('');
                        $(".input-group-outline").removeClass("is-filled");
                        table.draw();
                    }
                },
            });
        });

        $(document).on('click', '.hapus-pengguna', function(event) {
            var id = $(this).attr('id');

            Swal.fire({
                title: 'Yakin ingin mengahpus data ini?',
                icon: 'warning',
                showDenyButton: true,
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "/hapus-data-pengguna/" + id,
                        dataType: 'json',
                        success: function(data) {
                            if (data.status_berhasil_hapus == 1) {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal
                                            .stopTimer)
                                        toast.addEventListener('mouseleave', Swal
                                            .resumeTimer)
                                    }
                                })
                                Toast.fire({
                                        icon: 'success',
                                        title: data.msg
                                    }),
                                    table.draw();
                            }
                        }
                    });
                } else {
                    //alert ('no');
                    return false;
                }
            });
        });
    </script>
@endpush
