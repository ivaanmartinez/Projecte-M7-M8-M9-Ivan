<x-videos-app-layout>
    <div class="edit-user-container">
        <div class="edit-user-card">
            <div class="card-header">
                <h1 class="card-title">
                    <i class="fas fa-user-edit"></i> Editar Usuari
                </h1>
                <p class="card-subtitle">Actualitza les dades de l'usuari</p>
            </div>

            <form action="{{ route('users.manage.update', $user->id) }}" method="POST" class="user-form">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="fas fa-user"></i> Nom
                        </label>
                        <input type="text" id="name" name="name" class="form-input"
                               value="{{ old('name', $user->name) }}" required data-qa="input-name"
                               placeholder="Nom complet de l'usuari">
                        @error('name')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i> Email
                        </label>
                        <input type="email" id="email" name="email" class="form-input"
                               value="{{ old('email', $user->email) }}" required data-qa="input-email"
                               placeholder="adreça@exemple.com">
                        @error('email')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i> Contrasenya
                        </label>
                        <div class="password-input-container">
                            <input type="password" id="password" name="password" class="form-input"
                                   data-qa="input-password" placeholder="Deixa en blanc per no modificar">
                            <button type="button" class="toggle-password" aria-label="Mostrar contrasenya">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                        <p class="password-hint">Introdueix una nova contrasenya només si vols canviar-la</p>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-save" data-qa="button-edit-user">
                        <i class="fas fa-save"></i> Actualitzar Usuari
                    </button>
                    <a href="{{ route('users.manage.index') }}" class="btn btn-cancel">
                        <i class="fas fa-times"></i> Cancel·lar
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Estils CSS millorats -->
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        .edit-user-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
            background: linear-gradient(135deg, #f6f9fc, #e6f0f9);
            font-family: 'Inter', sans-serif;
        }

        .edit-user-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            width: 100%;
            max-width: 600px;
        }

        .card-header {
            padding: 2rem;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            text-align: center;
        }

        .card-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin: 0 0 0.5rem 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .card-subtitle {
            font-size: 0.9375rem;
            opacity: 0.9;
            margin: 0;
        }

        .user-form {
            padding: 2rem;
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

            .form-group:last-child {
                grid-column: span 2;
            }
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-label {
            font-weight: 500;
            font-size: 0.875rem;
            color: #334155;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.9375rem;
            color: #1e293b;
            background-color: #f8fafc;
            transition: all 0.2s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
            background-color: #ffffff;
        }

        .form-input::placeholder {
            color: #94a3b8;
            opacity: 1;
        }

        .password-input-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .toggle-password {
            position: absolute;
            right: 1rem;
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            font-size: 1rem;
            padding: 0;
        }

        .toggle-password:hover {
            color: #64748b;
        }

        .password-hint {
            font-size: 0.8125rem;
            color: #64748b;
            margin: 0.25rem 0 0 0;
        }

        .error-message {
            color: #dc2626;
            font-size: 0.8125rem;
            margin-top: 0.25rem;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            padding: 0.875rem 1.5rem;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 0.9375rem;
            border: none;
            text-decoration: none;
        }

        .btn-save {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            box-shadow: 0 4px 6px rgba(79, 70, 229, 0.2);
        }

        .btn-save:hover {
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
            .edit-user-container {
                padding: 1rem;
            }

            .card-header {
                padding: 1.5rem;
            }

            .user-form {
                padding: 1.5rem;
            }

            .form-actions {
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
