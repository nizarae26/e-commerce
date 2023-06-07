@extends('layout.app')

@section('title', 'Data Pesanan DiKonfirmasi')

@section('content')

<div class="card shadow">
    <div class="card-header">
        <h4 class="card-title">
            Data pesanan DiKonfirmasi
        </h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pesanan</th>
                        <th>Invoice</th>
                        <th>Member</th>
                        <th>Total</th>
                        <th>Aksi</th>
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
    //     window.Laravel = {
    //     csrfToken: '{{csrf_token()}}'
    // }

        $(function(){

            function rupiah(angka) {
                const format = angka.toString().split('').reverse().join('');
                const convert = format.match(/\d{1,3}/g);
                return rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')

            }

            function date(date) {
                var date = new Date(date);
                var day = date.getDate();
                var month = date.getMonth();
                var year = date.getFullYear();

                return `${day}-${month}-${year}`;
            }

            const token = localStorage.getItem('token')
            $.ajax({
                url : '/api/pesanan/dikonfirmasi',
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
                            <td>${date(val.created_at)}</td>
                            <td>${val.invoice}</td>
                            <td>${val.member.nama_member}</td>
                            <td>${rupiah(val.grand_total)}</td>
                            <td>
                                <a href="#" data-id="${val.id}" class="btn btn-success btn-aksi">Kemas</a>
                            </td>
                        </tr>
                        `;
                    });

                    $('tbody').append(row)
                }
            });
            
            $(document).on('click', '.btn-aksi', function(){
                const id = $(this).data('id')

                $.ajax({
                    url : '/api/pesanan/ubah_status/' + id ,
                    type : 'POST',
                    data : {
                        status : "Dikemas"
                    },
                    headers: {
                        "Authorization":'Bearer ' + token
                    }, 
                    success : function ({
                        data
                    }) {
                        if (data.success) { 
                            alert('Berhasil Konfirmasi')
                        }
                        location.reload()
                    }

                })
            });
        
            });
        
        
    </script>
@endpush