<div>

    <div class="row">
        <div class="col">
            <h1>Hello Chico!</h1>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h3>Números Fortes</h3>
        </div>
    </div>
    <div class="row numero-forte">
        <div class="row">
            <div class="col">
                <label for="numero_forte1" class="label_white">1º Número: </label>
                <input wire:model="numeroForte1" min="1" max="25" type="number" name="numero_forte1" id="numero_forte1">
                <i class="label_white">Números entre 1 e 25</i>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="numero_forte1" class="label_white">2º Número: </label>
                <input wire:model="numeroForte2" min="1" max="25" type="number" name="numero_forte2" id="numero_forte2">
                <i class="label_white">Números entre 1 e 25</i>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="numero_forte1" class="label_white">3º Número: </label>
                <input wire:model="numeroForte3" min="1" max="25" type="number" name="numero_forte3" id="numero_forte3">
                <i class="label_white">Números entre 1 e 25</i>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>Números Fracos</h3>
        </div>
    </div>
    <div class="row numero-fraco">
        <div class="row">
            <div class="col">
                <label for="numero_fraco1" class="label_white">1º Número: </label>
                <input wire:model="numeroFraco1" min="1" max="25" type="number" name="numero_fraco1" id="numero_fraco1">
                <i class="label_white">Números entre 1 e 25</i>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="numero_fraco1" class="label_white">2º Número: </label>
                <input wire:model="numeroFraco2" min="1" max="25" type="number" name="numero_fraco2" id="numero_fraco2">
                <i class="label_white">Números entre 1 e 25</i>
            </div>
        </div>
    </div>
    <div class="row">
    </div>
    <div class="row">
        <div class="col">
            <form action="">
                <div class="row">
                    <div class="col-md-3 center">
                        <h3>Seleção</h3>
                        <div class="row">
                            <div class="col linha">
                                <div class="number">
                                    <input wire:model="numbers.1" type="checkbox" name="numbers[]" id="1"
                                        @if(array_search(1, $numerosFracos) || array_search(1, $numerosFortes)) disabled
                                        @endif>
                                    <label for="1">01</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.2" type="checkbox" name="numbers[]" id="2"
                                        @if(array_search(2, $numerosFracos) || array_search(2, $numerosFortes)) disabled
                                        @endif>
                                    <label for="2">02</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.3" type="checkbox" name="numbers[]" id="3"
                                        @if(array_search(3, $numerosFracos) || array_search(3, $numerosFortes)) disabled
                                        @endif>
                                    <label for="3">03</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.4" type="checkbox" name="numbers[]" id="4"
                                        @if(array_search(4, $numerosFracos) || array_search(4, $numerosFortes)) disabled
                                        @endif>
                                    <label for="4">04</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.5" type="checkbox" name="numbers[]" id="5"
                                        @if(array_search(5, $numerosFracos) || array_search(5, $numerosFortes)) disabled
                                        @endif>
                                    <label for="5">05</label>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col linha">
                                <div class="number">
                                    <input wire:model="numbers.6" type="checkbox" name="numbers[]" id="6"
                                        @if(array_search(6, $numerosFracos) || array_search(6, $numerosFortes)) disabled
                                        @endif>
                                    <label for="6">06</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.7" type="checkbox" name="numbers[]" id="7"
                                        @if(array_search(7, $numerosFracos) || array_search(7, $numerosFortes)) disabled
                                        @endif>
                                    <label for="7">07</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.8" type="checkbox" name="numbers[]" id="8"
                                        @if(array_search(8, $numerosFracos) || array_search(8, $numerosFortes)) disabled
                                        @endif>
                                    <label for="8">08</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.9" type="checkbox" name="numbers[]" id="9"
                                        @if(array_search(9, $numerosFracos) || array_search(9, $numerosFortes)) disabled
                                        @endif>
                                    <label for="9">09</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.10" type="checkbox" name="numbers[]" id="10"
                                        @if(array_search(10, $numerosFracos) || array_search(10, $numerosFortes))
                                        disabled @endif>
                                    <label for="10">10</label>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col linha">
                                <div class="number">
                                    <input wire:model="numbers.11" type="checkbox" name="numbers[]" id="11"
                                        @if(array_search(11, $numerosFracos) || array_search(11, $numerosFortes))
                                        disabled @endif>
                                    <label for="11">11</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.12" type="checkbox" name="numbers[]" id="12"
                                        @if(array_search(12, $numerosFracos) || array_search(12, $numerosFortes))
                                        disabled @endif>
                                    <label for="12">12</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.13" type="checkbox" name="numbers[]" id="13"
                                        @if(array_search(13, $numerosFracos) || array_search(13, $numerosFortes))
                                        disabled @endif>
                                    <label for="13">13</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.14" type="checkbox" name="numbers[]" id="14"
                                        @if(array_search(14, $numerosFracos) || array_search(14, $numerosFortes))
                                        disabled @endif>
                                    <label for="14">14</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.15" type="checkbox" name="numbers[]" id="15"
                                        @if(array_search(15, $numerosFracos) || array_search(15, $numerosFortes))
                                        disabled @endif>
                                    <label for="15">15</label>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col linha">
                                <div class="number">
                                    <input wire:model="numbers.16" type="checkbox" name="numbers[]" id="16"
                                        @if(array_search(16, $numerosFracos) || array_search(16, $numerosFortes))
                                        disabled @endif>
                                    <label for="16">16</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.17" type="checkbox" name="numbers[]" id="17"
                                        @if(array_search(17, $numerosFracos) || array_search(17, $numerosFortes))
                                        disabled @endif>
                                    <label for="17">17</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.18" type="checkbox" name="numbers[]" id="18"
                                        @if(array_search(18, $numerosFracos) || array_search(18, $numerosFortes))
                                        disabled @endif>
                                    <label for="18">18</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.19" type="checkbox" name="numbers[]" id="19"
                                        @if(array_search(19, $numerosFracos) || array_search(19, $numerosFortes))
                                        disabled @endif>
                                    <label for="19">19</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.20" type="checkbox" name="numbers[]" id="20"
                                        @if(array_search(20, $numerosFracos) || array_search(20, $numerosFortes))
                                        disabled @endif>
                                    <label for="20">20</label>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col linha">
                                <div class="number">
                                    <input wire:model="numbers.21" type="checkbox" name="numbers[]" id="21"
                                        @if(array_search(21, $numerosFracos) || array_search(21, $numerosFortes))
                                        disabled @endif>
                                    <label for="21">21</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.22" type="checkbox" name="numbers[]" id="22"
                                        @if(array_search(22, $numerosFracos) || array_search(22, $numerosFortes))
                                        disabled @endif>
                                    <label for="22">22</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.23" type="checkbox" name="numbers[]" id="23"
                                        @if(array_search(23, $numerosFracos) || array_search(23, $numerosFortes))
                                        disabled @endif>
                                    <label for="23">23</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.24" type="checkbox" name="numbers[]" id="24"
                                        @if(array_search(24, $numerosFracos) || array_search(24, $numerosFortes))
                                        disabled @endif>
                                    <label for="24">24</label>
                                </div>
                                <div class="number">
                                    <input wire:model="numbers.25" type="checkbox" name="numbers[]" id="25"
                                        @if(array_search(25, $numerosFracos) || array_search(25, $numerosFortes))
                                        disabled @endif>
                                    <label for="25">25</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-md-3">
                                <h3>Grupos</h3>
                                <div class="row">
                                    <div class="col linha">
                                        <p><b>Grupo A:</b><span>
                                                @foreach($grupoA as $key => $num)
                                                @if($key) - @endif
                                                {{$num}}
                                                @endforeach
                                            </span>
                                        </p>
                                        <p><b>Grupo B:</b><span>
                                                @foreach($grupoB as $key => $num)
                                                @if($key) - @endif
                                                {{$num}}
                                                @endforeach
                                            </span>
                                        </p>
                                        <p><b>Grupo C:</b><span>
                                                @foreach($grupoC as $key => $num)
                                                @if($key) - @endif
                                                {{$num}}
                                                @endforeach
                                            </span>
                                        </p>
                                        <p><b>Grupo D:</b><span>
                                                @foreach($grupoD as $key => $num)
                                                @if($key) - @endif
                                                {{$num}}
                                                @endforeach
                                            </span>
                                        </p>
                                        <p><b>Grupo E:</b><span>
                                                @foreach($grupoE as $key => $num)
                                                @if($key) - @endif
                                                {{$num}}
                                                @endforeach
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <h3>Combinações</h3>
                                <div class="row">
                                    <div class="col linha">
                                        <p><b>AB-C + Fortes: </b>
                                            @foreach($combinacao1 as $key => $comb)
                                            @if($key && $comb) - @endif
                                            {{$comb}}
                                            @endforeach
                                        </p>
                                        <p><b>AB-D + Fortes: </b>
                                            @foreach($combinacao2 as $key => $comb)
                                            @if($key && $comb) - @endif
                                            {{$comb}}
                                            @endforeach</p>
                                        <p><b>AB-E + Fortes: </b>
                                            @foreach($combinacao3 as $key => $comb)
                                            @if($key && $comb) - @endif
                                            {{$comb}}
                                            @endforeach</p>
                                        <p><b>AC-D + Fortes: </b>
                                            @foreach($combinacao4 as $key => $comb)
                                            @if($key && $comb) - @endif
                                            {{$comb}}
                                            @endforeach</p>
                                        <p><b>AC-E + Fortes: </b>
                                            @foreach($combinacao5 as $key => $comb)
                                            @if($key && $comb) - @endif
                                            {{$comb}}
                                            @endforeach</p>
                                        <p><b>AD-E + Fortes: </b>
                                            @foreach($combinacao6 as $key => $comb)
                                            @if($key && $comb) - @endif
                                            {{$comb}}
                                            @endforeach</p>
                                        <p><b>BC-D + Fortes: </b>
                                            @foreach($combinacao7 as $key => $comb)
                                            @if($key && $comb) - @endif
                                            {{$comb}}
                                            @endforeach</p>
                                        <p><b>BC-E + Fortes: </b>
                                            @foreach($combinacao8 as $key => $comb)
                                            @if($key && $comb) - @endif
                                            {{$comb}}
                                            @endforeach</p>
                                        <p><b>BD-E + Fortes: </b>
                                            @foreach($combinacao9 as $key => $comb)
                                            @if($key && $comb) - @endif
                                            {{$comb}}
                                            @endforeach</p>
                                        <p><b>CD-E + Fortes: </b>
                                            @foreach($combinacao10 as $key => $comb)
                                            @if($key && $comb) - @endif
                                            {{$comb}}
                                            @endforeach</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>