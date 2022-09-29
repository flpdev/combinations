<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Numbers extends Component
{

    public $numbers = [];
    public $grupoA = [], $grupoB = [], $grupoC = [], $grupoD = [], $grupoE = [];
    public $numeroForte1, $numeroForte2, $numeroForte3;
    public $numeroFraco1, $numeroFraco2;
    public $numerosFortes, $numerosFracos;

    public function render()
    {

        $this->numerosFortes = [
            '1' => $this->numeroForte1,
            '2' => $this->numeroForte2,
            '3' => $this->numeroForte3,
        ];

        $this->numerosFracos = [
            '1' => $this->numeroFraco1,
            '2' => $this->numeroFraco2,
        ];

        $this->resetaInformados();

        return view('livewire.numbers');
    }

    public function atualizaGrupos()
    {
        foreach ($this->numbers as $key => $row) {
            if (count($this->grupoA) <= 4) {
            } elseif (count($this->grupoB) <= 4) {
            } elseif (count($this->grupoC) <= 4) {
            } elseif (count($this->grupoD) <= 4) {
            } elseif (count($this->grupoE) <= 4) {
            }
        }
    }

    public function resetaInformados()
    {
        foreach ($this->numerosFortes as $key => $row) {
            $this->numbers[$row] = false;
        }

        foreach ($this->numerosFracos as $key => $row) {
            $this->numbers[$row] = false;
        }
    }
}
