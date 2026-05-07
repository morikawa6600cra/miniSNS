<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,

            'profile' => [
                'user_name' => $this->profile?->user_name,
                'bio' => $this->profile?->bio,
                'avatar' => $this->profile?->avatar,
            ],
        ];
    }
}
