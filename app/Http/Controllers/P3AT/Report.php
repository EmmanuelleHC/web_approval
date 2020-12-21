<?php
namespace App\Http\Controllers\P3AT;
use Validator;

use App\SysResp;
use App\SysRefNumOtp;
use App\P3atTrx;
use App\SysBranch;
use App\User;
use App\LogHistory;
use App\SysUserResp;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
use PDF; // at the top of the file

  
class Report extends BaseController 
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

   

    public function report_p3at(Request $request)
    {    


        $p3at_number=$this->request->input('p3at_number');
        PDF::SetTitle('Hello World');
  PDF::AddPage();
  PDF::Write(0, 'Hello World');
  PDF::Output('hello_world.pdf');
        //$data=new P3atTrx();
       // return response()->json($data->report_p3at($p3at_number), 200);

    }

}