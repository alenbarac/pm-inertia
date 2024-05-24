<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'createdAt' => (new Carbon($this->created_at))->format('Y-m-d'),
            'dueDate' => (new Carbon($this->due_date))->format('Y-m-d'),
            'status' => $this->status,
            'imagePath' => $this->image_path,
            'createdBy' => new UserResource($this->createdBy),
            'updatedBy' => new UserResource($this->updatedBy)
        ];
    }
}