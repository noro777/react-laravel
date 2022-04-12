<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "author" => $this->author,
            "text" => $this->text,
            "image" => url(asset('images/books/' . $this->image)),
            "file" => $this->file,
            "comments" => new CommentResourceCollection($this->comments),
            "is_now" => $this->created_at >= now()->subDays(7)
        ];
    }
}
