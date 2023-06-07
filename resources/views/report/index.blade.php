@extends('layout.app')

@section('title', 'Laporan Pesanan')

@section('content')

<div class="card shadow">
    <div class="card-header">
        <h4 class="card-title">
            Laporan Pesanan
        </h4>
    </div>
    <div class="card-body">

        <!-- <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="form-group">
                        <label for="">Dari</label>
                        <input type="date" name="dari" id="dari" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Sampai</label>
                        <input type="date" name="sampai" id="sampai" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div> -->


        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah Dibeli</th>
                        <th>Pendapatan</th>
                        <th>Total Qty</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="modal-form" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form class="form-pesanan">
                    <div class="form-group">
                        <label for="" >Nama pesanan</label>
                        <input type="text" class="form-control" name="nama_kategori" 
                            placeholder="Nama pesanan" required>
                    </div>
                    <div class="form-group">
                        <label for="" >Deskripsi</label>
                        <textarea name="deskripsi" placeholder="Deskripsi" class="form-control" id="" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" >Gambar</label>
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
</div> -->

@endsection

@push('js')
    <script>

        $(function(){

           

            // const dari = '{{ request()->input( 'dari' ) }}'
            // const darii = '{{ request()->input('$dari') }}'
            // const sampaii = '{{ request()->input('$sampai') }}'

            function rupiah(angka) {
                const format = angka.toString().split('').reverse().join('');
                const convert = format.match(/\d{1,3}/g);
                return rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')

            }

            function rupiahh(angka) {
                const format = angka.toString().split('').reverse().join('');
                const convert = format.match(/\d{1,3}/g);
                return rupiahh = 'Rp ' + convert.join('.').split('').reverse().join('')

            }

            const token = localStorage.getItem('token')
            $.ajax({
                url : '/api/reports?dari=2023-05-19&sampai=2023-12-19/' ,
                headers: {
                        "Authorization":'Bearer ' + token
                    },  
                success : function ({
                    data
                }) {

                    let row;
                    data.map(function (val, index) {
                        row += `
                        <tr>
                            <td>${index+1}</td>
                            <td>${val.nama_barang}</td>
                            <td>${rupiahh(val.harga)}</td>
                            <td>${val.jumlah_dibeli}</td>
                            <td>${rupiah(val.total)}</td>
                            <td>${val.total_qty}</td>
                        </tr>
                        `;
                    });

                    $('tbody').append(row)
                }
            });
            
            // $(document).on('click', '.btn-aksi', function(){
            //     const id = $(this).data('id')

            //     $.ajax({
            //         url : '/api/pesanan/ubah_status/' + id ,
            //         type : 'POST',
            //         data : {
            //             status : "Dikonfirmasi"
            //         },
            //         headers: {
            //             "Authorization":'Bearer ' + token
            //         }, 
            //         success : function ({
            //             data
            //         }) {
            //             if (data.success) { 
            //                 alert('Berhasil Konfirmasi')
            //             }
            //             location.reload()
            //         }

            //     })
            // });
        
            });
        
        
    </script>
@endpush