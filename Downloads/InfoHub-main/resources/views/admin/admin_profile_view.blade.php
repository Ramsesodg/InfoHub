<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Administrateur</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .profile-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            padding: 20px 30px;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-header img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid #007bff;
        }

        .profile-header h2 {
            margin-top: 10px;
            color: #333;
        }

        .profile-header p {
            color: #555;
            font-size: 14px;
        }

        .profile-details, .profile-form {
            margin: 20px 0;
        }

        .detail-item {
            margin-bottom: 15px;
        }

        .detail-item span {
            font-weight: bold;
            color: #333;
        }

        .detail-item p {
            margin-top: 5px;
            color: #555;
        }

        /* Form Styles */
        .profile-form label {
            font-weight: bold;
            color: #333;
        }

        .profile-form input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .profile-actions {
            display: flex;
            justify-content: space-between;
        }

        .profile-actions button {
            padding: 10px 15px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-btn {
            background-color: #007bff;
            color: #fff;
        }

        .edit-btn:hover {
            background-color: #0056b3;
        }

        .save-btn {
            background-color: #28a745;
            color: #fff;
        }

        .save-btn:hover {
            background-color: #218838;
        }

        .logout-btn {
            background-color: #dc3545;
            color: #fff;
        }

        .logout-btn:hover {
            background-color: #b21f2d;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <!-- Header avec photo -->
    <div class="profile-header">
        <img src="{{ (!empty($profileData->photo)) ? url('upload/admin_image/' . $profileData->photo) : 'https://via.placeholder.com/100' }}" alt="profile">
        <h2>{{ $profileData->name }}</h2>
        <p>{{ $profileData->username }}</p>
    </div>

    <!-- Vue des détails du profil -->
    <div class="profile-details">
        <div class="detail-item">
            <span>Email :</span>
            <p>{{ $profileData->email }}</p>
        </div>
        <div class="detail-item">
            <span>Téléphone :</span>
            <p>{{ $profileData->phone }}</p>
        </div>
        <div class="detail-item">
            <span>Rôle :</span>
            <p>{{ $profileData->role }}</p>
        </div>
    </div>

    <!-- Formulaire de mise à jour -->
    <div class="profile-form hidden">
        <form method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" value="{{ $profileData->name }}">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $profileData->email }}">

            <label for="phone">Téléphone</label>
            <input type="text" id="phone" name="phone" value="{{ $profileData->phone }}">

            <label for="photo">Photo de profil</label>
            <input type="file" id="photo" name="photo">
        </form>
    </div>

    <!-- Boutons d'action -->
    <div class="profile-actions">
        <button class="edit-btn" onclick="toggleEdit()">Modifier le profil</button>
        <button class="save-btn hidden" onclick="saveChanges()">Enregistrer</button>
        <button class="logout-btn">Déconnexion</button>
    </div>
</div>

<script>
    // Fonction pour afficher/cacher le formulaire
    function toggleEdit() {
        const details = document.querySelector('.profile-details');
        const form = document.querySelector('.profile-form');
        const editBtn = document.querySelector('.edit-btn');
        const saveBtn = document.querySelector('.save-btn');

        details.classList.toggle('hidden');
        form.classList.toggle('hidden');
        editBtn.classList.toggle('hidden');
        saveBtn.classList.toggle('hidden');
    }

    // Fonction pour enregistrer les modifications (soumission du formulaire)
    function saveChanges() {
        document.querySelector('.profile-form form').submit();
    }
</script>

</body>
</html>
