<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Login as LoginRequest;
use App\Http\Resources\Login as LoginResource;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /*** Este método maneja la solicitud de inicio de sesión.
 * @oscar fiscal
*/
public function login(LoginRequest $request)
{
    $credentials = ['email' => $request['email'], 'password' => $request['password'] ];

             /*** valida que los campos sean correctos y genera el token.*/

    if (!auth() -> attempt ($credentials)) {
        return response(['message' => 'credentiales incorrectas']);
    }

    $accessToken = auth()->user()->createToken('my-app-token')->plainTextToken;

    return response()->json(new LoginResource($accessToken), 200);

}
}
