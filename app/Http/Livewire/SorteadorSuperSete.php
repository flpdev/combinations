<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SorteiosSuperSupersete;

class SorteadorSuperSete extends Component
{
    public $sorteios;          // Lista de sorteios que será usada para gerar as apostas
    public $apostasGeradas = []; // Apostas geradas com as táticas

    public function mount()
    {
        $this->sincronizarSorteios();
    }

    // Sincroniza os sorteios, buscando no banco de dados
    public function sincronizarSorteios()
    {
        // Pegando todos os sorteios da base de dados
        $this->sorteios = SorteiosSuperSupersete::orderBy('concurso', 'asc')->get();

        // Gerar as apostas com base nos sorteios carregados
        $this->gerarApostasComTaticas();
    }

    // Função para gerar apostas aplicando as táticas
    public function gerarApostasComTaticas()
    {
        // Tática 1: Análise de frequência (números quentes e frios)
        $numerosFrequentes = $this->analisarFrequenciaNumeros();

        // Tática 2: Fechamento (gerar combinações)
        $fechamento = $this->gerarFechamento($numerosFrequentes);

        // Tática 3: Apostas Baseadas em Dúvidas e Eliminações
        $apostas = $this->gerarApostasComDúvidas($fechamento);

        // Armazenando as apostas geradas
        $this->apostasGeradas = $apostas;
    }

    // Função para analisar a frequência dos números sorteados
    public function analisarFrequenciaNumeros()
    {
        // Conta quantas vezes cada número apareceu
        $numerosFrequentes = [];
        foreach ($this->sorteios as $sorteio) {
            // Decodificando os números, que estão armazenados como JSON
            $numeros = json_decode($sorteio->dezenas);
            // Verifique se a decodificação deu certo
            if (!is_array($numeros)) {
                continue; // Se a decodificação falhou, pula para o próximo sorteio
            }

            foreach ($numeros as $numero) {
                if (!isset($numerosFrequentes[$numero])) {
                    $numerosFrequentes[$numero] = 0;
                }
                $numerosFrequentes[$numero]++;
            }
        }

        // Ordena os números por frequência (decrescente)
        arsort($numerosFrequentes);
        return array_keys($numerosFrequentes);
    }

    // Função para gerar combinações de fechamento
    public function gerarFechamento($numeros)
    {
        // Pegando os 7 números mais frequentes (já ordenados em 'numeros')
        $numerosFrequentes = array_slice($numeros, 0, 7);

        // Gerando combinações de 7 números a partir dos mais frequentes
        // Vamos gerar uma combinação de 7 números. Uma abordagem simples seria gerar as combinações manualmente.
        $combinacoes = $this->gerarCombinacoes($numerosFrequentes, 7);

        return $combinacoes;
    }

    // Função auxiliar para gerar combinações de 7 números
    public function gerarCombinacoes($numeros, $quantidade)
    {
        $combinacoes = [];

        // Gerar combinações sem repetição usando uma função recursiva
        $this->combinacoesRecursivas($numeros, $quantidade, [], $combinacoes);

        return $combinacoes;
    }

    // Função recursiva para gerar combinações
    public function combinacoesRecursivas($numeros, $quantidade, $combinacaoAtual, &$combinacoes)
    {
        // Quando a combinação tiver o tamanho desejado, armazena a combinação
        if (count($combinacaoAtual) == $quantidade) {
            $combinacoes[] = $combinacaoAtual;
            return;
        }

        // Para cada número restante, tenta adicionar à combinação
        foreach ($numeros as $index => $numero) {
            // Faz uma cópia do array original, sem o número atual
            $numerosRestantes = array_slice($numeros, $index + 1);

            // Chama recursivamente para adicionar o próximo número à combinação
            $this->combinacoesRecursivas($numerosRestantes, $quantidade, array_merge($combinacaoAtual, [$numero]), $combinacoes);
        }
    }

    // Função para eliminar números frios das apostas
    public function eliminarNumerosFrios($numerosQuentes, $numerosFrios)
    {
        // Filtra os números quentes removendo os que são considerados frios
        return array_diff($numerosQuentes, $numerosFrios);
    }

    // Função para gerar apostas balanceadas com base nas táticas
    public function gerarApostasComDúvidas($fechamento)
    {
        // Tática 1: Análise de frequência (números quentes e frios)
        $numerosFrequentes = $this->analisarFrequenciaNumeros();

        // Seleciona os 7 números mais quentes
        $numerosQuentes = array_slice($numerosFrequentes, 0, 7);

        // Seleciona os 3 números mais frios (menos frequentes)
        $numerosFrios = array_slice($numerosFrequentes, -3);

        // Tática 2: Elimina combinações de números que aparecem menos
        $numerosEliminados = $this->eliminarNumerosFrios($numerosQuentes, $numerosFrios);

        // Gerando apostas balanceadas
        $apostas = $this->gerarCombinacoesBalanceadas($numerosEliminados);

        return $apostas;
    }

    // Função para gerar combinações balanceadas, com 7 números por aposta
    public function gerarCombinacoesBalanceadas($numeros)
    {
        $apostas = [];
        $numeroDeApostas = 10; // Exemplo de 10 apostas

        // Obter todos os números sorteados
        $numerosSorteados = [];
        foreach ($this->sorteios as $sorteio) {
            $numerosSorteados[] = json_decode($sorteio->dezenas); // Armazena todos os números dos sorteios
        }

        // Gerar as apostas, evitando repetições
        while (count($apostas) < $numeroDeApostas) {
            // Embaralha os números e pega os 7 primeiros para a aposta
            shuffle($numeros);
            $combinacao = array_slice($numeros, 0, 7); // Pega os 7 primeiros após o embaralhamento

            // Verifica se a combinação gerada já foi sorteada (considerando a ordem)
            $combinacaoJaSorteada = false;
            foreach ($numerosSorteados as $sorteio) {
                if ($combinacao === $sorteio) { // Verifica se a combinação gerada já foi sorteada (mesma ordem)
                    $combinacaoJaSorteada = true;
                    break;
                }
            }

            // Se não for sorteada, adiciona à lista de apostas
            if (!$combinacaoJaSorteada) {
                $apostas[] = $combinacao;
            }
        }

        return $apostas;
    }

    public function render()
    {
        return view('livewire.sorteador-super-sete');
    }
}
