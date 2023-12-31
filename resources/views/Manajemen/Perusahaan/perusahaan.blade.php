@extends('Manajemen.Layout.master', ['title' => 'Manajemen Port'])
@section('konten')
    <div class="row mb-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-light btn-sm mt-1 mb-2 tambah-perusahaan"><i class="bi bi-plus"></i>
                        Tambah
                        Perusahaan
                    </button>
                    <div class="modal fade text-left" id="modal-form" data-bs-backdrop="static" data-bs-keyboard="false"
                        aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <form id="form-perusahaan" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel33">Informasi Perusahaan</h5>
                                            <button type="button" class="btn-close text-dark batal" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label class="form-label">Nama Perusahaan</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group input-group-outline my-3">
                                                    <input name="nama_perusahaan" id="nama_perusahaan" class="form-control"
                                                        type="text">
                                                    <div class="input-group has-validation">
                                                        <label
                                                            style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                            class="text-danger error-text namaperusahaan_error">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label class="form-label">Kode Perusahaan</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group input-group-outline my-3">
                                                    <input name="kode_perusahaan" id="kode_perusahaan" class="form-control"
                                                        type="text">
                                                    <div class="input-group has-validation">
                                                        <label
                                                            style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                            class="text-danger error-text kodeperusahaan_error">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label class="form-label">SIUP</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group input-group-outline my-3">
                                                    <input name="siup" id="siup" class="form-control"
                                                        type="text">
                                                    <div class="input-group has-validation">
                                                        <label
                                                            style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                            class="text-danger error-text siup_error">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label class="form-label">NPWP</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group input-group-outline my-3">
                                                    <input name="npwp" id="npwp" class="form-control"
                                                        type="text">
                                                    <div class="input-group has-validation">
                                                        <label
                                                            style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                            class="text-danger error-text npwp_error">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label class="form-label">Contact Person</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group input-group-outline my-3">
                                                    <input name="cp" id="cp" class="form-control"
                                                        type="text">
                                                    <div class="input-group has-validation">
                                                        <label
                                                            style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                            class="text-danger error-text cp_error">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label class="form-label">Phone</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group input-group-outline my-3">
                                                    <input name="phone" id="phone" class="form-control"
                                                        type="text">
                                                    <div class="input-group has-validation">
                                                        <label
                                                            style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                            class="text-danger error-text phone_error">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label class="form-label">Email</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group input-group-outline my-3">
                                                    <input name="email[]" id="email" class="form-control"
                                                        type="text">
                                                    <div class="input-group has-validation">
                                                        <label
                                                            style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                            class="text-danger error-text email0_error">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 my-3 d-flex align-items-end justify-content-evenly">
                                                <button type="button" name="add" id="add"
                                                    class="btn btn-outline-secondary">+</button>
                                            </div>
                                            <div id="dynamic_field">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="input-group input-group-outline my-3">
                                                    <label class="form-label">Alamat</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group input-group-outline my-3">
                                                    <textarea name="alamat" id="alamat" class="form-control"> </textarea>
                                                    <div class="input-group has-validation">
                                                        <label
                                                            style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                            class="text-danger error-text alamat_error">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel33">Freight</h5>
                                        </div>

                                        <div id="dynamic_freight">
                                            <div class="row my-2">
                                                <div class="col-md-4">
                                                    <label for="exampleDataList" class="form-label">Port of
                                                        Loading</label>
                                                    <div class="input-group input-group-outline">
                                                        <select name="port_loading[]" class="form-control"
                                                            id="port_loading">
                                                            <option></option>
                                                            @foreach ($data_port as $port)
                                                                <option value="{{ $port->id }}">{{ $port->port }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group has-validation">
                                                            <label
                                                                style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                                class="text-danger error-text portloading0_error">
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleDataList" class="form-label">Port of
                                                        Discharge</label>
                                                    <div class="input-group input-group-outline">
                                                        <select name="port_discharge[]" class="form-control"
                                                            id="port_discharge">
                                                            <option></option>
                                                            @foreach ($data_port as $port)
                                                                <option value="{{ $port->id }}">{{ $port->port }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group has-validation">
                                                            <label
                                                                style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                                class="text-danger error-text portdischarge0_error">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="exampleDataList" class="form-label">Freight</label>
                                                    <div class="input-group input-group-outline">
                                                        <input class="form-control" name="freight[]"
                                                            placeholder="Input Freight">
                                                        <div class="input-group has-validation">
                                                            <label
                                                                style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                                class="text-danger error-text freight0_error">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <label for="exampleDataList" class="form-label">Action</label>
                                                    <button class="btn btn-sm btn-outline-info btn-add-freight">+</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="dynamic_kargo"></div>

                                    </div>

                                    {{-- <input type="text" name="action" id="action" value="Tambah" />
                                    <input type="text" name="hidden_id" id="hidden_id" /> --}}

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
                                <th>Nama Perusahaan</th>
                                <th>Kode Perusahaan</th>
                                <th>Email</th>
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
        $('#port_loading').select2({
            theme: 'bootstrap-5',
            placeholder: "-- Select Port of Loading --",
            dropdownParent: $("#port_loading").parent()
        });

        $("#port_discharge").select2({
            theme: "bootstrap-5",
            placeholder: "-- Select Port of Loading --",
            dropdownParent: $("#port_discharge").parent()
        });

        var r = 0;
        $('.btn-add-freight').on('click', function(e) {
            e.preventDefault();
            r++;
            var template = '<div class="row my-2" id="freight"> \n ' +
                '<div class="col-md-4">\n' +
                '<label for="exampleDataList" class="form-label">Port of Loading</label>\n' +
                '<div class="input-group input-group-outline">\n' +
                '<select name="port_loading[]" class="form-control" id="port_loading' + r + '">\n' +
                '<option></option>\n' +
                '@foreach ($data_port as $port)\n' +
                '<option value="{{ $port->id }}">{{ $port->port }}</option>\n' +
                '@endforeach\n' +
                '</select>\n' +
                '<div class="input-group has-validation">\n' +
                '<label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;" class="text-danger error-text portloading' +
                r + '_error">\n' +
                '</label>\n' +
                '</div>\n' +
                '</div>\n' +
                '</div>\n' +
                '<div class="col-md-4">\n' +
                '<label for="exampleDataList" class="form-label">Port of Discharge</label>\n' +
                '<div class="input-group input-group-outline">\n' +
                '<select name="port_discharge[]" class="form-control" id="port_discharge' + r + '">\n' +
                '<option></option>\n' +
                '@foreach ($data_port as $port)\n' +
                '<option value="{{ $port->id }}">{{ $port->port }}</option>\n' +
                '@endforeach>\n' +
                '</select>\n' +
                '</select>\n' +
                '<div class="input-group has-validation">\n' +
                '<label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;" class="text-danger error-text portdischarge' +
                r + '_error">\n' +
                '</label>\n' +
                '</div>\n' +
                '</div>\n' +
                '</div>\n' +
                '<div class="col-md-3">\n' +
                '<label for="exampleDataList" class="form-label">Freight</label>\n' +
                '<div class="input-group input-group-outline">\n' +
                '<input class="form-control" name="freight[]" placeholder="Input Freight">\n' +
                '<div class="input-group has-validation">\n' +
                '<label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;" class="text-danger error-text freight' +
                r + '_error">\n' +
                '</label>\n' +
                '</div>\n' +
                '</div>\n' +
                '</div>\n' +
                '<div class="col-md-1">\n' +
                '<label for="exampleDataList" class="form-label">Action</label>\n' +
                '<button class="btn btn-sm btn-outline-danger btn-remove-freight">-</button>\n' +
                '</div>\n' +
                '</div>\n';
            $("#dynamic_kargo").before(template);
            $("#port_loading" + r).select2({
                theme: 'bootstrap-5',
                placeholder: "-- Select Port of Loading --",
                dropdownParent: $("#port_loading" + r).parent()
            });
            $("#port_discharge" + r).select2({
                theme: 'bootstrap-5',
                placeholder: "-- Select Port of Discharge --",
                dropdownParent: $("#port_discharge" + r).parent()
            });
        });

        $(document).on('click', '.btn-remove-freight', function(e) {
            e.preventDefault();
            $('#freight').remove();
        });

        var e = 0;
        $('#add').click(function() {
            ++e;
            $('#dynamic_field').append('<div class = "row dynamic-added" id="row' + e +
                '"><div class="col-md-3"><div class="input-group input-group-outline my-3"></div></div> <div class="col-md-6" ><div class="input-group input-group-outline my-3" > <input name="email[]" id = "email" class="form-control" type="text"><div class="input-group has-validation"> <label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;" class="text-danger error-text email' +
                e +
                '_error"></label></div ></div></div> <div class="col-md-3 my-3 d-flex align-items-end justify-content-evenly"><button type ="button" class="btn btn-outline-primary btn_remove" name = "remove" id = "' +
                e + '" >-</button> </div></div>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            --e;
        });

        var table = $('.user_datatable').DataTable({
            processing: true,
            serverSide: true,
            scrollX: "100%",
            sScrollXInner: "100%",
            bScrollCollapse: true,
            ajax: "{{ route('HalamanManajemenPerusahaan') }}",
            columns: [{
                    data: 'nama_perusahaan',
                    perusahaan: 'nama_perusahaan'
                }, {
                    data: 'kode_perusahaan',
                    perusahaan: 'kode_perusahaan'
                },
                {
                    data: 'email',
                    perusahaan: 'email'
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
            $("#form-perusahaan")[0].reset();
        });

        $('.tambah-perusahaan').on('click', function() {
            $('#action-button').val('Tambah');
            $('#action').val('Tambah');
            $("#modal-form").modal('show')
        });

        $(document).on('click', '.edit', function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            $.ajax({
                url: "/data-perusahaan/" + id,
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

                }
            })
        });

        $('#form-perusahaan').on('submit', function(e) {
            e.preventDefault();
            var $search = $("#icon-action-button")
            $("#icon-action-button").addClass("fa fa-spinner fa-spin")
            $("#text-submit-port").html('')
            $("#action-button").prop('disabled', true);

            var action_url = '';

            $.ajax({
                url: "{{ route('ProsesTambahPerusahaan') }}",
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
                            var str = prefix.replace(/[_\W]+/g, "");
                            $("label." + str + '_error').text(val[0]);
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
                        $("#form-perusahaan")[0].reset();
                        $("#action-button").prop('disabled', false);
                        $(document).find('label.error-text').text('');
                        table.draw();
                    }
                },
            });
        });

        $(document).on('click', '.hapus-perusahaan', function(event) {
            var id = $(this).attr('id');

            Swal.fire({
                title: 'Yakin ingin mengahpus data ini?',
                icon: 'warning',
                showDenyButton: true,
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "/hapus-data-perusahaan/" + id,
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
