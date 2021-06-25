<table class="table table-sm table-borderless table-striped text-nowrap" >
    <tr>
        <th scope="row">serie @ number</th>
        <td> @empty($foreigner->patentserie) <span class="text-muted">empty</span>@endif {{$foreigner->patentserie}} @ @empty($foreigner->patentnumber) <span class="text-muted">empty</span>@endif {{$foreigner->patentnumber}}</td>
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

