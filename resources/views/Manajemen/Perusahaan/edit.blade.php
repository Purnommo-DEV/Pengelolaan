@extends('Manajemen.Layout.master', ['title' => 'Edit Perusahaan'])
@section('konten')
    <div class="row mb-4" id="edit-perusahaan">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-body">
                    <form id="form-perusahaan" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel33"> Informasi Perusahaan</h5>
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
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <input name="nama_perusahaan" value="{{ $data_perusahaan->nama_perusahaan }}"
                                            id="nama_perusahaan" class="form-control" type="text">
                                        <div class="input-group has-validation">
                                            <label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
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
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <input name="kode_perusahaan" value="{{ $data_perusahaan->kode_perusahaan }}"
                                            class="form-control" type="text">
                                        <div class="input-group has-validation">
                                            <label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
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
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <input name="siup" value="{{ $data_perusahaan->siup }}" class="form-control"
                                            type="text">
                                        <div class="input-group has-validation">
                                            <label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
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
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <input name="npwp" value="{{ $data_perusahaan->npwp }}" class="form-control"
                                            type="text">
                                        <div class="input-group has-validation">
                                            <label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
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
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <input name="cp" value="{{ $data_perusahaan->cp }}" class="form-control"
                                            type="text">
                                        <div class="input-group has-validation">
                                            <label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                class="text-danger error-text cp_error">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-2">
                                        <label class="form-label">Phone</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-2">
                                        <input name="phone" value="{{ $data_perusahaan->phone }}" class="form-control"
                                            type="text">
                                        <div class="input-group has-validation">
                                            <label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                class="text-danger error-text phone_error">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @foreach ($data_email as $emails)
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="input-group input-group-outline my-2">
                                            <label class="form-label">
                                                @if ($loop->index == 0)
                                                    Email
                                                @endif
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group input-group-outline my-2">
                                            <input type="hidden" name="email_id[]" value="{{ $emails->id }}" hidden>
                                            <input value="{{ $emails->email }}" name="email_edit[]" class="form-control"
                                                type="text">
                                            <div class="input-group has-validation">
                                                <label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                    class="text-danger error-text email_edit_error">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2">
                                        <button type="button" id="{{ $emails->id }}"
                                            class="btn btn-sm btn-outline-primary hapus_email">-</button>
                                    </div>
                                </div>
                            @endforeach

                            <div class="row">
                                <div id="dynamic_fields">
                                </div>
                                <div class="col-md-10 my-2 d-flex align-items-end justify-content-evenly">
                                    <button type="button" name="add" id="adds"
                                        class="btn btn-sm btn-outline-secondary">+</button>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-2">
                                        <label class="form-label">Alamat</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-2">
                                        <textarea name="alamat" class="form-control">{{ $data_perusahaan->alamat }}</textarea>
                                        <div class="input-group has-validation">
                                            <label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                class="text-danger error-text alamat_error">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel33">Freight</h5>
                            </div>



                            @foreach ($data_kargo as $kargo)
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="exampleDataList" class="form-label">Port of
                                            Loading</label>
                                        <div class="input-group input-group-outline">
                                            <input type="hidden" name="kargo_id[]" value="{{ $kargo->id }}" hidden>
                                            <select name="port_loading_edit[]" class="form-control"
                                                id="port_loading_edit{{ $loop->index }}">
                                                <option></option>
                                                @foreach ($data_port as $port)
                                                    <option value="{{ $port->id }}"
                                                        @if ($port->id == $kargo->port_loading) @selected(true) @endif>
                                                        {{ $port->port }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="input-group has-validation">
                                                <label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                    class="text-danger error-text portloadingedit_error">
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleDataList" class="form-label">Port of
                                            Discharge</label>
                                        <div class="input-group input-group-outline">
                                            <select name="port_discharge_edit[]" class="form-control"
                                                id="port_discharge_edit{{ $loop->index }}">
                                                <option></option>
                                                @foreach ($data_port as $port)
                                                    <option value="{{ $port->id }}"
                                                        @if ($port->id == $kargo->port_discharge) @selected(true) @endif>
                                                        {{ $port->port }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="input-group has-validation">
                                                <label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                    class="text-danger error-text portdischargeedit_error">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleDataList" class="form-label">Freight</label>
                                        <div class="input-group input-group-outline">
                                            <input class="form-control" value="{{ $kargo->freight }}"
                                                name="freight_edit[]" placeholder="Input Freight">
                                            <div class="input-group has-validation">
                                                <label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;"
                                                    class="text-danger error-text freightedit_error">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="exampleDataList" class="form-label">Action</label>

                                        <button type="button" id="{{ $kargo->id }}"
                                            class="btn btn-sm btn-outline-primary hapus_kargo">-</button>
                                    </div>
                                </div>
                            @endforeach

                            <div id="dynamic_kargo">
                                <button class="btn btn-sm btn-outline-info btn-add-freight">+</button>
                            </div>

                        </div>


                        <div class="modal-footer" style="border-top: none!important;justify-content: flex-start;">
                            <a href="{{ route('ManajemenPerusahaan.HalamanManajemenPerusahaan') }}"
                                style="margin-right: 5px;" class="btn btn-sm btn-primary">
                                Cancel
                            </a>

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
    </div>
@endsection
@push('script')
    <script>
        var kargo = @json($data_kargo);

        for (i = 0; i < kargo.length; i++) {
            $('#port_loading_edit' + i).select2({
                theme: 'bootstrap-5',
                placeholder: "-- Select Port of Loading --",
                dropdownParent: $("#port_loading_edit" + i).parent()
            });

            $("#port_discharge_edit" + i).select2({
                theme: "bootstrap-5",
                placeholder: "-- Select Port of Loading --",
                dropdownParent: $("#port_discharge_edit" + i).parent()
            });
        }

        var r = -1;
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

        var es = -1;
        $('#adds').click(function() {
            ++es;
            $('#dynamic_fields').append('<div class = "row dynamic-added" id="row' + es +
                '"><div class="col-md-3"><div class="input-group input-group-outline my-3"></div></div> <div class="col-md-4" ><div class="input-group input-group-outline my-3" > <input name="email[]" id = "email" class="form-control" type="text"><div class="input-group has-validation"> <label style="margin-top: 0.1rem; font-size: 0.8rem; font-weight: 600;" class="text-danger error-text email' +
                es +
                '_error"></label></div ></div></div> <div class="col-md-3 my-3 d-flex align-items-end"><button type ="button" class="btn btn-sm btn-outline-primary btn_remove" name = "remove" id = "' +
                es + '" >-</button> </div></div>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            --es;
        });


        var url = @json($data_perusahaan->url);
        $('#form-perusahaan').on('submit', function(e) {
            e.preventDefault();
            var $search = $("#icon-action-button")
            $("#icon-action-button").addClass("fa fa-spinner fa-spin")
            $("#text-submit-port").html('')
            $("#action-button").prop('disabled', true);

            $.ajax({
                url: "/proses-edit-data-perusahaan/" + url,
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
                        location.reload();
                    }
                },
            });
        });

        $(document).on('click', '.hapus_email', function(event) {
            var id = $(this).attr('id');

            Swal.fire({
                title: 'Yakin ingin mengahpus data ini?',
                icon: 'warning',
                showDenyButton: true,
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "/hapus-email-data-perusahaan/" + id,
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
                                    $("#edit-perusahaan").load(location.href +
                                        " #edit-perusahaan>*", "");
                            }
                        }
                    });
                } else {
                    //alert ('no');
                    return false;
                }
            });
        });

        $(document).on('click', '.hapus_kargo', function(event) {
            var id = $(this).attr('id');

            Swal.fire({
                title: 'Yakin ingin mengahpus data ini?',
                icon: 'warning',
                showDenyButton: true,
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "/hapus-kargo-data-perusahaan/" + id,
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
                                    // $("#edit-perusahaan").load(location.href +
                                    //     " #edit-perusahaan>*", "");
                                    location.reload();
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
