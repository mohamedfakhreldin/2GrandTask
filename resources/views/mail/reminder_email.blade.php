<h4>Hello {{$user->name}}</h4>
<br>

<br>
<b>We just remind you that you have {{count($user->advertisements)}} Advertisements tomorrow as the following:</b>
<br><br>
<ul>
@foreach ($user->advertisements as $advertisement )
<li>{{$advertisement->title.' ('.$advertisement->type.').'}}</li><br>

@endforeach
</ul>
<h5 style="float:right"><b>Thanks</b></h5>
