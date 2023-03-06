@extends('master')

@section('konten')

<div class="card p-2">
    <form action="{{ url('currency/'.$data->id) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="mb-3">
            <label for="currencyName" class="form-label">Currency Name</label>
            <input type="text" class="form-control" id="currencyName" name="name" value="{{$data->name}}">
        </div>
        <div class="mb-3">
            <label for="currencyRate" class="form-label">Rate</label>
            <input type="number" name="rate" pattern="[0-9]+([\.,][0-9]+)?" step="any" value="{{$data->rate}}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
    
@endsection