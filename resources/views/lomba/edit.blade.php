<!-- untuk memanggil layput -->
@extends('layouts.app')

<!-- untuk memanggil css -->
@section('css')

@endsection

<!-- untuk memanggil content -->
@section('content')
    <form action="/lomba/{{$lomba->id}}/edit" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="nama">Nama</label>
            <input name="nama" type="text" class="form-control" id="nama" value="{{$lomba->nama}}" placeholder="Masukan Nama Lomba" required>
        </div>

        
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input name="deskripsi" type="text" class="form-control" id="deskripsi" value="{{$lomba->deskripsi}}" placeholder="Masukan Deskripsi Lomba" required>
        </div>

        <div class="form-group">
            <label for="poster">Url Poster</label>
            <input name="poster" type="text" class="form-control" id="poster" value="{{$lomba->poster}}" placeholder="Masukan Poster Lomba" required>
        </div>

        
        <div class="form-group">
            <label for="tanggal">Tanggal Penutupan Lomba</label>
            <input name="tanggal" type="date" class="form-control" id="tanggal" value="{{$lomba->tanggal_tutup}}"  placeholder="Masukan Tanggal Penutupan Lomba" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

@section('js')

@endsection