@extends('master')

@section('konten')
    <div class="card p-2">
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
                @foreach ($deleted_currency as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->rate }}</td>
                        <td>
                            <button type="button" onclick="restore('{{$data->id}}')">Restore</button>
                            <button type="button" onclick="forcedelete('{{$data->id}}')">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function restore(id) {
            message = confirm('Are you sure want to restore this data?');
            if (message) {
                window.location = 'trash/' + id
            }
        }
        function forcedelete(id) {
            message = confirm('Are you sure want to delete this data?');
            if (message) {
                window.location = 'trash/' + id
            }
        }
    </script>
@endsection
