<?php

namespace App\Http\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;
use App\Models\Sorteios;
use Carbon\Carbon;


class SyncLoterias extends Component
{
    public $message = 'Clique no botão para sincronizar os dados';

    public function syncData()
    {
        // URL da nova API
        $url = 'https://loteriascaixa-api.herokuapp.com/api/lotofacil';

        $client = new Client();
        try {            $response = $client->get($url);
            $data = json_decode($response->getBody()->getContents(), true);

            // Verificar se temos um array de sorteios
            foreach ($data as $sorteio) {
                // Pegando os dados necessários
                $concurso = $sorteio['concurso'];
                $numeros = json_encode($sorteio['dezenas']);  // Convertendo o array de dezenas para JSON

                // Convertendo a data para o formato Y-m-d
                $dataSorteio = Carbon::createFromFormat('d/m/Y', $sorteio['data'])->format('Y-m-d');

                // Atualiza ou cria o sorteio no banco de dados
                Sorteios::updateOrCreate(
                    ['concurso' => $concurso],
                    [
                        'data' => $dataSorteio,
                        'numeros' => $numeros  // Armazenando como JSON
                    ]
                );
            }

        $this->message = 'Dados sincronizados com sucesso!';

        } catch (\Exception $e) {
            dd($e->getMessage());
            $this->message = 'Erro ao conectar com a API: ' . $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.sync-loterias');
    }
}
