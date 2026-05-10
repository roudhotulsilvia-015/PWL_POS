<form id="form-create-kategori" action="{{ url('kategori/ajax') }}" method="POST">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="kategori_kode">Kode Kategori</label>
                    <input type="text" class="form-control" id="kategori_kode" name="kategori_kode" required>
                    <span class="invalid-feedback" id="error-kategori_kode"></span>
                </div>
                <div class="form-group">
                    <label for="kategori_nama">Nama Kategori</label>
                    <input type="text" class="form-control" id="kategori_nama" name="kategori_nama" required>
                    <span class="invalid-feedback" id="error-kategori_nama"></span>
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
        $('#form-create-kategori').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: {
                    kategori_kode: $('#kategori_kode').val(),
                    kategori_nama: $('#kategori_nama').val(),
                    _token: $('input[name="_token"]').val()
                },
                dataType: 'json',
                success: function(response) {
                    if(response.status) {
                        alert(response.message);
                        $('#myModal').modal('hide');
                        dataKategori.ajax.reload();
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

        $('#kategori_kode, #kategori_nama').on('change', function() {
            $(this).removeClass('is-invalid');
            $('#error-' + $(this).attr('id')).text('').hide();
        });
    });
</script>
