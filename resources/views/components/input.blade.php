<div class="input-group mb-3">
    <input type="{{ $inputType }}" name="{{ $inputName }}" class="{{ $inputClass }} @error($inputName) is-invalid @enderror"
           placeholder="{{ $placeholder }}" value="{{ old($inputName, $value) }}" required>
    
    @error($inputName)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

    @if($inputType == 'email')
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    @endif

    @if($inputType == 'password')
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    @endif
</div>
