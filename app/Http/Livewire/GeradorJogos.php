<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\SorteioRealtime;

class GeradorJogos extends Component
{
    public $jogos = [];
    public $numerosFaltando = [], $exibeNumerosFaltando = false;
    public $botaoDesabilitado = false; // Variável para controlar o estado do botão

    public function mount(){
        $sorteioRealtime = new SorteioRealtime();
        $sorteioRealtime->atualizarSorteios();
        $this->numerosFaltando = $sorteioRealtime->numerosFaltando; // Ajustado para ser uma variável
        $this->exibeNumerosFaltando = true;

        // Verifica se o número de elementos em numerosFaltando é 25
        $this->botaoDesabilitado = count($this->numerosFaltando) === 25;
    }
    
    public function gerarJogos()
    {
        $this->jogos = [];
        
        for ($i = 0; $i < 7; $i++) {
            $this->jogos[] = $this->gerarJogo();
        }
    }
    
    private function gerarJogo()
    {
        $numerosDisponiveis = range(1, 25);  // Todos os números de 1 a 25
        $numerosEscolhidos = [];

        // Garantir que os números faltando apareçam em todos os jogos
        if (!empty($this->numerosFaltando)) {
            // Adiciona todos os números faltando ao jogo
            $numerosEscolhidos = $this->numerosFaltando;
            // Remove os números faltando de $numerosDisponiveis para evitar duplicação
            $numerosDisponiveis = array_diff($numerosDisponiveis, $this->numerosFaltando);
        }

        // Garantir equilíbrio entre pares e ímpares
        $pares = array_filter($numerosDisponiveis, fn($n) => $n % 2 === 0);
        $impares = array_filter($numerosDisponiveis, fn($n) => $n % 2 !== 0);

        // Agora, devemos preencher os números restantes até completar 15
        $numerosRestantes = 15 - count($numerosEscolhidos);

        // Caso o número de pares e ímpares disponíveis não seja suficiente, jogar apenas com os disponíveis
        if (count($pares) + count($impares) < $numerosRestantes) {
            throw new \Exception('Não há números suficientes disponíveis para gerar o jogo.');
        }

        // Preencher o restante dos números até completar 15
        $maxAttempts = 100;  // Defina um número máximo de tentativas para evitar loop infinito
        $attempts = 0;

        while (count($numerosEscolhidos) < 15 && $attempts < $maxAttempts) {
            $attempts++;

            if (count($numerosEscolhidos) % 2 === 0 && count($pares) > 0) {
                $numeroEscolhido = array_splice($pares, array_rand($pares), 1);
                if (!empty($numeroEscolhido)) {
                    $numerosEscolhidos[] = $numeroEscolhido[0];
                }
            } elseif (count($impares) > 0) {
                $numeroEscolhido = array_splice($impares, array_rand($impares), 1);
                if (!empty($numeroEscolhido)) {
                    $numerosEscolhidos[] = $numeroEscolhido[0];
                }
            }
        }

        // Se não conseguimos preencher todos os 15 números em 100 tentativas, lançamos uma exceção
        if (count($numerosEscolhidos) < 15) {
            throw new \Exception('Não foi possível preencher todos os 15 números dentro do limite de tentativas.');
        }

        // Evitar sequências longas
        sort($numerosEscolhidos);
        for ($i = 0; $i < count($numerosEscolhidos) - 2; $i++) {
            if ($numerosEscolhidos[$i] + 1 == $numerosEscolhidos[$i + 1] && $numerosEscolhidos[$i + 1] + 1 == $numerosEscolhidos[$i + 2]) {
                shuffle($numerosEscolhidos);
                return $this->gerarJogo();
            }
        }

        return $numerosEscolhidos;
    }

    
    
    public function render()
    {
        return view('livewire.gerador-jogos', [
            'jogos' => $this->jogos,
        ]);
    }
}