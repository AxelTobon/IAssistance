<x-jet-form-section submit="updatePassword">
  <x-slot name="title">
    {{ __('Actualizar contraseña') }}
  </x-slot>

  <x-slot name="description">
    {{ __('Asegúrate de que tu cuenta utiliza una contraseña larga y aleatoria para mantener la seguridad.') }}
  </x-slot>

  <x-slot name="form">
    <div class="mb-3">
      <x-jet-label class="form-label" for="current_password" value="{{ __('Contraseña actual') }}" />
      <x-jet-input id="current_password" type="password"
        class="{{ $errors->has('current_password') ? 'is-invalid' : '' }}" wire:model.defer="state.current_password"
        autocomplete="current-password" />
      <x-jet-input-error for="current_password" />
    </div>

    <div class="mb-3">
      <x-jet-label class="form-label" for="password" value="{{ __('Contraseña Nueva') }}" />
      <x-jet-input id="password" type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
        wire:model.defer="state.password" autocomplete="new-password" />
      <x-jet-input-error for="password" />
    </div>

    <div class="mb-3">
      <x-jet-label class="form-label" for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
      <x-jet-input id="password_confirmation" type="password"
        class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
        wire:model.defer="state.password_confirmation" autocomplete="new-password" />
      <x-jet-input-error for="password_confirmation" />
    </div>
  </x-slot>


  <x-slot name="actions">
    <x-jet-button>
      {{ __('Guardar') }}
    </x-jet-button>
  </x-slot>
</x-jet-form-section>
