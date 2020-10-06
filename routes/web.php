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
    $router->post('get_menu', ['uses' => 'Home\Home@get_menu']);
    $router->post('get_user_resp', ['uses' => 'Home\Home@get_user_resp']);
    $router->get('get_list_role', ['uses' => 'Master\MasterUser@get_list_role']);
    $router->post('get_list_user_resp_by_role', ['uses' => 'Master\MasterUser@get_list_user_resp']);
    $router->get('get_list_username', ['uses' => 'Master\MasterUser@get_list_username']);
    $router->post('search_user_specific', ['uses' => 'Master\MasterUser@search_user_specific']);
    $router->post('update_user', ['uses' => 'Master\MasterUser@update_user']);
    $router->post('get_resp_user', ['uses' => 'Master\MasterUser@get_resp_user']);

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
    $router->post('get_data_cbg', ['uses' => 'Master\MasterBranch@get_data_cbg']);
    $router->post('insert_data_cbg', ['uses' => 'Master\MasterBranch@insert_data_cbg']);
    $router->post('update_data_cbg', ['uses' => 'Master\MasterBranch@update_data_cbg']);
    $router->post('get_data_cbg_by_company', ['uses' => 'Master\MasterBranch@get_data_cbg_by_company']);

    
    $router->post('save_data_master_responsibility', ['uses' => 'Master\MasterMenu@save_data_master_responsibility']);
    $router->get('get_data_menu', ['uses' => 'Master\MasterMenu@get_data_menu']);
    $router->post('get_data_menu_all', ['uses' => 'Master\MasterMenu@get_data_menu_all']);
    $router->post('get_data_submenu', ['uses' => 'Master\MasterMenu@get_data_submenu']);
    $router->post('get_data_menu_detail', ['uses' => 'Master\MasterMenu@get_data_menu_detail']);
    $router->post('insert_data_menu_detail', ['uses' => 'Master\MasterMenu@insert_data_menu_detail']);
    $router->post('update_data_menu_detail', ['uses' => 'Master\MasterMenu@update_data_menu_detail']);
    $router->post('delete_menu_detail', ['uses' => 'Master\MasterMenu@delete_menu_detail']);
    $router->post('delete_menu', ['uses' => 'Master\MasterMenu@delete_menu']);
    $router->post('insert_data_menu', ['uses' => 'Master\MasterMenu@insert_data_menu']);
    $router->post('update_data_menu', ['uses' => 'Master\MasterMenu@update_data_menu']);
    


    

    
    
    
    
    
    
});

