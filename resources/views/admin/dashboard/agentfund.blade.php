<div class="col-lg-12">
   <section class="panel">
    <form class="form-inline" method="post" name="agntfundadd" id="agntfundadd" action="{{URL::to(Helper::admin_slug().'/agent/fund/save')}}" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
       <input type="number" class="form-control" id="addfund" name="addfund" value="" placeholder="Add fund">
       </div>
      <button type="submit" class="btn btn-primary">Add</button>
    
   <div class="table-responsive">
     <table class="table">
      <thead>
       <tr>
        <th>Date</th>
        <th>Fund</th>
       </tr>
     </thead>
     @if(isset($agentfund))
     <tbody>
      @foreach($agentfund as $getagentfund)
       <tr>
        <td>{!! $getagentfund->created_at !!}</td>
        <td>Rs. {!! $getagentfund->agnt_fund !!}</td>
       </tr>
      @endforeach
     </tbody>
     <input type="hidden" name="agntid" value="{!! $getagentfund->agnt_id !!}">
     @else
     <input type="hidden" name="agntid" value="{!! $agentid !!}">
     @endif
     </form>
   </section>
</div>