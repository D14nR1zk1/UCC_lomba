@extends('layouts.app')

@section('content')
<div class="jumbotron">
  <h3>Apakah Anda yakin menghapus lomba "{{$lomba->nama}}"??</h3>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="/lomba/{{$lomba->id}}/confirmDelete" role="button">Hapus</a>
    <a class="btn btn-danger btn-lg" href="/lomba" role="button">Edit</a>
  </p>
</div>
@endsection