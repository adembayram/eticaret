<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img id="deneme" src="{{ asset('dist') }}/images/logo.png" />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Ad Soyad') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Şifre') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Şifre Tekrar') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Ülke') }}" />
                <select name="country" class="block mt-1 w-full" id="country">
                    <option value="">Lütfen Seçim Yapın</option>
                    <option >Turkiye</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Şehir') }}" />
                <select name="city" class="block mt-1 w-full" id="city">
                    <option value="">Lütfen Seçim Yapın</option>
                    <option>Adana</option>
                    <option>Adıyaman</option>
                    <option>Afyonkarahisar</option>
                    <option>Ağrı</option>
                    <option>	Aksaray	</option>
                    <option>	Amasya	</option>
                    <option>	Ankara	</option>
                    <option>	Antalya	</option>
                    <option>	Ardahan	</option>
                    <option>	Artvin	</option>
                    <option>	Aydın	</option>
                    <option>	Balıkesir</option>
                    <option>	Bartın	</option>
                    <option>	Batman	</option>
                    <option>	Bayburt	</option>
                    <option>	Bilecik	</option>
                    <option>	Bingöl	</option>
                    <option>	Bitlis	</option>
                    <option>	Bolu	</option>
                    <option>	Burdur	</option>
                    <option>	Bursa	</option>
                    <option>	Çanakkale</option>
                    <option>	Çankırı	</option>
                    <option>	Çorum	</option>
                    <option>	Denizli	</option>
                    <option>	Diyarbakır</option>
                    <option>	Düzce	</option>
                    <option>	Edirne	</option>
                    <option>	Elâzığ	</option>
                    <option>	Erzincan</option>
                    <option>	Erzurum	</option>
                    <option>	Eskişehir</option>
                    <option>	Gaziantep	</option>
                    <option>	Giresun	</option>
                    <option>	Gümüşhane	</option>
                    <option>	Hakkâri	</option>
                    <option>	Hatay	</option>
                    <option>	Iğdır	</option>
                    <option>	Isparta	</option>
                    <option>	İstanbul	</option>
                    <option>	İzmir	</option>
                    <option>	Kahramanmaraş	</option>
                    <option>	Karabük	</option>
                    <option>	Karaman	</option>
                    <option>	Kars	</option>
                    <option>	Kastamonu	</option>
                    <option>	Kayseri	</option>
                    <option>	Kırıkkale	</option>
                    <option>	Kırklareli	</option>
                    <option>	Kırşehir	</option>
                    <option>	Kilis	</option>
                    <option>	Kocaeli	</option>
                    <option>	Konya	</option>
                    <option>	Kütahya	</option>
                    <option>	Malatya	</option>
                    <option>	Manisa	</option>
                    <option>	Mardin	</option>
                    <option>	Mersin	</option>
                    <option>	Muğla	</option>
                    <option>	Muş	</option>
                    <option>	Nevşehir	</option>
                    <option>	Niğde	</option>
                    <option>	Ordu	</option>
                    <option>	Osmaniye	</option>
                    <option>	Rize	</option>
                    <option>	Sakarya	</option>
                    <option>	Samsun	</option>
                    <option>	Siirt	</option>
                    <option>	Sinop	</option>
                    <option>	Sivas	</option>
                    <option>	Şanlıurfa	</option>
                    <option>	Şırnak	</option>
                    <option>	Tekirdağ	</option>
                    <option>	Tokat	</option>
                    <option>	Trabzon	</option>
                    <option>	Tunceli	</option>
                    <option>	Uşak	</option>
                    <option>	Van	</option>
                    <option>	Yalova	</option>
                    <option>	Yozgat	</option>
                    <option>	Zonguldak	</option>
                </select>
            </div>


            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Adres') }}" />
                <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            </div>

            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Posta Kodu') }}" />
                <x-jet-input id="postcode" class="block mt-1 w-full" type="text" name="postcode" :value="old('postcode')" autofocus required autocomplete="postcode" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Kayıtlı mısınız?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Kayıt Ol') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
