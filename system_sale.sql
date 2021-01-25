CREATE TABLE "type_product" (  
  "id" SERIAL NOT NULL ,
  "description" VARCHAR(255) NOT NULL ,
  "percentage_imposed" NUMERIC(11,4) NULL DEFAULT 0,
  PRIMARY KEY ("id")
); 


CREATE TABLE "product" (  
  "id" SERIAL NOT NULL ,
  "id_type" INTEGER NOT NULL,
  "description" VARCHAR(255) NOT NULL ,
  "price" NUMERIC(11,4) NULL DEFAULT 0,
    PRIMARY KEY ("id"),
    FOREIGN KEY ("id_type") REFERENCES "type_product" ( "id" ) ON UPDATE CASCADE ON DELETE CASCADE
); 
CREATE INDEX "product_id_type" ON "product" ("id_type");


CREATE TABLE "sale"(
    "id" SERIAL NOT NULL ,
    "total_imposed" NUMERIC(11,4) NULL DEFAULT 0,
    "total_sale" NUMERIC(11,4) NULL DEFAULT 0,
    "total_pay" NUMERIC(11,4) NULL DEFAULT 0,
    "date_register" TIMESTAMP NULL DEFAULT now(),
    PRIMARY KEY ("id")
);

CREATE TABLE "itens_sale" (  
  "id" SERIAL NOT NULL ,
  "id_sale" INTEGER NOT NULL  ,
  "id_product" INTEGER NOT NULL ,
  "description" VARCHAR(255) NOT NULL ,
  "amount" INTEGER NOT NULL ,
  "price_uni" NUMERIC(11,4) NULL DEFAULT 0,
  "percentage_imposed" NUMERIC(11,4) NULL DEFAULT 0,
  "total_pay" NUMERIC(11,4) NULL DEFAULT 0,
  PRIMARY KEY ("id"),
  FOREIGN KEY ("id_product") REFERENCES "product" ("id") ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY ("id_sale") REFERENCES "sale" ("id") ON DELETE CASCADE ON UPDATE CASCADE
); 
CREATE INDEX "itens_sale_idproduct" ON "product" ("id");
CREATE INDEX "itens_sale_idsale" ON "sale" ("id");
