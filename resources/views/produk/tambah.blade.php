@extends('index')
@section('isi-content')
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body button-page">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Tambah Produk Baru</h5>
                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                <div class="card-block">
                                    <form class="form-material" method="POST" action="{{ route('produk-store') }}">
                                        @csrf
                                        <div class="form-group form-default">
                                            <input type="text"
                                                class="form-control @error('nama_produk') is-invalid @enderror @if (old('nama_produk')) fill @endif"
                                                name="nama_produk" id="nama" value="{{ old('nama_produk') }}">
                                            @error('nama_produk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nama Produk</label>
                                        </div>
                                        <div class="form-group form-default ">
                                            <input type="text"
                                                class="form-control @error('harga_produk') is-invalid @enderror @if (old('harga_produk')) fill @endif"
                                                name="harga_produk" id="harga" value="{{ old('harga_produk') }}">
                                            @error('harga_produk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Harga</label>
                                        </div>
                                        <div class="form-group form-default">
                                            <select name="kategori_produk" class="form-control fill">
                                                @foreach ($kategori as $k)
                                                    <option value="{{ $k->id_kategori }}" @selected(old('kategori_produk') == $k->id_kategori)>
                                                        {{ $k->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Kategori</label>
                                        </div>
                                        <div class="form-group form-default">
                                            <select name="status_produk" class="form-control fill">
                                                @foreach ($status as $s)
                                                    <option value="{{ $s->id_status }}" @selected(old('status_produk') == $s->id_status)>
                                                        {{ $s->nama_status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Status</label>
                                        </div>
                                        <a href="{{ route('produk') }}" type="button" class="btn btn-secondary">Batal</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
