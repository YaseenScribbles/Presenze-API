<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VisitResource extends JsonResource
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
            'shopId' => $this->shop_id,
            'shopName' => $this->shop_name,
            'purpose' => $this->purpose,
            'location' => $this->location,
            'active' => $this->is_active,
            'userId' => $this->user_id,
            'user' => $this->name
        ];
    }
}
