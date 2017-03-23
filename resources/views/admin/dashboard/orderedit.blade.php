       @extends('admin.layout.master')
         @section('content')     
    <?php  if( Auth::check() ){ $userid = Auth::user()->id ; $userrolid = Auth::user()->role_id ;}else{ $userid = "";$userrolid =""; } ?>     
              <!--overview start-->
			 <div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{URL::to(Helper::admin_slug().'/dashboard')}}">Home</a></li>
						<li><i class="icon_document_alt"></i>View Order</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <span>View Order</span> >> <span>{{ $order->created_at }}</span>
                          </header>
                          
                          <div class="panel-body">
                              <div class="form">
                        <form class="form-validate form-horizontal" id="Order_form" method="post" action="{{URL::to(Helper::admin_slug().'/agent/order/updateInfo')}}" enctype="multipart/form-data">
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                   <input type="hidden" name="id" value="{{ $order->Id }}">
                                   <input type="hidden" name="agntid" value="{{ $order->agntid }}" id="agntid">
                                      <div class="form-group ">
                                      <label for="cname" class="control-label col-lg-2">PNR/Booking No <span class="required">*</span></label>
                                          <div class="col-lg-4">
                      <input class="form-control" id="pnrno" name="pnrno" type="text" value="{{ $order->pnr_booking_no }}" readonly="true" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                      <input type="hidden" name="pymntmod" id="pymntmod" value="{{ $order->payment_mode }}" >
                                          <label for="cname" class="control-label col-lg-2">Payment Mode</label>
                                          <div class="col-lg-2">
                                             <label>
                                         @if($order->payment_mode==1) Cash @endif
                                              </label>
                                          </div>
                                          <div class="col-lg-2">
                                              <label>
                                           @if($order->payment_mode==2) Credit Card @endif 
                                              </label>
                                          </div>
                                      </div>  
                                       
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Cost Price</label>
                                          <div class="col-lg-8">
                                            {{ $order->cost_price }}
                                          </div>
                                      </div>  
                                      <div class="form-group @if($order->payment_mode==1) hiddenfld @endif ">
                                          <label for="cname" class="control-label col-lg-2">CC charges</label>
                                          <div class="col-lg-8">
                                            {{ $order->cc_charges }}
                                          </div>
                                      </div> 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Total Amount</label>
                                          <div class="col-lg-8">
                                             {{ $order->total_amount }}
                                          </div>
                                      </div>  
                                      <div class="form-group @if($order->payment_mode==1) hiddenfld @endif ">
                                          <label for="cname" class="control-label col-lg-2">Credit card number</label>
                                          <div class="col-lg-8">
                                              {{ $order->credit_cardno }}
                                          </div>
                                      </div>  
                                      <div class="form-group @if($order->payment_mode==1) hiddenfld @endif ">
                                          <label for="cname" class="control-label col-lg-2">Expiry date</label>
                                          <div class="col-lg-8">
                                              {{ $order->expiry_date }}
                                          </div>
                                      </div> 
                                      <div class="form-group @if($order->payment_mode==1) hiddenfld @endif ">
                                          <label for="cname" class="control-label col-lg-2">Name on the card</label>
                                          <div class="col-lg-8">
                                              {{ $order->card_holdername }}
                                          </div>
                                      </div>  
                                      
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Status</label>
                                          <div class="col-sm-2">
                                             <select class="form-control m-bot15" name="sts" id="stsord">
                                              <option value="1" @if($order->status==1) selected @endif>Pending</option>
                                              <option value="2" @if($order->status==2) selected @endif>Success</option>
                                              <option value="3" @if($order->status==3) selected @endif>Cancel</option>
                                          </select>
                                          </div>
                                      </div>
                                       <div class="form-group rejectionreason" style="display: none;">
                                           <label class="control-label col-sm-2">Rejection Reason</label>
                                            <div class="col-sm-6">
                                             <textarea class="form-control" name="rjctionrsn" id="rjctionrsn" ></textarea>
                                           </div>
                                        </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Save</button>
                                              <a href="{{URL::to(Helper::admin_slug().'/agent/order')}}" class="btn btn-danger">Back</a>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>
              
              <!-- Agent end-->
   @stop