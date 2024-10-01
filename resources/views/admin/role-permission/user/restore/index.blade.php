@extends('admin.dashboard')

@section('admin')



<div class="container">
    <div class="container mt-5">
        <a href="{{ url('/admin/role-permission/users') }}" class="bg-stone-400 hover:bg-stone-500 text-white font py-2 px-3 rounded mb-4 inline-block w-24 h-10 text-center float-end">戻る</a>

        <div class="card-body">
            <h1 class="text-2xl font-bold mb-4 text-left py-4 px-1">ユーザー復元</h1>




            <!-- table code -->

        <div class="table-responsive">
            <div class="md:px-10 py-8 w-full overflow-x-auto">

            <table class="border-collapse border border-slate-400 min-w-full bg-white table-auto md:table">
                <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">社員番号</th>
                            <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">氏名</th>
                            <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">メール</th>
                            <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">作動</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="border-b border-gray-200 hover:bg-gray-200">
                            <td class="border border-slate-300 px-4 py-2">{{ $user->id }}</td>
                            <td class="border border-slate-300 px-4 py-2">{{ $user->name }}</td>
                            <td class="border border-slate-300 px-4 py-2">{{ $user->email }}</td>
                            <td class="border border-slate-300 px-4 py-2">
                                <a href="{{ route('admin.role-permission.user.restore', $user->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font py-2 px-3 rounded mb-4 inline-block w-24 h-10 text-center">復元</a>
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
@endsection



<!--REAL-->


