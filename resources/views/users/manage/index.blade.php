<x-videos-app-layout>
    <div class="container">
        <h1>📋 Gestió d'Usuaris</h1>

        <!-- Botó destacat per crear usuari -->
        <a href="{{ route('users.manage.create') }}" class="btn btn-create-user mb-3">
            <i class="fas fa-plus"></i> Crear Usuari
        </a>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Taula millorada -->
        <div class="table-responsive">
            <table class="table table-hover mt-3">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Data de Creació</th>
                    <th>Accions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                        <td class="actions">
                            <!-- Enllaç per editar -->
                            <a href="{{ route('users.manage.edit', $user->id) }}" class="btn btn-edit">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <!-- Formulari per eliminar -->
                            <form action="{{ route('users.manage.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Segur que vols eliminar aquest usuari?')">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Estils CSS millorats -->
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        .container {
            padding: 2.5rem;
            background-color: #f8fafc;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin: 2rem auto;
            font-family: 'Inter', sans-serif;
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1.5rem;
            text-align: center;
            position: relative;
            padding-bottom: 0.5rem;
        }

        h1:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            border-radius: 3px;
        }

        .btn-create-user {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            color: white;
            font-size: 1rem;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(59, 130, 246, 0.25);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-create-user:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px rgba(59, 130, 246, 0.3);
            background: linear-gradient(135deg, #2563eb, #4f46e5);
        }

        .alert {
            font-size: 0.875rem;
            padding: 0.75rem 1rem;
            background-color: #dcfce7;
            color: #166534;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border-left: 4px solid #22c55e;
            margin-bottom: 1rem;
        }

        .table {
            width: 100%;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            font-size: 0.875rem;
            overflow: hidden;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table th {
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            color: white;
            font-weight: 600;
            text-align: center;
            padding: 1rem;
            position: sticky;
            top: 0;
        }

        .table td {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid #e2e8f0;
            color: #475569;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        .table-hover tbody tr:hover {
            background-color: #f8fafc;
            box-shadow: inset 0 0 0 1px #e2e8f0;
        }

        .actions {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
        }

        .btn-edit, .btn-delete {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
            font-size: 0.8125rem;
        }

        .btn-edit {
            background-color: #fef3c7;
            color: #92400e;
        }

        .btn-edit:hover {
            background-color: #fde68a;
            transform: translateY(-1px);
        }

        .btn-delete {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .btn-delete:hover {
            background-color: #fecaca;
            transform: translateY(-1px);
        }

        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
                margin: 1rem;
            }

            .table {
                font-size: 0.75rem;
            }

            .table th, .table td {
                padding: 0.75rem 0.5rem;
            }

            .btn-create-user {
                width: 100%;
                justify-content: center;
                font-size: 0.875rem;
            }

            .actions {
                flex-direction: column;
                gap: 0.25rem;
            }

            .btn-edit, .btn-delete {
                width: 100%;
                justify-content: center;
                padding: 0.5rem;
            }
        }
    </style>
</x-videos-app-layout>
