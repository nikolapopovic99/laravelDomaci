<?php

namespace App\Http\Resources;

use App\Models\Tip;
use App\Models\Destinacija;
use Illuminate\Http\Resources\Json\JsonResource;

class RezervacijaResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $tip = Tip::find($this->tipID);
        $destinacija = Destinacija::find($this->destinacijaID);

        return [
            'id' => $this->id,
            'ime' => $this->ime,
            'prezime' => $this->prezime,
            'brojPasosa' => $this->brojPasosa,
            'destinacija' => $destinacija->destinacija,                 
            'drzava' => $destinacija->drzava,                 
            'datum' => $destinacija->datum,
            'tip' => $tip->tip
        ];
    }
}
