<?php
/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router)
{
    return $router
        ->app
        ->version();
});
$router->post('auth/login', ['uses' => 'AuthController@authenticate']);



$router->group(['middleware' => 'jwt.auth'], function () use ($router)
{
    $router->get('users', function ()
    {
        $users = \App\User::all();
        return response()->json($users);
    });
    $router->get('get_approval_type', ['uses' => 'Master\MasterApproval@get_approval_type']);
    $router->get('get_approval_branch', ['uses' => 'Master\MasterApproval@get_approval_branch']);
    $router->post('get_approval_avail', ['uses' => 'Master\MasterApproval@get_approval_avail']);
    
    $router->post('get_menu', ['uses' => 'Home\Home@get_menu']);
    $router->post('get_user_resp', ['uses' => 'Home\Home@get_user_resp']);
    $router->get('get_list_role', ['uses' => 'Master\MasterUser@get_list_role']);
    $router->post('get_list_user_resp_by_role', ['uses' => 'Master\MasterUser@get_list_user_resp']);
    $router->get('get_list_username', ['uses' => 'Master\MasterUser@get_list_username']);
    $router->post('search_user_specific', ['uses' => 'Master\MasterUser@search_user_specific']);
    $router->post('update_user', ['uses' => 'Master\MasterUser@update_user']);
    $router->post('get_resp_user', ['uses' => 'Master\MasterUser@get_resp_user']);
    $router->post('compare_data_user', ['uses' => 'Master\MasterUser@compare_data_user']);
    $router->post('insert_user', ['uses' => 'Master\MasterUser@insert_user']);
    $router->post('get_data_master_role', ['uses' => 'Master\MasterRole@get_data_master_role']);
    $router->post('insert_role', ['uses' => 'Master\MasterRole@insert_role']);
    $router->post('update_role', ['uses' => 'Master\MasterRole@update_role']);
    $router->post('compare_data_master_role', ['uses' => 'Master\MasterRole@compare_data_master_role']);
    $router->get('get_data_master_resp', ['uses' => 'Master\MasterResp@get_data_master_resp']);
    $router->post('get_resp_active_flag', ['uses' => 'Master\MasterResp@get_resp_active_flag']);
    $router->post('insert_data_resp', ['uses' => 'Master\MasterResp@insert_data_resp']);
    $router->post('update_data_resp', ['uses' => 'Master\MasterResp@update_data_resp']);
    $router->get('get_data_master_company', ['uses' => 'Master\MasterCompany@get_data_master_company']);
    $router->post('insert_data_company', ['uses' => 'Master\MasterCompany@insert_data_company']);
    $router->post('update_data_company', ['uses' => 'Master\MasterCompany@update_data_company']);
    $router->post('compare_data_company', ['uses' => 'Master\MasterCompany@compare_data_company']);
    $router->post('get_data_cbg_by_company', ['uses' => 'Master\MasterBranch@get_data_cbg_by_company']);
    $router->post('check_branch_org_id', ['uses' => 'Master\MasterBranch@check_branch_org_id']);
    $router->get('get_data_cbg', ['uses' => 'Master\MasterBranch@get_data_cbg']);
    $router->post('insert_data_cbg', ['uses' => 'Master\MasterBranch@insert_data_cbg']);
    $router->post('update_data_cbg', ['uses' => 'Master\MasterBranch@update_data_cbg']);
    $router->post('get_data_cbg_by_company', ['uses' => 'Master\MasterBranch@get_data_cbg_by_company']);

    
    $router->post('save_data_master_responsibility', ['uses' => 'Master\MasterMenu@save_data_master_responsibility']);
     $router->post('compare_data_menu', ['uses' => 'Master\MasterMenu@compare_data_menu']);
    $router->get('get_data_menu', ['uses' => 'Master\MasterMenu@get_data_menu']);
    $router->post('get_data_menu_all', ['uses' => 'Master\MasterMenu@get_data_menu_all']);
    $router->post('get_data_submenu', ['uses' => 'Master\MasterMenu@get_data_submenu']);
    $router->post('get_data_menu_detail', ['uses' => 'Master\MasterMenu@get_data_menu_detail']);
     $router->post('compare_data_menu_detail', ['uses' => 'Master\MasterMenu@compare_data_menu_detail']);
    $router->post('insert_data_menu_detail', ['uses' => 'Master\MasterMenu@insert_data_menu_detail']);
    $router->post('update_data_menu_detail', ['uses' => 'Master\MasterMenu@update_data_menu_detail']);
    $router->post('delete_menu_detail', ['uses' => 'Master\MasterMenu@delete_menu_detail']);
    $router->post('delete_menu', ['uses' => 'Master\MasterMenu@delete_menu']);
    $router->post('insert_data_menu', ['uses' => 'Master\MasterMenu@insert_data_menu']);
    $router->post('update_data_menu', ['uses' => 'Master\MasterMenu@update_data_menu']);
    
    $router->post('get_inq_p3at', ['uses' => 'P3AT\P3ATController@get_inq_p3at']);
    $router->post('get_inq_app_p3at', ['uses' => 'P3AT\P3ATController@get_inq_app_p3at']);
     $router->post('get_detail_p3at', ['uses' => 'P3AT\P3ATController@get_detail_p3at']);
     $router->post('ws_download_data_p3at', ['uses' => 'P3AT\P3ATApi@ws_download_data_p3at']);
     $router->post('ws_return_status_p3at', ['uses' => 'P3AT\P3ATApi@ws_return_status_p3at']);
      $router->post('ws_p3at_board_approval', ['uses' => 'P3AT\P3ATApi@ws_p3at_board_approval']);

      $router->post('ws_p3at_board_appr_result', ['uses' => 'P3AT\P3ATApi@ws_p3at_board_appr_result']);
       $router->post('get_log_history', ['uses' => 'P3AT\P3ATController@get_log_history']);
       $router->post('reject_p3at', ['uses' => 'P3AT\P3ATController@reject_p3at']);
        $router->post('approve_p3at', ['uses' => 'P3AT\P3ATController@approve_p3at']);
         $router->post('generate_otp', ['uses' => 'P3AT\P3ATController@generate_otp']);
          $router->post('cek_otp', ['uses' => 'P3AT\P3ATController@cek_otp']);
            $router->post('get_last_otp', ['uses' => 'P3AT\P3ATController@get_last_otp']);
             $router->post('submit_otp', ['uses' => 'P3AT\P3ATController@submit_otp']);

      $router->post('get_data_cbg_by_id', ['uses' => 'Master\MasterBranch@get_data_cbg_by_id']);
       $router->post('compare_data_branch', ['uses' => 'Master\MasterBranch@compare_data_branch']);
        $router->post('compare_data_resp', ['uses' => 'Master\MasterResp@compare_data_resp']);
          $router->get('get_data_master_employee', ['uses' => 'Master\MasterEmployee@get_data_master_employee']);
          $router->get('get_username_existing', ['uses' => 'Master\MasterEmployee@get_username_existing']);

         $router->post('get_username_existing2', ['uses' => 'Master\MasterEmployee@get_username_existing2']);          
         $router->post('insert_data_emp', ['uses' => 'Master\MasterEmployee@insert_data_emp']);
          
         $router->post('compare_data_emp', ['uses' => 'Master\MasterEmployee@compare_data_emp']);


         $router->post('update_data_emp', ['uses' => 'Master\MasterEmployee@update_data_emp']);

          $router->get('get_data_master_approval', ['uses' => 'Master\MasterApproval@get_data_master_approval']);
           $router->post('get_data_approval_detail', ['uses' => 'Master\MasterApproval@get_data_approval_detail']);

            $router->post('compare_data_approval', ['uses' => 'Master\MasterApproval@compare_data_approval']);

             $router->post('insert_data_approval', ['uses' => 'Master\MasterApproval@insert_data_approval']);
             $router->post('update_data_approval', ['uses' => 'Master\MasterApproval@update_data_approval']);
              $router->post('validate_approval', ['uses' => 'Master\MasterApproval@validate_approval']); 
              
    

});
$router->post('print_report', ['uses' => 'P3AT\Report@report_p3at']);   
     
$router->get('send_p3at', ['uses' => 'P3AT\P3ATController@send_p3at']);
$router->get('send_daily', ['uses' => 'P3AT\P3ATController@send_daily']);
$router->get('ws_otp_nonactive', ['uses' => 'P3AT\P3ATApi@ws_otp_nonactive']);
