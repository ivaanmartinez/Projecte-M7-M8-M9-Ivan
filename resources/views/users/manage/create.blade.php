<x-videos-app-layout>
    <div class="container">
        <div class="form-header">
            <h1>📢 Crear Nou Usuari</h1>
            <p class="subtitle">Omple el formulari per registrar un nou usuari al sistema</p>
        </div>

        <form action="{{ route('users.manage.store') }}" method="POST" class="user-form">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <div class="input-container">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" id="name" name="name" class="form-control"
                               value="{{ old('name') }}" required data-qa="input-name"
                               placeholder="Introdueix el nom complet">
                    </div>
                    @error('name')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-container">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" id="email" name="email" class="form-control"
                               value="{{ old('email') }}" required data-qa="input-email"
                               placeholder="exemple@domini.com">
                    </div>
                    @error('email')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Contrasenya</label>
                    <div class="input-container">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="password" name="password" class="form-control"
                               required data-qa="input-password"
                               placeholder="Mínim 8 caràcters">
                        <button type="button" class="toggle-password" aria-label="Mostrar contrasenya">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirma la Contrasenya</label>
                    <div class="input-container">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               class="form-control" required data-qa="input-password-confirmation"
                               placeholder="Repeteix la contrasenya">
                        <button type="button" class="toggle-password" aria-label="Mostrar contrasenya">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-create-user" data-qa="button-create-user">
                    <i class="fas fa-user-plus"></i> Crear Usuari
                </button>
                <a href="{{ route('users.manage.index') }}" class="btn btn-cancel">
                    <i class="fas fa-times"></i> Cancel·lar
                </a>
            </div>
        </form>
    </div>

    <!-- Estils CSS millorats -->
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        .container {
            max-width: 700px;
            margin: 2rem auto;
            padding: 2.5rem;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            font-family: 'Inter', sans-serif;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            color: #64748b;
            font-size: 0.9375rem;
            margin: 0;
        }

        .user-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        @media (min-width: 640px) {
            .form-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group label {
            font-weight: 500;
            font-size: 0.875rem;
            color: #334155;
        }

        .input-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            color: #94a3b8;
            font-size: 0.9375rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.9375rem;
            color: #1e293b;
            background-color: #f8fafc;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
            background-color: #ffffff;
        }

        .form-control::placeholder {
            color: #94a3b8;
            opacity: 1;
        }

        .toggle-password {
            position: absolute;
            right: 1rem;
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            font-size: 0.9375rem;
            padding: 0;
        }

        .toggle-password:hover {
            color: #64748b;
        }

        .error-message {
            color: #dc2626;
            font-size: 0.8125rem;
            margin-top: 0.25rem;
        }

        .form-footer {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 1rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 0.9375rem;
            border: none;
            text-decoration: none;
        }

        .btn-create-user {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            box-shadow: 0 4px 6px rgba(79, 70, 229, 0.2);
        }

        .btn-create-user:hover {
            background: linear-gradient(135deg, #4338ca, #6d28d9);
            transform: translateY(-1px);
            box-shadow: 0 6px 8px rgba(79, 70, 229, 0.25);
        }

        .btn-cancel {
            background-color: #f1f5f9;
            color: #64748b;
            border: 1px solid #e2e8f0;
        }

        .btn-cancel:hover {
            background-color: #e2e8f0;
            color: #475569;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
                margin: 1rem;
            }

            .form-footer {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <script>
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentElement.querySelector('input');
                const icon = this.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        });
    </script>
</x-videos-app-layout>
