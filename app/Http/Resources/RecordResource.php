<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class RecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'reference_number' => $this->reference_number,
            'gateready_user_id' => $this->gateready_user_id,
            'user' => $this->user,
        ];
    }
}
