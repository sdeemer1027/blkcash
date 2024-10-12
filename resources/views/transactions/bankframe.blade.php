
<h3>Bank Activity</h3>
{{--$tansactions--}}
<table  class="table" width="100%">
    <tr>
        {{--
        <th>UserName</th>
        --}}
        <th>Requested</th>
        <th>Fee</th>
        <th>Transfered</th>
        <th>Type</th>
        <th>Date</th>
    </tr>
    @foreach($tansactions as $transaction)
        {{--$deposit--}}
        <tr class="table-success">
            {{-- <td>
                 {{$transaction->user->name}}
             </td> --}}
            <td>{{$transaction->fee + $transaction->amount}}</td>
            <td>{{$transaction->fee}} </td>
            <td> {{$transaction->amount}}</td>
            <td> @if($transaction->transaction_type == 'Deposit')
                    <b>{{$transaction->transaction_type}}</b>
                @else
                    {{$transaction->transaction_type}}
                @endif
            </td>
            <td>{{$transaction->created_at->format('m/d/y')}}</td>
        </tr>


    @endforeach
    <tr class="table-primary">
        <th>Total</th>
        <th >${{$totalfee}}</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
</table>

