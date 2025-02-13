## =========================================BIENVENUE DANS L' API DE GERALD ==================================

## Instalation requis

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs

Then

cp .env.example .env

Then 


sail up -d


## Documentation de l'API




### Points de terminaison d'authentification
- `POST /register`: Enregistrer un nouvel utilisateur.
- `POST /login`: Connecter un utilisateur existant.
- `POST /logout`: Déconnecter l'utilisateur authentifié.
- `GET /me`: Récupérer les informations de l'utilisateur authentifié.

### Points de terminaison des cartes utilisateur
- `GET /me/cards`: Obtenir les cartes possédées par l'utilisateur authentifié.
- `POST /me/{id}/update-owned`: Mettre à jour la propriété d'une carte.

### Points de terminaison des ensembles
- `GET /sets`: Récupérer tous les ensembles.
- `GET /sets/{id}`: Récupérer un ensemble spécifique par ID.
- `GET /sets/{id}/cards`: Récupérer les cartes associées à un ensemble spécifique.

### Points de terminaison de la liste de souhaits
- `POST /wishlist/add`: Ajouter une carte à la liste de souhaits.
- `POST /wishlist/remove`: Retirer une carte de la liste de souhaits.
- `GET /wishlist`: Récupérer la liste de souhaits de l'utilisateur authentifié.


