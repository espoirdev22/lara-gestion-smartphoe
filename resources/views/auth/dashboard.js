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