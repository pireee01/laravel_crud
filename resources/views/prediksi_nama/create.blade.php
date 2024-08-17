@extends('layouts.master')
@section('title')
    Tambah Prediksi Nama
@endsection
@section('body')
<body data-sidebar="dark">
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1>Tambah Prediksi Nama</h1>
                <form method="POST" action="{{ route('prediksi-nama.store') }}">
                    @csrf 
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required placeholder="Masukkan nama">
                    </div>
                    <div class="mb-3">
                        <label for="negara_1" class="form-label">Negara 1</label>
                        <input type="text" class="form-control" id="negara_1" name="negara_1" readonly placeholder="Prediksi Negara 1">
                    </div>
                    <div class="mb-3">
                        <label for="negara_2" class="form-label">Negara 2</label>
                        <input type="text" class="form-control" id="negara_2" name="negara_2" readonly placeholder="Prediksi Negara 2">
                    </div>
                    <div class="mb-3">
                        <label for="negara_3" class="form-label">Negara 3</label>
                        <input type="text" class="form-control" id="negara_3" name="negara_3" readonly placeholder="Prediksi Negara 3">
                    </div>
                    <div class="mb-3">
                        <label for="negara_4" class="form-label">Negara 4</label>
                        <input type="text" class="form-control" id="negara_4" name="negara_4" readonly placeholder="Prediksi Negara 4">
                    </div>
                    <button type="button" class="btn btn-secondary" id="btnPredict">Predict</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $("#btnPredict").click(function() {
            var name = $("#nama").val();

            // Tampilkan "Please wait..."
            $("#btnPredict").text("Please wait...");
            $("#btnPredict").prop("disabled", true); // Nonaktifkan tombol sementara

            $.ajax({
                url: 'https://api.nationalize.io/',
                data: { name: name },
                dataType: 'json',
                success: function(data) {
                    var countryCodes = data.country.map(function(country) {
                        return country.country_id;
                    });

                    // Mengambil nama negara secara langsung dari restcountries.com
                    var countryNames = []; 
                    countryCodes.forEach(function(code) {
                        $.ajax({
                            url: `https://restcountries.com/v3.1/alpha/${code}`,
                            dataType: 'json',
                            success: function(countryData) {
                                countryNames.push(countryData[0].name.common);

                                // Mengisi field negara setelah semua request selesai
                                if (countryNames.length === countryCodes.length) { 
                                    for (let i = 0; i < countryNames.length; i++) {
                                        $(`#negara_${i+1}`).val(countryNames[i]);
                                    }
                                }
                            },
                            error: function(error) {
                                console.error(`Error fetching country ${code}:`, error);
                                // Tetap isi field negara meskipun ada error, misalnya dengan "-"
                                $(`#negara_${countryCodes.indexOf(code) + 1}`).val("-");
                            }
                        });
                    }); 
                },
                error: function(error) {
                    console.error("Error predicting nationality:", error);
                    // Reset tombol
                    $("#btnPredict").text("Predict"); 
                    $("#btnPredict").prop("disabled", false);
                },
                complete: function() { // Dijalankan setelah success atau error
                    // Reset tombol
                    $("#btnPredict").text("Predict"); 
                    $("#btnPredict").prop("disabled", false);
                }
            });
        });
    }); 
</script>
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script> 
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script> 
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection