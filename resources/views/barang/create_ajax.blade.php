<form id="form-create-barang" action="{{ url('barang/ajax') }}" method="POST">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="barang_kode">Kode Barang</label>
                    <input type="text" class="form-control" id="barang_kode" name="barang_kode" required>
                    <span class="invalid-feedback" id="error-barang_kode"></span>
                </div>
                <div class="form-group">
                    <label for="barang_nama">Nama Barang</label>
                    <input type="text" class="form-control" id="barang_nama" name="barang_nama" required>
                    <span class="invalid-feedback" id="error-barang_nama"></span>
                </div>
                <div class="form-group">
                    <label for="kategori_id">Kategori</label>
                    <select class="form-control" id="kategori_id" name="kategori_id" required>
                        <option value="">- Pilih Kategori -</option>
                        @foreach($kategori as $item)
                            <option value="{{ $item->kategori_id }}">{{ $item->kategori_nama }}</option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback" id="error-kategori_id"></span>
                </div>
                <div class="form-group">
                    <label for="harga_beli">Harga Beli</label>
                    <input type="number" class="form-control" id="harga_beli" name="harga_beli" step="0.01" required>
                    <span class="invalid-feedback" id="error-harga_beli"></span>
                </div>
                <div class="form-group">
                    <label for="harga_jual">Harga Jual</label>
                    <input type="number" class="form-control" id="harga_jual" name="harga_jual" step="0.01" required>
                    <span class="invalid-feedback" id="error-harga_jual"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#form-create-barang').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if(response.status) {
                        alert(response.message);
                        $('#myModal').modal('hide');
                        dataBarang.ajax.reload();
                    } else {
                        if(response.msgField) {
                            Object.keys(response.msgField).forEach(function(key) {
                                $('#error-' + key).text(response.msgField[key][0]).show();
                                $('#' + key).addClass('is-invalid');
                            });
                        } else {
                            alert(response.message);
                        }
                    }
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.statusText);
                }
            });
        });

        // Scope change handlers to inputs inside the form to avoid colliding with same IDs on the page
        $('#form-create-barang').find('#barang_kode, #barang_nama, #kategori_id, #harga_beli, #harga_jual').on('change', function() {
            $(this).removeClass('is-invalid');
            $('#error-' + $(this).attr('id')).text('').hide();
        });
    });
</script>
