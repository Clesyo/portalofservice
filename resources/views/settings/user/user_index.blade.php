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
        <div class="col-sm-4 col-3"></div>
        <div class="col-sm-8 col-9 text-right mb-2 px-3">
            <a href="{{ url('settings/role/new', []) }}" class="btn btn-primary btn-rounded" style="font-weight: bold"><i class="icon-plus" style="font-size: 15px"></i>  Novo</a>
        </div>
    </div>


    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Lista de Usuários</div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table  class="table projects-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuário</th>
                                    <th>Email/Token</th>
                                    <th>Status</th>
                                    <th>Confirmação</th>
                                    <th>Criado em</th>
                                    <th class="text-right">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="project-details">
                                                <div class="project-info">
                                                    <p>{{ $user->id }}</p>
                                                    {{-- <p>USA</p> --}}
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="project-details">
                                                <img src="{{url("img/user6.png")}}" class="avatar" alt="Le Rouge Admin">
                                                <div class="project-info">
                                                    <p>{{ $user->name }}</p>
                                                    <p>{{ $user->role['name'] }}</p>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="project-details">
                                                <div class="project-info">
                                                    <p>{{ $user->email }}</p>
                                                    <p>{{ $user->token }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="project-details">
                                                <div class="project-info">
                                                    <div class="status approved">
                                                        @if ($user->status == 1)
                                                            <i class="icon-thumbs-up" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ativo"></i>
                                                        @else
                                                            <i class="icon-thumbs-down" data-toggle="tooltip" data-placement="top" title="" data-original-title="Inativo"></i>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="project-details">
                                                <div class="project-info">
                                                    <div class="status approved">
                                                        @if ($user->confirmed == 1)
                                                            <i class="icon-check_circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ativo"></i> Confirmado
                                                        @else
                                                            <i class="icon-info1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Inativo"></i>Não confirmado
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ ($user->created_at != NULL) ? date_format($user->created_at,'m/d/Y H:i:s') : 'No have date' }}</td>
                                        <td>
                                            <div class="td-actions justify-content-center">

                                                <a href="{{ url('#', []) }}" class="icon {{ ($user->status == 0) ? 'disabled': '' }}" style="color: #000" tabindex="-1" role="button" aria-disabled="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar">
                                                    <i class="icon-edit1" style="font-size: 1rem"></i>
                                                </a>

                                                <a href="{{ url('#', []) }}" class="icon {{ ($user->status == 0) ? 'disabled': '' }}" data-target="#addRole{{ $user->id }}" style="color: #000" tabindex="-1" role="button" aria-disabled="true" data-tt=tooltip data-toggle="modal" data-placement="top" title="" data-original-title="Atribuir função">
                                                    <i class="icon-award" style="font-size: 1rem"></i>
                                                </a>

                                                <!-- Modal begin -->
                                                <div class="modal fade" id="addRole{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="customModalLabel">Atribuir Função</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url('settings/user/assign', []) }}" method="POST" id="form-role{{ $user->id}}">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="col-form-label">Defina a função do usuário:</label>
                                                                        <select class="form-control selectpicker" name="role">
                                                                            @foreach ($roles as $role)
                                                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer custom">

                                                                <div class="left-side">
                                                                    <button type="button" class="btn btn-link danger" data-dismiss="modal">Cancelar</button>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="right-side">
                                                                    <button type="button" class="btn btn-link success" onclick="document.getElementById('form-role{{ $user->id}}').submit();" >Gravar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal end -->

                                                <a href="{{ url('#', []) }}" class="icon" style="color: #000" tabindex="-1" role="button" aria-disabled="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ ($user->status == 1) ? 'Inativar': 'Ativar'}}"
                                                onclick="event.preventDefault(); document.getElementById('active-form{{ $user->id }}').submit();"
                                                >
                                                    <i class="{{ ($user->status == 1) ? 'icon-user-x' : 'icon-user-check' }}" style="font-size: 1rem"></i>
                                                </a>
                                                <form id="active-form{{ $user->id }}" action="{{ url('settings/user/active/'.$user->id, []) }}" method="post"> @csrf </form>

                                                <a href="#" class="icon disabled" style="color: #000" tabindex="-1" role="button" aria-disabled="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Excluir">
                                                    <i class="icon-trash-2" style="font-size: 1rem"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('[data-tt=tooltip]').tooltip();
        });
    </script>
@endsection
