<div class="form-group">
        <select class="form-control form-control-sm" id="jenis_produk" name="jenis_produk">
            <option selected disabled>Pilih Jenis Produk</option>
            @foreach ($jenisProduk as $k)
                <option value="{{$k->id}}" @if($jenis_produk == $k->id) selected @endif>{{$k->jenis}}</option>
            @endforeach
        </select>  
</div>