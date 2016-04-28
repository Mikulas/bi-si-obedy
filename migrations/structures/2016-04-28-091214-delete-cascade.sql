ALTER TABLE "obsahuje" DROP CONSTRAINT "Jidlo";
ALTER TABLE "obsahuje" ADD CONSTRAINT "Jidlo"
FOREIGN KEY ("jidloID") REFERENCES "jidlo" ("jidloID") ON DELETE CASCADE ON UPDATE No Action
;

ALTER TABLE "jeObjednano" DROP CONSTRAINT "Objednavka";
ALTER TABLE "jeObjednano" ADD CONSTRAINT "Objednavka"
FOREIGN KEY ("objednavkaID") REFERENCES "objednavka" ("objednavkaID") ON DELETE CASCADE ON UPDATE No Action
;
