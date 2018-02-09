@extends('layouts.app')

@section('css')

@endsection

@section('content')

<a href="/lomba/add">
    <button class="btn btn-success">Tambah Lomba</button>
</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Poster</th>
      <th scope="col">Tanggal Tutup</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
        <?php
            $lombas = \App\lomba::get(); //untuk mengambil data pada database 
            // for($i = 0; $i<sizeOf($lombas); $i++){
            //     echo '
            //     <tr>
            //         <th scope="row">'.$i.'</th>
            //         <td>
            //             <a href="/lomba/'.$lombas[$i]->id.'/edit">'.$lombas[$i]->nama.'</a>
                        
            //         </td>
            //         <td>'.$lombas[$i]->deskripsi.'</td>
            //         <td>
            //             <img height="100" src="'.$lombas[$i]->poster.'" />
            //         </td>
            //         <td>'.$lombas[$i]->tanggal_tutup.'</td>
            //         <td>
            //             <a href="/lomba/'.$lombas[$i]->id.'/edit">
            //                 <button type="button" class="btn btn-primary">Edit</button>
            //             </a>
            //             <a href="/lomba/'.$lombas[$i]->id.'/hapus">
            //                 <button type="button" class="btn btn-danger">Delete</button>
            //             </a>
            //         </td>
            //     </tr>
            //     ';
            // } cara susah
        ?>

        @for($i=0;$i<sizeof($lombas); $i++)
             <tr>
                    <th scope="row">{{$i}}</th>
                    <td>
                        <a href="/lomba/{{$lombas[$i]->id}}">{{$lombas[$i]->nama}}</a>
                        
                    </td>
                    <td>{{$lombas[$i]->deskripsi}}</td>
                    <td>
                        <img height="100" src="{{$lombas[$i]->poster}}"/>
                    </td>
                    <td>{{$lombas[$i]->tanggal_tutup}}</td>
                    <td>
                        <a href="/lomba/{{$lombas[$i]->id}}/edit">
                            <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                        <a href="/lomba/{{$lombas[$i]->id}}/delete">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </a>
                    </td>
            </tr>  
        @endfor
  </tbody>
</table>
@endsection

@section('js')

@endsection