<!-- untuk memanggil layput -->
@extends('layouts.app')

<!-- untuk memanggil css -->
@section('css')

@endsection

<!-- untuk memanggil content -->
@section('content')
    <form action="/lomba" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="nama">Nama</label>
            <input name="nama" type="text" class="form-control" id="nama"  placeholder="Masukan Nama Lomba" required>
        </div>

        
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input name="deskripsi" type="text" class="form-control" id="deskripsi"  placeholder="Masukan Deskripsi Lomba" required>
        </div>

        <div class="form-group">
            <label for="poster">Url Poster</label>
            <input name="poster" type="text" class="form-control" id="poster"  placeholder="Masukan Poster Lomba" required>
        </div>

        
        <div class="form-group">
            <label for="tanggal">Tanggal Penutupan Lomba</label>
            <input name="tanggal" type="date" class="form-control" id="tanggal"  placeholder="Masukan Tanggal Penutupan Lomba" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('js')

@endsection