<!-- index.blade.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gestion des Smartphones</title>
    @vite('resources/css/app.css')
   

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Le reste du HTML reste le même jusqu'au formulaire -->
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col flex-grow pt-5 pb-4 overflow-y-auto bg-gray-800">
                    <div class="flex items-center flex-shrink-0 px-4">
                        <h1 class="text-xl font-semibold text-white">Admin Dashboard</h1>
                    </div>
                    <nav class="mt-5 flex-1 px-2 space-y-1">
    <!-- Dashboard Link -->
    <a href="/dashboard" class="bg-gray-900 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
        <svg class="mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        Tableau de bord
    </a>

    <!-- Smartphones Link -->
    <a href="/smartphones" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
        <svg class="mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
        </svg>
        Smartphones
    </a>

    <!-- Logout Button -->
    <div class="text-gray-300 group px-2 py-2">
        @auth
        <form action="{{ route('auth.logout') }}" method="POST" class="flex items-center">
            @csrf
            <button type="submit" class="flex items-center text-gray-300 hover:bg-gray-700 hover:text-white group w-full px-2 py-2 text-sm font-medium rounded-md">
                <svg class="mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Se Déconnecter
            </button>
        </form>
        @endauth
    </div>
</nav>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="flex-shrink-0 flex items-center">
                                <h1 class="text-2xl font-semibold text-gray-800">Smartphones</h1>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <button onclick="openAddModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center gap-2">
                                <i class="fas fa-plus"></i> Add Smartphone
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                        <i class="fas fa-mobile-alt text-white text-2xl"></i>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 truncate">Total Smartphones</dt>
                                            <dd class="text-lg font-medium text-gray-900">{{ $smartphones->count() }}</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                        <i class="fas fa-dollar-sign text-white text-2xl"></i>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 truncate">Average Price</dt>
                                            <dd class="text-lg font-medium text-gray-900">${{ number_format($smartphones->avg('prix'), 2) }}</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                        <i class="fas fa-tag text-white text-2xl"></i>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 truncate">Unique Brands</dt>
                                            <dd class="text-lg font-medium text-gray-900">{{ $smartphones->unique('marque')->count() }}</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Error/Success Messages -->
                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Smartphone Table -->
                    <div class="bg-white shadow rounded-lg">
                        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Smartphone Management</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Brand</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">RAM</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Storage</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($smartphones as $phone)
                                    <tr data-id="{{ $phone->id }}">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $phone->nom }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $phone->marque }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">${{ number_format($phone->prix, 2) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $phone->ram }}GB</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $phone->rom }}GB</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex space-x-3">
                                                <button onclick="editProduct({{ $phone->id }})" class="text-blue-600 hover:text-blue-900">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button onclick="deleteProduct({{ $phone->id }})" class="text-red-600 hover:text-red-900">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div class="px-4 py-3 border-t border-gray-200">

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal Formulaire -->
    <div id="productModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modalTitle">Ajouter un Smartphone</h3>
                <form id="productForm" class="mt-4">
                    @csrf
                    <input type="hidden" id="product_id">

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                        <input type="text" id="nom" name="nom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Marque</label>
                        <input type="text" id="marque" name="marque" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Prix</label>
                        <input type="number" id="prix" name="prix" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">RAM (GB)</label>
                        <input type="text" id="ram" name="ram" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Stockage (GB)</label>
                        <input type="text" id="rom" name="rom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Taille écran</label>
                        <input type="text" id="ecran" name="ecran" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Couleurs disponibles</label>
                        <input type="text" id="couleurs_disponibles" name="couleurs_disponibles" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">URL de la photo</label>
                        <input type="url" id="photo_url" name="photo_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required onchange="previewImage(this)">
                        <div id="imagePreviewContainer" class="mt-2 hidden">
                            <img id="imagePreview" class="max-h-32 mx-auto">
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Annuler
                        </button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

     <script>
        // Fonction pour prévisualiser l'image
        function previewImage(input) {
            const previewContainer = document.getElementById('imagePreviewContainer');
            const preview = document.getElementById('imagePreview');
            const imageUrl = input.value;

            if (imageUrl) {
                preview.src = imageUrl;
                preview.onerror = function() {
                    preview.src = 'placeholder.jpg'; // Image par défaut en cas d'erreur
                    alert('Erreur de chargement de l\'image. Veuillez vérifier l\'URL.');
                };
                previewContainer.classList.remove('hidden');
            } else {
                previewContainer.classList.add('hidden');
            }
        }

        // Gérer la soumission du formulaire
        document.getElementById('productForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const id = document.getElementById('product_id').value;
            const isEdit = id !== '';

            const data = {
                nom: formData.get('nom'),
                marque: formData.get('marque'),
                prix: formData.get('prix'),
                ram: formData.get('ram'),
                rom: formData.get('rom'),
                ecran: formData.get('ecran'),
                couleurs_disponibles: formData.get('couleurs_disponibles'),
                description: formData.get('description'),
                photo_url: formData.get('photo_url')
            };

            const url = isEdit ? `/smartphones/${id}` : '/smartphones';
            const method = isEdit ? 'PUT' : 'POST';

            fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        alert(result.message);
                        location.reload();
                    } else {
                        alert('Erreur: ' + result.errors);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Une erreur s\'est produite');
                });
        });

        // Fonction pour modifier un smartphone
        function editProduct(id) {
            fetch(`/smartphones/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('modalTitle').textContent = 'Modifier le Smartphone';
                    document.getElementById('product_id').value = data.id;
                    document.getElementById('nom').value = data.nom;
                    document.getElementById('marque').value = data.marque;
                    document.getElementById('prix').value = data.prix;
                    document.getElementById('ram').value = data.ram;
                    document.getElementById('rom').value = data.rom;
                    document.getElementById('ecran').value = data.ecran;
                    document.getElementById('couleurs_disponibles').value = data.couleurs_disponibles;
                    document.getElementById('description').value = data.description;
                    document.getElementById('photo_url').value = data.photo;

                    if (data.photo) {
                        document.getElementById('imagePreview').src = data.photo;
                        document.getElementById('imagePreviewContainer').classList.remove('hidden');
                    }

                    document.getElementById('productModal').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Erreur lors du chargement des données');
                });
        }

        function deleteProduct(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer ce smartphone ?')) {
                fetch(`/smartphones/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Trouver et supprimer la ligne du tableau
                            const row = document.querySelector(`tr[data-id="${id}"]`);
                            if (row) {
                                row.remove();
                            }
                            // Mettre à jour les statistiques si nécessaire
                            updateStats();
                            alert('Smartphone supprimé avec succès');
                        } else {
                            alert('Erreur lors de la suppression : ' + (data.errors || 'Erreur inconnue'));
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Une erreur s\'est produite lors de la suppression');
                    });
            }
        }

        // Fonction pour mettre à jour les statistiques
        function updateStats() {
            // Recalculer le nombre total
            const totalPhones = document.querySelectorAll('tbody tr').length;
            const totalElement = document.querySelector('.total-phones');
            if (totalElement) {
                totalElement.textContent = totalPhones;
            }
        }
        // Autres fonctions utilitaires
        function closeModal() {
            document.getElementById('productModal').classList.add('hidden');
            document.getElementById('productForm').reset();
            document.getElementById('imagePreviewContainer').classList.add('hidden');
        }

        function openAddModal() {
            document.getElementById('modalTitle').textContent = 'Ajouter un Smartphone';
            document.getElementById('product_id').value = '';
            document.getElementById('productForm').reset();
            document.getElementById('imagePreviewContainer').classList.add('hidden');
            document.getElementById('productModal').classList.remove('hidden');
        }
    </script>
     

</body>

</html>
