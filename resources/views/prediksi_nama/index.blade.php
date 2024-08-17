@extends('layouts.master')
@section('title')
    Daftar Prediksi Nama
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
                    <h1>Daftar Prediksi Nama</h1>
                    <a href="{{ route('prediksi-nama.create') }}" class="btn btn-primary mb-3">Tambah Prediksi Nama</a>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                      style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Negara 1</th>
                                <th>Negara 2</th>
                                <th>Negara 3</th>
                                <th>Negara 4</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody id="prediksiNamaTable">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data Prediksi Nama 
        var prediksiNamaData = [
            @foreach ($prediksi_namas as $prediksi)
                {
                    'id': '{{ $prediksi->id }}',
                    'nama': '{{ $prediksi->nama }}',
                    'negara_1': '{{ $prediksi->negara_1 }}',
                    'negara_2': '{{ $prediksi->negara_2 }}',
                    'negara_3': '{{ $prediksi->negara_3 }}',
                    'negara_4': '{{ $prediksi->negara_4 }}',
                    'edit_url': '{{ route("prediksi-nama.edit", $prediksi->id) }}',
                    'delete_url': '{{ route("prediksi-nama.destroy", $prediksi->id) }}',
                },
            @endforeach
        ];

        // Mengisi tabel dengan innerHTML +=
        var tableBody = document.getElementById('prediksiNamaTable');

        prediksiNamaData.forEach(function(prediksi) {
            tableBody.innerHTML += `
                <tr> 
                    <td>${prediksi.id}</td>
                    <td>${prediksi.nama}</td>
                    <td>${prediksi.negara_1}</td>
                    <td>${prediksi.negara_2 ? prediksi.negara_2 : '-'}</td> 
                    <td>${prediksi.negara_3 ? prediksi.negara_3 : '-'}</td> 
                    <td>${prediksi.negara_4 ? prediksi.negara_4 : '-'}</td> 
                    <td>
                        <a href="${prediksi.edit_url}" class="btn btn-sm btn-warning">
                            <i class="mdi mdi-circle-edit-outline"></i>
                        </a>
                        <form action="${prediksi.delete_url}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')">
                                <i class="mdi mdi-trash-can-outline"></i>
                            </button>
                        </form>
                    </td>
                </tr> 
            `; 
        });
    </script>
@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script> 
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script> 
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection