<div id="" style="height:300px; padding:10px; background-color:aliceblue; border-radius:10px; " >
    <div class="label-container">
        @foreach ($hours as $hour)
            <label style="margin-bottom: 10px; display: flex; align-items: ">
                <input type="checkbox" class="day_id" name="day_id[]" id="day_id" value="{{$hour->id}}" id="time-checkbox">
                <div style="margin-left: 10px" class="btn btn-primary ml-20">{{$hour->from}}</div>
            </label>
        @endforeach
    </div>
</div>

@foreach ($days as $day)
<div class="refresh_off" style="margin-top:10px">
    <button class="delete btn btn-danger ml-20 delete" id="delete">Delete</button>
    <button style="padding-left:30px; padding-right:30px" class=" btn btn-primary ml-0 off_day" value="{{$day->day}}" id="off_day"><label for=""><input onclick="this.checked=!this.checked;" type="checkbox" {{ $day->off == 1  ? 'checked' : '' }} class="checked_off" name="checked_off" id="checked_off"  > </label> <label for="">Day Off</label></button>
</div>
@endforeach

