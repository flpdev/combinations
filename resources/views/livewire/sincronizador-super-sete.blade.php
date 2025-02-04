<div>
    <button wire:click="sincronizar" class="bg-blue-500 text-white p-2 rounded disabled:opacity-50">
        Sincronizar Dados
    </button>
    
    <br>
    <!-- Exibir "Carregando..." enquanto a variável de loading estiver ativa -->
    <div wire:loading>
        <p>Carregando... Por favor, aguarde.</p>
    </div>

    <div class="mt-4">
        <p>{{ $message }}</p>
    </div>
</div>
