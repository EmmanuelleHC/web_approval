<?php

namespace App;
use App\SysCompany;
use App\User;
use App\SysBranch;
use App\LogHistory;
use App\EmpMaster;
use App\ApprovalMaster;
use App\Events\SendApprovalEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class P3atTrx extends Model
{
    protected $table = 'p3at_master_trx';
    

    


	public function get_inq_p3at($user_id)
	{
		$list_org=[];
		$list_org_temp=[];
		$list_p3at=[];
		$isHO=false;
		$emp_id=EmpMaster::select('ID')->where('user_id',$user_id)->value('ID');
		$branch_id='SELECT sb.ORG_ID from sys_responsibility sr,sys_user_resp sur,sys_branch sb where sr.RESPONSIBILITY_ID=sur.RESP_ID AND sr.BRANCH_ID=sb.BRANCH_ID AND sur.USER_ID='.$user_id.' group by sur.USER_ID,sb.ORG_ID';
		$data_cabang=DB::select(DB::raw($branch_id));
		
		foreach ($data_cabang as $key) {

			if($key->ORG_ID=='81'){
				$isHO=true;
			}else{
				$isHO=false;
				array_push($list_org,$key->ORG_ID);
			}
				 	
		}  

		if($isHO==true){
			$data_outstanding=ApprovalMaster::select('ID_APPR_1','ID_APPR_2','ID_APPR_3','ID_APPR_4','ID_APPR_5','ID_APPR_6','ID_APPR_7','ID_APPR_8','ID_APPR_9','ID_APPR_10','ID_APPR_11','ID_APPR_12','ID_APPR_13','ID_APPR_14','ID_APPR_5','ORG_ID')->get();
			foreach ($data_outstanding as $key) {
			 	if($key->ID_APPR_1==$emp_id)
			 	{
			 		$approve_count=1;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_2==$emp_id)
			 	{
			 		$approve_count=2;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_3==$emp_id)
			 	{
			 		$approve_count=3;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}

			 	}else if($key->ID_APPR_4==$emp_id)
			 	{
			 		$approve_count=4;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_5==$emp_id)
			 	{
			 		$approve_count=5;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_6==$emp_id)
			 	{
			 		$approve_count=6;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_7==$emp_id)
			 	{
			 		$approve_count=7;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_8==$emp_id)
			 	{
			 		$approve_count=8;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_9==$emp_id)
			 	{
			 		$approve_count=9;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_10==$emp_id)
			 	{
			 		$approve_count=10;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}
			}
		
			
			
			$data_outstanding=P3atTrx::select('P3AT_NUMBER','P3AT_DATE','STATUS','EFFECTIVE_DATE',DB::raw('count(*) as TOTAL_QTY'),DB::raw('sum(ASSET_PRICE) as TOTAL_ASSET_PRICE'),DB::raw('sum(COST_OF_REMOVAL) as TOTAL_COST_REMOVAL'),DB::raw('SUM(BOOKS_PRICE) AS TOTAL_BOOKS_PRICE'))->whereIn('ORG_ID',$list_org)->whereIn('P3AT_NUMBER',$list_p3at)->groupBy('P3AT_NUMBER','P3AT_DATE','STATUS','EFFECTIVE_DATE')->get();
		}else{

			$data_outstanding=ApprovalMaster::select('ID_APPR_1','ID_APPR_2','ID_APPR_3','ID_APPR_4','ID_APPR_5','ID_APPR_6','ID_APPR_7','ID_APPR_8','ID_APPR_9','ID_APPR_10','ID_APPR_11','ID_APPR_12','ID_APPR_13','ID_APPR_14','ID_APPR_5','ORG_ID')->whereIn('ORG_ID',$list_org)->get();
			foreach ($data_outstanding as $key) {

			 	if($key->ID_APPR_1==$emp_id)
			 	{
			 		$approve_count=1;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}

			 	}else if($key->ID_APPR_2==$emp_id)
			 	{

			 		$approve_count=2;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_3==$emp_id)
			 	{
			 		$approve_count=3;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}

			 	}else if($key->ID_APPR_4==$emp_id)
			 	{
			 		$approve_count=4;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_5==$emp_id)
			 	{
			 		$approve_count=5;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_6==$emp_id)
			 	{
			 		$approve_count=6;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_7==$emp_id)
			 	{
			 		$approve_count=7;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_8==$emp_id)
			 	{
			 		$approve_count=8;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_9==$emp_id)
			 	{
			 		$approve_count=9;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_10==$emp_id)
			 	{
			 		$approve_count=10;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}
			}

			$data_outstanding=P3atTrx::select('P3AT_NUMBER','P3AT_DATE','STATUS','EFFECTIVE_DATE',DB::raw('count(*) as TOTAL_QTY'),DB::raw('sum(ASSET_PRICE) as TOTAL_ASSET_PRICE'),DB::raw('sum(COST_OF_REMOVAL) as TOTAL_COST_REMOVAL'),DB::raw('SUM(BOOKS_PRICE) AS TOTAL_BOOKS_PRICE'))->whereIn('ORG_ID',$list_org_temp)->whereIn('P3AT_NUMBER',$list_p3at)->groupBy('P3AT_NUMBER','P3AT_DATE','STATUS','EFFECTIVE_DATE')->get();
			

      
         
		}   
	    return $data_outstanding;
	}

	public function cek_approval_ke($user_id)
	{
		$list_org=[];
		$list_org_temp=[];
		$list_p3at=[];
		$approval_count='';
		$emp_id=EmpMaster::select('ID')->where('user_id',$user_id)->value('ID');
		$branch_id='SELECT sb.ORG_ID from sys_responsibility sr,sys_user_resp sur,sys_branch sb where sr.RESPONSIBILITY_ID=sur.RESP_ID AND sr.BRANCH_ID=sb.BRANCH_ID AND sur.USER_ID='.$user_id.' group by sur.USER_ID,sb.ORG_ID';
		$data_cabang=DB::select(DB::raw($branch_id));
		foreach ($data_cabang as $key) {

			if($key->ORG_ID=='81'){
				$isHO=true;
			}else{
				$isHO=false;
				array_push($list_org,$key->ORG_ID);
			}
				 	
		}
		if($isHO==true){
			$data_outstanding=ApprovalMaster::select('ID_APPR_1','ID_APPR_2','ID_APPR_3','ID_APPR_4','ID_APPR_5','ID_APPR_6','ID_APPR_7','ID_APPR_8','ID_APPR_9','ID_APPR_10','ID_APPR_11','ID_APPR_12','ID_APPR_13','ID_APPR_14','ID_APPR_5','ORG_ID')->get();
			foreach ($data_outstanding as $key) {
			 	if($key->ID_APPR_1==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_2==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=1;
			 		}

			 	}else if($key->ID_APPR_2==$emp_id)
			 	{

			 		if(is_null($key->ID_APPR_3)==true){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=2;
			 		}
			 		
			 	}else if($key->ID_APPR_3==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_4==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=3;
			 		}
			 		

			 	}else if($key->ID_APPR_4==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_5==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=4;
			 		}
			 		
			 	}else if($key->ID_APPR_5==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_6==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=5;
			 		}
			 		
			 	}else if($key->ID_APPR_6==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_7==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=6;
			 		}
			 		
			 	}else if($key->ID_APPR_7==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_8==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=7;
			 		}
			 		
			 	}else if($key->ID_APPR_8==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_9==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=8;
			 		}
			 	
			 	}else if($key->ID_APPR_9==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_10==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=9;
			 		}
			 		
			 	}else if($key->ID_APPR_10==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_11==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=10;
			 		}
			 		
			 	}
			}
		
			
			
			
		}else{
			$data_outstanding=ApprovalMaster::select('ID_APPR_1','ID_APPR_2','ID_APPR_3','ID_APPR_4','ID_APPR_5','ID_APPR_6','ID_APPR_7','ID_APPR_8','ID_APPR_9','ID_APPR_10','ID_APPR_11','ID_APPR_12','ID_APPR_13','ID_APPR_14','ID_APPR_5','ORG_ID')->whereIn('ORG_ID',$list_org)->get();
			foreach ($data_outstanding as $key) {

			 	if($key->ID_APPR_1==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_2==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=1;
			 		}

			 	}else if($key->ID_APPR_2==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_3==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=2;
			 		}
			 		
			 	}else if($key->ID_APPR_3==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_4==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=3;
			 		}
			 		

			 	}else if($key->ID_APPR_4==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_5==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=4;
			 		}
			 		
			 	}else if($key->ID_APPR_5==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_6==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=5;
			 		}
			 		
			 	}else if($key->ID_APPR_6==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_7==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=6;
			 		}
			 		
			 	}else if($key->ID_APPR_7==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_8==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=7;
			 		}
			 		
			 	}else if($key->ID_APPR_8==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_9==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=8;
			 		}
			 	
			 	}else if($key->ID_APPR_9==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_10==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=9;
			 		}
			 		
			 	}else if($key->ID_APPR_10==$emp_id)
			 	{
			 		if(is_null($key->ID_APPR_11==true)){
			 			$approve_count=100;
			 		}else{
			 			$approve_count=10;
			 		}
			 		
			 	}
			}
         
		}   
	    return $approve_count;  
	}
	public function get_inq_app_p3at($user_id)
	{
		$list_org=[];
		$list_org_temp=[];
		$list_p3at=[];
		$isHO=false;
		$emp_id=EmpMaster::select('ID')->where('user_id',$user_id)->value('ID');
		$branch_id='SELECT sb.ORG_ID from sys_responsibility sr,sys_user_resp sur,sys_branch sb where sr.RESPONSIBILITY_ID=sur.RESP_ID AND sr.BRANCH_ID=sb.BRANCH_ID AND sur.USER_ID='.$user_id.' group by sur.USER_ID,sb.ORG_ID';
		$data_cabang=DB::select(DB::raw($branch_id));
		
		foreach ($data_cabang as $key) {

			if($key->ORG_ID=='81'){
				$isHO=true;
			}else{
				$isHO=false;
				array_push($list_org,$key->ORG_ID);
			}
				 	
		}  


		
		if($isHO==true){
			$data_outstanding=ApprovalMaster::select('ID_APPR_1','ID_APPR_2','ID_APPR_3','ID_APPR_4','ID_APPR_5','ID_APPR_6','ID_APPR_7','ID_APPR_8','ID_APPR_9','ID_APPR_10','ID_APPR_11','ID_APPR_12','ID_APPR_13','ID_APPR_14','ID_APPR_5','ORG_ID')->get();
			foreach ($data_outstanding as $key) {
			 	if($key->ID_APPR_1==$emp_id)
			 	{
			 		$approve_count=1;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_2==$emp_id)
			 	{
			 		$approve_count=2;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_3==$emp_id)
			 	{
			 		$approve_count=3;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}

			 	}else if($key->ID_APPR_4==$emp_id)
			 	{
			 		$approve_count=4;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_5==$emp_id)
			 	{
			 		$approve_count=5;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_6==$emp_id)
			 	{
			 		$approve_count=6;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_7==$emp_id)
			 	{
			 		$approve_count=7;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_8==$emp_id)
			 	{
			 		$approve_count=8;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_9==$emp_id)
			 	{
			 		$approve_count=9;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_10==$emp_id)
			 	{
			 		$approve_count=10;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}
			}
		
			
			
			$data_outstanding=P3atTrx::select('P3AT_NUMBER','P3AT_DATE','STATUS','EFFECTIVE_DATE',DB::raw('count(*) as TOTAL_QTY'),DB::raw('sum(ASSET_PRICE) as TOTAL_ASSET_PRICE'),DB::raw('sum(COST_OF_REMOVAL) as TOTAL_COST_REMOVAL'),DB::raw('SUM(BOOKS_PRICE) AS TOTAL_BOOKS_PRICE'))->whereIn('ORG_ID',$list_org)->whereIn('P3AT_NUMBER',$list_p3at)->where('STATUS','!=','Approved')->where('STATUS','!=','Rejected')->groupBy('P3AT_NUMBER','P3AT_DATE','STATUS','EFFECTIVE_DATE')->get();
		}else{

			$data_outstanding=ApprovalMaster::select('ID_APPR_1','ID_APPR_2','ID_APPR_3','ID_APPR_4','ID_APPR_5','ID_APPR_6','ID_APPR_7','ID_APPR_8','ID_APPR_9','ID_APPR_10','ID_APPR_11','ID_APPR_12','ID_APPR_13','ID_APPR_14','ID_APPR_5','ORG_ID')->whereIn('ORG_ID',$list_org)->get();
			foreach ($data_outstanding as $key) {

			 	if($key->ID_APPR_1==$emp_id)
			 	{
			 		$approve_count=1;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}

			 	}else if($key->ID_APPR_2==$emp_id)
			 	{

			 		$approve_count=2;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_3==$emp_id)
			 	{
			 		$approve_count=3;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}

			 	}else if($key->ID_APPR_4==$emp_id)
			 	{
			 		$approve_count=4;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_5==$emp_id)
			 	{
			 		$approve_count=5;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_6==$emp_id)
			 	{
			 		$approve_count=6;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_7==$emp_id)
			 	{
			 		$approve_count=7;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_8==$emp_id)
			 	{
			 		$approve_count=8;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_9==$emp_id)
			 	{
			 		$approve_count=9;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_10==$emp_id)
			 	{
			 		$approve_count=10;
			 		$p3at_temp='';
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID);
			 		if($p3at_temp!=''){
			 			array_push($list_p3at,$p3at_temp);
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}
			}

			$data_outstanding=P3atTrx::select('P3AT_NUMBER','P3AT_DATE','STATUS','EFFECTIVE_DATE',DB::raw('count(*) as TOTAL_QTY'),DB::raw('sum(ASSET_PRICE) as TOTAL_ASSET_PRICE'),DB::raw('sum(COST_OF_REMOVAL) as TOTAL_COST_REMOVAL'),DB::raw('SUM(BOOKS_PRICE) AS TOTAL_BOOKS_PRICE'))->whereIn('ORG_ID',$list_org_temp)->whereIn('P3AT_NUMBER',$list_p3at)->where('STATUS','!=','Approved')->where('STATUS','!=','Rejected')->groupBy('P3AT_NUMBER','P3AT_DATE','STATUS','EFFECTIVE_DATE')->get();
			

      
         
		}   
	    return $data_outstanding;
	}


	public function cek_approval($approve_count,$emp_id,$org_id)
	{

		$p3at_number='';
		$list_p3at=[];
		$data=P3atTrx::select('P3AT_NUMBER','STATUS')->where('ORG_ID',$org_id)->groupBy('P3AT_NUMBER','STATUS')->get();
		foreach ($data as $key) {
			if($approve_count!=1){
				if(substr($key->STATUS, -1)==($approve_count-1) ||substr($key->STATUS, -1)==($approve_count) ){
					$p3at_number=$key->P3AT_NUMBER;
					
				}else if($key->STATUS=='Approved' || $key->STATUS=='Rejected'){
					$p3at_number=$key->P3AT_NUMBER;
				}	
			}else{
				if(substr($key->STATUS, -1)<=($approve_count)){
					$p3at_number=$key->P3AT_NUMBER;
					}

				
			}
			
		}
		return $p3at_number;
	}

	public function cek_inq_approval($approve_count,$emp_id,$org_id)
	{

		$p3at_number='';
		$list_p3at=[];
		$data=P3atTrx::select('P3AT_NUMBER','STATUS')->where('ORG_ID',$org_id)->groupBy('P3AT_NUMBER','STATUS')->get();
		foreach ($data as $key) {
			if($approve_count!=1){
				if(substr($key->STATUS, -1)==($approve_count-1)){
					$p3at_number=$key->P3AT_NUMBER;
					
				}
			}else{
				if($key->STATUS!='Rejected')
				{
					if(substr($key->STATUS, -1)!=($approve_count)){
							$p3at_number=$key->P3AT_NUMBER;					
						}
				}
								
				
			}
			
		}
		return $p3at_number;
	}

	public function get_detail_p3at($p3at_number)
	{
		$statement="SELECT ASSET_NUMBER,ASSET_LOCATION,ASSET_PRICE,QTY_ASSET,BOOKS_PRICE,COST_OF_REMOVAL,STATUS FROM p3at_master_trx where P3AT_NUMBER='".$p3at_number."'" ;
	    $data=DB::select(DB::raw($statement));        
        return $data;

	}



	public function approve_p3at($p3at_number,$user_id,$reason_approval)
	{
		$emp_id=EmpMaster::select('ID')->where('user_id',$user_id)->value('ID');
		$approve_count=$this->cek_approval_ke($user_id);
		if($approve_count!='100')
		{
			
		 	$data= P3atTrx::where('P3AT_NUMBER',$p3at_number)          ->update(['STATUS' =>'Approval_'.$approve_count,
		                 'UPDATED_BY'=>$user_id,
		                 'UPDATED_AT'=>date('Y-m-d')
		                 ]);
		 	$data_history=new LogHistory();
		 	$data_history->ID_TRX=P3atTrx::select('ID')->where('P3AT_NUMBER',$p3at_number)->value('ID');
		 	$data_history->ID_APP=SysAppMaster::select('ID')->where('APP_NAME','P3AT APPROVAL')->value('ID');
		 	$data_history->DESCRIPTION='Approve';
		 	$data_history->APPROVAL_TYPE='P3AT';
		 	$data_history->EMP_ID=$emp_id;
		 	$data_history->REASON_APPROVAL=$reason_approval;
		 	$data_history->APPROVAL_KE=$approve_count;
		 	$data_history->CREATED_BY=$user_id;
		 	$data_history->UPDATED_BY=$user_id;
		 	$data_history->save();

		}else{
			$data= P3atTrx::where('P3AT_NUMBER',$p3at_number)          ->update(['STATUS' =>'Approved',
		                 'UPDATED_BY'=>$user_id,
		                 'UPDATED_AT'=>date('Y-m-d')
		                 ]);
			$data_history=new LogHistory();
		 	$data_history->ID_TRX=P3atTrx::select('ID')->where('P3AT_NUMBER',$p3at_number)->value('ID');
		 	$data_history->ID_APP=SysAppMaster::select('ID')->where('APP_NAME','P3AT APPROVAL')->value('ID');
		 	$data_history->DESCRIPTION='Approved';
		 	$data_history->APPROVAL_TYPE='P3AT';
		 	$data_history->EMP_ID=$emp_id;
		 	$data_history->REASON_APPROVAL=$reason_approval;
		 	$data_history->APPROVAL_KE='Final';
		 	$data_history->CREATED_BY=$user_id;
		 	$data_history->UPDATED_BY=$user_id;
		 	$data_history->save();
		}
		
	 	if(event(new SendApprovalEvent($data_history))){
            
            return 1; 
        }else{

            return 0;   
        }
        
	}
	public function reject_p3at($p3at_number,$user_id,$reason_approval)
	{
		$approve_count=$this->cek_approval_ke($user_id);
		$emp_id=EmpMaster::select('ID')->where('user_id',$user_id)->value('ID');
	 	$data= P3atTrx::where('P3AT_NUMBER',$p3at_number)          ->update(['STATUS' =>'Rejected',
	                 'UPDATED_BY'=>$user_id,
	                 'UPDATED_AT'=>date('Y-m-d')
	                 ]);
	 	$data_history=new LogHistory();
	 	$data_history->ID_TRX=P3atTrx::select('ID')->where('P3AT_NUMBER',$p3at_number)->value('ID');
	 	$data_history->ID_APP=SysAppMaster::select('ID')->where('APP_NAME','P3AT APPROVAL')->value('ID');
	 	$data_history->DESCRIPTION='Rejected';
	 	$data_history->APPROVAL_TYPE='P3AT';
	 	$data_history->REASON_APPROVAL=$reason_approval;
	 	$data_history->EMP_ID=$emp_id;
	 	$data_history->APPROVAL_KE=$approve_count;
	 	$data_history->CREATED_BY=$user_id;
	 	$data_history->UPDATED_BY=$user_id;
	 	$data_history->save();

	 	if(event(new SendApprovalEvent($data_history))){
            
            return 1; 
        }else{

            return 0;   
        }
	}

	public function ws_download_data_p3at($company_code,$branch_code,$p3at_date,$p3at_number,$asset_number,$asset_name,$service_date,$asset_qty,$asset_price,$asset_location,$removal_cost,$book_price,$removal_reason){

		//$data = new P3atTrx();
		//
		//
   		$data= DB::table('p3at_master_trx')->insert([
	    ['COMPANY_ID' =>  SysCompany::where('COMPANY_CODE',$company_code)->value('COMPANY_ID'), 
	    'ORG_ID' =>SysBranch::where('BRANCH_CODE',$branch_code)->value('ORG_ID'),
	    'P3AT_NUMBER' =>$p3at_date,
	    'P3AT_DATE' =>$p3at_number,
	    'ASSET_NUMBER' =>$asset_number,
	    'ASSET_NAME' =>$asset_name,
	    'EFFECTIVE_DATE' =>$service_date,
	    'QTY_ASSET' =>$asset_qty,
	    'ASSET_PRICE' =>$asset_price,
	    'ASSET_LOCATION' =>$asset_location,
	    'COST_OF_REMOVAL' =>$removal_cost,
	    'BOOKS_PRICE' =>$book_price,
	    'REASON_REMOVAL' =>$removal_reason,
	    'CREATED_BY'=>1130,
	    'CREATED_AT'=>date('Y-m-d'),
	    'UPDATED_AT'=>date('Y-m-d'),
	    'UPDATED_BY'=>1130,
		]]);




	}


	public function ws_return_status_p3at($company_code,$branch_code,$start_p3at_date,$end_p3at_date){
		$data=P3atTrx::where('COMPANY_ID',SysCompany::where('COMPANY_CODE',$company_code)->value('COMPANY_ID'))->where('ORG_ID',SysBranch::where('BRANCH_CODE',$branch_code)->value('ORG_ID'))->where('P3AT_DATE','>=',$start_p3at_date)->where('P3AT_DATE','<=',$end_p3at_date)->groupBy('P3AT_NUMBER')->get();
	 // $statement = "SELECT P3AT_NUMBER,P3AT_DATE,STATUS,(SELECT COMPANY_CODE FROM sys_company where COMPANY) FROM p3at_master_trx where COMPANY_ID=(SELECT COMPANY_ID FROM sys_company where COMPANY_CODE='".$company_code."' ) AND ORG_ID=(SELECT ORG_ID FROM sys_branch where BRANCH_CODE='".$branch_code."') AND P3AT_DATE>='".$start_p3at_date."' AND P3AT_DATE<='".$end_p3at_date."'";

      // $data=DB::select(DB::raw($statement,
      // 	    array($company_code,$branch_code,$start_p3at_date,$end_p3at_date))); 
		return $data;
	}

	public function ws_p3at_board_appr_result($company_code,$branch_code,$p3at_number,$p3at_date,$status){

		 $data=P3atTrx::where('P3AT_NUMBER',$p3at_number)->where('P3AT_DATE',$p3at_date)->where('COMPANY_ID',SysCompany::where('COMPANY_CODE',$company_code)->value('COMPANY_ID'))->where('ORG_ID',SysBranch::where('BRANCH_CODE',$branch_code)->value('ORG_ID'))
          ->update(['STATUS' =>$status,
                'UPDATED_AT'=>date('Y-m-d'),
                'UPDATED_BY'=>1130
                ]);

          return $data;

	}
	public function ws_p3at_board_approval($company_code,$branch_code,$start_p3at_date,$end_p3at_date)
	{
		$data=P3atTrx::where('COMPANY_ID',SysCompany::where('COMPANY_CODE',$company_code)->value('COMPANY_ID'))->where('ORG_ID',SysBranch::where('BRANCH_CODE',$branch_code)->value('ORG_ID'))->where('P3AT_DATE','>=',$start_p3at_date)->where('P3AT_DATE','<=',$end_p3at_date)->get();
		//$data=P3atTrx::all();
		return $data;
	}

	
}
