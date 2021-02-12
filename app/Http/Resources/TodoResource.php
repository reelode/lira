<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
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
        return
            [
                'id' => $this->id,
                'title' => $this->title,
                'description' => $this->description,
                'completed' => $this->completed,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'order' => $this->order
            ];
    }


    public function with($request)
    {
        return [
            'relationships' => [
                'user' => new UserResource($this->user()),
                'list_col' => new ListColResource($this->listCol())
            ]
        ];
    }
}
