@if ($foreigner->polisdate || $foreigner->polisenddate)
<table class="table table-sm table-borderless table-striped text-nowrap" >
    <tr>
        <th scope="row">number @ company</th>
        <td>{{$foreigner->polisnumber}} @ {{$foreigner->poliscompany}}</td>
    </tr>
    <tr>
        <th scope="row">start</th>
        <td>{{$foreigner->polisdate}}</td>
    </tr>
    <tr>
        <th scope="row">end</th>
        <td>{{$foreigner->polisenddate}}</td>
    </tr>
</table>
@endif
