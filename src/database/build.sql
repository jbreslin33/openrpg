DROP TABLE users;
DROP TABLE parties_characters;
DROP TABLE characters;
DROP TABLE parties;

--USERS
CREATE TABLE users (
        id SERIAL,
        username text UNIQUE,
        password text,
        first_name text,
        last_name text,
	email text,
        banned_id integer NOT NULL default 0,
        PRIMARY KEY (id)
);

--PARTIES
CREATE TABLE parties (
        id SERIAL,
        name text UNIQUE,
        x integer,
        y integer,
        z integer,
        d integer,
        PRIMARY KEY (id)
);

--CHARACTERS
CREATE TABLE characters (
        id SERIAL,
        name text UNIQUE,
	x integer, 
	y integer, 
	z integer, 
	d integer, 
	full_hitpoints integer, 
	current_hitpoints integer, 
	level integer, 
	experience integer, 
	party_id integer,
        PRIMARY KEY (id),
	FOREIGN KEY (party_id) REFERENCES parties(id)

);

--PARTIES_CHARACTERS
CREATE TABLE parties_characters (
        id SERIAL,
	party_id integer,
	character_id integer,
        PRIMARY KEY (id),
	FOREIGN KEY (party_id) REFERENCES parties(id),
	FOREIGN KEY (character_id) REFERENCES characters(id)
);



