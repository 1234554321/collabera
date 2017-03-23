<?php
namespace App\Http\Controllers;
use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\AgentOrderRequest;
use App\Http\Controllers\Redirect;
use App\Models\Agent;
use App\Models\Agentfund;
use App\Models\User;
use App\Models\AgentOrder;
use Illuminate\Pagination;
use Mail;
use Input;
use Session;
use Image;
use App\Helpers\Helper;
class AgentOrderController extends BaseController
{
     public function index()
	 {
	   $srchval = Input::get('searchkey');
	   $datefrom = Input::get('datefrom');
	   $dateto = Input::get('dateto');
	   $ordersts = Input::get('ordersts');
	   $pymnttyp = Input::get('pymnttyp');
	   if( \Auth::check() ){ 
	   	  $userid = \Auth::user()->id ; 
	   	  $userrolid = \Auth::user()->role_id ;
	   	}else{ 
	   	  $userid = "";
	   	  $userrolid =""; 
	   	}
          
         switch ($userrolid) {
          	case '6':
          		if($srchval !=""){
             $agentorders = AgentOrder::where('agntid',$userid)->orwhere('status',$ordersts)->orWhere('payment_mode', $pymnttyp)->orWhere('card_holdername', 'like', '%'.$srchval.'%')->orWhere('credit_cardno', 'like', '%'.$srchval.'%')->orderBy('created_at', 'desc')->paginate(25);
			        }elseif ($ordersts !="") {
			 $agentorders = AgentOrder::where('agntid',$userid)->where('status',$ordersts)->orderBy('created_at', 'desc')->paginate(25);
			        }elseif ($pymnttyp !="") {
			 $agentorders = AgentOrder::where('agntid',$userid)->Where('payment_mode', $pymnttyp)->orderBy('created_at', 'desc')->paginate(25);
			        }elseif($datefrom !="" || $dateto !=""){
                       $agentorders = AgentOrder::where('agntid',$userid)->whereBetween('created_at', [$datefrom, $dateto])->orderBy('created_at', 'desc')->paginate(25);
			       }else{
			         $agentorders = AgentOrder::where('agntid',$userid)->orderBy('created_at', 'desc')->paginate(25);
			       }
          		break;
          	default:
          		if($srchval !=""){
          			$agntids="";
          			$agentmtch = Agent::where('agnt_name', 'like', '%'.$srchval.'%')->get();
          			if($agentmtch){
          			 foreach ($agentmtch as $agentmtchval) {
          			 	$agntids.= $agentmtchval->agntu_id.',';
          			   }
          			 }else{
          			 	$agntids="";
          			 }
          		  if($agntids !=""){
                      $agntidscom = rtrim($agntids,',');
          		     }else{
          		     	$agntidscom="";
          		     }
             $agentorders = AgentOrder::whereIn('agntid', [$agntidscom])->orWhere('card_holdername', 'like', '%'.$srchval.'%')->orWhere('credit_cardno', 'like', '%'.$srchval.'%')->orWhere('status', $ordersts)->orWhere('payment_mode', $pymnttyp)->orderBy('created_at', 'desc')->paginate(25);
			       }elseif ($ordersts !="") {
			       	$agentorders = AgentOrder::Where('status', $ordersts)->orderBy('created_at', 'desc')->paginate(25);
			       }elseif ($pymnttyp !="") {
			       	$agentorders = AgentOrder::Where('payment_mode', $pymnttyp)->orderBy('created_at', 'desc')->paginate(25);
			       }elseif($datefrom !="" || $dateto !=""){
                       $agentorders = AgentOrder::whereBetween('created_at', [$datefrom, $dateto])->orderBy('created_at', 'desc')->paginate(25);
			       }else{
			         $agentorders = AgentOrder::orderBy('created_at', 'desc')->paginate(25);
			       }
          		break;
          }
      return view('admin.dashboard.allagentorder',compact('agentorders'));
     }

      public function newOrder()
	  {
      return view('admin.dashboard.orderadd');
      }

     public function edit($id)
	 {
	  $order = AgentOrder::where('Id',$id)->first();
      return view('admin.dashboard.orderedit',compact('order'));
     }
     
      public function delete($id)
	 {
	 	 AgentOrder::where('Id',$id)->delete();
	   Session::flash('message', 'Successfully Deleted Order!');
       return back();
     }
	 
	 public function mltdelete()
	 {
	 	$mid = Input::get('multicheckbox');
	 	if(count($mid)>0){
	 	  foreach($mid as $id){
	 	  	AgentOrder::where('Id',$id)->delete();
	      }
	      Session::flash('message', 'Successfully Deleted Order!');
	    }
	   //Session::flash('message', 'Successfully Deleted agent!');
       return back();
     }
	 
	 public function save(AgentOrderRequest $request)
	  {
		 $pnrno = $request->input('pnrno');
		 $pymntmod = $request->input('pymntmod');
		 $cstprce = $request->input('cstprce');
		 $cchrges = $request->input('cchrges');
		 $totalamnt = $request->input('totalamnt');
		 $crdtcardno = $request->input('crdtcardno');
		 $exprdate = $request->input('exprdate');
		 $cardehldrname = $request->input('cardehldrname');
		 $sts = $request->input('sts');
         $agntid = $request->input('agntid');
         if($pymntmod==1){
            $totalcrdt = "";
              $agntorder = Helper::tableval('agent_order','agntid',$agntid);
               if($agntorder){
                foreach ($agntorder as $key => $value) {
                 if($value->payment_mode==1){
                 $totalcrdt+=$value->total_amount;
                 }
                }
              }
                                    
             $agntfund = Helper::tableval('agentfund','agnt_id',$agntid);
              $totaldebit = "";
                if($agntfund){
                 foreach ($agntfund as $key => $value) {
                 $totaldebit+=$value->agnt_fund;
                }
              }
            
            if($totaldebit>0){
                $totalfund = $totaldebit - $totalcrdt ;
            }else{
            	$totalfund = 0;
            }
         }else{
         	$totalfund = 0;
         }
		 $order = new AgentOrder;
		 $order->pnr_booking_no = $pnrno;
		 $order->payment_mode = $pymntmod;
		 $order->cost_price = $cstprce;
		 $order->cc_charges = $cchrges;
		 $order->total_amount = $totalamnt;
		 $order->credit_cardno = $crdtcardno;
		 $order->expiry_date = $exprdate;
		 $order->card_holdername = $cardehldrname;
		 $order->status = $sts;
		 $order->agntid = $agntid;
		 $order->created_at = date("Y-m-d");
		  if($pymntmod==1 && $totalfund>=$totalamnt){
              $order->save();
               Session::flash('message', 'Successfully Added Order!');
		       return Redirect(Helper::admin_slug().'/agent/order');
		     }elseif ($pymntmod==2) {
		     	$order->save();
		     	 Session::flash('message', 'Successfully Added Order!');
		        return Redirect(Helper::admin_slug().'/agent/order');
		     }else{
		     	Session::flash('message', 'Error! Your Fund amount to low, Please Contact Your Fund Provider.');
		        return Redirect(Helper::admin_slug().'/agent/order');
		     }
	 }
	  
	public function updateInfo(AgentOrderRequest $request)
	  {
		 $order = new AgentOrder;
		$rjctionrsn =  $request->input('rjctionrsn');
		 $data = array('pnr_booking_no' => $request->input('pnrno'),
		                'status' => $request->input('sts'),
		                'agntid' => $request->input('agntid'),
		                'updated_at' => date("Y-m-d H:i:s"),
		                'status' => $request->input('sts')
		               );
		 $order->where('Id',$request->input('id'))->update($data);
        
        $to = singlecolval('agent','agntu_id',$request->input('agntid'),'agnt_email');
        $subject = 'Order status';
		if($request->input('sts')==3){
		$message = $request->input('pnrno'). " This PNR/Booking No have canceled . ".$rjctionrsn;
		$data = array(
	     'toemail'     => $to,
	     'subject'     => $subject,
        'bodymessage'     => $message
         );
		    Mail::send([], $data, function ($message) use ($data) {
		        $message->from('support@pxlmagik.com', 'Order Status');
		        $message->subject($data['subject']);
		        $message->setBody($data['bodymessage']);
		        $message->to($data['toemail']);
		    });
    	}elseif($request->input('sts')==2){
		   $message = $request->input('pnrno').' This PNR/Booking No order have been completed.';
			$data = array(
		     'toemail'     => $to,
		     'subject'     => $subject,
	        'bodymessage'     => $message
	         );
		    Mail::send([], $data, function ($message) use ($data) {
		        $message->from('support@pxlmagik.com', 'Order Status');
		        $message->subject($data['subject']);
		        $message->setBody($data['bodymessage']);
		        $message->to($data['toemail']);
		    });
    	}else{

    	}
		 Session::flash('message', 'Successfully Updated Order!');
		 return Redirect(Helper::admin_slug().'/agent/order');
	  }
}
