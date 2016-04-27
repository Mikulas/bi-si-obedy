ALTER TABLE "jidlo"
ALTER "cena" TYPE integer,
ALTER "nazev" TYPE text,
ALTER "popis" TYPE text;

ALTER TABLE "pobocka"
ALTER "cisloPopisne" TYPE text,
ALTER "mesto" TYPE text,
ALTER "PSC" TYPE text,
ALTER "ulice" TYPE text;

ALTER TABLE "restaurace"
ALTER "adresa" TYPE text,
ALTER "email" TYPE text,
ALTER "email" DROP NOT NULL,
ALTER "ICO" TYPE text,
ALTER "kuchyne" TYPE text,
ALTER "nazev" TYPE text,
ALTER "telefon" TYPE text;

ALTER TABLE "uzivatelskyucet"
ALTER "heslo" TYPE text,
ALTER "kredit" TYPE integer,
ALTER "username" TYPE text;

ALTER TABLE "zamestnanec"
ALTER "email" TYPE text,
ALTER "jmeno" TYPE text,
ALTER "prijmeni" TYPE text,
ALTER "rodneCislo" TYPE text,
ALTER "telefon" TYPE text;
