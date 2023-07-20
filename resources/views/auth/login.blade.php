<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img id="deneme" src="{{ asset('dist') }}/images/logo.png" />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Şifre') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Beni Hatırla') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Şifreni mi unuttun?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-end mt-3">
                <x-jet-button class="btn-block">
                    {{ __('Giriş Yap') }}
                </x-jet-button>
            </div>
            <div class="flex-fill items-center text-center mt-1">
                <p>&</p>
            </div>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" style="text-decoration: none">
            <div class="flex items-center">
                  <button type="button" class="btn btn-danger btn-sm btn-block rounded">Kayıt Ol</button>
            </div>
                </a>
            @endif
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
