@extends('multiauth::layouts.app')

@section('title', 'Liste des des logements | ')

@push('css')
<!-- JQuery DataTable Css -->

<link href="{{ asset('backend/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

@endpush

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      {{-- <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#formlogements"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class=" material-icons large bold">add</i> Ajouter</font></font></button> --}}

      <a class=" btn waves-effect  bg-teal"  href=" {{ route('admin.logements.create') }} "><i class="material-icons">add</i><span>Ajouter un Logement</span></a>
    </div>
    {{-- formulaire d'ajout de logements --}}

        {{-- fin de formulaire d'ajout de logements --}}
        <!-- Exportable Table -->
        <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
              <div class="header bg-teal card">
                <h2 >
                  Liste des logements
                  <span class="badge bg-white">{{ $logements->count()}}</span>
                </h2>
                <ul class="header-dropdown m-r--5">
                  <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                      <li><a href="javascript:void(0);">Action</a></li>
                      <li><a href="javascript:void(0);">Another action</a></li>
                      <li><a href="javascript:void(0);">Something else here</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                    <thead>
                      <tr>

                        <tr>
                          <th>N°</th>
                          <th>Nom</th>
                          <th>Agence </th>
                          <th>Hebergement </th>
                          <th>Statut </th>
                          <th>Action</th>
                        </tr>
                      </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Agence </th>
                            <th>Hebergement </th>
                            <th>Statut </th>
                            <th>Action</th>
                          </tr>
                    </tfoot>
                    <tbody>

                     @foreach($logements as $key=> $logement)

                     <tr>
                      <td>{{ $key +1 }}</td>
                      <td>{{ $logement->nom }}</td>
                      <td>{{ $logement->hebergement->agence->name }}</td>
                      <td>{{ $logement->hebergement->nom }}</td>
                <td>
                 @if($logement->status == true)

                 <span class="badge bg-blue">Normal</span>

                 @else

                 <span class="badge bg-red">En attente</span>

                 @endif
               </td>

               <td class=""> <ul class="header-dropdown m-r--5 ">
                <li class="dropdown">
                  <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                  </a>
                  <ul class="dropdown-menu pull-right ">
                    <li class="white"><a href="{{ route('admin.logements.show', $logement->id) }}" class="btn waves-effect white"><i class="material-icons">visibility</i>Detail</a></li>
                    <li><a href="{{ route('admin.logements.edit', $logement->id) }}" class="btn waves-effect white-text"><i class="material-icons">edit</i>Modification</a></li>
                    <li>
                    </li>
                    <li>
                     <form method="post" id="delete-form-{{ $logement->id }} " action="{{ route('admin.logements.destroy', $logement->id) }}" style="display: none;">
                      @csrf
                      @method('DELETE')
                    </form>

                    <a  class="btn  waves-effect white-text" onclick="if(confirm('Est-vous sur de vouloir effectuez cette action??? Cette action est iréversible') ){
                      event.preventDefault();
                      document.getElementById('delete-form-{{ $logement->id }} ').submit();
                    }else{
                      event.preventDefault();
                    } "><i class="material-icons white" rel="tooltip" title="supression">delete</i>Suprimer</a>
                  </li>

                </ul>
              </li>
            </ul>
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
<!-- #END# Exportable Table -->
</div>
</section>

@endsection

@push('scripts')

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('backend/assets/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset('backend/assets/js/pages/ui/dialogs.js') }}"></script>
<script src="{{ asset('backend/asssets/js/demo.js') }}"></script>

@endpush