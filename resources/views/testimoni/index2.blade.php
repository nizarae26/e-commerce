@extends('layout.app')

@section('title', 'Data testimoni')

@section('content')

<div class="card shadow">
    <div class="card-header">
        <h4 class="card-title">
            Data Testimoni
        </h4>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-4">
            <a href="#modal-form" class="btn btn-primary modal-tambah">Tambah Data</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Testimoni</th>
                        <th>Dekripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-form" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Testimoni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-testimoni">
                            <div class="form-group">
                                <label for="">Nama Testimoni</label>
                                <input type="text" class="form-control nama_testimoni" name="nama_testimoni" placeholder="Nama Testimoni" required>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="deskripsi" placeholder="Deskripsi" class="form-control deskripsi" id="" cols="30" rows="10" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" class="form-control" name="gambar">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@foreach($testimonis as $tst)
<div class="modal fade" id="modal-edit{{ $tst->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="/testimoni/{{ $tst->id }}/update" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Testimoni</label>
                                <input type="text" class="form-control" name="nama_testimoni" value="{{$tst->nama_testimoni}}" placeholder="Nama kategori" required>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <input type="" name="deskripsi" value="{{$tst->deskripsi}}" placeholder="Deskripsi" class="form-control" id="" cols="30" rows="10" required></input>
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" class="form-control" name="gambar">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@push('js')
<script>
    //     window.Laravel = {
    //     csrfToken: '{{csrf_token()}}'
    // }

    $(function() {

        $.ajax({
            url: 'api/testimonis',
            success: function({
                data
            }) {

                let row;
                data.map(function(val, index) {
                    row += `
                        <tr>
                            <td>${index+1}</td>
                            <td>${val.nama_testimoni}</td>
                            <td>${val.deskripsi}</td>
                            <td><img src="/uploads/${val.gambar}" width="150"</td>
                            <td>
                                <a data-toggle="modal" data-target="#modal-edit${val.id}" class="btn btn-warning">Edit</a>
                                <a href="#" data-id="${val.id}" class="btn btn-danger btn-hapus">Hapus</a>
                            </td>
                        </tr>
                        `;
                });

                $('tbody').append(row)
            }
        });

        $(document).on('click', '.btn-hapus', function() {
            const id = $(this).data('id')
            const token = localStorage.getItem('token')

            confirm_dialog = confirm('Apakah anda yakin?');

            if (confirm_dialog) {
                $.ajax({

                    url: 'api/testimonis/' + id,
                    type: "DELETE",
                    headers: {
                        "Authorization": token
                    },
                    success: function(data) {
                        if (data.message == 'success') {
                            alert('Data Berhasil Dihapus')
                        }
                        location.reload()
                    }
                });
            }
        });

        // $(document).on('click', '.btn-primary', function(){
        $('.modal-tambah').click(function() {
            $('#modal-form').modal('show')

            $('.form-testimoni').submit(function(e) {
                e.preventDefault();

                const token = localStorage.getItem('token')

                const frmdata = new FormData(this);


                $.ajax({
                    url: 'api/testimonis',
                    type: 'POST',
                    data: frmdata,
                    cache: false,
                    contentType: false,
                    processData: false,

                    headers: {
                        "Authorization": 'Bearer ' + token
                    },
                    success: function(data) {
                        if (data.success) {
                            alert('Data Berhasil Ditambah')
                            location.reload()
                        }
                    }
                });

            });


            // $(document).on('click', '.modal-ubah', function() {
            //     $('#modal-form').modal('show')

            //     const id = $(this).data(id);

            //     $.get('api/categories/' + id, function({
            //         data
            //     }) {
            //         $(".nama_kategori").val(data.nama_kategori);
            //         $(".deskripsi").val(data.deskripsi);
            //         $(".gambar").val(data.gambar);
            //     });

            //     $('.form-kategori').submit(function(e) {
            //         e.preventDefault();

            //         const token = localStorage.getItem('token')

            //         const frmdata = new FormData(this);


            //         $.ajax({
            //             url: `api/categories/${id}?_method=PUT`,
            //             type: 'POST',
            //             data: frmdata,
            //             cache: false,
            //             contentType: false,
            //             processData: false,

            //             headers: {
            //                 "Authorization": 'Bearer ' + token
            //             },
            //             success: function(data) {
            //                 if (data.success) {
            //                     alert('Data Berhasil Diubah')
            //                     location.reload()
            //                 }
            //             }
            //         });

            //     });



            // });



        });
    });
</script>
@endpush