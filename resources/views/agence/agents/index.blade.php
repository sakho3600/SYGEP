@extends('agence.layouts.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header card-header">
            <h2></h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">


            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header bg-teal ">
                            <span class="card-title text-center">{{ $agents->count() }} agent(s)</span>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        {{-- <li> <a href="{{route('agenceAgent.show', $agent)}}" class="bg-green text-white"><i class="material-icons">add</i>Nouveau {{ ucfirst(config('multiauth.prefix')) }}</a></li> --}}
                                        {{-- <li> <a href="{{route('admin.roles')}}" class="bg-cyan text-white"><i class="material-icons">add</i>Nouveau Role</a></li> --}}
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">

                           @include('multiauth::message')

                           <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nom</th>
                                        <th>Agence</th>
                                        <th>Email</th>
                                        <th>Statut</th>
                                        {{-- <th>Role</th> --}}
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agents as $key => $agent)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ $agent->name }}</td>
                                        <td>{{ $agent->agence->name }}</td>
                                        <td>{{ $agent->email }}</td>
                                        <td>
                                            @if($agent->status == true)

                                            <span class="badge bg-green">Activé</span>

                                            @else

                                            <span class="badge bg-red">Désactivé</span>

                                            @endif
                                        </td>
                                        {{-- <td>
                                         @foreach ($admin->roles as $role)
                                         <span class="badge bg-pink  ml-2">
                                            {{ $role->name }}
                                        </span>
                                        @endforeach
                                    </td> --}}
                                    <td> <ul class="header-dropdown m-r--5">
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="{{ route('agenceAgent.show', $agent->id) }}" class="mr-3 bg-deep-purple text-white"><i class="material-icons">visibility</i>Detail</a></li>
                                                {{-- <li role="separator" class="divider"></li>
                                                <li><a href="{{ route('agenceAgent.edit', $agent->id) }} " class="mr-3 bg-cyan text-white" ><i class="material-icons">edit</i>Modification</a></li> --}}
                                                <li role="separator" class="divider"></li>
                                            <li>
                                                @if ($agent->status == true)
                                                <form method="POST" id="activation-{{ $agent->id }} " action="{{ route('agenceAgent.approuve', [$agent->id]) }}" style="display: none;">
                                                        @csrf
                                                        @method('PUT')
                                                    </form>

                                                    <a type="button" class="mr-3 bg-amber text-white" onclick="if(confirm('Est-vous sur de vouloir Désactivé le compte de {{$agent->name}} des agents de {{$agent->agence->name}}???') ){
                                                        event.preventDefault();
                                                        document.getElementById('activation-{{ $agent->id }} ').submit();
                                                    }else{
                                                        event.preventDefault();
                                                    } "><i class="material-icons" rel="tooltip" title="desactivation de compte">block</i>Désactivé</a>
                                                    @else
                                                    <form method="POST" id="desactivation-form-{{ $agent->id }} " action="{{ route('agenceAgent.approuve', [$agent->id]) }}" style="display: none;">
                                                            @csrf
                                                            @method('PUT')
                                                        </form>

                                                        <a type="button" class="mr-3 bg-teal text-danger" onclick="if(confirm('Est-vous sur de vouloir Activé le compte de {{$agent->name}} de agents de {{$agent->agence->name}}???') ){
                                                            event.preventDefault();
                                                            document.getElementById('desactivation-form-{{ $agent->id }} ').submit();
                                                        }else{
                                                            event.preventDefault();
                                                        } "><i class="material-icons" rel="tooltip" title="supression">done_all</i>Activé</a>
                                                @endif
                                         </li>
                                         {{-- <li role="separator" class="divider"></li>
                                         <li>
                                                <form method="POST" id="delete-form-{{ $agent->id }} " action="{{ route('agenceAgent.destroy', [$agent->id]) }}" style="display: none;">
                                                 @csrf
                                                 @method('DELETE')
                                             </form>

                                             <a type="button" class="mr-3 bg-red text-white" onclick="if(confirm('Est-vous sur de vouloir supprimé le compte de {{$agent->name}} de agents de {{$agent->agence->name}}  ???') ){
                                                 event.preventDefault();
                                                 document.getElementById('delete-form-{{ $agent->id }} ').submit();
                                             }else{
                                                 event.preventDefault();
                                             } "><i class="material-icons" rel="tooltip" title="supression">delete</i>Suprimer</a>
                                         </li> --}}

                                        </ul>
                                    </li>
                                </ul>
                            </td>
                   </tr>
                   @endforeach
                   @if($agents->count()==0)
                   <p>No {{ config('multiauth.prefix') }} created Yet, only super {{ config('multiauth.prefix') }} is available.</p>
                   @endif
               </tbody>
           </table>
           {{-- {{$agents->links()}} --}}
       </div>
   </div>
</div>
</div>
<!-- #END# Task Info -->

</div>
</div>
</section>
@endsection
