
-GET /consomme : Récupérer toutes les consommations d'aliments

-GET /consomme?id_user={id} : Récupérer les consommations d'aliments d'un utilisateur en particulier

-POST /consomme : Ajouter une consommation d'aliments

-DELETE /consomme?id={id} : Supprimer une consommation d'aliments spécifique

-DELETE /consomme : Supprimer toutes les consommations d'aliments

-PUT /consomme : Mettre à jour une consommation d'aliments existante

-GET /aliments : Récupérer tous les aliments

-GET /aliments?nom={nom} : Récupérer un aliment avec un Nom particulier

-GET /aliments?id={id} : Récupérer un aliment avec un Id particulier

-POST /aliments : Ajouter un aliment

-GET /contient?id_aliment={id_aliment} : Récupérer les enregistrements de la table contient d'un aliment en particulier

-GET /contient?id_aliment={id_aliment}&nutriment={nutrment} : Récupérer l'enregistrement de la table contient d'un aliment et d'un nutriment particuliers

-POST /contient : Ajouter un enregistrement a la table contient

-GET /type?id_aliment={id_aliment} : Récupérer le type d'un aliment

-GET /users?login={login} : Récupérer un utilisateur grâce à son login

-POST /users : Ajouter un utilisateur

-PUT /users : Modifier un utilisateur
