       @extends('admin.layout.master')
         @section('content')   
              <!--overview start-->
			 <div class="row">
				<div class="col-lg-12">
          <div class="col-lg-4">
					  <h3 class="page-header"><i class="fa fa-files-o"></i> Users</h3>
          </div>
          <div class="col-lg-8">
             <div class="panel-body">
                <form class="form-inline" method="get" name="dfltsearch" id="dfltsearch" action="" role="form">
                        <div class="form-group">
                          <select class="form-control" name="rlid">
                           <option value="0">Role</option>
                           <option value="1" <?php if(Input::get('rlid')==1){ echo "selected"; }?>>Super admin</option>
                           <option value="2" <?php if(Input::get('rlid')==2){ echo "selected"; }?>>Administrator</option>
                           <option value="3" <?php if(Input::get('rlid')==3){ echo "selected"; }?>>Editor</option>
                           <option value="4" <?php if(Input::get('rlid')==4){ echo "selected"; }?>>Author</option>
                           <option value="5" <?php if(Input::get('rlid')==5){ echo "selected"; }?>>User</option>
                          </select>
                          </div>
                          <div class="form-group">
                         <input type="text" class="form-control" id="searchkey" value="{!! Input::get('searchkey') !!}" name="searchkey" placeholder="Enter keyword">
                        </div>
                      <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                  </div>
                </div>
				    </div>
			    </div>
              <!-- page start -->              
              <div class="row">
              @if (Session::has('message'))
              <div class="col-lg-12">
                 <div class="alert alert-success fade in">{{ Session::get('message') }}</div>
                  </div>
                  @endif
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              All Users
                          </header>
                          <form name="datatable" id="datatable" action="{{URL::to(Helper::admin_slug().'/user/multidelete')}}" method="post">
                          <input type="submit" title="Delete Selected Items" class="" value="Delete">
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th style="width: 4%;"><input type="checkbox" id="select_all"/></th>
                                  <th>Name</th>
                                  <th>email</th>
                                  <th>Role</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              @foreach($users as $getuser)
                                <tr>
                                  <td>
                      <input name="multicheckbox[]" type="checkbox" id="multicheckbox[]" value="{!! $getuser->id !!}" class="multicheckbox" >
                                  </td>
                                  <td>{!! $getuser->name !!}</td>
                                  <td>{!! $getuser->email !!}</td>
                                  <td>
                                   <?php if($getuser->role_id==1){ echo "Super admin"; }?>
                                   <?php if($getuser->role_id==2){ echo "Admin"; }?>
                                   <?php if($getuser->role_id==3){ echo "Editor"; }?>
                                   <?php if($getuser->role_id==4){ echo "Author"; }?>
                                   <?php if($getuser->role_id==5){ echo "subscribar"; }?>
                                  </td>
                                  <td>
                                  <div class="btn-group">
                    <a class="btn btn-success btnsml" href="{{URL::to(Helper::admin_slug().'/user/edit',array($getuser->id))}}" title="Edit">
                                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                  <!--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>-->
                  <a class="btn btn-danger btnsml" href="{{URL::to(Helper::admin_slug().'/user/delete',array($getuser->id))}}" title="Delete">
                                      <i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </form>
                      </section>
                       {!! $users->render() !!}
                  </div>
              </div>
              <!-- page end-->
    @stop
