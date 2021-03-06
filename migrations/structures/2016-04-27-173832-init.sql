-- CREATE DATABASE "bi-si-obedy";

/* ---------------------------------------------------- */
/*  Generated by Enterprise Architect Version 12.0 		*/
/*  Created On : 27-Apr-2016 7:50:41 PM 				*/
/*  DBMS       : PostgreSQL 						*/
/* ---------------------------------------------------- */

/* Drop Sequences for Autonumber Columns */

DROP SEQUENCE IF EXISTS "zamestnanec_id_seq"
;

/* Drop Tables */

DROP TABLE IF EXISTS "Alergeny" CASCADE
;

DROP TABLE IF EXISTS "obsahuje" CASCADE
;

DROP TABLE IF EXISTS "JidelniListek" CASCADE
;

DROP TABLE IF EXISTS "Jidlo" CASCADE
;

DROP TABLE IF EXISTS "jeObjednano" CASCADE
;

DROP TABLE IF EXISTS "Objednavka" CASCADE
;

DROP TABLE IF EXISTS "Pobocka" CASCADE
;

DROP TABLE IF EXISTS "Restaurace" CASCADE
;

DROP TABLE IF EXISTS "UzivatelskyUcet" CASCADE
;

DROP TABLE IF EXISTS "Zamestnanec" CASCADE
;

/* Create Tables */

CREATE TABLE "Alergeny"
(
	"nazev" varchar(50)	 NOT NULL,    -- Název alergenu.
	"alergenyID" Integer NOT NULL
)
;

CREATE TABLE "obsahuje"
(
	"alergenyID" Integer NULL,
	"jidloID" Integer NULL
)
;

CREATE TABLE "JidelniListek"
(
	"den" timestamp NOT NULL,    -- Den nebo dny, pro které je tento jídelníèek urèen.
	"platnostDo" timestamp NOT NULL,    -- Datum, do kdy jídelníèek platí.
	"platnostOd" timestamp NOT NULL,    -- Datum, od kdy jídelníèek platí.
	"jidelniListekID" Integer NOT NULL,
	"restauraceID" Integer NOT NULL
)
;

CREATE TABLE "Jidlo"
(
	"cena" decimal(8,2) NOT NULL,    -- Cena jídla.
	"nazev" varchar(25)	 NOT NULL,    -- Název jídla.
	"popis" varchar(80)	 NULL,    -- Struèný popis jídla.
	"jidloID" Integer NOT NULL,
	"jidelniListekID" Integer NOT NULL
)
;

CREATE TABLE "jeObjednano"
(
	"jidloID" Integer NULL,
	"objednavkaID" Integer NULL
)
;

CREATE TABLE "Objednavka"
(
	"datumDodani" timestamp NOT NULL,    -- Datum, kdy má být objednané jídlo dodáno na adresu, kde zamìstnanec, zadavatel objednávky, pracuje.
	"datumSplatnosti" timestamp NOT NULL,    -- Datum, kdy se objednané jídlo automaticky skrze aplikaci zaplatí.
	"datumZadani" timestamp NOT NULL,    -- Datum, kdy byla zadána objednávka v aplikaci.
	"stavObjednavky" varchar(50)	 NOT NULL,    -- Stav objednávky. Mùže být pouze zadána, odeslána, uhrazena, dodána nebo vyøízena.
	"objednavkaID" Integer NOT NULL,
	"uzivatelskyUcetID" Integer NULL
)
;

CREATE TABLE "Pobocka"
(
	"cisloPopisne" decimal(8,2) NOT NULL,    -- Èíslo popisné budovy, ve které se nachází poboèka.
	"mesto" varchar(50)	 NOT NULL,    -- Mìsto, ve kterém se poboèka nachází.
	"PSC" decimal(8,2) NOT NULL,    -- Poštovní smìrovací èíslo poboèky.
	"ulice" varchar(50)	 NOT NULL,    -- Ulice, ve které se poboèka nachází.
	"pobockaID" Integer NOT NULL
)
;

CREATE TABLE "Restaurace"
(
	"adresa" varchar(50)	 NOT NULL,    -- Adresa restaurace.
	"email" varchar(50)	 NULL,    -- Email restaurace.
	"ICO" decimal(12,2) NOT NULL,    -- Identifikaèní èíslo právnické osoby  èi fyzické osoby, pod kterou je restaurace zapsána.
	"ID" decimal(8,2) NOT NULL,    -- ID èíslo jednoznaènì identifikuje konkrétní restauraci, její roli a uživatelská práva v aplikaci. Je pøiøazena správcem.
	"kuchyne" varchar(50)	 NOT NULL,    -- Typ kuchynì, která se v restauraci vaøí.
	"nazev" varchar(50)	 NOT NULL,    -- Název restaurace.
	"telefon" decimal(12,2) NOT NULL,    -- Telefonní èíslo do restaurace.
	"restauraceID" Integer NOT NULL
)
;

CREATE TABLE "UzivatelskyUcet"
(
	"heslo" varchar(50)	 NOT NULL,    -- Heslo slouží jako prostøedek k ovìøení totožnosti zamìstnance.
	"kredit" decimal(8,2) NOT NULL,    -- Výše penìz, které budou zamìstnanci, který vlastní tento uživatelský úèet, odeèteny z platu.
	"username" varchar(50)	 NOT NULL,    -- Jednoznaèný identifikátor úètu, který si zamìstnanec zvolí pøi registraci.
	"uzivatelskyUcetID" Integer NOT NULL,
	"zamestnanecID" Integer NULL
)
;

CREATE TABLE "Zamestnanec"
(
	"email" varchar(50)	 NOT NULL,    -- Kontaktní email zamìstnance, na která jsou odeslána rùzné informace ohlednì objednávek.
	"ID" decimal(8,2) NOT NULL DEFAULT nextval(('"zamestnanec_id_seq"'::text)::regclass),    -- ID èíslo jednoznaènì identifikuje konkrétní osobu, její roli a uživatelská práva v aplikaci.
	"jmeno" varchar(50)	 NOT NULL,    -- Jméno zamìstnance
	"prijmeni" varchar(50)	 NOT NULL,    -- Pøíjmení zamìstnance.
	"rodneCislo" decimal(8,2) NOT NULL,    -- Rodné èíslo zamìstnance.
	"telefon" decimal(12,2) NOT NULL,    -- Telefonní èíslo na zamìstnance.
	"zamestnanecID" Integer NOT NULL,
	"pobockaID" Integer NOT NULL
)
;

/* Create Table Comments, Sequences for Autonumber Columns */

COMMENT ON TABLE "Alergeny"
	IS 'Látka, kterou mùže obsahovat jídlo a která mùže vyvolat alergickou reakci u spotøebitele.'
;

COMMENT ON COLUMN "Alergeny"."nazev"
	IS 'Název alergenu.'
;

COMMENT ON TABLE "JidelniListek"
	IS 'Seznam jídel, která daná restaurace nabízí.'
;

COMMENT ON COLUMN "JidelniListek"."den"
	IS 'Den nebo dny, pro které je tento jídelníèek urèen.'
;

COMMENT ON COLUMN "JidelniListek"."platnostDo"
	IS 'Datum, do kdy jídelníèek platí.'
;

COMMENT ON COLUMN "JidelniListek"."platnostOd"
	IS 'Datum, od kdy jídelníèek platí.'
;

COMMENT ON TABLE "Jidlo"
	IS 'Jídlo je nabídka restaurace, který si mohou zamìstnanci objednat.'
;

COMMENT ON COLUMN "Jidlo"."cena"
	IS 'Cena jídla.'
;

COMMENT ON COLUMN "Jidlo"."nazev"
	IS 'Název jídla.'
;

COMMENT ON COLUMN "Jidlo"."popis"
	IS 'Struèný popis jídla.'
;

COMMENT ON TABLE "Objednavka"
	IS 'Záznam o objednání jídla zamìstnancem.'
;

COMMENT ON COLUMN "Objednavka"."datumDodani"
	IS 'Datum, kdy má být objednané jídlo dodáno na adresu, kde zamìstnanec, zadavatel objednávky, pracuje.'
;

COMMENT ON COLUMN "Objednavka"."datumSplatnosti"
	IS 'Datum, kdy se objednané jídlo automaticky skrze aplikaci zaplatí.'
;

COMMENT ON COLUMN "Objednavka"."datumZadani"
	IS 'Datum, kdy byla zadána objednávka v aplikaci.'
;

COMMENT ON COLUMN "Objednavka"."stavObjednavky"
	IS 'Stav objednávky. Mùže být pouze zadána, odeslána, uhrazena, dodána nebo vyøízena.'
;

COMMENT ON TABLE "Pobocka"
	IS 'Pracovištì, které jsou souèástí firmy a kde pracují její zamìstnanci.'
;

COMMENT ON COLUMN "Pobocka"."cisloPopisne"
	IS 'Èíslo popisné budovy, ve které se nachází poboèka.'
;

COMMENT ON COLUMN "Pobocka"."mesto"
	IS 'Mìsto, ve kterém se poboèka nachází.'
;

COMMENT ON COLUMN "Pobocka"."PSC"
	IS 'Poštovní smìrovací èíslo poboèky.'
;

COMMENT ON COLUMN "Pobocka"."ulice"
	IS 'Ulice, ve které se poboèka nachází.'
;

COMMENT ON TABLE "Restaurace"
	IS 'Subjekt, který v rámci aplikace nabízí svoji nabídku jídel.'
;

COMMENT ON COLUMN "Restaurace"."adresa"
	IS 'Adresa restaurace.'
;

COMMENT ON COLUMN "Restaurace"."email"
	IS 'Email restaurace.'
;

COMMENT ON COLUMN "Restaurace"."ICO"
	IS 'Identifikaèní èíslo právnické osoby  èi fyzické osoby, pod kterou je restaurace zapsána.'
;

COMMENT ON COLUMN "Restaurace"."ID"
	IS 'ID èíslo jednoznaènì identifikuje konkrétní restauraci, její roli a uživatelská práva v aplikaci. Je pøiøazena správcem.'
;

COMMENT ON COLUMN "Restaurace"."kuchyne"
	IS 'Typ kuchynì, která se v restauraci vaøí.'
;

COMMENT ON COLUMN "Restaurace"."nazev"
	IS 'Název restaurace.'
;

COMMENT ON COLUMN "Restaurace"."telefon"
	IS 'Telefonní èíslo do restaurace.'
;

COMMENT ON TABLE "UzivatelskyUcet"
	IS 'Každý zamìstnanec si mùže založit uživatelský úèet, který mu umožòuje objednávání v aplikaci.'
;

COMMENT ON COLUMN "UzivatelskyUcet"."heslo"
	IS 'Heslo slouží jako prostøedek k ovìøení totožnosti zamìstnance.'
;

COMMENT ON COLUMN "UzivatelskyUcet"."kredit"
	IS 'Výše penìz, které budou zamìstnanci, který vlastní tento uživatelský úèet, odeèteny z platu.'
;

COMMENT ON COLUMN "UzivatelskyUcet"."username"
	IS 'Jednoznaèný identifikátor úètu, který si zamìstnanec zvolí pøi registraci.'
;

COMMENT ON TABLE "Zamestnanec"
	IS 'Osoba, která pracuje ve firmì a která mùže využívat náši aplikaci k objednávání jídla.'
;

COMMENT ON COLUMN "Zamestnanec"."email"
	IS 'Kontaktní email zamìstnance, na která jsou odeslána rùzné informace ohlednì objednávek.'
;

COMMENT ON COLUMN "Zamestnanec"."ID"
	IS 'ID èíslo jednoznaènì identifikuje konkrétní osobu, její roli a uživatelská práva v aplikaci.'
;

COMMENT ON COLUMN "Zamestnanec"."jmeno"
	IS 'Jméno zamìstnance'
;

COMMENT ON COLUMN "Zamestnanec"."prijmeni"
	IS 'Pøíjmení zamìstnance.'
;

COMMENT ON COLUMN "Zamestnanec"."rodneCislo"
	IS 'Rodné èíslo zamìstnance.'
;

COMMENT ON COLUMN "Zamestnanec"."telefon"
	IS 'Telefonní èíslo na zamìstnance.'
;

CREATE SEQUENCE "zamestnanec_id_seq" INCREMENT 1 START 1
;

/* Create Primary Keys, Indexes, Uniques, Checks */

ALTER TABLE "Alergeny" ADD CONSTRAINT "PK_Alergeny"
	PRIMARY KEY ("alergenyID")
;

ALTER TABLE "JidelniListek" ADD CONSTRAINT "PK_JidelniListek"
	PRIMARY KEY ("jidelniListekID")
;

ALTER TABLE "Jidlo" ADD CONSTRAINT "PK_Jidlo"
	PRIMARY KEY ("jidloID")
;

ALTER TABLE "Objednavka" ADD CONSTRAINT "PK_Objednavka"
	PRIMARY KEY ("objednavkaID")
;

ALTER TABLE "Pobocka" ADD CONSTRAINT "PK_Pobocka"
	PRIMARY KEY ("pobockaID")
;

ALTER TABLE "Restaurace" ADD CONSTRAINT "PK_Restaurace"
	PRIMARY KEY ("restauraceID")
;

ALTER TABLE "UzivatelskyUcet" ADD CONSTRAINT "PK_UzivatelskyUcet"
	PRIMARY KEY ("uzivatelskyUcetID")
;

ALTER TABLE "Zamestnanec" ADD CONSTRAINT "PK_Zamestnanec"
	PRIMARY KEY ("zamestnanecID")
;

/* Create Foreign Key Constraints */

ALTER TABLE "obsahuje" ADD CONSTRAINT "Alergeny"
	FOREIGN KEY ("alergenyID") REFERENCES "Alergeny" ("alergenyID") ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE "obsahuje" ADD CONSTRAINT "Jidlo"
	FOREIGN KEY ("jidloID") REFERENCES "Jidlo" ("jidloID") ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE "JidelniListek" ADD CONSTRAINT "nabizi"
	FOREIGN KEY ("restauraceID") REFERENCES "Restaurace" ("restauraceID") ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE "Jidlo" ADD CONSTRAINT "obsahuje"
	FOREIGN KEY ("jidelniListekID") REFERENCES "JidelniListek" ("jidelniListekID") ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE "jeObjednano" ADD CONSTRAINT "Jidlo"
	FOREIGN KEY ("jidloID") REFERENCES "Jidlo" ("jidloID") ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE "jeObjednano" ADD CONSTRAINT "Objednavka"
	FOREIGN KEY ("objednavkaID") REFERENCES "Objednavka" ("objednavkaID") ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE "Objednavka" ADD CONSTRAINT "maObjednane"
	FOREIGN KEY ("uzivatelskyUcetID") REFERENCES "UzivatelskyUcet" ("uzivatelskyUcetID") ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE "UzivatelskyUcet" ADD CONSTRAINT "maZalozeny"
	FOREIGN KEY ("zamestnanecID") REFERENCES "Zamestnanec" ("zamestnanecID") ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE "Zamestnanec" ADD CONSTRAINT "pracujeV"
	FOREIGN KEY ("pobockaID") REFERENCES "Pobocka" ("pobockaID") ON DELETE No Action ON UPDATE No Action
;
