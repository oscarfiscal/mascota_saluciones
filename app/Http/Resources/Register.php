<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Register extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $acces = $this->createToken('my-app-token')->plainTextToken;
        return [
            'user'  => $this->resource->email,
            'access_token' => $acces,
            'rol'=>$this->roles,
            'message' => 'Registro Exitoso'
        ];
    }
}
