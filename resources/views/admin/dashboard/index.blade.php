       @extends('admin.layout.master')
         @section('content')
<?php  if( Auth::check() ){ $userid = Auth::user()->id ; $userrolid = Auth::user()->role_id ;}else{ $userid = "";$userrolid =""; } ?>          
              <!--overview start-->
      			  <div class="row">
      				<div class="col-lg-12">
      					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
      					<ol class="breadcrumb">
      						<li><i class="fa fa-home"></i><a href="Helper::admin_slug().'dashboard'">Home</a></li>
      						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
      					</ol>
      				</div>
      			</div>
              
            <div class="row">
               @if (Session::has('message'))
                <div class="col-lg-12">
                 <div class="alert alert-success fade in">{{ Session::get('message') }}</div>
               </div>
              @endif
          @if($userrolid !=6)
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box brown-bg">
            <i class="fa fa-users" aria-hidden="true"></i>
            <div class="count">{{ Helper::totalagent() }}</div>
            <div class="title">Agent</div>            
          </div><!--/.info-box-->     
        </div><!--/.col-->  
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box dark-bg">
            <i class="fa fa-shopping-cart"></i>
            <div class="count">{{ Helper::totalorder() }}</div>
            <div class="title">Order</div>            
          </div><!--/.info-box-->     
        </div><!--/.col-->
         @endif

			 </div><!--/.row-->	
          @stop