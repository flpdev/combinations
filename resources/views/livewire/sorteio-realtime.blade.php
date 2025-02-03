<div class="container py-5">
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
            @livewire('sync-loterias')
        </div>

        <div class="col-lg-8 col-md-6">
            <h3 class="text-center mb-4">Sorteios Recentes</h3>

            <div class="bg-light p-4 rounded shadow-sm mb-4">
                <h3>Concursos da Faixa Atual:</h3>
                <ul class="list-group">
                    @foreach($cicloAtual['concursos'] as $concurso)
                        <li class="list-group-item">Concurso {{ $concurso }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-light p-4 rounded shadow-sm mb-4">
                <h3>Números Sorteados na Faixa Atual:</h3>
                <ul class="list-group">
                    @foreach($cicloAtual['numerosSorteados'] as $numero)
                        <li class="list-group-item">
                            {{ $numero }} 
                            <span class="badge bg-info">Última vez há {{ $cicloAtual['ultimaAparicao'][$numero] }} sorteios</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-light p-4 rounded shadow-sm mb-4">
                <h4>Números Faltando</h4>
                <ul class="list-group">
                    @foreach ($numerosFaltando as $numero)
                        <li class="list-group-item">{{ $numero }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="text-center">
                @if($cicloFechado)
                    <p class="alert alert-success">Todos os números foram sorteados! O ciclo foi fechado.</p>
                @else
                    <p class="alert alert-warning">Ainda falta(m) número(s) para serem sorteados.</p>
                @endif
            </div>

            <div class="text-center">
                <button wire:click="atualizarSorteios" class="btn btn-primary">Atualizar</button>
            </div>

            @if($cicloFechado)
                <div class="alert alert-info mt-3">
                    <p>O ciclo foi fechado e todos os números foram sorteados!</p>
                </div>
            @endif
        </div>
    </div>
</div>
