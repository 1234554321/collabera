       @extends('admin.layout.master')
         @section('content')         
          <?php  if( Auth::check() ){ $userid = Auth::user()->id ; $userrolid = Auth::user()->role_id ;}else{ $userid = "";$userrolid =""; } ?> 
              <!--overview start-->
			 <div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{URL::to(Helper::admin_slug().'/dashboard')}}">Home</a></li>
						<li><i class="icon_document_alt"></i>Edit Agent</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Edit Agent
                          </header>
                          
                          <div class="panel-body">
                              <div class="form">
                        <form class="form-validate form-horizontal" id="Agent_form" method="post" action="{{URL::to(Helper::admin_slug().'/agent/updateInfo')}}" enctype="multipart/form-data">
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                   <input type="hidden" name="id" value="{{ $agents->agntu_id }}">
                                      <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2"><strong>Agent Name</strong><span class="required">*</span></label>
                                          <div class="col-lg-8">
                              <input class="form-control" id="agentname" name="agentname" type="text" value="{{ e(stripslashes($agents->agnt_name)) }}" />
                                          </div>
                                      </div>
                                         <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Address </label>
                                          <div class="col-lg-8">
                                              <textarea class="form-control" id="agentaddress" name="agentaddress" >{{ e(stripslashes($agents->agnt_address)) }}</textarea>
                                          </div>
                                      </div> 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">City</label>
                                          <div class="col-lg-8">
                                              <input class="form-control" id="agentcity" value="{{ e(stripslashes($agents->agnt_city)) }}" name="agentcity" type="text" />
                                          </div>
                                      </div>  
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Country</label>
                                          <div class="col-lg-8">
                                              <input class="form-control" id="agentcountry" value="{{ e(stripslashes($agents->agnt_country)) }}" name="agentcountry" type="text" />
                                          </div>
                                      </div>  
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Phone <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control" id="agentphone" name="agentphone" value="{{ e($agents->agnt_phone) }}" type="text" />
                                          </div>
                                      </div> 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Email</label>
                                          <div class="col-lg-8">
                                              <input class="form-control" id="agentemail" name="agentemail" value="{{ e($agents->agnt_email) }}" type="email" />
                                          </div>
                                      </div> 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Username</label>
                                          <div class="col-lg-8">
                                              <input class="form-control" id="agentusrname" name="agentusrname" value="{{ e($agents->agnt_username) }}" type="text" readonly="true" />
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
                                              <label for="curl" class="control-label col-lg-2 text-bold"><strong>Image</strong></label>
                                                <div class="col-lg-4">
                                               <input class="form-control " id="img" type="file" name="img" />
                                               </div>
                                               @if($agents->image !="")
                                               <div class="col-lg-2">
                                               <img src='{{ url('uploads') }}/thumbnail{!! $agents->image !!}'>
                                               </div>
                                               @endif
                                          </div>
                                        <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Status</label>
                                          <div class="col-sm-2">
                                             <select class="form-control m-bot15" name="sts">
                                              <option value="1" <?php if($agents->status==1){ echo "selected"; } ?>>Active</option>
                                              <option value="0" <?php if($agents->status==0){ echo "selected"; } ?>>Inactive</option>
                                          </select>
                                          </div>
                                      </div>
                                         
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Save</button>
                                              @if($userrolid !=6){
                                              <a href="{{URL::to(Helper::admin_slug().'/agent')}}" class="btn btn-danger">Back</a>
                                              @else
                                              <a href="{{URL::to(Helper::admin_slug().'/dashboard')}}" class="btn btn-danger">Back</a>
                                              @endif
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