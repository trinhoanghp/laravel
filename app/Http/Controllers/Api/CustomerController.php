<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class CustomerController extends Controller
{
    private $customer;
  public function __construct(Customer $customer)
  {
    $this->customer = $customer;
  }
    public function index()
    {
        $customer = Customer::All();
        return   $customer;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
    
        $data = $request->only('name','email','phone','address');
        $data['password'] = bcrypt($request->password);
       
       if(Customer::create($data))
       {
        return response('Tạo tài khoản thành công');
        }else
        {
        return response('Tạo tài khoản thành công');
        }
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {   
        $data = $request->only('id','name','email','phone','address');
      
        $check=  $this->customer->find($request->id)->update($data);
         if($check)
         {
        return response('Update tài khoản thành công');
        }else
        {
        return response('Update tài khoản thành công');
        }
    
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
    public function login()
    {   
        dd(bcrypt(123456));
    }
    public function check_login(Request $request)
    {     
        $customer= [];
        $data = $request->only('email','password');
        $check_login = auth('cus')->attempt($data,$request->has('remember_me'));
        if($check_login){
            $customer =   $this->customer->where('email',$request->email)->get();
        }
        return $customer;
    }
    public function logout()
    {
        auth('cus')->logout();
       
    }
}
