@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Barang</h3>
        <div class="card-tools">
            <a href="{{ url('/barang/export_excel') }}" class="btn btn-primary">
    <i class="fa fa-file-excel"></i> Export Barang
</a>
<a href="{{ url('/barang/export_pdf') }}" class="btn btn-warning">
    <i class="fa fa-file-pdf"></i> Export PDF
</a>
            <button onclick="modalAction('{{ url('/barang/import') }}')" class="btn btn-info">Import Barang</button>
            <button onclick="modalAction('{{ url('/barang/create_ajax') }}')" class="btn btn-success">Tambah Data (Ajax)</button>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-md-1 control-label">Filter:</label>
            <div class="col-md-3">
                <select class="form-control filter_kategori" name="filter_kategori">
                    <option value="">- Semua -</option>
                    @foreach($kategori as $item)
                        <option value="{{ $item->kategori_id }}">{{ $item->kategori_nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <table class="table table-bordered table-striped" id="table-barang">
            <thead>
                <tr><th>No</th><th>Kode</th><th>Nama</th><th>Harga Beli</th><th>Harga Jual</th><th>Kategori</th><th>Aksi</th></tr>
            </thead>
        </table>
    </div>
</div>

<div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"></div>
@endsection

@push('js')
<script>
    function modalAction(url = '') {
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }

    $(document).ready(function(){
        var tableBarang = $('#table-barang').DataTable({
            processing: true, serverSide: true,
            ajax: {
                "url": "{{ url('barang/list') }}",
                "type": "GET",
                "data": function(d) { d.filter_kategori = $('.filter_kategori').val(); }
            },
            columns: [
                {data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false},
                {data: "barang_kode"},
                {data: "barang_nama"},
                {data: "harga_beli"},
                {data: "harga_jual"},
                {data: "kategori.kategori_nama"},
                {data: "aksi", className: "text-center", orderable: false, searchable: false}
            ]
        });

        $('.filter_kategori').change(function(){ tableBarang.draw(); });
    });
</script>
@endpush