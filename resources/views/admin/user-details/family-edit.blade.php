@extends('admin.dashboard')

@section('admin')
<div class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border border-gray-300">
            <div class="p-6 sm:p-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">家族情報登録   {{ $user->name }}</h2>

                @if (session('success'))
                    <div class="mb-4 px-4 py-2 bg-green-100 border-2 border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 px-4 py-2 bg-red-100 border-2 border-red-400 text-red-700 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.user-details.family-update', ['userId' => $user->id, 'familyId' => $familyMember->id]) }}" method="POST">
                    @csrf
                    @method('PUT')


                    <h3 class="text-lg font-semibold text-gray-800 mt-8 mb-4 text-center">家族情報</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div>
                            <label for="family_name" class="block text-sm font-medium text-gray-700">家族：氏名</label>
                            <input
                              value="{{ old('family_name', $familyMember->family_name) }}"
                            type="text" id="family_name" name="family_name" class="mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div>
                            <label for="family_relationship" class="block text-sm font-medium text-gray-700">家族：続柄</label>
                            <input
                            value="{{ old('family_relationship', $familyMember->family_relationship) }}"

                            type="text" id="family_relationship" name="family_relationship" class="mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div>
                            <label for="family_birthdate" class="block text-sm font-medium text-gray-700">家族：生年月日</label>
                            <input
                            value="{{ old('family_birthdate', $familyMember->family_birthdate) }}"

                            type="date" id="family_birthdate" name="family_birthdate" class="mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div>
                            <label for="family_dependent_status" class="block text-sm font-medium text-gray-700">家族：扶養区分</label>
                            <select id="family_dependent_status" name="family_dependent_status" class="mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">選択してください</option>
                                <option value="源泉控除対象配偶者" {{ old('family_dependent_status', $familyMember->family_dependent_status) == '源泉控除対象配偶者' ? 'selected' : '' }}>源泉控除対象配偶者</option>
                                <option value="源泉控除対象配偶者以外の配偶者" {{ old('family_dependent_status', $familyMember->family_dependent_status) == '源泉控除対象配偶者以外の配偶者' ? 'selected' : '' }}>源泉控除対象配偶者以外の配偶者</option>
                                <option value="対象(主たる給与の扶養)" {{ old('family_dependent_status', $familyMember->family_dependent_status) == '対象(主たる給与の扶養)' ? 'selected' : '' }}>対象(主たる給与の扶養)</option>
                            </select>
                        </div>
                        <div>
                            <label for="family_cohabiting_parent" class="block text-sm font-medium text-gray-700">家族：同居老親区分</label>
                            <select id="family_cohabiting_parent" name="family_cohabiting_parent" class="mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">選択してください</option>

                                <option value="対象" {{ old('family_cohabiting_parent', $familyMember->family_cohabiting_parent) == '対象' ? 'selected' : '' }}>対象</option>
                                <option value="対象外" {{ old('family_cohabiting_parent', $familyMember->family_cohabiting_parent) == '対象外' ? 'selected' : '' }}>対象外</option>
                                <option value="障害者" {{ old('family_cohabiting_parent', $familyMember->family_cohabiting_parent) == '障害者s' ? 'selected' : '' }}>障害者</option>


                            </select>
                        </div>
                        <div>
                            <label for="family_disability_status" class="block text-sm font-medium text-gray-700">家族：障害者区分</label>
                            <select id="family_disability_status" name="family_disability_status" class="mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">選択してください</option>
                                <option value="対象" {{ old('family_disability_status', $familyMember->family_disability_status) == '対象' ? 'selected' : '' }}>対象</option>
                                <option value="対象外" {{ old('family_disability_status', $familyMember->family_disability_status) == '対象外' ? 'selected' : '' }}>対象外</option>
                                <option value="同居特別障害者" {{ old('family_disability_status', $familyMember->family_disability_status) == '同居特別障害者' ? 'selected' : '' }}>同居特別障害者</option>
                                <option value="障害者" {{ old('family_disability_status', $familyMember->family_disability_status) == '障害者' ? 'selected' : '' }}>障害者</option>

                            </select>
                        </div>
                        <div>
                            <label for="family_address_type" class="block text-sm font-medium text-gray-700">住所区分</label>
                            <select id="family_address_type" name="family_address_type" class="mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">選択してください</option>
                                <option value="社員と同一" {{ old('family_address_type', $familyMember->family_address_type) == '社員と同一' ? 'selected' : '' }}>社員と同一</option>
                                <option value="別居" {{ old('family_address_type', $familyMember->family_address_type) == '別居' ? 'selected' : '' }}>別居</option>
                            </select>
                        </div>
                        <div>
                            <label for="family_address" class="block text-sm font-medium text-gray-700">家族：住所</label>
                            <input
                            value="{{ old('family_address', $familyMember->family_address) }}"

                            type="text" id="family_address" name="family_address" placeholder="三重県津市乙部45－２３1" class="mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div>
                            <label for="family_estimated_income" class="block text-sm font-medium text-gray-700">家族：見積所得</label>
                            <input
                            value="{{ old('family_estimated_income', $familyMember->family_estimated_income) }}"

                            type="number" id="family_estimated_income" name="family_estimated_income" class="mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div>
                            <label for="family_insurance_status" class="block text-sm font-medium text-gray-700">家族：社会保険被扶養者区分</label>
                            <select id="family_insurance_status" name="family_insurance_status" class="mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">選択してください</option>
                                <option value="被扶養者" {{ old('family_insurance_status', $familyMember->family_insurance_status) == '被扶養者' ? 'selected' : '' }}>被扶養者</option>
                                <option value="対象外" {{ old('family_insurance_status', $familyMember->family_insurance_status) == '対象外' ? 'selected' : '' }}>対象外</option>
                            </select>
                        </div>
                        <div>
                            <label for="family_name_furigana" class="block text-sm font-medium text-gray-700">家族：氏名フリガナ</label>
                            <input
                            value="{{ old('family_name_furigana', $familyMember->family_name_furigana) }}"

                            type="text" id="family_name_furigana" name="family_name_furigana" class="mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                    </div>

                    <div class="mt-6">
                      <x-button purpose="search" type="submit" >
                        保存
                      </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
