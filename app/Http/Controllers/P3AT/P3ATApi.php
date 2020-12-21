<?php
namespace App\Http\Controllers\P3AT;
use Validator;

use App\SysResp;
use App\SysRefNumOtp;
use App\P3atTrx;
use App\SysBranch;
use App\User;
use App\SysUserResp;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
class P3ATApi extends BaseController 
{
    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    private $request;
    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request) {
        $this->request = $request;
    }

   


    public function ws_download_data_p3at(Request $request)
     { 

        $data=new P3atTrx();
        $data_xml=[];
        $success=0;
        for($x=0;$x<count($request->all());$x++) {
            $company_code=$request[$x]['COMPANY_CODE'];
            $branch_code=$request[$x]['BRANCH_CODE'];
            $p3at_number=$request[$x]['P3AT_NUMBER'];
            $p3at_date=$request[$x]['P3AT_DATE'];
              $status=$request[$x]['STATUS'];
            $p3at_date=date('Y-m-d', strtotime($p3at_date));
       // dd($request[0]['ASSET_LOCATION']);
        $asset_number=$request[$x]['ASSET_NUMBER'];
        $asset_name=$request[$x]['ASSET_NAME'];
         $service_date=$request[$x]['SERVICE_DATE'];
          $service_date=date('Y-m-d', strtotime($service_date));
        $asset_qty=$request[$x]['ASSET_QTY'];
        $asset_price=$request[$x]['ASSET_PRICE'];
        $asset_location=$request[$x]['ASSET_LOCATION'];
        $removal_cost=$request[$x]['REMOVAL_COST'];
        $book_price=$request[$x]['BOOK_PRICE'];
        $removal_reason=$request[$x]['REMOVAL_REASON'];

        $pemakai=$request[$x]['PEMAKAI'];
        if($company_code!='' && $branch_code!='' && $p3at_number!='' && $asset_number!='' && $asset_name!='' ){
            
        if($data->ws_download_data_p3at($company_code,$branch_code,$p3at_number,$p3at_date,$asset_number,$asset_name,$service_date,$asset_qty,$asset_price,$asset_location,$removal_cost,$book_price,$removal_reason,$pemakai,$status)){
            $success++;

            }else{

                $success--;
              
            }
        }else{

            $success--;
        //       $data_xml = ['P3AT_APPROVAL'=>[
        //             'SAVE_P3AT' => [
        //                 'RESULT' => 'FAILED2',
        //             ]
        //             ]
                    
        //         ];
        // }   
        }
           } 
        //echo "".$p3at_date;
         
            if($success>0)
            {
                                 $data_xml = ['P3AT_APPROVAL'=>[
                    'SAVE_P3AT' => [
                        'RESULT' => 'SUCCESS',
                    ]
                    ]
                    
                ];
            }else{
                 $data_xml = ['P3AT_APPROVAL'=>[
                    'SAVE_P3AT' => [
                        'RESULT' => 'FAILED',
                    ]
                    ]
                    
                ];
            }
        
        return response()->xml($data_xml);
     }



     
    public function ws_return_status_p3at(Request $request)
    {
         $data=new P3atTrx();
       
         $data_array=['P3AT_APPROVAL'=>[]];
         $data_2=['P3AT_STATUS'=>[]];
         $data_xml=[];
         $company_code=$request[0]['COMPANY_CODE'];
         $branch_code=$request[0]['BRANCH_CODE'];
         $start_p3at_date=$request[0]['START_P3AT_DATE'];
         $start_p3at_date=date('Y-m-d', strtotime($start_p3at_date));
         $end_p3at_date=$request[0]['END_P3AT_DATE']; 
         $end_p3at_date=date('Y-m-d', strtotime($end_p3at_date));

      if($company_code!='' && $branch_code!='' && $start_p3at_date!='' && $end_p3at_date!=''){
          $hasil=$data->ws_return_status_p3at($company_code,$branch_code,$start_p3at_date,$end_p3at_date);
          
          foreach ($hasil as $key ) {

              $data_xml = ['COMPANY_CODE'=>$company_code,
              'BRANCH_CODE'=>$branch_code,
              'P3AT_NUMBER'=>$key->P3AT_NUMBER,
              'P3AT_DATE'=>$key->P3AT_DATE,
              'STATUS'=>$key->STATUS];
              array_push($data_2['P3AT_STATUS'],$data_xml);
            
          }
              array_push($data_array['P3AT_APPROVAL'],$data_2);

        }else{
             $data_xml=['P3AT_APPROVAL'=>[
                     'P3AT_STATUS' => [
                         'RESULT' => 'NO DATA',
                     ]
                     ]
                    
                 ];
        }
       
         return response()->xml($data_array);
        


    }

    public function ws_p3at_board_approval(Request $request)
    {
        $data_array=['P3AT_APPROVAL'=>[]];
        $data_2=['P3AT_DETAIL'=>[]];
        $data_xml=[];
        $branch_code=$this->request->input('BRANCH_CODE');
        $company_code=$this->request->input('COMPANY_CODE');
        $start_p3at_date=$this->request->input('START_P3AT_DATE');
        $end_p3at_date=$this->request->input('END_P3AT_DATE');
        $data=new P3atTrx();
        if($company_code && $branch_code && $start_p3at_date && $end_p3at_date){
          $hasil=$data->ws_p3at_board_approval($company_code,$branch_code,$start_p3at_date,$end_p3at_date);
          foreach ($hasil as $key ) {

              $data_xml = ['COMPANY_CODE'=>$company_code,
              'BRANCH_CODE'=>$branch_code,
              'P3AT_NUMBER'=>$key->P3AT_NUMBER,
              'P3AT_DATE'=>$key->P3AT_DATE,
              'ASSET_NUMBER'=>$key->ASSET_NUMBER,
              'ASSET_NAME'=>$key->ASSET_NAME,
              'SERVICE_DATE'=>$key->EFFECTIVE_DATE,
              'ASSET_QTY'=>$key->QTY_ASSET,
              'ASSET_PRICE'=>$key->ASSET_PRICE,
              'ASSET_LOCATION'=>$key->ASSET_LOCATION,
              'REMOVAL_COST'=>$key->REMOVAL_COST,
              'BOOK_PRICE'=>$key->BOOK_PRICE,
              'REMOVAL_REASON'=>$key->REASON_REMOVAL];
              array_push($data_2['P3AT_DETAIL'],$data_xml);
            
          }
              array_push($data_array['P3AT_APPROVAL'],$data_2);

        }else{
             $data_array=['P3AT_APPROVAL'=>[
                     'P3AT_DETAIL' => [
                         'RESULT' => 'NO DATA',
                     ]
                     ]
                    
                 ];
        }
        return response()->xml($data_array);
    }

    public function ws_p3at_board_appr_result(Request $request)
    {
       
        $p3at_number=$request[0]['P3AT_NUMBER'];
        $p3at_date=$request[0]['UPDATE_DATE'];
        $status=$request[0]['STATUS'];
        $data=new P3atTrx();
        if($company_code && $branch_code && $p3at_number && $p3at_date && $status){
            if($data->ws_p3at_board_approval($company_code,$branch_code,$p3at_number,$p3at_date,$status)){
                 $data_xml = ['P3AT_APPROVAL'=>[
                    'STATUS_P3AT_DIR' => [
                        'RESULT' => 'SUCCESS',
                    ]
                    ]
                    
                ];
            }else{
                $data_xml = ['P3AT_APPROVAL'=>[
                    'STATUS_P3AT_DIR' => [
                        'RESULT' => 'FAILED',
                    ]
                    ]
                    
                ];
            }
        }else{
              $data_xml = ['P3AT_APPROVAL'=>[
                    'STATUS_P3AT_DIR' => [
                        'RESULT' => 'FAILED',
                    ]
                    ]
                    
                ];
        }
        
        return response()->xml($data_xml);
    }



    public function ws_otp_nonactive(Request $request)
    {
     
        $data=new SysRefNumOtp();
     
        if($data->ws_otp_nonactive()){
                 $data_xml =[ 
                    'STATUS' => [
                        'RESULT' => 'SUCCESS',
                    ]];
                    
                    
                
        }else{
                 $data_xml = [
                    'STATUS' => [
                        'RESULT' => 'FAILED',
                    ]];
        }
        
        
        return response()->xml($data_xml);
    }

}