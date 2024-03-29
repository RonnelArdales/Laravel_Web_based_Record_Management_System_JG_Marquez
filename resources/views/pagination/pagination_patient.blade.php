<div class="card-body " style="width:100%; min-height:65vh; display: flex; overflow-x: auto;  font-size: 15px; " >
  <table class="table table-bordered table-striped"  style="background-color: white">
        <thead>
            <tr>
                <th>Id</th>
                <th>First name</th>
                <th>Middle name</th>
                <th>Last name</th> 
                <th>Age</th>
                <th>Sex</th>
                <th>Status</th>
                <th style="width: 205px">Action</th>
            </tr>
        </thead>
        <tbody class="patient-error" >
            @if (count($patients) > 0)
                @foreach ($patients as $user)
                    <tr class="overflow-auto">
                        <td>{{$user->id}}</td>
                        <td>{{$user->fname}}</td>
                        <td>{{$user->mname}}</td>
                        <td>{{$user->lname}}</td>
                        <td>{{$user->age}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->status}}</td>
                        <td style="text-align: center">
                        <button type="button" value="{{$user->id}}" class="view btn btn-sm btn-primary ">view</button>
                        <button type="button" style="color:white" value="{{$user->id}}" class="edit  btn btn-sm btn-info ">Edit</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" style="text-align: center;">no user Found</td>
                </tr>
            @endif
        </tbody>
  </table>
</div>
<div style="">
  {!! $patients->links() !!}
</div>