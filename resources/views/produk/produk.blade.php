@extends('index')
@push('css-custom')
    <style>
        .table thead th {
            vertical-align: middle;
            font-weight: 600;
            padding: 0.5rem 0.5rem 0.5rem 0.75rem;
            /*padding: top right bottom left; */
        }

        .table tbody th {
            font-weight: 600;
        }
    </style>
@endpush
@section('isi-content')
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body button-page">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-header-left">
                                        <h5>Klik Tambah untuk menambahkan produk baru</h5>
                                    </div>
                                    <div class="card-header-right">
                                        <i class="fa fa-minus minimize-card"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <a href="{{ route('produk-create') }}"
                                        class="btn btn-primary waves-effect waves-light">Tambah +</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Data Produk</h5>
                                    <span>Seluruh data produk yang dijual</span>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                            <li><i class="fa fa-window-maximize full-card"></i></li>
                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                            <li><i class="fa fa-refresh reload-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="tableProduk">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col" width="30%">Nama Produk</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Kategori</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($produk as $p)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $p->nama_produk }}</td>
                                                        <td>Rp.{{ $p->harga }}</td>
                                                        <td>{{ $p->kategoriFK->nama_kategori }}</td>
                                                        <td>{{ $p->statusFK->nama_status }}</td>
                                                        <td>
                                                            <a href="{{ route('produk-edit', $p->id_produk) }}"
                                                                class="btn btn-info waves-effect waves-light">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <button class="btn btn-danger waves-effect waves-light"
                                                                onclick="if (confirm('Hapus {{ $p->nama_produk }} ?')){document.getElementById('delete{{ $p->id_produk }}').submit();}
                                                        else{event.stopPropagation(); event.preventDefault();};">
                                                                <i class="fa fa-trash"></i></button>
                                                            <form id="delete{{ $p->id_produk }}" method="POST"
                                                                action="{{ route('produk-destroy', $p->id_produk) }}">
                                                                @csrf
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('js-custom')
    <script>
        $(document).ready(function() {
            let table = new DataTable('#tableProduk');
        });
    </script>
@endpush
