TRUNCATE "alergeny" CASCADE;
ALTER SEQUENCE "alergeny_seq" RESTART WITH 1;

INSERT INTO "alergeny" ("nazev") VALUES
  ('Lepek'),
  ('Korýši'),
  ('Vejce'),
  ('Ryby'),
  ('Arašídy'),
  ('Sója'),
  ('Mléko'),
  ('Skořápkové plody'),
  ('Celer'),
  ('Hořčice'),
  ('Sezam'),
  ('Oxid siřičitý a siřičitany'),
  ('Vlčí bob'),
  ('Měkkýši');

INSERT INTO "obsahuje" SELECT (1 + random() * 13)::int as "alergenyID", generate_series(1, (select count(*) from jidlo)) as "jidloID";
