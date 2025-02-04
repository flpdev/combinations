<div class="gerador-jogos">
    <h2 class="titulo">Gerador</h2>

    <button wire:click="gerarJogos" class="botao-gerar @if($botaoDesabilitado) desabilitado @endif" @if($botaoDesabilitado) disabled @endif>
        Gerar
    </button>

    <!-- Exibir "Carregando..." enquanto a variável de loading estiver ativa -->
    <div wire:loading>
        <p>Carregando... Por favor, aguarde.</p>
    </div>

    <!-- Exibir os números faltando -->
    @if($exibeNumerosFaltando)
        @if (!empty($numerosFaltando))
            <div class="numeros-faltando">
                <h3 class="subtitulo">Números Faltando:</h3>
                <ul class="lista-numeros-horizontal">
                    @foreach ($numerosFaltando as $numero)
                        <li class="item-numero">{{ $numero }}</li>
                    @endforeach
                </ul>
            </div>
        @else
            <p class="texto-instrucoes">Nenhum número faltando.</p>
        @endif
    @endif

    <!-- Exibir os jogos gerados -->
    @if ($jogos)
        <div class="jogos-gerados">
            <h3 class="subtitulo">Jogos Gerados:</h3>
            <ul class="lista-jogos">
                @foreach ($jogos as $jogo)
                    <li class="item-jogo">
                        {{ implode(', ', $jogo) }}
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        <p class="texto-instrucoes">Clique no botão para gerar os jogos.</p>
    @endif
</div>
