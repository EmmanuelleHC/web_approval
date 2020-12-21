<?php

namespace App;
use App\SysCompany;
use App\User;
use App\SysBranch;
use App\LogHistory;
use App\EmpMaster;
use App\ApprovalMaster;
use App\Events\SendApprovalEvent;
use App\Events\SendRejectEvent;
use App\Events\SendDailyEvent;
use App\Events\SendP3ATEvent;
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
			$data_outstanding=ApprovalMaster::select('ID_APPR_1','ID_APPR_2','ID_APPR_3','ID_APPR_4','ID_APPR_5','ID_APPR_6','ID_APPR_7','ID_APPR_8','ID_APPR_9','ID_APPR_10','ID_APPR_11','ID_APPR_12','ID_APPR_13','ID_APPR_14','ID_APPR_5','ORG_ID','AMOUNT_FROM','AMOUNT_TO')->get();
			foreach ($data_outstanding as $key) {
			 	if($key->ID_APPR_1==$emp_id)
			 	{
			 		$approve_count=1;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_2==$emp_id)
			 	{
			 		$approve_count=2;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_3==$emp_id)
			 	{
			 		$approve_count=3;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org,$key->ORG_ID);	
			 		}

			 	}else if($key->ID_APPR_4==$emp_id)
			 	{
			 		$approve_count=4;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_5==$emp_id)
			 	{
			 		$approve_count=5;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_6==$emp_id)
			 	{
			 		$approve_count=6;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_7==$emp_id)
			 	{
			 		$approve_count=7;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_8==$emp_id)
			 	{
			 		$approve_count=8;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_9==$emp_id)
			 	{
			 		$approve_count=9;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){

			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_10==$emp_id)
			 	{
			 		$approve_count=10;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}
			}
		
			
			
			$data_outstanding=P3atTrx::select('P3AT_NUMBER','P3AT_DATE','STATUS',DB::raw('count(*) as TOTAL_QTY'),DB::raw('sum(ASSET_PRICE) as TOTAL_ASSET_PRICE'),DB::raw('sum(COST_OF_REMOVAL) as TOTAL_COST_REMOVAL'),DB::raw('SUM(BOOKS_PRICE) AS TOTAL_BOOKS_PRICE'))->whereIn('ORG_ID',$list_org)->whereIn('P3AT_NUMBER',$list_p3at)->groupBy('P3AT_NUMBER','P3AT_DATE','STATUS')->orderBy('P3AT_NUMBER','asc')->orderBy('STATUS','asc')->get();
		}else{

			$data_outstanding=ApprovalMaster::select('ID_APPR_1','ID_APPR_2','ID_APPR_3','ID_APPR_4','ID_APPR_5','ID_APPR_6','ID_APPR_7','ID_APPR_8','ID_APPR_9','ID_APPR_10','ID_APPR_11','ID_APPR_12','ID_APPR_13','ID_APPR_14','ID_APPR_5','ORG_ID','AMOUNT_TO','AMOUNT_FROM')->whereIn('ORG_ID',$list_org)->get();
			foreach ($data_outstanding as $key) {

			 	if($key->ID_APPR_1==$emp_id)
			 	{
			 		$approve_count=1;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}

			 	}else if($key->ID_APPR_2==$emp_id)
			 	{

			 		$approve_count=2;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_3==$emp_id)
			 	{
			 		$approve_count=3;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}

			 	}else if($key->ID_APPR_4==$emp_id)
			 	{
			 		$approve_count=4;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_5==$emp_id)
			 	{
			 		$approve_count=5;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_6==$emp_id)
			 	{
			 		$approve_count=6;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_7==$emp_id)
			 	{
			 		$approve_count=7;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_8==$emp_id)
			 	{
			 		$approve_count=8;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_9==$emp_id)
			 	{
			 		$approve_count=9;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_10==$emp_id)
			 	{
			 		$approve_count=10;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2) {

			 			array_push($list_p3at,$key2);
			 			}
			 			array_push($list_org_temp,$key->ORG_ID);	
			 		}
			 	}
			}

			$data_outstanding=P3atTrx::select('P3AT_NUMBER','P3AT_DATE','STATUS',DB::raw('count(*) as TOTAL_QTY'),DB::raw('sum(ASSET_PRICE) as TOTAL_ASSET_PRICE'),DB::raw('sum(COST_OF_REMOVAL) as TOTAL_COST_REMOVAL'),DB::raw('SUM(BOOKS_PRICE) AS TOTAL_BOOKS_PRICE'))->whereIn('ORG_ID',$list_org_temp)->whereIn('P3AT_NUMBER',$list_p3at)->groupBy('P3AT_NUMBER','P3AT_DATE','STATUS')->orderBy('STATUS','asc')->orderBy('P3AT_NUMBER','asc')->get();
			

      
         
		}   
	    return $data_outstanding;
	}


	public function report_p3at($p3at_number)
	{
		$list_approval=[];
		$hasil=[];
		$data=P3atTrx::where('P3AT_NUMBER',$p3at_number)->get();
		$asset_price=P3atTrx::select('P3AT_NUMBER','ORG_ID',DB::raw('sum(ASSET_PRICE) as ASSET_PRICE'))->where('P3AT_NUMBER',$p3at_number)->groupBy('P3AT_NUMBER','ORG_ID')->value('ASSET_PRICE');
		$org_id=P3atTrx::select('P3AT_NUMBER','ORG_ID',DB::raw('sum(ASSET_PRICE) as ASSET_PRICE'))->where('P3AT_NUMBER',$p3at_number)->groupBy('P3AT_NUMBER','ORG_ID')->value('ORG_ID');
		$approval=ApprovalMaster::select('ID_APPR_1','ID_APPR_2','ID_APPR_3','ID_APPR_4','ID_APPR_5','ID_APPR_6','ID_APPR_7','ID_APPR_8','ID_APPR_9','ID_APPR_10','ID_APPR_11','ID_APPR_12','ID_APPR_13','ID_APPR_14','ID_APPR_5','ORG_ID','AMOUNT_FROM','AMOUNT_TO')->where('ORG_ID',$org_id)->where('AMOUNT_FROM','<=',$asset_price)->where('AMOUNT_TO','>=',$asset_price)->get();
			foreach ($approval as $key) {

					if($key->ID_APPR_1)
					{
						$nik=EmpMaster::select('EMP_NUMBER')->where('ID',$key->ID_APPR_1)->value('EMP_NUMBER');
						array_push($list_approval,$nik);
					}
					if($key->ID_APPR_2)
					{
						$nik=EmpMaster::select('EMP_NUMBER')->where('ID',$key->ID_APPR_2)->value('EMP_NUMBER');
						array_push($list_approval,$nik);
					}
					if($key->ID_APPR_3)
					{
						$nik=EmpMaster::select('EMP_NUMBER')->where('ID',$key->ID_APPR_3)->value('EMP_NUMBER');
						array_push($list_approval,$nik);
					}
					if($key->ID_APPR_4)
					{
						$nik=EmpMaster::select('EMP_NUMBER')->where('ID',$key->ID_APPR_4)->value('EMP_NUMBER');
						array_push($list_approval,$nik);
					}
					if($key->ID_APPR_5)
					{
						$nik=EmpMaster::select('EMP_NUMBER')->where('ID',$key->ID_APPR_5)->value('EMP_NUMBER');
						array_push($list_approval,$nik);
					}
						if($key->ID_APPR_6)
					{
						$nik=EmpMaster::select('EMP_NUMBER')->where('ID',$key->ID_APPR_6)->value('EMP_NUMBER');
						array_push($list_approval,$nik);
					}
					if($key->ID_APPR_7)
					{
						$nik=EmpMaster::select('EMP_NUMBER')->where('ID',$key->ID_APPR_7)->value('EMP_NUMBER');
						array_push($list_approval,$nik);
					}
					if($key->ID_APPR_8)
					{
						$nik=EmpMaster::select('EMP_NUMBER')->where('ID',$key->ID_APPR_8)->value('EMP_NUMBER');
						array_push($list_approval,$nik);
					}
					if($key->ID_APPR_9)
					{
						$nik=EmpMaster::select('EMP_NUMBER')->where('ID',$key->ID_APPR_9)->value('EMP_NUMBER');
						array_push($list_approval,$nik);
					}
					if($key->ID_APPR_10)
					{
						$nik=EmpMaster::select('EMP_NUMBER')->where('ID',$key->ID_APPR_10)->value('EMP_NUMBER');
						array_push($list_approval,$nik);
					}
			}
		$hasil['approval']=$list_approval;
		$hasil['p3at_data']=$data;
		return $hasil;
	}
	public function cek_approval_ke($user_id,$amount)
	{
		$list_org=[];
		$list_org_temp=[];
		$list_p3at=[];
		$approval_count=0;
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
			$data_outstanding=ApprovalMaster::select('ID_APPR_1','ID_APPR_2','ID_APPR_3','ID_APPR_4','ID_APPR_5','ID_APPR_6','ID_APPR_7','ID_APPR_8','ID_APPR_9','ID_APPR_10','ID_APPR_11','ID_APPR_12','ID_APPR_13','ID_APPR_14','ID_APPR_5','ORG_ID','AMOUNT_FROM','AMOUNT_TO')->get();
			foreach ($data_outstanding as $key) {
				
				if($key->AMOUNT_FROM<=$amount && $key->AMOUNT_TO>=$amount)
				{

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
		
			}
		return $approve_count;
			
			
			
		}else{
			$data_outstanding=ApprovalMaster::select('ID_APPR_1','ID_APPR_2','ID_APPR_3','ID_APPR_4','ID_APPR_5','ID_APPR_6','ID_APPR_7','ID_APPR_8','ID_APPR_9','ID_APPR_10','ID_APPR_11','ID_APPR_12','ID_APPR_13','ID_APPR_14','ID_APPR_5','ORG_ID','AMOUNT_FROM','AMOUNT_TO')->whereIn('ORG_ID',$list_org)->get();
			foreach ($data_outstanding as $key) {

				if($amount >= $key->AMOUNT_FROM && $amount<=$key->AMOUNT_TO)
				{
						
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
			$data_outstanding=ApprovalMaster::select('ID_APPR_1','ID_APPR_2','ID_APPR_3','ID_APPR_4','ID_APPR_5','ID_APPR_6','ID_APPR_7','ID_APPR_8','ID_APPR_9','ID_APPR_10','ID_APPR_11','ID_APPR_12','ID_APPR_13','ID_APPR_14','ID_APPR_5','ORG_ID','AMOUNT_FROM','AMOUNT_TO')->get();
			foreach ($data_outstanding as $key) {
			 	if($key->ID_APPR_1==$emp_id)
			 	{
			 		$approve_count=1;

			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		array_push($list_org,$key->ORG_ID);	
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2){
			 				  array_push($list_p3at,$key2);
			 				}
			 			
			 			

			 		}
			 	}else if($key->ID_APPR_2==$emp_id)
			 	{
			 		$approve_count=2;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2){
			 				  array_push($list_p3at,$key2);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_3==$emp_id)
			 	{
			 		$approve_count=3;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2){
			 				  array_push($list_p3at,$key2);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}

			 	}else if($key->ID_APPR_4==$emp_id)
			 	{
			 		$approve_count=4;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2){
			 				  array_push($list_p3at,$key2);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_5==$emp_id)
			 	{
			 		$approve_count=5;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2){
			 				  array_push($list_p3at,$key2);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_6==$emp_id)
			 	{
			 		$approve_count=6;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2){
			 				  array_push($list_p3at,$key2);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_7==$emp_id)
			 	{
			 		$approve_count=7;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2){
			 				  array_push($list_p3at,$key2);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_8==$emp_id)
			 	{
			 		$approve_count=8;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2){
			 				  array_push($list_p3at,$key2);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_9==$emp_id)
			 	{
			 		$approve_count=9;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2){
			 				  array_push($list_p3at,$key2);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_10==$emp_id)
			 	{
			 		$approve_count=10;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key2){
			 				  array_push($list_p3at,$key2);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}
			}
		
			
			
			$data_outstanding=P3atTrx::select('P3AT_NUMBER','P3AT_DATE','STATUS',DB::raw('count(*) as TOTAL_QTY'),DB::raw('sum(ASSET_PRICE) as TOTAL_ASSET_PRICE'),DB::raw('sum(COST_OF_REMOVAL) as TOTAL_COST_REMOVAL'),DB::raw('SUM(BOOKS_PRICE) AS TOTAL_BOOKS_PRICE'))->whereIn('ORG_ID',$list_org)->whereIn('P3AT_NUMBER',$list_p3at)->where('STATUS','!=','Approved')->where('STATUS','!=','Rejected')->groupBy('P3AT_NUMBER','P3AT_DATE','STATUS')->orderBy('P3AT_NUMBER','asc')->orderBy('STATUS','asc')->get();
		}else{

			$data_outstanding=ApprovalMaster::select('ID_APPR_1','ID_APPR_2','ID_APPR_3','ID_APPR_4','ID_APPR_5','ID_APPR_6','ID_APPR_7','ID_APPR_8','ID_APPR_9','ID_APPR_10','ID_APPR_11','ID_APPR_12','ID_APPR_13','ID_APPR_14','ID_APPR_5','ORG_ID','AMOUNT_FROM','AMOUNT_TO')->whereIn('ORG_ID',$list_org)->get();
			foreach ($data_outstanding as $key) {

			 	if($key->ID_APPR_1==$emp_id)
			 	{
			 		$approve_count=1;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key1){
			 				  array_push($list_p3at,$key1);
			 				}
			 			array_push($list_org,$key->ORG_ID);	
			 		}


			 	}else if($key->ID_APPR_2==$emp_id)
			 	{

			 		$approve_count=2;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key1){
			 				  array_push($list_p3at,$key1);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_3==$emp_id)
			 	{
			 		$approve_count=3;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key1){
			 				  array_push($list_p3at,$key1);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}

			 	}else if($key->ID_APPR_4==$emp_id)
			 	{
			 		$approve_count=4;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key1){
			 				  array_push($list_p3at,$key1);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_5==$emp_id)
			 	{
			 		$approve_count=5;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key1){
			 				  array_push($list_p3at,$key1);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_6==$emp_id)
			 	{
			 		$approve_count=6;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key1){
			 				  array_push($list_p3at,$key1);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_7==$emp_id)
			 	{
			 		$approve_count=7;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key1){
			 				  array_push($list_p3at,$key1);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_8==$emp_id)
			 	{
			 		$approve_count=8;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key1){
			 				  array_push($list_p3at,$key1);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_9==$emp_id)
			 	{
			 		$approve_count=9;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key1){
			 				  array_push($list_p3at,$key1);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}else if($key->ID_APPR_10==$emp_id)
			 	{
			 		$approve_count=10;
			 		$p3at_temp=[];
			 		$p3at_temp=$this->cek_inq_approval($approve_count,$emp_id,$key->ORG_ID,$key->AMOUNT_FROM,$key->AMOUNT_TO);
			 		
			 		if($p3at_temp!=[]){
			 			foreach ($p3at_temp as $key1){
			 				  array_push($list_p3at,$key1);
			 				}
			 			
			 			array_push($list_org,$key->ORG_ID);	
			 		}
			 	}
			}

			$data_outstanding=P3atTrx::select('P3AT_NUMBER','P3AT_DATE','STATUS',DB::raw('count(*) as TOTAL_QTY'),DB::raw('sum(ASSET_PRICE) as TOTAL_ASSET_PRICE'),DB::raw('sum(COST_OF_REMOVAL) as TOTAL_COST_REMOVAL'),DB::raw('SUM(BOOKS_PRICE) AS TOTAL_BOOKS_PRICE'))->whereIn('ORG_ID',$list_org)->whereIn('P3AT_NUMBER',$list_p3at)->where('STATUS','!=','Approved')->where('STATUS','!=','Rejected')->groupBy('P3AT_NUMBER','P3AT_DATE','STATUS')->orderBy('P3AT_NUMBER','asc')->orderBy('STATUS','asc')->get();
			

      
         
		}   
	    return $data_outstanding;
	}


	public function cek_approval($approve_count,$emp_id,$org_id,$amount_from,$amount_to)
	{

		$p3at_number='';
		$list_p3at=[];
		$temp=[];
		$data=P3atTrx::select('P3AT_NUMBER','STATUS',DB::raw('sum(ASSET_PRICE) as ASSET_PRICE'))->where('ORG_ID',$org_id)->groupBy('P3AT_NUMBER','STATUS')->get();
		foreach ($data as $key) {

			if($key->ASSET_PRICE>=$amount_from && $key->ASSET_PRICE<=$amount_to)
			{
				if($approve_count!=1){
					if(substr($key->STATUS, -1)==($approve_count-1) ||substr($key->STATUS, -1)==($approve_count) ){
						$p3at_number=$key->P3AT_NUMBER;
						array_push($temp,$p3at_number);
					}else if($key->STATUS=='Approved' || $key->STATUS=='Rejected'){
						$p3at_number=$key->P3AT_NUMBER;

						array_push($temp,$p3at_number);
					}	
				}else{
					if(substr($key->STATUS, -1)<=($approve_count)){
						$p3at_number=$key->P3AT_NUMBER;

						array_push($temp,$p3at_number);
						}

					
				}
			
			}
			
		}
		return $temp;
	}

	public function cek_inq_approval($approve_count,$emp_id,$org_id,$amount_from,$amount_to)
	{

		$p3at_number='';
		$list_p3at=[];
		$data=P3atTrx::select('P3AT_NUMBER','STATUS',DB::raw('sum(ASSET_PRICE) as ASSET_PRICE'))->where('ORG_ID',$org_id)->groupBy('P3AT_NUMBER','STATUS')->get();
		$temp=[];
		foreach ($data as $key) {

			if($key->ASSET_PRICE>=$amount_from && $key->ASSET_PRICE<=$amount_to)
			{
					if($approve_count!=1){
						if(substr($key->STATUS, -1)==($approve_count-1)){
							$p3at_number=$key->P3AT_NUMBER;
							array_push($temp,$p3at_number);
						}
					}else{
						if($key->STATUS!='Rejected')
						{
							if(substr($key->STATUS, -1)!=($approve_count)){
									$p3at_number=$key->P3AT_NUMBER;		
							array_push($temp,$p3at_number);			
								}
						}
									
					
				 }

			}
			
			
		}
		return $temp;
	}

	public function get_detail_p3at($p3at_number)
	{
		$statement="SELECT ASSET_NUMBER,ASSET_NAME,EFFECTIVE_DATE,PEMAKAI,ASSET_LOCATION,ASSET_PRICE,QTY_ASSET,BOOKS_PRICE,COST_OF_REMOVAL,STATUS FROM p3at_master_trx where P3AT_NUMBER='".$p3at_number."'" ;
	    $data=DB::select(DB::raw($statement));        
        return $data;

	}



	public function approve_p3at($p3at_number,$user_id,$reason_approval)
	{
		$emp_id=EmpMaster::select('ID')->where('user_id',$user_id)->value('ID');
		$amount= P3atTrx::where('P3AT_NUMBER',$p3at_number)->select(DB::raw('sum(ASSET_PRICE) as ASSET_PRICE'))->value('ASSET_PRICE');


		  
		$approve_count=$this->cek_approval_ke($user_id,$amount);
		if($approve_count!='100')
		{
			
		 	$data= P3atTrx::where('P3AT_NUMBER',$p3at_number)->update(['STATUS' =>'Approval_'.$approve_count,
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
			$data= P3atTrx::where('P3AT_NUMBER',$p3at_number)->update(['STATUS' =>'Approved',
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
		$amount= P3atTrx::where('P3AT_NUMBER',$p3at_number)->select(DB::raw('sum(ASSET_PRICE) as ASSET_PRICE'))->value('ASSET_PRICE');

		$approve_count=$this->cek_approval_ke($user_id,$amount);
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

	 	if(event(new SendRejectEvent($data_history))){
            
            return 1; 
        }else{

            return 0;   
        }
	}



		public function send_daily()
	{
		

	 	if(event(new SendDailyEvent())){
            
            return 1; 
        }else{

            return 0;   
        }
	}


		public function send_p3at()
	{
		

	 	if(event(new SendP3ATEvent())){
            
            return 1; 
        }else{

            return 0;   
        }
	}


	public function ws_download_data_p3at($company_code,$branch_code,$p3at_number,$p3at_date,$asset_number,$asset_name,$service_date,$asset_qty,$asset_price,$asset_location,$removal_cost,$book_price,$removal_reason,$pemakai,$status)
	{

		
   		$data= DB::table('p3at_master_trx')->insert([
	    ['COMPANY_ID' =>  SysCompany::where('COMPANY_CODE',$company_code)->value('COMPANY_ID'), 
	    'ORG_ID' =>SysBranch::where('BRANCH_CODE',$branch_code)->value('ORG_ID'),
	    'P3AT_NUMBER' =>$p3at_number,
	    'P3AT_DATE' =>$p3at_date,
	    'ASSET_NUMBER' =>$asset_number,
	    'ASSET_NAME' =>$asset_name,
	    'EFFECTIVE_DATE' =>$service_date,
	    'QTY_ASSET' =>$asset_qty,
	    'STATUS'=>$status,
	    'ASSET_PRICE' =>$asset_price,
	    'ASSET_LOCATION' =>$asset_location,
	    'COST_OF_REMOVAL' =>$removal_cost,
	    'BOOKS_PRICE' =>$book_price,
	    'REASON_REMOVAL' =>$removal_reason,
	    'PEMAKAI'=>$pemakai,
	    'CREATED_BY'=>1130,
	    'CREATED_AT'=>date('Y-m-d'),
	    'UPDATED_AT'=>date('Y-m-d'),
	    'UPDATED_BY'=>1130,
		]]);

		return 1;
	}

         

	public function ws_return_status_p3at($company_code,$branch_code,$start_p3at_date,$end_p3at_date){
		$data=P3atTrx::where('COMPANY_ID',SysCompany::where('COMPANY_CODE',$company_code)->value('COMPANY_ID'))->where('ORG_ID',SysBranch::where('BRANCH_CODE',$branch_code)->value('ORG_ID'))->where('P3AT_DATE','>=',$start_p3at_date)->where('P3AT_DATE','<=',$end_p3at_date)->groupBy('P3AT_NUMBER','P3AT_DATE','STATUS')->select('P3AT_NUMBER','P3AT_DATE','STATUS')->get();

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
