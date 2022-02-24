<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class login extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "status"=>"ok",
            "user" => auth()->user()->id,
            "rol" => auth()->user()->roles,
            "access_token" => $this->resource,
            "message" => "Successful login"
        ];
    }
}
