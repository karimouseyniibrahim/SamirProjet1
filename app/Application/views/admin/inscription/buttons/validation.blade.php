    @php $namestatus =isset($status) ? $status==1? trans("inscription.accept"): trans("inscription.refuse"): trans("inscription.none") @endphp 

<a onclick="openmodal({{$id}},'{{$status}}',{{$formation_id}},'formation_id')" id="validate{{$id}}"class="btn btn-info btn-circle waves-effect waves-circle waves-float">
<span class="badge">{{$namestatus}}</span> 
<i class="material-icons">arrow_drop_down_circle</i>
</a>
