       @extends('admin.layout.master')
         @section('content')        
       <?php  if( Auth::check() ){ $userid = Auth::user()->id ; $userrolid = Auth::user()->role_id ;}else{ $userid = "";$userrolid =""; } ?>
              <!--overview start-->
			 <div class="row">
				<div class="col-lg-12">
         <div class="col-lg-2">
					<h3 class="Agent-header"><i class="fa fa-files-o"></i> Agent Order</h3>
          </div>
          <div class="col-lg-10">
             <div class="panel-body">
                <form class="form-inline" method="get" name="dfltsearch" id="dfltsearch" action="" role="form">
                        <div class="form-group">
                         <select class="form-control" id="ordersts" name="ordersts">
                           <option value="">status</option>
                           <option value="1">Pending</option>
                           <option value="2">Success</option>
                           <option value="3">Cancel</option>
                         </select>
                        </div>
                        <div class="form-group">
                         <select class="form-control" id="pymnttyp" name="pymnttyp">
                           <option value="">payment Type</option>
                           <option value="1">Cash</option>
                           <option value="2">Credit Card</option>
                         </select>
                        </div>
                        <div class="form-group">
                         <input type="text" class="form-control" id="datefrom" name="datefrom" value="{!! Input::get('datefrom') !!}" placeholder="From Date">
                        </div>
                        <div class="form-group">
                         <input type="text" class="form-control" id="dateto" name="dateto" value="{!! Input::get('dateto') !!}" placeholder="To Date">
                        </div>
                        <div class="form-group">
                         <input type="text" class="form-control" id="searchkey" name="searchkey" value="{!! Input::get('searchkey') !!}" placeholder="Enter keyword">
                        </div>
                      <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                  </div>
                </div>
				      </div>
			      </div>
            <?php 
                  $totalcrdt = "";
                  $agntorder = Helper::tableval('agent_order','agntid',$userid);
                  if($agntorder){
                       foreach ($agntorder as $key => $value) {
                          if($value->payment_mode==1){
                            $totalcrdt+=$value->total_amount;
                          }
                        }
                     }
                    
                  $agntfund = Helper::tableval('agentfund','agnt_id',$userid);
                  $totaldebit = "";
                    if($agntfund){
                       foreach ($agntfund as $key => $value) {
                          $totaldebit+=$value->agnt_fund;
                       }
                     }
                 
             ?>
              <!-- Agent start -->              
              <div class="row">
              @if (Session::has('message'))
              <div class="col-lg-12">
                 <div class="alert alert-success fade in">{{ Session::get('message') }}</div>
                  </div>
                  @endif
                  <div class="col-lg-12">
                  @if($userrolid==6)
                   <strong>Available funds : Rs. {!! $totaldebit-$totalcrdt !!}</strong>
                   @endif
                      <section class="panel">
                          <header class="panel-heading">
                              Agent Order
                          </header>

                        <form name="itmmultidlt" action="{{URL::to(Helper::admin_slug().'/agent/order/multidelete')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           @if($userrolid !=6)
                          <input type="submit" name="multidlt" class="" value="delete" title="Delete Selected Items">
                           @endif
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                @if($userrolid !=6)
                                  <th style="width: 4%;">
                                  <input type="checkbox" id="select_all"/>
                                  </th>
                                  <th>Agent Name</th>
                                  @endif
                                  <th>PNR/Booking No</th>
                                  <th>Order Date</th>
                                  <th>Payment Mode</th>
                                  <th>Cost Price</th>
                                  <th>Total Amount</th>
                                  <th>CC charges</th>
                                  <th>Credit card number</th>
                                  <th>Expiry date</th>
                                  <th>Name on the card</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              @foreach($agentorders as $getAgentorder)
                                <tr>
                                @if($userrolid !=6)
                                  <td>
                                  <input name="multicheckbox[]" type="checkbox" id="multicheckbox[]" value="{!! $getAgentorder->Id !!}" class="multicheckbox" >
                                  </td>
                                  <td>{!! Helper::singlecolval('agent','agntu_id',$getAgentorder->agntid,'agnt_name') !!}</td>
                                  @endif
                                  <td>{!! $getAgentorder->pnr_booking_no !!}</td>
                                  <td>{!! substr($getAgentorder->created_at,0,10) !!}</td>
                                  <td>
                                   <?php if($getAgentorder->payment_mode==1){
                                            echo "Cash";
                                          }else{
                                            echo "Credit Card";
                                          }
                                    ?>
                                  </td>
                                  <td>Rs. {!! $getAgentorder->cost_price !!}</td>
                                  <td>Rs. {!! $getAgentorder->total_amount !!}</td>
                                  @if($getAgentorder->credit_cardno !="")
                                  <td>Rs. {!! $getAgentorder->cc_charges !!}</td>
                                  <td>{!! $getAgentorder->credit_cardno !!}</td>
                                  <td>{!! $getAgentorder->expiry_date !!}</td>
                                  <td>{!! $getAgentorder->card_holdername !!}</td>
                                  @else
                                   <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  @endif
                                  <td>
                                  @if($getAgentorder->status==1)
                                   <span class="label label-danger">
                                     Pending
                                     </span>
                                     @elseif($getAgentorder->status==2)
                                     <span class="label label-success">
                                     Success
                                     </span>
                                     @else
                                     <span class="label label-danger">
                                     Cancel
                                    </span>
                                   @endif
                                  </td>
                                  <td>
                                  @if(Auth::user()->hasRole(Config::get('constants.All-privileges'))) 
                                  <div class="btn-group">
                              <a class="btn btn-success btnsml" href="{{URL::to(Helper::admin_slug().'/agent/order/edit',array($getAgentorder->Id))}}" title="Edit">
                                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                  <!--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>-->
                              <a class="btn btn-danger btnsml" href="{{URL::to(Helper::admin_slug().'/agent/order/delete',array($getAgentorder->Id))}}" title="Delete"><i class="icon_close_alt2"></i></a>
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
                       {!! $agentorders->appends(Request::input())->links() !!}
                  </div>
              </div>
              <!-- Agent end-->
    @stop
