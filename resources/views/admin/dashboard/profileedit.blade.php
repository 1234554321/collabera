       @extends('admin.layout.master')
         @section('content')          
              <!--overview start-->
			 <div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{URL::to(Helper::admin_slug().'/dashboard')}}">Home</a></li>
						<li><i class="icon_profile"></i>Edit Profile</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
              @if(count($errors->all())>0)
               <div class="col-lg-12">
                <div class="alert alert-block alert-danger fade in">
                      {!! HTML::ul($errors->all()) !!}
                     </div>
                    </div>
                   @endif
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Profile Update
                          </header>
                          
                          <div class="panel-body">
                             
                           
                              <div class="form">
                              @foreach($userdata as $data)
                        <form class="form-validate form-horizontal" id="profile_form" method="post" action="{{URL::to(Helper::admin_slug().'/profile/userupdate')}}" enctype="multipart/form-data">
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                   <input type="hidden" name="uid" value="{{ $data->id }}">
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Username <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                       <input class="form-control" id="editusername" name="editusername" type="text" value="{{ $data->username }}" />
                                          </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Full Name <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                       <input class="form-control" id="editname" name="editname" type="text" value="{{ $data->name }}" />
                                          </div>
                                      </div>

                                       <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Email <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                       <input class="form-control" id="editemail" name="editemail" type="email" value="{{ $data->email }}" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Change Password <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                       <input class="form-control" id="password" name="password" type="password" value="" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                         
                                          <div class="col-sm-2">
                                             <input type="hidden" value="1" class="form-control m-bot15" name="editrole" >
                                               
                                          </select>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Save</button>
                                          </div>
                                      </div>
                                  </form>
                                  @endforeach
                              </div>

                          </div>
                      </section>
                  </div>
              </div>
              
              <!-- page end-->
   @stop
