<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class PostRespurce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $date = new Carbon($this->created_at);
        $dateCarbon = $date->format('d-m-Y H:i:s');
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author,
            'img_path' => $this->img_path,
            'category' => $this->category->name,
            'created_at' => $dateCarbon
        ];
    }
}
