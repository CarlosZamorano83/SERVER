<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Firebase\JWT\JWT;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


    // crear usuario
    public function store(Request $request)

    
    {
        $user = new Users();

        $user->name = str_replace(' ', '',$request->name);
        $user->email = $request->email;

        if (strlen($request->password) >= 8)
        {

        $user->password = bcrypt($request->password);
        }else

        {
            return response()->json(['error' => 'el password debe tener como minimo 8 caracteres', 400]);


        }

        $user->rol_id = 2;
        $user->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */

	public function login()

    {
    	

        $key = '7kvP3yy3b4SGpVz6uSeSBhBEDtGzPb2n';
        $user = Users::where('email', $_POST['email'])->first();

        if (empty($user)) 
        {
            return $this->response('login incorrecto', 401);
        }
        
        if ($user->password == $_POST['password']) 
        {
            $tokenParams = [
                //'name' => $_POST['name'],
                'password' => $_POST['password'],
                'email'=> $_POST['email'],
                'name'=> $user->name,
                'id'=> $user->id,

                
                'random' => time()
            ];
            $token = JWT::encode($tokenParams, $key);
            return response()->json([
                'token' => $token,
            ]);
        } 

        else 
            
        {
            return $this->response('login incorrecto', 401);
        }

	}

    private function response($message, $code)
    {
        $body = ['message' => $message];
        $body = json_encode($body);
        return response($body, $code)->header('Content-Type', 'application/json');
    }

    public function show(UserController $users)
    {
      
        $headers = getallheaders();
        $token = $headers['Authorization'];
        $tokenDecoded = JWT::decode($token, '7kvP3yy3b4SGpVz6uSeSBhBEDtGzPb2n', array('HS256'));
        /*var_dump($tokenDecoded); exit;
        $userDB = [
            self::USER => 'pepin', 
            self::PASSWORD => '1234'
        ]; */
        if ($_POST ['name'] == $tokenDecoded->name and $_POST == $tokenDecoded->password)
        {
            return response()->json ('Usuario' + $_POST['name'] + 'registrado');
                /*'id' => 1,
                'title' => 'la macarena',
                'time' => '4.3'*/







            
}





    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $user)
    {
        //
        $user->delete();
    }
}
