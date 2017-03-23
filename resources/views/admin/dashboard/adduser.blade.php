       @extends('admin.layout.master')
         @section('content')          
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Add New User</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{URL::to(Helper::admin_slug())}}/dashboard">Home</a></li>
						<li><i class="fa fa-user" aria-hidden="true"></i>User</li>
						<li><i class="fa fa-file-text-o"></i>Add New User</li>
					</ol>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             &nbsp;
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal " id="user_form" method="post" action="{{URL::to(Helper::admin_slug().'/user/save')}}" enctype="multipart/form-data">
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Username</label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" name="username" id="username" placeholder="Username">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Name</label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" name="name" id="name" placeholder="Name">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Email</label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" name="email" id="email" placeholder="Email">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Password</label>
                                      <div class="col-sm-10">
                                          <input type="password"  class="form-control" name="password" id="password" placeholder="Password">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Role</label>
                                        <div class="col-sm-10">
                                         <select name="userrole" class="form-control m-bot15">
                                              <option value="1">Super admin</option>
                                              <option value="2">Admin</option>
                                              <option value="3">Editor</option>
                                              <option value="4">Author</option>
                                              <option value="5">subscribar</option>
                                          </select>
                                        </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-sm-2 control-label">Profile Picture</label>
                                      <div class="col-sm-10">
                                      <input type="file" name="userprflimg" id="userprflimg" class="form-control">
                                       </div>
                                  </div>
                                  <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Save</button>
                                          </div>
                                      </div>
                              </form>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- Basic Forms & Horizontal Forms-->
         </div>
      </div>
    <!-- page end-->
   @stop
