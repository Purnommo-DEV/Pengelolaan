@extends('Manajemen.Layout.master', ['title' => 'Manajemen Port'])
@section('konten')
    <div class="row mb-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-light btn-sm mt-1 mb-2 tambah-port"><i class="bi bi-plus"></i> Tambah
                        Port
                    </button>
                    <div class="modal fade text-left" id="modal-form" data-bs-backdrop="static" data-bs-keyboard="false"
                        aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel33">Port Management</h4>
                                    <button type="button" class="btn-close text-dark batal" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="form-port" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body" style="padding: 0.4rem !important;">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label class="form-label">Port Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group input-group-outline my-3">
                                                    <input name="port" id="port" class="form-control"
                                                        type="text">
                                                    <div class="input-group has-validation">
                                                        <label
                                                            style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                            class="text-danger error-text port_error">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="text" name="action" id="action" value="Tambah" />
                                    <input type="text" name="hidden_id" id="hidden_id" />

                                    <div class="modal-footer"
                                        style="border-top: none!important;justify-content: flex-start;">
                                        <button type="button" class="btn btn-sm btn-primary batal" data-bs-dismiss="modal">
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
                                <th>Port Name</th>
                                <th width="180px">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

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
            ajax: "{{ route('HalamanManajemenPort') }}",
            columns: [{
                    data: 'port',
                    port: 'port'
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
            $("#form-port").trigger('reset');
        });

        $('.tambah-port').on('click', function() {
            $('#action-button').val('Tambah');
            $('#action').val('Tambah');
            $("#modal-form").modal('show')
        });

        $(document).on('click', '.edit', function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            $.ajax({
                url: "/data-port/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                success: function(data) {
                    $('#port').val(data.result.port);
                    $('#hidden_id').val(id);
                    $('#action-button').val('Perbarui');
                    $('#action').val('Edit');
                    $('#modal-form').modal('show');
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    console.log(errors);
                }
            })
        });

        $('#form-port').on('submit', function(e) {
            e.preventDefault();
            var $search = $("#icon-action-button")
            $("#icon-action-button").addClass("fa fa-spinner fa-spin")
            $("#text-submit-port").html('')
            $("#action-button").prop('disabled', true);

            var action_url = '';

            $.ajax({
                url: "{{ route('ProsesTambahPort') }}",
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
                            $('label.' + prefix + '_error').text(val[0]);
                            // $('span.'+prefix+'_error').text(val[0]);
                        });
                        $search.removeClass("fa fa-spinner fa-spin")
                        $("#text-submit-port").html(
                            '<span id="text-submit-port" class="d-sm-block">Submit</span>'
                        )
                        $("#action-button").prop('disabled', false);
                    } else if (data.status_berhasil == 1) {
                        $("#form-port").trigger('reset');
                        $("#modal-form").modal('hide')
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
                        $("#action-button").prop('disabled', false);
                        $(document).find('label.error-text').text('');
                        table.draw();
                    }
                },
            });
        });
    </script>
@endpush
