<div class="p-2">
    <div class="card ">
        {{-- CARD HEADER --}}
        <div class="card-header">

            <a class="btn btn-success mb-3" href="{{ route('admin.roles.create') }}">
                {{ __('Create new role') }}
            </a>

            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del rol">

        </div>
        {{-- CARD HEADER --}}

        @if ($roles->count())
            {{-- CARD BODY --}}
            <div class="card-body">
                {{-- TABLE --}}
                <table class="table table-striped table-hover">
                    {{-- TABLE HEAD --}}
                    <thead>
                        <tr>
                            <th class="text-uppercase">{{ __('Name') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    {{-- TABLE HEAD --}}

                    {{-- TABLE BODY --}}
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td> {{ $role->name }} </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <a href=" {{ route('admin.roles.edit', $role) }} " class="btn btn-primary mr-3"
                                            data-toggle="tooltip" data-placement="top" title="{{ __('Edit') }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.roles.destroy', $role) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" data-toggle="tooltip"
                                                data-placement="top" title="{{ __('Delete') }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{-- TABLE BODY --}}
                </table>
                {{-- TABLE --}}
            </div>
            {{-- CARD FOOTER --}}
            <div class="card-footer">
                {{ $roles->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros.</strong>
            </div>
        @endif

    </div>
</div>
