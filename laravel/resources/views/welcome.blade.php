<!-- resources/views/spesialis/index.blade.php -->
@extends('Layout')
@section('Content')

<h1>Data Spesialis</h1>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Kode Spesialis</th>
            <th>Spesialis</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tb_spesialis as $spesialis)
        <tr>
            <td>{{ $spesialis->Kd_spesialis }}</td>
            <td>{{ $spesialis->spesialis }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
