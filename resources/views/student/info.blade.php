<a href="{!!URL::to('student/new')!!}">New Student</a>

<table>
   <thead>
     <th>Id</th>
     <th>name</th>
     <th>gender</th>
     <th>dob</th>
     <th>pob</th>
     <th>phone</th>
     <th>subjectname</th>
     <th>price</th>
     <th>shift</th>
     <th>year</th>
     <th>lavel</th>
     <th>email</th>
     <th>Action</th>
   </thead>
   
   <tbody>
   @foreach($students as $s)
    <tr>
      <td>{!! $s->id!!}</td>
      <td>{!! $s->firstname." ".$s->lastname!!}</td>
      <td>
        @if($s->gender==1)
         Male
        @else
         Female
        @endif
      </td>
      <td>{!! $s->dob!!}</td>
      <td>{!! $s->pob!!}</td>
      <td>{!! $s->phone!!}</td>
      <td>{!! $s->subjectname!!}</td>
      <td>{!! $s->price!!}</td>
      <td>{!! $s->shift!!}</td>
      <td>{!! $s->year!!}</td>
      <td>{!! $s->lavel!!}</td>
      <td>{!! $s->email!!}</td>
      <td><a href="{{URL::to('student/edit',array($s->id))}}">Edit</a> | <a href="{{URL::to('student/delete',array($s->id))}}">Delete</a></td>
    </tr>
     @endforeach
   </tbody>
   
</table>