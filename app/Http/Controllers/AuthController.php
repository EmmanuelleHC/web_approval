<?php
namespace App\Http\Controllers;
use Validator;
use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
class AuthController extends BaseController 
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
    /**
     * Create a new token.
     * 
     * @param  \App\User   $user
     * @return string
     */
    protected function jwt(User $user) {
        $payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'sub' => $user->ID, // Subject of the token
            'iat' => time(), // Time when JWT was issued. 
            'exp' => time() + 60*60 // Expiration time
        ];
        
        // As you can see we are passing `JWT_SECRET` as the second parameter that will 
        // be used to decode the token in the future.
        return JWT::encode($payload, env('JWT_SECRET'));
    } 
    /**
     * Authenticate a user and return the token if the provided credentials are correct.
     * 
     * @param  \App\User   $user 
     * @return mixed
     */
    public function authenticate(User $user) {
        $this->validate($this->request, [
            'username'     => 'required',
            'password'  => 'required'
        ]);
        // Find the user by email
        $user = User::where('username', $this->request->input('username'))->first();
        if (!$user) {
            // You wil probably have some sort of helpers or whatever
            // to make sure that you have the same response format for
            // differents kind of responses. But let's return the 
            // below respose for now.
            return response()->json([
                'error' => 'Username does not exist.'
            ], 400);
        }
        // Verify the password and generate the token
        if (Hash::check($this->request->input('password'), $user->PASSWORD)) {
            $model=new User();
            $data=$model->get_data_sess($this->request->input('username'),$user->PASSWORD);
 
            return response()->json([
                'is_login' => true,
                'user_id' =>$data[0]->ID,
                'username'=>$data[0]->USERNAME,
                'role_id' =>$data[0]->ROLE_ID,
                'resp_id' =>$data[0]->RESPONSIBILITY_ID,
                'branch_id'=>$data[0]->BRANCH_ID,
                'branch_name'=>$data[0]->BRANCH_NAME,
                'sob_id' => $data[0]->SOB_ID,
                'company_id' => $data[0]->COMPANY_ID,
                'company_name' => $data[0]->COMPANY_NAME,
                'active_flag' => $data[0]->ACTIVE_FLAG,
                'reset_flag' => $data[0]->RESET_FLAG,
                'user_expr'=>$data[0]->USER_EXPR,
                'user_expr_note'=>$data[0]->USER_EXPR_NOTE,
                'user_expr_counter'=>$data[0]->USER_EXPR_COUNTER,
                'token'   => $this->jwt($user)

            ], 200);
           
           
        }else{
            // Bad Request response
            return response()->json([
                'error' => 'Username or password is wrong.'
            ], 400);
        }

    }


   
}