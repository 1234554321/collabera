       @extends('admin.layout.master')
         @section('content')          
              <!--overview start-->
			 <div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">
			     <li><i class="fa fa-home"></i><a href="{{URL::to(Helper::admin_slug().'/dashboard')}}">Home</a></li>
						<li><i class="icon_document_alt"></i>Add Agent</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Add Agent
                          </header>
                          
                          <div class="panel-body">
                         
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="Agent_form" method="post" action="{{URL::to(Helper::admin_slug().'/agent/save')}}" enctype="multipart/form-data">
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Agent Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control" id="agentname" name="agentname" value="{!! old('agentname') !!}" type="text" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Add funds</label>
                                          <div class="col-lg-8">
                                              <input class="form-control" id="agntfund" name="agntfund" value="{!! old('agntfund') !!}" type="number" />
                                          </div>
                                      </div>  
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Address </label>
                                          <div class="col-lg-8">
                          <textarea class="form-control" id="agentaddress" name="agentaddress" >{!! old('agentaddress') !!}</textarea>
                                          </div>
                                      </div> 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">City</label>
                                          <div class="col-lg-8">
                  <input class="form-control" id="agentcity" name="agentcity" value="{!! old('agentcity') !!}"  type="text" />
                                          </div>
                                      </div>  
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Country</label>
                                          <div class="col-lg-8">
                                              <input class="form-control" id="agentcountry" name="agentcountry" value="{!! old('agentcountry') !!}" type="text" />
                                          </div>
                                      </div>  
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Phone <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control" id="agentphone" name="agentphone" value="{!! old('agentphone') !!}" type="text" />
                                          </div>
                                      </div> 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Email</label>
                                          <div class="col-lg-8">
                                              <input class="form-control" id="agentemail" name="agentemail" value="{!! old('agentemail') !!}" type="email" />
                                          </div>
                                      </div> 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Username</label>
                                          <div class="col-lg-8">
                                              <input class="form-control" id="agentusrname" name="agentusrname" value="{!! old('agentusrname') !!}" type="text" />
                                          </div>
                                      </div> 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Password <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control" id="agntpassword" name="agntpassword" type="password" />
                                          </div>
                                      </div>  
                                      <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Confirm Password <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control" id="repassword" name="repassword" type="password" />
                                          </div>
                                      </div>      
                                      <div class="form-group ">
                                          <label for="curl" class="control-label col-lg-2">Image</label>
                                          <div class="col-sm-6">
                                              <input class="form-control " id="img" type="file" name="img" />
                                          </div>
                                         @if(Session::has('error'))
					                                 <p class="errors">{!! Session::get('error') !!}</p>
					                                @endif
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Status</label>
                                          <div class="col-sm-2">
                                             <select class="form-control m-bot15" name="sts">
                                              <option value="1">Active</option>
                                              <option value="0">Inactive</option>
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
