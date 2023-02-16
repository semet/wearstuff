@if($status == 'paid')
<span class="badge bg-success">{{ $status }}</span>
@elseif($status == 'pending')
<span class="badge bg-warning">{{ $status }}</span>
@elseif($status == 'canceled')
<span class="badge bg-danger">{{ $status }}</span>
@elseif($status == 'expired')
<span class="badge bg-default">{{ $status }}</span>
@endif
