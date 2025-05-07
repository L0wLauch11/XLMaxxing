CREATE TABLE IF NOT EXISTS "xlfiles" (
	"id"	INTEGER NOT NULL,
	"name"	TEXT NOT NULL,
	"description"	TEXT,
	"supported_software"	INTEGER,
	"language"	VARCHAR(2) NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);