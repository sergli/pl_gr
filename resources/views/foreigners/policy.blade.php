@if ($foreigner->polisdate || $foreigner->polisenddate)
<table class="table table-sm table-borderless table-striped text-nowrap" >
    <tr>
        <th scope="row">number @ company</th>
        <td> @empty($foreigner->polisnumber) <span class="text-muted">empty</span>@endif {{$foreigner->polisnumber}} @ @empty($foreigner->poliscompany) <span class="text-muted">empty</span>@endif {{$foreigner->poliscompany}}</td>
    </tr>
    <tr>
        <th scope="row">start</th>
        <td @if($foreigner->isNearExpiry('polisdate')) class="table-danger" @endif >{{$foreigner->polisdate}}</td>
    </tr>
    <tr>
        <th scope="row">end</th>
        <td @if($foreigner->isNearExpiry('polisenddate')) class="table-danger" @endif >{{$foreigner->polisenddate}}</td>
    </tr>
</table>
@endif
