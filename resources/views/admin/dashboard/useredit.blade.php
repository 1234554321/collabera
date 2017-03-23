       @extends('admin.layout.master')
         @section('content')          
              <!--overview start-->
			 <div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{URL::to(Helper::admin_slug().'/dashboard')}}">Home</a></li>
						<li><i class="icon_document_alt"></i>Edit User</li>
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
                              Edit User
                          </header>
                          
                          <div class="panel-body">
                         
                              <div class="form">
                        <form class="form-validate form-horizontal" id="page_form" method="post" action="{{URL::to(Helper::admin_slug().'/user/updateInfo')}}" enctype="multipart/form-data">
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                   <input type="hidden" name="id" value="{{ $users->id }}">
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Username</label>
                                      <div class="col-sm-6">
                                          <input type="text"  class="form-control" name="username"  placeholder="Username"  value="{{ $users->username }}">
                                      </div>
                                    </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Name</label>
                                      <div class="col-sm-6">
                                          <input type="text"  class="form-control" name="name" id="name" placeholder="Name" value="{{ $users->name }}">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Email</label>
                                      <div class="col-sm-6">
                                          <input type="text"  class="form-control" name="email" id="email" placeholder="Email" value="{{ $users->email }}">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Change Password</label>
                                      <div class="col-sm-6">
                                          <input type="password"  class="form-control" name="password" id="password" placeholder="Change Password">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Role</label>
                                        <div class="col-sm-2">
                                         <select name="userrole" class="form-control m-bot15">
                                              <option value="1" <?php if($users->role_id==1){ echo "selected"; }?>>Super admin</option>
                                              <option value="2" <?php if($users->role_id==2){ echo "selected"; }?>>Admin</option>
                                              <option value="3" <?php if($users->role_id==3){ echo "selected"; }?>>Editor</option>
                                              <option value="4" <?php if($users->role_id==4){ echo "selected"; }?>>Author</option>
                                              <option value="5" <?php if($users->role_id==5){ echo "selected"; }?>>subscribar</option>
                                          </select>
                                        </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-sm-2 control-label">Profile Picture</label>
                                      <div class="col-sm-6">
                                      <input type="file" name="userprflimg" id="userprflimg" class="form-control">
                                       </div>
                                  </div>
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Save</button>
                                               <a href="{{URL::to(Helper::admin_slug().'/user')}}" class="btn btn-danger">Back</a>
                                          </div>
                                         
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>
              
              <!-- page end-->
   @stop
