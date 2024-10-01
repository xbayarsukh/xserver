@extends('admin.dashboard')

@section('admin')



@if(session('status'))
        <div class="">{{ session('status') }}</div>

        @endif

        <div class="container mx-auto py-8">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                <h1 class="text-xl font-mild mb-6">権限管理</h1>


                <h1 class="text-2xl font-bold mb-4">権限与え</h1>




                <form action="{{ url('/admin/role-permission/roles/'.$role->id.'/give-permissions') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        @error('permission')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label class="block text-m font-bold text-gray-700">許可</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                            @foreach ($permissions as $permission)
                                <div class="flex items-center">
                                    <input type="checkbox" name="permission[]" value="{{ $permission->name }}" class="form-checkbox h-4 w-4 text-teal-600" {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}>
                                    <label class="ml-2 text-sm text-gray-700">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <x-button purpose="default" type="" href="{{ url('/admin/role-permission/roles') }}">
                            戻る
                        </x-button>
                        <x-button purpose="search" type="submit">
                            追加
                        </x-button>

                    </div>
                </form>
        </div>
       </div>
    </div>
</div>

@endsection




