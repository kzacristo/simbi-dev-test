<?php

namespace App\Http\Resources\Library;

use App\Core\Domain\Library\Entities\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListAllUsersResource extends JsonResource{
    /**
     * @param User $user
     */
    public function __construct(private User $user)
    {

    }

    /**
     * Transform the resource into an array
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable
     */
    public function toArray($request = null)
    {
        return [
            'id' => $this->user->id,
            'name' => $this->user->name,
            'email' => $this->user->email,
            'password' => $this->user->password
        ];
    }
}
