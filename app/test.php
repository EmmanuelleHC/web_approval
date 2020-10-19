else if($key->ID_APPR_2==$emp_id)
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