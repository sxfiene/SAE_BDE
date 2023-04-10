DROP TABLE Inventaire CASCADE;
DROP TABLE Utilisateur CASCADE;
DROP TABLE Panier CASCADE;
DROP TABLE Achat CASCADE;

CREATE TABLE Inventaire(
    id_produit INTEGER NOT NULL,
    nom_produit VARCHAR NOT NULL,
    desc_produit VARCHAR NOT NULL,
    stock INTEGER NOT NULL,
    prix_produit DOUBLE PRECISION NOT NULL,
    pourcentage_fidelite DOUBLE PRECISION NOT NULL
);

CREATE TABLE Utilisateur(
    id_etudiant VARCHAR NOT NULL,
    nom VARCHAR NULL,
    prenom VARCHAR NULL,
    password VARCHAR NOT NULL,
    is_admin BOOLEAN NOT NULL,
    email VARCHAR NULL,
    created_at DATE NOT NULL,
    fidelite INTEGER  NULL
);

CREATE TABLE Panier(
    id_panier INTEGER NOT NULL,
    id_produit INTEGER NOT NULL,
    quantite INTEGER NOT NULL
);


CREATE TABLE Achat(
    id_etudiant INTEGER NOT NULL,
    id_panier BIGINT NOT NULL
);


ALTER TABLE
    Inventaire ADD PRIMARY KEY(id_produit);
ALTER TABLE
    Utilisateur ADD PRIMARY KEY(id_etudiant);
ALTER TABLE
    Panier ADD PRIMARY KEY(id_panier);
ALTER TABLE
    Achat ADD PRIMARY KEY(id_etudiant);

