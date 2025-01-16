<div class="auth-container">
    <div class="card">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="input-field">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="input-field">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="remember-me">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="forgot-password text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3 login-btn">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Conteneur principal pour centrer */
    .auth-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Hauteur de la fenêtre */
        background-color: #f0f4f8;
    }

    /* Carte contenant le formulaire */
    .card {
        background-color: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    /* Champs du formulaire */
    .input-field {
        margin-bottom: 1.5rem;
    }

    .input-field label {
        font-size: 0.9rem;
        color: #333;
        font-weight: bold;
    }

    .input-field input {
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 0.75rem;
        width: 100%;
        box-sizing: border-box;
        font-size: 1rem;
        background-color: #f9f9f9;
    }

    .input-field input:focus {
        border-color: #4c8bf5;
        outline: none;
        background-color: white;
        box-shadow: 0 0 5px rgba(76, 139, 245, 0.5);
    }

    /* Case à cocher */
    .remember-me {
        margin-bottom: 1rem;
    }

    /* Bouton de connexion */
    .login-btn {
        background-color: #4c8bf5;
        color: white;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .login-btn:hover {
        background-color: #3579d4;
        cursor: pointer;
    }

    /* Lien mot de passe oublié */
    .forgot-password {
        text-decoration: none;
        color: #4c8bf5;
        font-size: 0.875rem;
    }

    .forgot-password:hover {
        color: #3579d4;
        text-decoration: underline;
    }
</style>
