       @extends('admin.layout.master')
         @section('content')        
              <!--overview start-->
			 <div class="row">
				<div class="col-lg-12">
         <div class="col-lg-4">
					<h3 class="Agent-header"><i class="fa fa-files-o"></i> Agents</h3>
          </div>
          <div class="col-lg-8">
             <div class="panel-body">
                <form class="form-inline" method="get" name="dfltsearch" id="dfltsearch" action="" role="form">
                        <div class="form-group">
                         <input type="text" class="form-control" id="searchkey" name="searchkey" value="{!! Input::get('searchkey') !!}" placeholder="Enter keyword">
                        </div>
                      <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                  </div>
                </div>
				      </div>
			      </div>
              <!-- Agent start -->              
              <div class="row">
              @if (Session::has('message'))
              <div class="col-lg-12">
                 <div class="alert alert-success fade in">{{ Session::get('message') }}</div>
                  </div>
                  @endif
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              All Agents
                          </header>
                        <form name="itmmultidlt" action="{{URL::to(Helper::admin_slug().'/agent/multidelete')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th style="width: 4%;">
                                  <input type="submit" name="multidlt" class="" value="delete" title="Delete Selected Items">
                                  <input type="checkbox" id="select_all"/></th>
                                  <th>Agent name</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>Available funds</th>
                                  <th>View funds</th>
                                  <!--<th>Status</th>-->
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              @foreach($agents as $getAgent)
                              <?php 
                                    $totalcrdt = "";
                                    $agntorder = Helper::tableval('agent_order','agntid',$getAgent->agntu_id);
                                    if($agntorder){
                                         foreach ($agntorder as $key => $value) {
                                            if($value->payment_mode==1){
                                              $totalcrdt+=$value->total_amount;
                                            }
                                          }
                                       }
                                    
                                    $agntfund = Helper::tableval('agentfund','agnt_id',$getAgent->agntu_id);
                                    $totaldebit = "";
                                      if($agntfund){
                                         foreach ($agntfund as $key => $value) {
                                            $totaldebit+=$value->agnt_fund;
                                         }
                                       }
                                  ?>
                                <tr>
                                  <td><input name="multicheckbox[]" type="checkbox" id="multicheckbox[]" value="{!! $getAgent->agntu_id !!}" class="multicheckbox" ></td>
                                  <td>{!! $getAgent->agnt_name !!}</td>
                                  <td>{!! $getAgent->agnt_email !!}</td>
                                  <td>{!! $getAgent->agnt_phone !!}</td>
                                  <td>Rs. {!! $totaldebit-$totalcrdt !!}</td>
                                  <td><a href="javascript:void(0)" class="popupview" data-eid="{!! $getAgent->agntu_id !!}">Add / View Funds</a></td>
                                  <!--<td>
                                  @if($getAgent->status==1)
                                   <span class="label label-success">
                                     Active
                                     </span>
                                   @else
                                   <span class="label label-danger">
                                     Inactive
                                    </span>
                                   @endif
                                  </td>-->
                                  <td>
                                  @if(Auth::user()->hasRole(Config::get('constants.All-privileges'))) 
                                  <div class="btn-group">
            <a class="btn btn-success btnsml" href="{{URL::to(Helper::admin_slug().'/agent/edit',array($getAgent->agntu_id))}}" title="Edit">
                                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                  <!--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>-->
          <a class="btn btn-danger btnsml" href="{{URL::to(Helper::admin_slug().'/agent/delete',array($getAgent->agntu_id))}}" title="Delete">
                              <i class="icon_close_alt2"></i></a>
                                  </div>
                                  @endif
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                         </form>
                      </section>
                       {!! $agents->render() !!}
                  </div>
              </div>
              <!-- Agent end-->
    @stop
