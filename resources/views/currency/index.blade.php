@extends('master')
@section('konten')
    <div class="card p-2">
        <div class="col-sm-3">
            <a href="{{ url('currency/create') }}" class="btn btn-primary mb-2" style="color: white;">Tambah Data</a>
        </div>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Currency Name</th>
                    <th>Rate to IDR</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->rate }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ url('currency/' . $data->id.'/edit') }}"><i class="fas fa-edit"></i></a>
                            <form action="{{url('currency/'.$data->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
