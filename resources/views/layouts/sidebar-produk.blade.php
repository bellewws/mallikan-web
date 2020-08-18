<div class="sidebar-produk container border border-light rounded">
    <h5>Urutkan</h5>
    <div class="form-group">
        <select class="form-control form-control-sm" id="filter" name="filter" style="height: 10px">
            <option disabled selected>Paling Sesuai</option>
            <option value="terbaru" {{ $sort == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
            <option value="terlaris" {{ $sort == 'terlaris' ? 'selected' : '' }}>Terlaris</option>
            <option value="tertinggi" {{ $sort == 'tertinggi' ? 'selected' : '' }}>Harga Tertinggi</option>
            <option value="terendah" {{ $sort == 'terendah' ? 'selected' : '' }}>Harga Terendah</option>
        </select>        
    </div>
</div> 
<div class="sidebar-produk container border border-light rounded">
    <h5>Filter</h5>
    <div class="container">
        <div class="form-group">
            <select class="form-control form-control-sm" id="kota_toko" name="kota_toko">
              <option selected disabled>Lokasi Penjual</option>
                @foreach ($kota as $k)
                    <option value="{{$k->city_id}}"  @if($kota_toko == $k->city_id) selected @endif>{{$k->title}}</option>
                @endforeach
            </select>        
        </div>
        <hr>
        <div class="form-group">
            <select class="form-control form-control-sm" id="rating" name="rating">
              <option selected disabled>Penilaian Produk</option>
                @foreach ($rating_option as $r)
                    <option value="{{$r}}"  @if($rating == $r) selected @endif>
                    @for ($a=1; $a<=$r; $a++)
                        ★
                    @endfor</option>
                @endforeach
            </select>        
        </div>
        <hr>
        <div class="form-group">
            <select class="form-control form-control-sm" id="harga" name="harga">
              <option selected disabled>Harga (per kg)</option>
                    <option value="10000-20000" {{ $harga == '10000-20000' ? 'selected' : '' }}>Rp 10.000 - 20.000</option>
                    <option value="21000-30000" {{ $harga == '21000-30000' ? 'selected' : '' }}>Rp 21.000 - 30.000</option>
                    <option value="31000-40000" {{ $harga == '31000-40000' ? 'selected' : '' }}>Rp 31.000 - 40.000</option>
                    <option value="41000-50000" {{ $harga == '41000-50000' ? 'selected' : '' }}>Rp 41.000 - 50.000</option>
                    <option value="51000" {{ $harga == '51000' ? 'selected' : '' }}>Lebih dari Rp 50.000</option>
            </select>        
        </div>
        <br>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function () {
    $("#filter").change(function () {
        var clicked = $('#filter').val();

        var APP_URL = window.location.href;
        var url = new URL(window.location.href);

        url.searchParams.set('sort', clicked);
        window.location.href = url;        
        // alert(url);

    });

    $("#kota_toko").change(function () {
        var clicked = $('#kota_toko').val();

        var APP_URL = window.location.href;
        var url = new URL(window.location.href);

        url.searchParams.set('kota_toko', clicked);
        window.location.href = url;
        
        // alert(url);

    });

    $("#rating").change(function () {
        var clicked = $('#rating').val();

        var APP_URL = window.location.href;
        var url = new URL(window.location.href);

        url.searchParams.set('rating', clicked);
        window.location.href = url;
        
        // alert(url);

    });

    $("#harga").change(function () {
        var clicked = $('#harga').val();

        var APP_URL = window.location.href;
        var url = new URL(window.location.href);

        url.searchParams.set('harga', clicked);
        window.location.href = url;
        
        // alert(url);

    });

    $("#searchBtn").click(function () {
        var cari = $("#cari").val();

        var APP_URL = window.location.href;
        var url = new URL(window.location.href);

    })
});

</script>
@endpush