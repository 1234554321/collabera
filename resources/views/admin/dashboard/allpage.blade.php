       @extends('admin.layout.master')
         @section('content')        
              <!--overview start-->
			 <div class="row">
				<div class="col-lg-12">
         <div class="col-lg-4">
					<h3 class="page-header"><i class="fa fa-files-o"></i> Pages</h3>
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
                              All Pages
                          </header>

                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th style="width: 4%;"><input type="checkbox" id="select_all"/><a class="" href="{{URL::to(Helper::admin_slug().'/page/multidelete')}}" title="Delete Selected Items"><i class="icon_close_alt2"></i></a></th>
                                  <th>Title</th>
                                  <th>Publish Date</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              @foreach($pages as $getpage)
                                <tr>
                                  <td><input name="multicheckbox[]" type="checkbox" id="multicheckbox[]" value="{!! $getpage->id !!}" class="multicheckbox" ></td>
                                  <td>{!! $getpage->pagetitle !!}</td>
                                  <td>{!! $getpage->created_at !!}</td>
                                  <td>
                                  @if($getpage->status==1)
                                   <span class="label label-success">
                                     Active
                                     </span>
                                   @else
                                   <span class="label label-danger">
                                     Inactive
                                    </span>
                                   @endif
                                  </td>
                                  <td>
                                  <div class="btn-group">
                           <a class="btn btn-success" href="{{URL::to(Helper::admin_slug().'/page/edit',array($getpage->id))}}" title="Edit">
                                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                  <!--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>-->
                                      <a class="btn btn-danger" href="{{URL::to(Helper::admin_slug().'/page/delete',array($getpage->id))}}" title="Delete"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                      </section>
                       {!! $pages->render() !!}
                  </div>
              </div>
              <!-- page end-->
    @stop
