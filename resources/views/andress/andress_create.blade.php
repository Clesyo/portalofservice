@extends('layouts.main')

@section('content')
     <!--Page header start -->
     <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
                @for ($i = 0; $i < (count($pages) -1); $i++)
                    @if(count($pages) >= 2)
                        <li class="breadcrumb-item">{{$pages[$i]}}</li>
                    @endif
                @endfor
                        <li class="breadcrumb-item active">{{end($pages)}}</li>
            
            {{-- <li class="breadcrumb-item active">Admin Dashboard</li> --}}
        </ol>
        <ul class="app-actions">
            <li>
                <a href="#" id="reportrange">
                    <span class="range-text">Apr 25, 2020</span>
                    <i class="icon-chevron-down"></i>	
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-export"></i>
                </a>
            </li>
        </ul>
    </div>
    <!--Page header end -->

    <div class="row gutters">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <form action="{{ url('servico/store', []) }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Informação básicas</div>
                    </div>
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12">
                                <div class="form-group">
                                    <label for="">CEP</label>
                                    <input type="text" class="form-control" name="cep" id="cep">
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                                <div class="form-group">
                                    <label for="">Empresa</label>
                                    <select class="form-control selectpicker" data-live-search="true" data-show-subtext="true" name="company_id">
                                        @foreach (\App\Models\Company::where('user_id',Auth::user()->id)->get() as $company)
                                            @if($company->andress) 
                                                <option value="{{ $company->id }}" disabled data-subtext="Já possui endereço">{{ $company->name }} </option>
                                            @else
                                                <option value="{{ $company->id }}" @isset($company_id) @if($company_id == $campany->id) selected @endif @endisset>{{ $company->name }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row gutters">
                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                                <div class="form-group">
                                    <label for="">Endereço</label>
                                    <input type="text" class="form-control" name="andress" id="rua">
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12">
                                <div class="form-group">
                                    <label for="">Número</label>
                                    <input type="number" class="form-control" name="number">
                                </div>
                            </div>
                        </div>

                        <div class="row gutters">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <div class="form-group">
                                    <label for="">Complemento</label>
                                    <input type="text" class="form-control" name="complement">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <div class="form-group">
                                    <label for="">Bairro</label>
                                    <input type="text" class="form-control" name="neighborhood" id="bairro">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <div class="form-group">
                                    <label for="">Cidade</label>
                                    <input type="text" class="form-control" name="city" id="cidade">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <div class="form-group">
                                    <label for="">UF</label>
                                    <select class="form-control selectpicker" data-live-search="true" name="uf" id="uf">
                                        @foreach ($states as $key => $state)
                                            <option value="{{$key}}">{{$state}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="company_id" value="{{ \App\Models\Company::where('user_id',Auth::user()->id)->first()->id }}">
                    <div class="card-footer text-right ">
                        <button class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

     <!-- Adicionando Javascript -->
   <script type="text/javascript" >

    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }
        
        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                           /*  $("#uf option").filter(function() {
                                return $(this).text() === dados.uf;
                            }).prop("selected", true); */
                            $("#ibge").val(dados.ibge);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });

</script>
@endsection