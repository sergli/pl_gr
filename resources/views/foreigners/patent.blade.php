@if($foreigner->patentdate || $foreigner->patentenddate || $foreigner->patentnextpaydate)
    <table class="table table-sm table-borderless table-striped text-nowrap" >
        <tr>
            <th scope="row">serie @ number</th>
            <td>{{$foreigner->patentserie}} @ {{$foreigner->patentnumber}}</td>
        </tr>
        <tr>
            <th scope="row">start</th>
            <td>{{$foreigner->patentdate}}</td>
        </tr>
        <tr>
            <th scope="row">end</th>
            <td>{{$foreigner->patentenddate}}</td>
        </tr>
        <tr>
            <th scope="row">next pay</th>
            <td>{{$foreigner->patentnextpaydate}}</td>
        </tr>
    </table>
@endif
