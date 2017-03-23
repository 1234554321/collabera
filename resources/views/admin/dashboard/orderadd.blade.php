       @extends('admin.layout.master')
         @section('content')     
    <?php  if( Auth::check() ){ $userid = Auth::user()->id ; $userrolid = Auth::user()->role_id ;}else{ $userid = "";$userrolid =""; } ?>    
     <!--overview start-->
			 <div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">
			     <li><i class="fa fa-home"></i><a href="{{URL::to(Helper::admin_slug().'/dashboard')}}">Home</a></li>
						<li><i class="icon_document_alt"></i>Add Order</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Add Order
                          </header>
                          
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="Order_form" method="post" action="{{URL::to(Helper::admin_slug().'/agent/order/save')}}" enctype="multipart/form-data">
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                   <input type="hidden" name="agntid" value="<?php echo $userid;?>" id="agntid">
                                      <div class="form-group ">
                                      <label for="cname" class="control-label col-lg-2">PNR/Booking No <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                      <input class="form-control" id="pnrno" name="pnrno" value="{!! old('pnrno') !!}" type="text" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Payment Mode</label>
                                          <div class="col-lg-2">
                                             <label>
                                              <input type="radio" name="pymntmod" id="pymntmod" value="1" @if(old('pymntmod')==1) checked @endif >
                                              Cash 
                                              </label>
                                          </div>
                                          <div class="col-lg-2">
                                              <label>
                                              <input type="radio" name="pymntmod" id="pymntmod" value="2" @if(old('pymntmod')==2) checked @endif >
                                              Credit Card
                                              </label>
                                          </div>
                                      </div>  
                                       
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Cost Price</label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="cstprce" name="cstprce" value="{!! old('cstprce') !!}" type="number" />
                                          </div>
                                      </div>  
                                      <div class="form-group hiddenfld">
                                          <label for="cname" class="control-label col-lg-2">CC charges</label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="cchrges" name="cchrges" value="{!! old('cchrges') !!}" type="number" />
                                          </div>
                                      </div> 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Total Amount</label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="totalamnt" name="totalamnt" value="{!! old('totalamnt') !!}" type="number" readonly="readonly" />
                                          </div>
                                      </div>  
                                      <div class="form-group hiddenfld">
                                          <label for="cname" class="control-label col-lg-2">Credit card number</label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="crdtcardno" name="crdtcardno" value="{!! old('crdtcardno') !!}" type="number" />
                                          </div>
                                      </div>  
                                      <div class="form-group hiddenfld">
                                          <label for="cname" class="control-label col-lg-2">Expiry date</label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="exprdate" name="exprdate" value="{!! old('exprdate') !!}" type="text" readonly="" />
                                          </div>
                                      </div> 
                                      <div class="form-group hiddenfld">
                                          <label for="cname" class="control-label col-lg-2">Name on the card</label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="cardehldrname" name="cardehldrname" value="{!! old('cardehldrname') !!}" type="text" />
                                          </div>
                                      </div>  
                                      
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Status</label>
                                          <div class="col-sm-2">
                                             <select class="form-control m-bot15" name="sts">
                                              <option value="1">Pending</option>
                                          </select>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Save</button>
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
