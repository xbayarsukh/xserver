<x-mail::message>

{{-- Intro Lines --}}
<div class="text-black mb-6">
    <h1 class="text-2xl font-bold mb-4">
        お疲れ様です。
    </h1>
</div>

<div class="mb-6">
    <h3 class="text-lg font-normal leading-relaxed text-gray-700">
        このメールは、お客様のアカウントのパスワード リセット リクエストを受け取ったためお送りしています。
    </h3>
</div>

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
    パスワード変更
</x-mail::button>
@endisset

<div class="mt-6">
    <h2 class="text-base font-normal leading-relaxed text-gray-700">
        このパスワード リセット リンクは 60 分後に期限切れになります。
        パスワード リセットをリクエストしていない場合は、これ以上の操作は必要ありません。
    </h2>
</div>

<div class="mt-8 pt-6 border-t border-gray-200">
    <p class="text-sm text-gray-600">@lang('Regards'),</p>
    <p class="font-bold">本社</p>
</div>

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
<p class="text-xs text-gray-500 mt-6">
    @lang(
       "ボタンをクリックできない場合は、以下の URL をコピーして Web ブラウザに貼り付けてください",
        [
            'actionText' => $actionText,
        ]
    )
</p>
<span class="break-all text-blue-500 text-xs">
    <a href="{{ $actionUrl }}">{{ $displayableActionUrl }}</a>
</span>
</x-slot:subcopy>
@endisset

</x-mail::message>
