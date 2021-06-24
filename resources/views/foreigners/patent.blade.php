@if($foreigner->patentdate || $foreigner->patentenddate || $foreigner->patentnextpaydate)
    <table class="table table-sm table-borderless table-striped text-nowrap" >
        <tr>
            <th scope="row">serie @ number</th>
            <td>{{$foreigner->patentserie}} @ {{$foreigner->patentnumber}}</td>
        </tr>
        <tr>
            <th scope="row">start</th>
            <td @if($foreigner->isNearExpiry('patentdate')) class="table-danger" @endif >{{$foreigner->patentdate}}</td>
        </tr>
        <tr>
            <th scope="row">end</th>
            <td @if($foreigner->isNearExpiry('patentenddate')) class="table-danger" @endif >{{$foreigner->patentenddate}}</td>
        </tr>
        <tr>
            <th scope="row">next pay</th>
            <td @if($foreigner->isNearExpiry('patentnextpaydate')) class="table-danger" @endif >{{$foreigner->patentnextpaydate}}</td>
        </tr>
    </table>
@endif
