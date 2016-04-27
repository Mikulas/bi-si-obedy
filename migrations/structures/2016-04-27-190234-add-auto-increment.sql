CREATE SEQUENCE "alergeny_seq";
ALTER TABLE "alergeny" ALTER "alergenyID" SET DEFAULT NEXTVAL('alergeny_seq');


CREATE SEQUENCE "jidelnilistek_seq";
ALTER TABLE "jidelnilistek" ALTER "jidelniListekID" SET DEFAULT NEXTVAL('jidelnilistek_seq');


CREATE SEQUENCE "jidlo_seq";
ALTER TABLE "jidlo" ALTER "jidloID" SET DEFAULT NEXTVAL('jidlo_seq');


CREATE SEQUENCE "objednavka_seq";
ALTER TABLE "objednavka" ALTER "objednavkaID" SET DEFAULT NEXTVAL('objednavka_seq');


CREATE SEQUENCE "pobocka_seq";
ALTER TABLE "pobocka" ALTER "pobockaID" SET DEFAULT NEXTVAL('pobocka_seq');


CREATE SEQUENCE "restaurace_seq";
ALTER TABLE "restaurace" ALTER "restauraceID" SET DEFAULT NEXTVAL('restaurace_seq');


CREATE SEQUENCE "uzivatelskyucet_seq";
ALTER TABLE "uzivatelskyucet" ALTER "uzivatelskyUcetID" SET DEFAULT NEXTVAL('uzivatelskyucet_seq');


CREATE SEQUENCE "zamestnanec_seq";
ALTER TABLE "zamestnanec" ALTER "zamestnanecID" SET DEFAULT NEXTVAL('zamestnanec_seq');
