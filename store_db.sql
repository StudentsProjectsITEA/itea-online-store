CREATE TABLE "user" (
	"id" UUID PRIMARY KEY,
	"username" VARCHAR(255) NOT NULL UNIQUE,
	"first_name" VARCHAR(255) NOT NULL,
	"last_name" VARCHAR(255) NOT NULL,
	"mobile" BIGINT NOT NULL UNIQUE,
	"email" VARCHAR(255) NOT NULL UNIQUE,
	"auth_key" VARCHAR(32) NOT NULL,
	"password_hash" VARCHAR(255) NOT NULL,
	"password_reset_token" VARCHAR(255) UNIQUE,
	"status" SMALLINT NOT NULL DEFAULT 10,
	"created_time" INTEGER NOT NULL,
	"updated_time" INTEGER NOT NULL
);

CREATE TABLE "category" (
	"id" UUID PRIMARY KEY,
	"title" VARCHAR(255) NOT NULL UNIQUE,
	"description" TEXT,
	"parent_id" INTEGER NOT NULL,
	"depth" INTEGER NOT NULL
);

CREATE TABLE "brand" (
	"id" UUID PRIMARY KEY,
	"title" VARCHAR(255) NOT NULL UNIQUE,
	"description" TEXT
);

CREATE TABLE "product" (
	"id" UUID PRIMARY KEY,
	"title" VARCHAR(255) NOT NULL UNIQUE,
	"description" TEXT NOT NULL,
	"category_id" UUID NOT NULL,
	"brand_id" UUID NOT NULL,
	"quantity" INTEGER NOT NULL,
	"price" INTEGER NOT NULL,
	"main_photo" VARCHAR(255) NOT NULL,
	"is_deleted" BOOLEAN NOT NULL,
	"created_time" INTEGER NOT NULL,
	"updated_time" INTEGER NOT NULL,
	FOREIGN KEY (category_id) REFERENCES "category" (id),
	FOREIGN KEY (brand_id) REFERENCES "brand" (id)
);

CREATE TABLE "param" (
	"id" UUID PRIMARY KEY,
	"title" VARCHAR(255) NOT NULL UNIQUE,
	"description" TEXT,
	"type" VARCHAR(255) NOT NULL,
	"is_required" BOOLEAN NOT NULL
);

CREATE TABLE "product_param" (
	"product_id" UUID NOT NULL,
	"param_id" UUID NOT NULL,
	FOREIGN KEY (product_id) REFERENCES "product" (id),
	FOREIGN KEY (param_id) REFERENCES "param" (id)
);

CREATE TABLE "category_param" (
	"category_id" UUID NOT NULL,
	"param_id" UUID NOT NULL,
	FOREIGN KEY (category_id) REFERENCES "category" (id),
	FOREIGN KEY (param_id) REFERENCES "param" (id)
);

CREATE TABLE "order" (
	"id" UUID PRIMARY KEY,
	"user_id" UUID NOT NULL,
	"status_id" INTEGER NOT NULL,
	"payment_id" INTEGER NOT NULL,
	"shipping_id" INTEGER NOT NULL,
	"shipping_address" VARCHAR(255) NOT NULL,
	"created_time" INTEGER NOT NULL,
	"updated_time" INTEGER NOT NULL,
	FOREIGN KEY (user_id) REFERENCES "user" (id)
);

CREATE TABLE "product_order" (
	"id" UUID PRIMARY KEY,
	"product_id" UUID NOT NULL,
	"order_id" UUID NOT NULL,
	"quantity" INTEGER NOT NULL,
	"discount" INTEGER,
	FOREIGN KEY (product_id) REFERENCES "product" (id),
	FOREIGN KEY (order_id) REFERENCES "order" (id)
);

CREATE TABLE "photo" (
	"id" UUID PRIMARY KEY,
	"product_id" UUID NOT NULL,
	"is_main" BOOLEAN NOT NULL,
	"created_time" INTEGER NOT NULL,
	FOREIGN KEY (product_id) REFERENCES "product" (id)
);

CREATE TABLE "admin" (
	"id" UUID PRIMARY KEY,
	"username" VARCHAR(255) NOT NULL UNIQUE,
	"email" VARCHAR(255) NOT NULL UNIQUE,
	"auth_key" VARCHAR(32) NOT NULL,
	"password_hash" VARCHAR(255) NOT NULL,
	"password_reset_token" VARCHAR(255) UNIQUE,
	"status" SMALLINT NOT NULL DEFAULT 10,
	"created_time" INTEGER NOT NULL,
	"updated_time" INTEGER NOT NULL
);

CREATE TABLE "cart" (
	"id" UUID PRIMARY KEY,
	"user_id" UUID NOT NULL,
	"product_id" UUID NOT NULL,
	"quantity" INTEGER NOT NULL
);

CREATE TABLE "comment" (
	"id" UUID PRIMARY KEY,
	"product_id" UUID NOT NULL,
	"user_id" UUID NOT NULL,
	"rating" INTEGER NOT NULL,
	"message" TEXT NOT NULL
);
