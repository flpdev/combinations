<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Numbers extends Component
{

    public $numbers = [];
    public $grupoA = [], $grupoB = [], $grupoC = [], $grupoD = [], $grupoE = [];
    public $numeroForte1, $numeroForte2, $numeroForte3;
    public $numeroFraco1, $numeroFraco2;
    public $numerosFortes = [], $numerosFracos = [];
    public $combinacao1, $combinacao2, $combinacao3, $combinacao4, $combinacao5;
    public $combinacao6, $combinacao7, $combinacao8, $combinacao9, $combinacao10;

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
        $this->removeArrayNull();
        $this->atualizaGrupos();
        $this->montaCombinacao();

        return view('livewire.numbers');
    }

    public function atualizaGrupos()
    {
        foreach ($this->numbers as $key => $row) {
            $grupos = array_merge($this->grupoA, $this->grupoB, $this->grupoC, $this->grupoD, $this->grupoE);
            if (count($this->grupoA) <= 3) {
                if (!in_array($key, $grupos)) {
                    array_push($this->grupoA, $key);
                }
            } elseif (count($this->grupoB) <= 3) {
                if (!in_array($key, $grupos)) {
                    array_push($this->grupoB, $key);
                }
            } elseif (count($this->grupoC) <= 3) {
                if (!in_array($key, $grupos)) {
                    array_push($this->grupoC, $key);
                }
            } elseif (count($this->grupoD) <= 3) {
                if (!in_array($key, $grupos)) {
                    array_push($this->grupoD, $key);
                }
            } elseif (count($this->grupoE) <= 3) {
                if (!in_array($key, $grupos)) {
                    array_push($this->grupoE, $key);
                }
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

    public function removeArrayNull()
    {
        foreach ($this->numbers as $key => $row) {
            if (!$row) {
                $this->removeElementoGrupo($key);
                unset($this->numbers[$key]);
            }
        }
    }

    public function removeElementoGrupo($elemto)
    {
        foreach ($this->grupoA as $key => $row) {
            if ($elemto == $row) {
                unset($this->grupoA[$key]);
            }
        }
        foreach ($this->grupoB as $key => $row) {
            if ($elemto == $row) {
                unset($this->grupoB[$key]);
            }
        }
        foreach ($this->grupoC as $key => $row) {
            if ($elemto == $row) {
                unset($this->grupoC[$key]);
            }
        }
        foreach ($this->grupoD as $key => $row) {
            if ($elemto == $row) {
                unset($this->grupoD[$key]);
            }
        }
        foreach ($this->grupoE as $key => $row) {
            if ($elemto == $row) {
                unset($this->grupoE[$key]);
            }
        }
    }

    public function ordenaArray($array)
    {
        $lista = array();
        foreach ($array as $key => $row) {
            if ($row) {
                $lista[$key] = $row;
            }
        }
        return $lista;
    }

    public function montaCombinacao()
    {
        // AB-C + Fortes
        $this->combinacao1 = $this->ordenaArray(array_merge($this->grupoA, $this->grupoB, $this->grupoC, $this->numerosFortes));
        sort($this->combinacao1);
        // AB-D + Fortes
        $this->combinacao2 = array_merge($this->grupoA, $this->grupoB, $this->grupoD, $this->numerosFortes);
        sort($this->combinacao2);
        // AB-E + Fortes
        $this->combinacao3 = array_merge($this->grupoA, $this->grupoB, $this->grupoE, $this->numerosFortes);
        sort($this->combinacao3);
        // AC-D + Fortes
        $this->combinacao4 = array_merge($this->grupoA, $this->grupoC, $this->grupoD, $this->numerosFortes);
        sort($this->combinacao4);
        // AC-E + Fortes
        $this->combinacao5 = array_merge($this->grupoA, $this->grupoC, $this->grupoE, $this->numerosFortes);
        sort($this->combinacao5);
        // AD-E + Fortes
        $this->combinacao6 = array_merge($this->grupoA, $this->grupoD, $this->grupoE, $this->numerosFortes);
        sort($this->combinacao6);
        // BC-D + Fortes
        $this->combinacao7 = array_merge($this->grupoB, $this->grupoC, $this->grupoD, $this->numerosFortes);
        sort($this->combinacao7);
        // BC-E + Fortes
        $this->combinacao8 = array_merge($this->grupoB, $this->grupoC, $this->grupoE, $this->numerosFortes);
        sort($this->combinacao8);
        // BD-E + Fortes
        $this->combinacao9 = array_merge($this->grupoB, $this->grupoD, $this->grupoE, $this->numerosFortes);
        sort($this->combinacao9);
        // CD-E + Fortes
        $this->combinacao10 = array_merge($this->grupoC, $this->grupoD, $this->grupoE, $this->numerosFortes);
        sort($this->combinacao10);
    }
}
