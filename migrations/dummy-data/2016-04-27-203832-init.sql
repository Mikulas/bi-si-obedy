INSERT INTO "pobocka" ("cisloPopisne", "mesto", "PSC", "ulice")
VALUES ('12', 'Praha 1', '11000', 'Vodičkova');

INSERT INTO "zamestnanec" ("email", "jmeno", "prijmeni", "rodneCislo", "telefon", "pobockaID") VALUES
('alice@example.com', 'Alice', 'Nováková', '701102/1234', '602607395', '1'),
('beata@example.com', 'Beáta', 'Dům', '908234/1234', '345607395', '1'),
('chris@example.com', 'Chris', 'Sporák', '230948/2345', '982345765', '1');

INSERT INTO "alergeny" ("nazev") VALUES
('hrušky'),
('arašídy'),
('koriandr'),
('maso');
