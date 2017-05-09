select characters.id, characters.name as name, race.name as race, class.name as class, full_hitpoints, current_hitpoints, level, experience from characters JOIN race on race.id=characters.race_id JOIN class on class.id=characters.class_id where user_id = 1 order by name asc; 
