DROP TABLE users;

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

