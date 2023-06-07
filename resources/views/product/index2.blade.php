@extends('layout.app')

@section('title', 'Data Product')

@section('content')

<div class="card shadow">
    <div class="card-header">
        <h4 class="card-title">
            Data Kategori
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
                        <th>Kategori</th>
                        <th>Subkategori</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th>Bahan</th>
                        <th>SKU</th>
                        <th>Ukuran</th>
                        <th>Warna</th>
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
                <h5 class="modal-title">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-produk">
                            <div class="form-group">
                                <label for="" >Kategori</label>
                                <select name="id_kategori" id="id_kategori" class="form-control id_kategori">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->nama_kategori}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" >Sub Kategori</label>
                                <select name="id_subkategori" id="id_subkategori" class="form-control id_subkategori">
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}">{{$subcategory->nama_subkategori}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <input type="text" class="form-control nama_barang" name="nama_barang" placeholder="Nama barang" required>
                            </div>
                            <div class="form-group">
                                <label for="" >Harga</label>
                                <input type="number" class="form-control harga" name="harga" placeholder="Harga">
                            </div>
                            <div class="form-group">
                                <label for="" >Diskon</label>
                                <input type="text" class="form-control diskon" name="diskon" placeholder="Diskon">
                            </div>
                            <div class="form-group">
                                <label for="" >Bahan</label>
                                <input type="text" class="form-control bahan" name="bahan" placeholder="Bahan">
                            </div>
                            <div class="form-group">
                                <label for="" >Tags</label>
                                <input type="text" class="form-control tags" name="tags" placeholder="Tags">
                            </div>
                            <div class="form-group">
                                <label for="" >SKU</label>
                                <input type="text" class="form-control sku" name="sku" placeholder="SKU">
                            </div>
                            <div class="form-group">
                                <label for="" >Ukuran</label>
                                <input type="text" class="form-control ukuran" name="ukuran" placeholder="Ukuran">
                            </div>
                            <div class="form-group">
                                <label for="" >Warna</label>
                                <input type="text" class="form-control warna" name="warna" placeholder="Warna">
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

@foreach($products as $pr)
<div class="modal fade" id="modal-edit{{ $pr->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="/barang/{{ $pr->id }}/update" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="" >Kategori</label>
                                <select name="id_kategori" id="id_kategori" class="form-control" ">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->nama_kategori}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" >Sub Kategori</label>
                                <select name="id_subkategori" id="id_subkategori" class="form-control">
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}">{{$subcategory->nama_subkategori}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" value="{{$pr->nama_barang}}" placeholder="Nama barang" required>
                            </div>
                            <div class="form-group">
                                <label for="" >Harga</label>
                                <input type="number" class="form-control " name="harga" value="{{$pr->harga}}" placeholder="Harga">
                            </div>
                            <div class="form-group">
                                <label for="" >Diskon</label>
                                <input type="text" class="form-control " name="diskon" value="{{$pr->diskon}}" placeholder="Diskon">
                            </div>
                            <div class="form-group">
                                <label for="" >Bahan</label>
                                <input type="text" class="form-control " name="bahan" value="{{$pr->bahan}}" placeholder="Bahan">
                            </div>
                            <div class="form-group">
                                <label for="" >Tags</label>
                                <input type="text" class="form-control " name="tags" value="{{$pr->tags}}" placeholder="Tags">
                            </div>
                            <div class="form-group">
                                <label for="" >SKU</label>
                                <input type="text" class="form-control " name="sku" value="{{$pr->sku}}" placeholder="SKU">
                            </div>
                            <div class="form-group">
                                <label for="" >Ukuran</label>
                                <input type="text" class="form-control " name="ukuran" value="{{$pr->ukuran}}" placeholder="Ukuran">
                            </div>
                            <div class="form-group">
                                <label for="" >Warna</label>
                                <input type="text" class="form-control " name="warna" value="{{$pr->warna}}" placeholder="Warna">
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <input type="" name="deskripsi" value="{{$pr->deskripsi}}" placeholder="Deskripsi" class="form-control" id="" cols="30" rows="10" required></input>
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
            url: 'api/products',
            success: function({
                data
            }) {

                let row;
                    data.map(function (val, index) {
                        row += `
                        <tr>
                            <td>${index+1}</td>
                            <td>${val.category?.nama_kategori}</td>
                            <td>${val.subcategory?.nama_subkategori}</td>
                            <td>${val.nama_barang}</td>
                            <td>${val.harga}</td>
                            <td>${val.diskon}</td>
                            <td>${val.bahan}</td>
                            <td>${val.sku}</td>
                            <td>${val.ukuran}</td>
                            <td>${val.warna}</td>
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

                    url: 'api/products/' + id,
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

            $('.form-kategori').submit(function(e) {
                e.preventDefault();

                const token = localStorage.getItem('token')

                const frmdata = new FormData(this);


                $.ajax({
                    url: 'api/products',
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