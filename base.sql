CREATE TABLE Espece(
   idEspece INT,
   NomEspece VARCHAR(50),
   FamilleEspece VARCHAR(50),
   Habitat VARCHAR(50),
   Alimentation VARCHAR(50),
   Taille VARCHAR(50),
   PRIMARY KEY(idEspece)
);

CREATE TABLE Animal(
   idAnimal INT,
   NomAnimal VARCHAR(50),
   LibelleAnimal VARCHAR(50),
   Provenance VARCHAR(50),
   idEspece INT NOT NULL,
   PRIMARY KEY(idAnimal),
   FOREIGN KEY(idEspece) REFERENCES Espece(idEspece)
);

CREATE TABLE Spectacle(
   idSpectacle INT,
   DateSpectacle DATE,
   LibelleSpectacle VARCHAR(50),
   NbPlaces INT,
   PRIMARY KEY(idSpectacle)
);

CREATE TABLE Utilisateur(
   NomUtilisateur VARCHAR(50),
   PrenomUtillisateur VARCHAR(50),
   MailUtilisateur VARCHAR(50),
   mdpUtilisateur VARCHAR(200),
   PRIMARY KEY(MailUtilisateur)
);

CREATE TABLE TypeEspece(
   idTE INT,
   libelleTE VARCHAR(50),
   PRIMARY KEY(idTE)
);

CREATE TABLE Participer(
   idAnimal INT,
   idSpectacle INT,
   PRIMARY KEY(idAnimal, idSpectacle),
   FOREIGN KEY(idAnimal) REFERENCES Animal(idAnimal),
   FOREIGN KEY(idSpectacle) REFERENCES Spectacle(idSpectacle)
);

CREATE TABLE critiquer(
   idSpectacle INT,
   MailUtilisateur VARCHAR(50),
   note int DEFAULT NULL,
   commentaire varchar(4096) DEFAULT NULL
   PRIMARY KEY(idSpectacle, MailUtilisateur),
   FOREIGN KEY(idSpectacle) REFERENCES Spectacle(idSpectacle),
   FOREIGN KEY(MailUtilisateur) REFERENCES Utilisateur(MailUtilisateur)
);

CREATE TABLE etre(
   idEspece INT,
   idTE INT,
   PRIMARY KEY(idEspece, idTE),
   FOREIGN KEY(idEspece) REFERENCES Espece(idEspece),
   FOREIGN KEY(idTE) REFERENCES TypeEspece(idTE)
);


CREATE TABLE Photo(
   idP INT,
   cheminP VARCHAR(200),
   idAnimal INT
);

ALTER TABLE `Photo`
  ADD PRIMARY KEY (`idP`),
  ADD KEY `idAnimal` (`idAnimal`);




-- Insertion dans la table Espece
INSERT INTO Espece (idEspece, NomEspece, FamilleEspece, Habitat, Alimentation, Taille)
VALUES 
(1, 'Antilope', 'Bovidés', 'Savane', 'Herbe', 'Moyenne'),
(2, 'Dauphin', 'Cétacés', 'Océan', 'Poisson', 'Grande'),
(3, 'Éléphant', 'Éléphantidés', 'Savane', 'Végétation', 'Très grande'),
(4, 'Étoile de mer', 'Astéroïdes', 'Océan', 'Plancton', 'Petite'),
(5, 'Faucon pèlerin', 'Falconidés', 'Falaise', 'Petits oiseaux', 'Moyenne'),
(6, 'Girafe', 'Giraffidés', 'Savane', 'Feuilles', 'Grande'),
(7, 'Grue de Manchourie', 'Gruidés', 'Forêt', 'Petits animaux', 'Grande'),
(8, 'Marabout d''Afrique', 'Ciconiidés', 'Rivages', 'Poisson', 'Grande'),
(9, 'Méduse', 'Cnidaires', 'Océan', 'Plancton', 'Variable'),
(10, 'Ombrette africaine', 'Ardeidés', 'Rivages', 'Poisson', 'Moyenne'),
(11, 'Requin', 'Selachimorphes', 'Océan', 'Poisson', 'Grande'),
(12, 'Tichodrome échelette', 'Passériformes', 'Montagne', 'Insectes', 'Petite'),
(13, 'Tortue', 'Testudinidés', 'Terre/Eau', 'Plantes/Insectes', 'Variable'),
(14, 'Zèbre', 'Équidés', 'Savane', 'Herbe', 'Moyenne');

-- Insertion dans la table TypeEspece
INSERT INTO TypeEspece (idTE, libelleTE)
VALUES 
(1, 'Mammifère'),
(2, 'Poisson'),
(3, 'Oiseau'),
(4, 'Reptile'),
(5, 'Cnidaires');

-- Insertion dans la table Animal
INSERT INTO Animal (idAnimal, NomAnimal, LibelleAnimal, Provenance, idEspece)
VALUES 
(1, 'Antoine', 'Antilope rapide', 'Afrique', 1),
(2, 'Franck', 'Dauphin joueur', 'Océan', 2),
(3, 'Alexandre', 'Éléphant imposant', 'Afrique', 3),
(4, 'Philippe', 'Étoile de mer colorée', 'Océan', 4),
(5, 'Stephan', 'Faucon volant', 'Europe', 5),
(6, 'Quentin', 'Girafe élégante', 'Afrique', 6),
(7, 'Edouard', 'Grue majestueuse', 'Asie', 7),
(8, 'Charles', 'Marabout observateur', 'Afrique', 8),
(9, 'Vadim', 'Méduse translucide', 'Océan', 9),
(10, 'Luke', 'Ombrette pêcheuse', 'Afrique', 10),
(11, 'Matthieu', 'Requin redoutable', 'Océan', 11),
(12, 'Armel', 'Tichodrome agile', 'Europe', 12),
(13, 'Milo', 'Tortue tranquille', 'Terre/Eau', 13),
(14, 'Gabriel', 'Zèbre rayé', 'Afrique', 14);

-- Insertion dans la table etre
INSERT INTO etre (idEspece, idTE)
VALUES 
(1, 1),  -- Antilope (Mammifère)
(2, 2),  -- Dauphin (Poisson)
(3, 1),  -- Éléphant (Mammifère)
(4, 5),  -- Étoile de mer (Cnidaires)
(5, 3),  -- Faucon pèlerin (Oiseau)
(6, 1),  -- Girafe (Mammifère)
(7, 3),  -- Grue de Manchourie (Oiseau)
(8, 3),  -- Marabout d'Afrique (Oiseau)
(9, 5),  -- Méduse (Cnidaires)
(10, 3), -- Ombrette africaine (Oiseau)
(11, 2), -- Requin (Poisson)
(12, 3), -- Tichodrome échelette (Oiseau)
(13, 4), -- Tortue (Reptile)
(14, 1); -- Zèbre (Mammifère)

INSERT INTO Photo (idP, cheminP, idAnimal) 
VALUES
(1,'antilope.jpg',1),
(2,'dauphin.jpg',2),
(3,'elephant.jpg',3),
(4,'etoiledemer.jpg',4),
(5,'fauconpelerin.jpg',5),
(6,'girafe.jpg',6),
(7,'gruedemandchourie.jpg',7),
(8,'maraboutafricain.jpg',8),
(9,'meduse.jpg',9),
(10,'ombretteafricaine.jpg',10),
(11,'requin.jpg',11),
(12,'tichodromeechelette.jpg',12),
(13,'tortue.jpg',13),
(14,'zebre.jpg',14);

INSERT INTO Spectacle (idSpectacle,DateSpectacle,LibelleSpectacle,NbPlaces)VALUES(1,'12-12-24','Spectacle aérien',100);
INSERT INTO Spectacle (idSpectacle,DateSpectacle,LibelleSpectacle,NbPlaces)VALUES(2,'13-12-24','Spectacle aquatique',113);