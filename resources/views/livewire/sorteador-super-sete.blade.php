<div class="container py-5">
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
            @livewire('sincronizador-super-sete') <!-- Componente de sincronização -->
        </div>

        <div class="col-lg-8 col-md-6">
            <h3 class="text-center mb-4">Sorteios Recentes</h3>

            <div class="bg-light p-4 rounded shadow-sm mb-4">
                <h4>Apostas Geradas com Táticas</h4>

                <!-- Verificando se há apostas geradas -->
                @if (count($apostasGeradas) > 0)
                    <ul class="list-group">
                        @foreach ($apostasGeradas as $aposta)
                            <li class="list-group-item">
                                <!-- Exibe cada aposta como uma lista de 7 números -->
                                {{ implode(', ', $aposta) }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center">Nenhuma aposta gerada ainda. Clique no botão para sincronizar e gerar novas apostas.</p>
                @endif
            </div>

            <div class="text-center">
                <button wire:click="sincronizarSorteios" class="btn btn-primary">Atualizar Sorteios</button>
            </div>
        </div>
    </div>
</div>
