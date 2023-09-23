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
                                    <h5>Edit Produk</h5>
                                </div>
                                <div class="card-block">
                                    <form class="form-material" method="POST"
                                        action="{{ route('produk-update', $produk->id_produk) }}">
                                        @csrf
                                        <div class="form-group form-default">
                                            <input type="text"
                                                class="form-control fill @error('nama_produk') is-invalid @enderror"
                                                name="nama_produk" id="nama" value="{{ $produk->nama_produk }}">
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
                                                class="form-control fill @error('harga_produk') is-invalid @enderror"
                                                name="harga_produk" id="harga" value="{{ $produk->harga }}">
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
                                                    @if ($produk->kategori_id == $k->id_kategori)
                                                        <option value="{{ $k->id_kategori }}" selected>
                                                            {{ $k->nama_kategori }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Kategori</label>
                                        </div>
                                        <div class="form-group form-default">
                                            <select name="status_produk" class="form-control fill">
                                                @foreach ($status as $s)
                                                    @if ($produk->status_id == $s->id_status)
                                                        <option value="{{ $s->id_status }}" selected>
                                                            {{ $s->nama_status }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $s->id_status }}">{{ $s->nama_status }}
                                                        </option>
                                                    @endif
                                                @endforeach

                                            </select>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Status</label>
                                        </div>
                                        <a href="{{ route('produk') }}" type="button" class="btn btn-secondary">Batal</a>
                                        <button type="submit" class="btn btn-primary">Update</button>
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
