<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DespesasResource extends JsonResource
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
        'id' => $this->id,
        'descricao' => $this->descricao,
        'data' => $this->formattedData(),
        'usuario' => $this->usuario,
        'valor' => $this->formattedValor(),
        ];

    }

    private function formattedValor()
    {
        return 'R$' . number_format($this->valor, 2);
    }

    private function formattedData()
    {
        return date( 'd/m/Y' , strtotime($this->data));
    }
}
