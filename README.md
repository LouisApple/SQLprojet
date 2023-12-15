**Script pour créer la table utilisateurs :**

CREATE TABLE abonne.utilisateurs (
	id int auto_increment PRIMARY KEY NOT NULL,
	id_abonne int NULL,
	isGestionnaire BOOL NOT NULL,
	email varchar(256) NOT NULL,
	password varchar(100) NOT NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS abonne.utilisateurs;


**Script pour génerer les utilisateurs avec les abonnés :**

INSERT INTO utilisateurs (id_abonne, isGestionnaire, email, password)
SELECT
    id AS id_abonne,
    0 AS isGestionnaire, -- Remplacez par 1 si l'utilisateur est un gestionnaire
    CONCAT(prenom, nom, '@gmail.com') AS email,
    '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8' AS password,
	1 AS isGestionnaire	
FROM abonne;

**Identifiant :**

Abonné : 

Mail : JoséphineBernier@gmail.com
Mot de passe : password

Gestionnaire : admin@admin.com
Mot de passe : password
