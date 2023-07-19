<x-jet-action-section>
  <x-slot name="title">
    {{ __('Autenticación de dos factores') }}
  </x-slot>

  <x-slot name="description">
    {{ __('Añada seguridad adicional a su cuenta mediante la autenticación de dos factores.') }}
  </x-slot>

  <x-slot name="content">
    <h6 class="fw-bolder">
      @if ($this->enabled)
        @if ($showingConfirmation)
          {{ __('Está habilitando la autenticación de dos factores.') }}
        @else
          {{ __('Ha activado la autenticación de dos factores.') }}
        @endif
      @else
        {{ __('No ha activado la autenticación de dos factores.') }}
      @endif
    </h6>

    <p class="card-text">
      {{ __('Cuando la autenticación de dos factores está activada, se le pedirá un token seguro y aleatorio durante la autenticación. Puede recuperar este token desde la aplicación Google Authenticator de su teléfono.') }}
    </p>

    @if ($this->enabled)
      @if ($showingQrCode)
        <p class="card-text mt-2">
          @if ($showingConfirmation)
            {{ __('Escanea el siguiente código QR con la aplicación de autenticación de tu teléfono y confírmalo con el código OTP generado.') }}
          @else
            {{ __('La autenticación de dos factores ya está activada. Escanea el siguiente código QR con la aplicación de autenticación de tu teléfono.') }}
          @endif
        </p>

        <div class="mt-2">
          {!! $this->user->twoFactorQrCodeSvg() !!}
        </div>

        <div class="mt-4">
            <p class="font-semibold">
              {{ __('Setup Key') }}: {{ decrypt($this->user->two_factor_secret) }}
            </p>
        </div>

        @if ($showingConfirmation)
          <div class="mt-2">
            <x-jet-label for="code" value="{{ __('Code') }}" />
            <x-jet-input id="code" class="d-block mt-3 w-100" type="text" inputmode="numeric" name="code" autofocus autocomplete="one-time-code"
                wire:model.defer="code"
                wire:keydown.enter="confirmTwoFactorAuthentication" />
            <x-jet-input-error for="code" class="mt-3" />
          </div>
        @endif
      @endif

      @if ($showingRecoveryCodes)
        <p class="card-text mt-2">
          {{ __('Guarde estos códigos de recuperación en un gestor de contraseñas seguro. Se pueden utilizar para recuperar el acceso a tu cuenta si pierdes el dispositivo de autenticación de dos factores.') }}
        </p>

        <div class="bg-light rounded p-2">
          @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
            <div>{{ $code }}</div>
          @endforeach
        </div>
      @endif
    @endif

    <div class="mt-2">
      @if (!$this->enabled)
        <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
          <x-jet-button type="button" wire:loading.attr="disabled">
            {{ __('Activar') }}
          </x-jet-button>
        </x-jet-confirms-password>
      @else
        @if ($showingRecoveryCodes)
          <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
            <x-jet-secondary-button class="me-1">
              {{ __('Regenerar códigos de recuperación') }}
            </x-jet-secondary-button>
          </x-jet-confirms-password>
        @elseif ($showingConfirmation)
          <x-jet-confirms-password wire:then="confirmTwoFactorAuthentication">
            <x-jet-button type="button" wire:loading.attr="disabled">
              {{ __('Confirmar') }}
            </x-jet-button>
          </x-jet-confirms-password>
        @else
          <x-jet-confirms-password wire:then="showRecoveryCodes">
            <x-jet-secondary-button class="me-1">
              {{ __('Mostrar códigos de recuperación') }}
            </x-jet-secondary-button>
          </x-jet-confirms-password>
        @endif

        <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
          <x-jet-danger-button wire:loading.attr="disabled">
            {{ __('Desactivar') }}
          </x-jet-danger-button>
        </x-jet-confirms-password>
      @endif
    </div>
  </x-slot>
</x-jet-action-section>
