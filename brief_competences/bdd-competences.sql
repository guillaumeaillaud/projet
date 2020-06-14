DROP DATABASE IF EXISTS competences_premium;

CREATE DATABASE competences_premium; 
USE competences_premium; 
CREATE TABLE utilisateur(
    id_utilisateur INT(11) NOT NULL UNIQUE AUTO_INCREMENT, 
    username VARCHAR(50) UNIQUE,
    email VARCHAR(250) UNIQUE,
    password VARCHAR(250),
    CONSTRAINT pk_utilisateur PRIMARY KEY(id_utilisateur)
);

CREATE TABLE competence(
    id_competence INT(11) NOT NULL UNIQUE AUTO_INCREMENT, 
    nom VARCHAR(50),
    libelle_competence TINYTEXT, 
    CONSTRAINT pk_competence PRIMARY KEY (id_competence)
);

CREATE TABLE niveau(
    id_niveau INT(11) NOT NULL UNIQUE, 
    libelle_niveau VARCHAR(20),
    CONSTRAINT pk_niveau PRIMARY KEY(id_niveau)
);
-- ceci est commentaire en SQL

 CREATE TABLE niveau_utilisateur(
    id_utilisateur INT, 
    id_competence INT, 
    id_niveau INT, 
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur), 
    CONSTRAINT fk_niveau_utilisateur_competence FOREIGN KEY(id_competence) REFERENCES competence(id_competence),
    FOREIGN KEY (id_niveau) REFERENCES niveau(id_niveau),
    PRIMARY KEY(id_utilisateur, id_competence)

 );


INSERT INTO `competence` VALUES (1,'C1','Maquetter une application');
INSERT INTO `competence` VALUES (2,'C2','Réaliser une interface utilisateur web statique et adaptable');
INSERT INTO `competence` VALUES (3,'C3','Développer une interface utilisateur web dynamique');
INSERT INTO `competence` VALUES (4,'C4','Réaliser une interface utilisateur avec une solution de gestion de contenu ou e-commerce');
INSERT INTO `competence` VALUES (5,'C5','Créer une base de données');
INSERT INTO `competence` VALUES (6,'C6','Développer les composants d’accès aux données');
INSERT INTO `competence` VALUES (7,'C7','Développer la partie back-end d’une application web ou web mobile');
INSERT INTO `competence` VALUES (8,'C8','Elaborer et mettre en œuvre des composants dans une application de gestion de contenu ou e-commerce');

INSERT INTO `niveau` VALUES (1,'imiter');
INSERT INTO `niveau` VALUES (2,'adapter');
INSERT INTO `niveau` VALUES (3,'transposer');


La solution (une des solutions pour faire le lien entre les tables) : 
```sql
SELECT utilisateur.username, competence.libelle_competence, niveau.libelle_niveau
FROM utilisateur, competence, niveau, niveau_utilisateur
WHERE 
utilisateur.id_utilisateur = niveau_utilisateur.id_utilisateur 
AND competence.id_competence = niveau_utilisateur.id_competence 
AND niveau.id_niveau = niveau_utilisateur.id_niveau
```

une autre solution

```sql
SELECT utilisateur.username, competence.libelle_competence, niveau.libelle_niveau
FROM  niveau_utilisateur JOIN utilisateur ON utilisateur.id_utilisateur =
niveau_utilisateur.id_utilisateur JOIN competence ON niveau_utilisateur.id_competence =
competence.id_competence JOIN niveau ON niveau_utilisateur.id_niveau = niveau.id_niveau
```

encore une autre

```sql
SELECT utilisateur.username, competence.libelle_competence, niveau.libelle_niveau
FROM  niveau_utilisateur
NATURAL INNER JOIN utilisateur 
NATURAL INNER JOIN competence 
NATURAL INNER JOIN niveau ;
```

Utilisation d'alias (AS)

```sql
SELECT utilisateur.username, competence.libelle_competence, niveau.libelle_niveau
FROM  niveau_utilisateur AS nv JOIN utilisateur AS u ON u.id_utilisateur =
nv.id_utilisateur JOIN competence AS c ON nv.id_competence =
c.id_competence JOIN niveau AS n ON
nv.id_niveau = n.id_niveau
```