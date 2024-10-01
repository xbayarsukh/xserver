
@extends('admin.dashboard')

@section('admin')

<style>
    .form-container {
       max-width:800px;
       width:90%;
       height:50%;
       margin:0 auto;
       padding:20px;
       background-color: #ffffff;
       border:1px solid #e0e0e0;
       border-radius:5px;
       margin-top:50px;
    }
    .form-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e0e0e0;
    }
    .form-group {
        display: flex;
        margin-bottom: 15px;
        align-items: center;
    }
    .form-label {
        width: 200px;
        text-align: right;
        padding-right: 20px;
        font-weight: bold;
    }
    .form-input {
        flex: 1;
    }
    .form-input input, .form-input select {
        width: 100%;
        padding: 5px;
        border: 1px solid #272626;
        border-radius: 3px;
    }
    .required::after {
        content: '(必須)';
        color: red;
        font-size: 0.8em;
        margin-left: 5px;
    }
    .input-hint {
        font-size: 0.8em;
        color: #666;
        margin-left: 10px;
    }
    .submit-button {
        background-color: #ff7f50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        float: right;
        margin-top: 20px;
    }
</style>

<div class="form-container w-11/12 h-3/4 p-6 bg-white shadow-lg rounded-lg mx-auto mb-2">

    <h1 class="text-xl font-medium mb-6">
       社員管理

    </h1>
    <h2 class="form-title text-2xl font-bold">{{ $user->name }}さんに会社与え</h2>
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">無効データ入力</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.assign-corporation.store', $user->id) }}" method="POST">
        @csrf



        <div class="form-group">
            <label for="corporation_id"  class="px-2 font-bold">会社</label>

            <div class="form-input">
                <select name="corporation_id" id="corporation_id" class="py-2 form-select mt-1 block w-full rounded-md shadow-sm border border-black focus:ring-opacity-80">

                    <option value="">会社を選択</option>
                    @foreach ($corporations as $corporation)
                        <option value="{{ $corporation->id }}">{{ $corporation->corp_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>



        {{-- <button type="submit" class="submit-button">追加</button> --}}
        <div class="flex justify-between">
            <x-button purpose="default" type="" href="{{ url('/admin/role-permission/users') }}">
                戻る
            </x-button>
            <x-button purpose="search" type="submit">
                追加
            </x-button>

        </div>


    </form>
</div>

@endsection

