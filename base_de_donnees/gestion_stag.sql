/* Création de la Base des données   */

drop database if exists gestion_stagiaires;
create database if not exists gestion_stagiaires;

	use gestion_stagiaires;

	create table filieres(
		idFiliere int(4) auto_increment primary  key,
		nomFiliere varchar(40),
		niveau varchar(50)
		);

	create table stagiaires(
		idStagiaire int(4) auto_increment primary key,
		nom varchar(50),
		prenom varchar(50),
		civilite varchar(1),
		photo varchar(100),
		idFiliere int(4)
		);

	create table utilisateurs(
		idUser int (4) auto_increment primary key,
		login varchar (50),
		email varchar(255),
		role varchar(50),
		etat int(1),
		pwd varchar(255)
		);

	Alter table stagiaires add constraint foreign key(idFiliere) references filieres(idFiliere) ;

	/* Fin de la Créatino de la Base des données  */

	/*Insertion des données Initiales de test dans notre Base des Données, tables */

	use gestion_stagiaires;

    INSERT INTO filieres (nomFiliere, niveau) VALUES
        ('TSGI', 'TS'),
        ('TSGE', 'TS'),
        ('TGI', 'T'),
        ('THKI', 'TS'),
        ('TSGI', 'TS'),
        ('TSGE', 'TS'),
        ('TGI', 'T'),
        ('THKI', 'TS'),
        ('TSGI', 'TS'),
        ('TSGE', 'TS'),
        ('TGI', 'T'),
        ('THKI', 'TS'),
        ('TSGI', 'TS'),
        ('TSGE', 'TS'),
        ('TGI', 'T'),
        ('THKI', 'TS'),
        ('TSGI', 'TS'),
        ('TSGE', 'TS'),
        ('TGI', 'T'),
        ('THKI', 'TS'),
        ('TSGI', 'TS'),
        ('TSGE', 'TS'),
        ('TGI', 'T'),
        ('THKI', 'TS'),
        ('TSGI', 'TS'),
        ('TSGE', 'TS'),
        ('TGI', 'T'),
        ('THKI', 'TS'),
        ('TLLKMLO', 'T');



    INSERT INTO utilisateurs (login,email,role,etat,pwd) VALUES
    	('admin', 'jehdailegrand12@gmail.com', 'ADMIN', 1, md5('123')),
    	('user1', 'user1jehd@gmail.com', 'VISITEUR', 0, md5('123')),
    	('user2', 'user2jehd@gmail.com', 'VISITEUR', 1, md5('123'));


    INSERT INTO stagiaires (nom, prenom, civilite,photo,idFiliere) VALUES
        ('JONATHAN', 'BADIMBUKA', 'M', 'jonat.jpg', 1),
        ('PASCAL', 'BARTROND', 'M', 'pascal.jpg', 2),
        ('PRISCA', 'RIZOULI', 'F', 'prisca.jpg', 3),
        ('CISCO', 'MADIMBO', 'M', 'cisco.jpg', 1),
        ('JASMINE', 'LUIZA', 'M', 'jasmine.jpg', 2),
        ('ATOMIBA', 'JOUJOU', 'F', 'atomiba.jpg', 3),
        ('IRELO', 'BADIMBUKA', 'M', 'irelo.jpg', 1),
        ('PÏNTO', 'BARCELONE', 'M', 'pinto.jpg', 2),
        ('CECILIA', 'AMANDA', 'F', 'cecilia.jpg', 3),
        ('JACKIE', 'PODITO', 'F', 'jackie.jpg', 1),
        ('ISCO', 'MADRIDISMO', 'M', 'isco.jpg', 2),
        ('CEZAR', 'VOLEUR', 'M', 'cesar.jpg', 3),
        ('ALINE', 'KAMINGA', 'F', 'aline.jpg', 1),
        ('CHRISTELLE', 'ADOLINE', 'F', 'christelle.jpg', 2),
        ('ALAIN', 'DUCAP', 'M', 'alain.jpg', 3),
        ('JOSHUA', 'KIMMICH', 'M', 'joshua.jpg', 1),
        ('SERAPHIN', 'AMATA', 'M', 'serafin.jpg', 2),
        ('JESSICA', 'JESS', 'F', 'jessica.jpg', 3);

        /* Fin de l'insertion des données initiales de test */

    /*affichage des données se trouvant dans différentes tables de la Base de données */

    SELECT * from filieres;
    SELECT * from stagiaires;
    SELECT * from utilisateurs;


		/* Modification des requêtes */

		/* Modification de la table filières pour le traitement des stagiaires */
		create table filieres(
			idFiliere int(4) auto_increment primary  key,
			nomFiliere varchar(40),
			niveau varchar(50)
			);
		INSERT INTO filieres (nomFiliere, niveau) VALUES
				('TSGI', 'TS'),
				('TSGE', 'TS'),
				('TGI', 'T'),
				('TSRI', 'TS'),
				('TSGI', 'TS'),
				('TSGE', 'TS'),
				('TGI', 'T'),
				('TSRI', 'TS'),
				('TSGI', 'TS'),
				('TSGE', 'TS'),
				('TGI', 'T'),
				('TSRI', 'TS'),
				('TSGI', 'TS'),
				('TSGE', 'TS'),
				('TGI', 'T'),
				('TSRI', 'TS'),
				('TSGI', 'TS'),
				('TSGE', 'TS'),
				('TGI', 'T'),
				('TSRI', 'TS'),
				('TCE', 'T');





				/*AUTRES MODIFICATIONS */
				 INSERT INTO stagiaires (nom, prenom, civilite,photo,idFiliere) VALUES
        ('ANSEM', 'BUSH', 'M', '../images/atomiba.jpg', 1);

                /*AUTRES MODIFICATIONS */
                INSERT INTO utilisateurs (login,email,role,etat,pwd) VALUES
        ('user2', 'user2@gmail.com', 'VISITEUR', 1, md5('123'));

        /*AUTRES MODIFICATIONS*/
         INSERT INTO utilisateurs (login,email,role,etat,pwd) VALUES
        ('admin', 'jehdailegrand12@gmail.com', 'ADMIN', 1, md5('123')),
        ('user3', 'user1jehd@gmail.com', 'VISITEUR', 0, md5('123')),
        ('user4', 'user2jehd@gmail.com', 'VISITEUR', 1, md5('123'));


         INSERT INTO utilisateurs (login,email,role,etat,pwd) VALUES
        ('administrateur', 'user2jehd@gmail.com', 'ADMIN', 1, md5('123'));

