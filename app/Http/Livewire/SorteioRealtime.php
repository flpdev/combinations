<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sorteios;
use Carbon\Carbon;

class SorteioRealtime extends Component
{
    public $numerosSorteados = [];   // Números já sorteados no ciclo atual
    public $numerosFaltando = [];    // Números que ainda faltam para fechar o ciclo atual
    public $ciclos = [];             // Lista de ciclos fechados
    public $cicloAtual = [];         // Faixa atual em andamento
    public $cicloFechado = false;    // Indica se o ciclo atual foi concluído
    public $concursosCicloAtual = []; // Lista de concursos da faixa atual
    public $ultimaAparicao = [];     // Guarda quantos sorteios atrás cada número saiu pela última vez

    public function mount()
    {
        $this->atualizarSorteios();
    }

    public function atualizarSorteios()
    {
        $anoAtual = Carbon::now()->year;
    
        // Buscar todos os sorteios do ano atual em ordem cronológica
        $sorteios = Sorteios::whereYear('data', $anoAtual)->orderBy('data', 'asc')->get();
    
        $numerosTemporarios = [];
        $concursosTemporarios = [];
        $ciclo = 1;
        $this->ciclos = [];
        $historicoAparicao = [];
    
        foreach ($sorteios as $index => $sorteio) {
            // Garantindo que os números sejam recuperados corretamente
            $numerosSorteio = json_decode($sorteio->numeros, true);
            if (!is_array($numerosSorteio)) {
                continue; // Ignorar se houver algum erro no formato
            }
    
            // Armazena o concurso atual
            $concursosTemporarios[] = $sorteio->concurso;
    
            // Registra a última aparição de cada número
            foreach ($numerosSorteio as $numero) {
                $numerosTemporarios[(int) $numero] = true; // Usa um array associativo para evitar duplicatas
                $historicoAparicao[(int) $numero] = count($concursosTemporarios); // Marca a última vez que o número apareceu
            }
    
            // Se todos os 25 números já foram sorteados, fecha um ciclo
            if (count($numerosTemporarios) == 25) {
                $this->ciclos[$ciclo] = [
                    'numeros' => array_keys($numerosTemporarios),
                    'concursos' => $concursosTemporarios
                ];
                $numerosTemporarios = []; // Reinicia o rastreamento para o próximo ciclo
                $concursosTemporarios = []; // Reseta os concursos do próximo ciclo
                $historicoAparicao = []; // Limpa a memória de última aparição para o próximo ciclo
                $ciclo++;
            }
        }
    
        // O que sobrar no buffer faz parte do ciclo atual ainda em andamento
        $this->numerosSorteados = array_keys($numerosTemporarios);
        $this->numerosFaltando = array_values(array_diff(range(1, 25), $this->numerosSorteados));
        $this->concursosCicloAtual = $concursosTemporarios; // Guarda os concursos do ciclo atual
    
        // Calcula quantos sorteios atrás cada número foi sorteado pela última vez
        $this->ultimaAparicao = [];
        foreach ($this->numerosSorteados as $numero) {
            $this->ultimaAparicao[$numero] = count($this->concursosCicloAtual) - $historicoAparicao[$numero] + 1;
        }
    
        // Ordena os números de acordo com a última aparição (mais recente primeiro)
        asort($this->ultimaAparicao);  // Ordena pela última aparição (menor para maior)
    
        // Atualiza a faixa atual e verifica se está fechada
        $this->cicloAtual = [
            'numerosSorteados' => array_keys($this->ultimaAparicao),  // Exibe os números ordenados pela última aparição
            'numerosFaltando' => $this->numerosFaltando,
            'concursos' => $this->concursosCicloAtual,
            'ultimaAparicao' => $this->ultimaAparicao
        ];
    
        $this->cicloFechado = empty($this->numerosFaltando);
    }

    public function render()
    {
        return view('livewire.sorteio-realtime', [
            'ciclos' => $this->ciclos,
            'cicloAtual' => $this->cicloAtual,
            'cicloFechado' => $this->cicloFechado
        ]);
    }
}