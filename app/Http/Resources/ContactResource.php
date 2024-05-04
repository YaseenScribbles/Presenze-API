<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'shopName' => $this->shop_name,
            'contactName' => $this->contact_name,
            'city' => $this->city,
            'zipcode' => $this->zipcode,
            'state' => $this->state,
            'district' => $this->district,
            'phone' => $this->phone,
            'email' => $this->email,
            'userId' => $this->user_id,
            'active' => $this->is_active
        ];
    }
}
