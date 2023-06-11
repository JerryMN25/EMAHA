@extends('layouts.main')
@section('title', 'eMaha - Student')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <a href="/student/formadd" class="btn btn-primary" role="button"><i class="bi bi-plus-circle-fill"></i> Student</a>
            <form action="/student/search" method="GET" class="form-inline my-2 my-lg-0 float-right">
                <input name="q" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <div class="card-body">
            @if (session('flash'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('flash') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Minat</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($mhs as $index=> $data)
                        <tr>
                            <th scope="row">{{ $mhs->firstitem() + $index }}</th>
                            <td>{{ $data->nim }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->gender }}</td>
                            <td>{{ $data->prodi }}</td>
                            <td>{{ $data->minat }}</td>
                            <td>
                                <a href="/student/formedit/{{ $data->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                
                                <a href="/student/delete/{{ $data->id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
              <span class="float-right">{{ $mhs->links() }}</span>
        </div>
    </div>
@endsection