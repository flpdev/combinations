<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SorteiosSuperSupersete;
use Illuminate\Support\Facades\Http;

class SincronizadorSuperSete extends Component
{
    public $message = 'Clique no botão para sincronizar os dados';
    public function sincronizar() {

        try {
            $response = Http::get('https://loteriascaixa-api.herokuapp.com/api/supersete');
            $dados = $response->json();
    
            if (!empty($dados)) {
                foreach ($dados as $sorteio) {

                    $numeros = json_encode($sorteio['dezenasOrdemSorteio']);  // Convertendo o array de dezenas para JSON

                    SorteiosSuperSupersete::updateOrCreate(
                        ['concurso' => $sorteio['concurso']],
                        [
                            'data' => date('Y-m-d', strtotime($sorteio['data'])),
                            'local' => $sorteio['local'],
                            'dezenas' => $numeros,
                        ]
                    );
                }
            }
            $this->message = 'Dados sincronizados com sucesso!';
        } catch (\Throwable $th) {
            $this->message = 'Erro ao conectar com a API: ' . $th->getMessage();
        }



    }

    public function render() {
        return view('livewire.sincronizador-super-sete');
    }
}
