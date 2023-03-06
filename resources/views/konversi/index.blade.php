@extends('master')

@section('konten')
    <form action="{{ url('konversi') }}" method="post">
        @csrf
        <div class="card p-2">
            <div class="mb-3">
                <label for="currencyRate" class="form-label">Amount</label>
                <input id="amount" type="number" name="amount" min="1" value="1">
            </div>
            {{-- <button onclick="convert()">Try it</button> --}}
            <select id="rate_selected" class="form-select mb-3" onChange="selectcurrency(this);">
                @foreach ($currency_list as $list)
                    <option value="{{ $list->rate }}">{{ $list->name }}</option>
                @endforeach
            </select>
            <input type="text" hidden name="currency_name" id="currency_name">
            <input class="mb-3" type="number" pattern="[0-9]+([\.,][0-9]+)?" step="any" readonly id="result"
                name="result">
            <a type="" class="btn btn-primary mb-3" onclick="convert()">Convert</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        <br>
        <div class="card p-2">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Currency Name</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($convert_record as $record)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $record->created_at }}</td>
                            <td>{{ $record->amount }} IDR</td>
                            <td>{{ $record->currency_name }}</td>
                            <td>{{ $record->result }} {{ $record->currency_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
    <script>
        function convert() {
            var amount = document.getElementById('amount').value;
            var rate = document.getElementById('rate_selected').value;
            var result = amount * rate;
            console.log(result);
            document.getElementById("result").value = result;
        }

        function selectcurrency(sel) {
            document.getElementById('currency_name').value = sel.options[sel.selectedIndex].text;
        }
    </script>
@endsection
