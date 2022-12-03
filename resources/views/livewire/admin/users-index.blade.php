<div class="p-2">
    <div class="card ">
        {{-- CARD HEADER --}}
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o correo de un usuario">
        </div>
        {{-- CARD HEADER --}}

        @if ($users->count())
            {{-- CARD BODY --}}
            <div class="card-body">
                {{-- TABLE --}}
                <table class="table table-striped table-hover">
                    {{-- TABLE HEAD --}}
                    <thead>
                        <tr>
                            <th class="text-uppercase">{{ __('ID') }}</th>
                            <th class="text-uppercase">{{ __('Name') }}</th>
                            <th class="text-uppercase">{{ __('E-Mail Address') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    {{-- TABLE HEAD --}}

                    {{-- TABLE BODY --}}
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td> {{ $user->id }} </td>
                                <td> {{ $user->name }} </td>
                                <td> {{ $user->email }} </td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <a href=" {{ route('admin.users.edit', $user) }} " class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
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
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros.</strong>
            </div>
        @endif

    </div>
</div>
