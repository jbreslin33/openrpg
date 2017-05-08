--users
insert into users (username,password) values ('jbreslin','Iggles_13');

--race
insert into race (name) values ('human');
insert into race (name) values ('kobold');

insert into class (name) values ('fighter');

--characters
insert into characters (name,user_id,race_id,class_id,x,y,z,d,full_hitpoints,current_hitpoints,level,experience) values ('Julius',1,1,1,0,0,0,0,13,13,1,0);

--monsters
insert into characters (race_id,x,y,z,d,full_hitpoints,current_hitpoints,level,experience) values (2,2,0,0,0,3,3,1,0);


