<?php
namespace App\Http\Controllers\P3AT;
use Validator;

use App\SysResp;

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
        $company_code=$this->request->input('COMPANY_CODE');
        $branch_code=$this->request->input('BRANCH_CODE');
        $p3at_number=$this->request->input('P3AT_NUMBER');
        $p3at_date=$this->request->input('P3AT_DATE');
      
        $p3at_date=date('Y-m-d', strtotime($p3at_date));
        
        $asset_number=$this->request->input('ASSET_NUMBER');
        $asset_name=$this->request->input('ASSET_NAME');
         $service_date=$this->request->input('SERVICE_DATE');
          $service_date=date('Y-m-d', strtotime($service_date));
        $asset_qty=$this->request->input('ASSET_QTY');
        $asset_price=$this->request->input('ASSET_PRICE');
        $asset_location=$this->request->input('ASSET_LOCATION');
        $removal_cost=$this->request->input('REMOVAL_COST');
        $book_price=$this->request->input('BOOK_PRICE'); 
        $removal_reason=$this->request->input('REMOVAL_REASON');        
        //echo "".$p3at_date;
        if($company_code && $branch_code && $p3at_number && $asset_number && $asset_name &&  $service_date && $asset_qty && $asset_price ){
            if($data->ws_download_data_p3at($company_code,$branch_code,$p3at_number,$p3at_date,$asset_number,$asset_name,$service_date,$asset_qty,$asset_price,$asset_location,$removal_cost,$book_price,$removal_reason)){
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
         $company_code=$this->request->input('COMPANY_CODE');
         $branch_code=$this->request->input('BRANCH_CODE');
         $start_p3at_date=$this->request->input('START_P3AT_DATE');
         $start_p3at_date=date('Y-m-d', strtotime($start_p3at_date));
         $end_p3at_date=$this->request->input('END_P3AT_DATE');
         $end_p3at_date=date('Y-m-d', strtotime($end_p3at_date));
      if($company_code && $branch_code && $start_p3at_date && $end_p3at_date){
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
        $branch_code=$this->request->input('BRANCH_CODE');
        $company_code=$this->request->input('COMPANY_CODE');
        $p3at_number=$this->request->input('P3AT_NUMBER');
        $p3at_date=$this->request->input('P3AT_DATE');
        $status=$this->request->input('STATUS');
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

}