INSERT INTO "restaurace" ("adresa", "email", "ICO", "kuchyne", "nazev", "telefon") VALUES
('Dělnická 5', NULL, '1230948', 'italská', 'Pagana', '1309238452'),
('Pražská 234', 'info@hombre.example.com', '3019348', 'mexická', 'Hombre Del Mundo', '209348234'),
('Národní 12', 'potrefena@husa.example.com', '102938', 'česká', 'Potrefená Husa', '20948029384');

INSERT INTO "jidelnilistek" ("den", "platnostOd", "platnostDo", "restauraceID") VALUES
(now()::date + interval '1 DAY', now()::date + interval '1 DAY', now()::date + interval '2 DAY', '1'),
(now()::date + interval '2 DAY', now()::date + interval '2 DAY', now()::date + interval '4 DAY', '1'),
(now()::date + interval '3 DAY', now()::date + interval '3 DAY', now()::date + interval '5 DAY', '1'),
(now()::date + interval '4 DAY', now()::date + interval '4 DAY', now()::date + interval '6 DAY', '1'),
(now()::date + interval '5 DAY', now()::date + interval '5 DAY', now()::date + interval '7 DAY', '1'),

(now()::date + interval '1 DAY', now()::date + interval '1 DAY', now()::date + interval '2 DAY', '2'),
(now()::date + interval '2 DAY', now()::date + interval '2 DAY', now()::date + interval '4 DAY', '2'),
(now()::date + interval '3 DAY', now()::date + interval '3 DAY', now()::date + interval '5 DAY', '2'),
(now()::date + interval '4 DAY', now()::date + interval '4 DAY', now()::date + interval '6 DAY', '2'),
(now()::date + interval '5 DAY', now()::date + interval '5 DAY', now()::date + interval '7 DAY', '2'),

(now()::date + interval '1 DAY', now()::date + interval '1 DAY', now()::date + interval '2 DAY', '3'),
(now()::date + interval '2 DAY', now()::date + interval '2 DAY', now()::date + interval '4 DAY', '3'),
(now()::date + interval '3 DAY', now()::date + interval '3 DAY', now()::date + interval '5 DAY', '3'),
(now()::date + interval '4 DAY', now()::date + interval '4 DAY', now()::date + interval '6 DAY', '3'),
(now()::date + interval '5 DAY', now()::date + interval '5 DAY', now()::date + interval '7 DAY', '3');

INSERT INTO "jidlo" ("cena", "nazev", "popis", "jidelniListekID") VALUES
  (75,	'Čočka s vejci, rozpek', 'Přírodní hovězí pečeně, rýže', 1),
  (45,	'Žemlovka s jablky', 'Báb guláš, chléb', 1),
  (75,	'Hovězí plátek na zelenině, těstoviny', 'Hrachová kaše, uzená rolka, rohlík', 1),
  (120,	'Krůtí kostky se sýrovou omáčkou, těstoviny', 'Maďarský guláš, těstoviny', 1),
  (60,	'Azu po tatarsku, rýže', 'Lečo s uzeninou, chléb', 2),
  (30,	'Štěpánská hovězí pečeně, rýže', 'Pizza se šunkou a sýrem', 2),
  (165,	'Kolínka s mletým masem', 'Bratislavské plecko, těstoviny', 2),
  (165,	'Plněná sekaná, bramborová kaše', 'Jemné zapečené brambory', 3),
  (30,	'Vepřenky s cibulí,brambor', 'Fazole po mexicku, párek, rohlík', 3),
  (135,	'Krupicová kaše s kakaem', 'Čočka s vejci, rozpek', 3),
  (60,	'Holandský řízek, bramborová kaše', 'Rizeto z vepřového masa', 3),
  (30,	'Lečo s uzeninou, chléb', 'Kolínka s mletým masem', 4),
  (45,	'Jitrnicový prejt, brambor', 'Hovězí maso, koprová omáčka, knedlík', 4),
  (60,	'Domácí buchty plněné', 'Opékaný karbanátek, bramborová kaše', 4),
  (150,	'Kuřecí stehno na zelenině, rýže', 'Španělský ptáček, rýže', 4),
  (90,	'Moravský vrabec, bramborová kaše', 'Džuveč z vepřového masa', 5),
  (45,	'Vepřové maso po štýrsku, brambor', 'Máslový řízek, brambor', 5),
  (45,	'Králiči hřbet na smetaně, knedlík', 'Domácí buchty plněné', 5),
  (60,	'Hovězí maso, rajská omáčka, knedlík', 'Holandský řízek, bramborová kaše', 5),
  (30,	'Lasagne s masem a sýrem', 'Vepřová pečeně po cikánsku, brambor', 6),
  (120,	'Hovězí maso na zelenině, těstoviny', 'Čevabčiči, brambor, obloha', 6),
  (75,	'Hrachová kaše, uzená rolka, rohlík', 'Vepřový řízek, brambor', 6),
  (30,	'Čočka s párkem, rozpek', 'Fazole na kyselo, párek, rohlík', 6),
  (75,	'Povidlové knedlíky s tvarohem', 'Švédská roštěná, rýže', 6),
  (165,	'Rybí file na grilu, brambor', 'Roštěná na slanině, rýže', 7),
  (105,	'Vepřové maso na paprice, knedlík', 'Hovězí maso, houbová omáčka, knedlík', 7),
  (75,	'Pražská hovězí pečeně, rýže', 'Debrecínský guláš, rýže', 7),
  (165,	'Frankfurtská hovězí pečeně, rýže', 'Vepřové nudličky po čínsku,rýže', 7),
  (90,	'Květákový mozeček, brambor', 'Svíčková na smetaně, knedlík', 8),
  (135,	'Bramborové knedlíky s cibulkou', 'Vepřové maso na paprice, knedlík', 8),
  (75,	'Hovězí maso se zvěřinovou omáčkou, rýže', 'Bramborové knedlíky s cibulkou', 8),
  (165,	'Vepřová směs sombrero, rýže', 'Hovězí maso na celeru, těstoviny', 9),
  (150,	'Debrecínský guláš, rýže', 'Rybí file na másle, brambor', 9),
  (45,	'Srbský plátek, rýže', 'Halušky s uzeným masem a zelím', 9),
  (150,	'Vepřové kostky v kapustě, knedlík', 'Jitrnicový prejt, brambor', 10),
  (75,	'Masový závitek francouzský, rýže', 'Bůčková roláda, brambor', 10),
  (45,	'Čevabčiči, brambor, obloha', 'Přírodní řízek, brambor', 10),
  (105,	'Zeleninové rizeto', 'Kuře na zelí, bramborová buchta', 10),
  (45,	'Hovězí tokáň, těstoviny', 'Kuřecí maso na paprice, knedlík', 11),
  (75,	'Selská vepřová pečeně, brambor', 'Štěpánská hovězí pečeně, rýže', 11),
  (120,	'Roštěná na žampionech, rýže', 'Hovězí plátek na zelenině, těstoviny', 11),
  (150,	'Hovězí maso po italsku, těstoviny', 'Hovězí maso protýkané, těstoviny', 11),
  (105,	'Hovězí maso protýkané, těstoviny', 'Smažený sýr, brambor', 11),
  (150,	'Vepřové maso na kmíně, rýže', 'Rybí file zapečené se smetanou a sýrem, brambor', 12),
  (60,	'Roštěná na slanině, rýže', 'Platýz na másle, brambory', 12),
  (105,	'Vepřový řízek, brambor', 'Špagety po milánsku', 12),
  (165,	'Sekaná pečeně, bramborová kaše', 'Hovězí maso na paprikách, těstoviny', 12),
  (45,	'Klopsy v rajské omáčce, těstoviny', 'Báječné zapečené těstoviny', 12),
  (120,	'Kuřecí kung pao, rýže', 'Květákovo sýrový řízeček,brambor', 13),
  (75,	'Smažené rybí prsty, brambor', 'Vepřové maso na kmíně, rýže', 13),
  (60,	'Rybí file v sýrovém obalu, brambor', 'Vepřová pečeně, špenát, špekové knedlíky', 13),
  (150,	'Džuveč z vepřového masa', 'Segedinský guláš, knedlík', 13),
  (165,	'Fazole po mexicku, párek, rohlík', 'Pražská hovězí pečeně, rýže', 13),
  (60,	'Bramborové knedlíky s uzeným masem a cibulkou', 'Vepřová játra na slanině, rýže', 13),
  (105,	'Švestkové knedlíky s tvarohem a cukrem', 'Hovězí tokáň, těstoviny', 13),
  (60,	'Pizza se šunkou a sýrem', 'Králičí hřbet, červené zelí, knedlík', 14),
  (165,	'Králičí hřbet, červené zelí, knedlík', 'Květákový mozeček, brambor', 14),
  (135,	'Přírodní řízek, brambor', 'Lasagne s masem a sýrem', 14),
  (90,	'Bramborový guláš, chléb', 'Kuřecí stehno na zelenině, rýže', 14),
  (120,	'Švédská roštěná, rýže', 'Zapečené těstoviny', 14),
  (120,	'Přírodní hovězí pečeně, rýže', 'Vepřenky s cibulí,brambor', 14),
  (60,	'Rybí file na másle, brambor', 'Smažené rybí prsty, brambor', 14),
  (75,	'Báb guláš, chléb', 'Čočka s párkem, rozpek', 15),
  (30,	'Masový nákyp, brambor', 'Vepřové maso po štýrsku, brambor', 15),
  (60,	'Vepřová pečeně, zelí, knedlík', 'Bramborový guláš, chléb', 15),
  (45,	'Bramborové šišky se strouhankou', 'Krůtí kostky se sýrovou omáčkou, těstoviny', 15),
  (75,	'Rybí file zapečené se smetanou a sýrem, brambor', 'Plněná sekaná, bramborová kaše', 15),
  (30,	'Platýz na másle, brambory', 'Vepřové kostky v kapustě, knedlík', 15),
  (90,	'Bavorské vdolečky', 'Hovězí maso se zvěřinovou omáčkou, rýže', 15),
  (90,	'Soukenický řízek, bramborová kaše', 'Frankfurtská hovězí pečeně, rýže', 15);
