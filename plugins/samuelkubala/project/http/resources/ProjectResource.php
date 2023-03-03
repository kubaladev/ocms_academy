<?php

namespace SamuelKubala\Project\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

//Len pre ukazku, ze viem spravit JsonResource
class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'customer' => $this->customer,
            'owner' => $this->owner,
            'projectmanager' => $this->projectmanager,
            'isclosed' => $this->isclosed
        ];
    }
}
