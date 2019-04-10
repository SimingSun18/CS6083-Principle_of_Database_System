create database parking_lot_schema;
use parking_lot_schema;

create view brooklyn_parking as 
select user_id, valet_id, license_plate, enter_time, exit_time, total 
from records, parking_lots
where records.parking_id = parking_lots.id
and parking_lots.name like "%Brooklyn%";

create view brooklyn_user as 
select users.name, valet_id, license_plate, enter_time, exit_time, total 
from records, parking_lots, users
where records.parking_id = parking_lots.id
and records.user_id = users.id
and parking_lots.name like "%Brooklyn%";

create view records_all_name as 
select records.id, users.id as user_id, users.name as user_name, valets.name as valet_name, 
parking_lots.name as parking_name, license_plate, enter_time, exit_time, total
from users, valets, records, parking_lots
where users.id = records.user_id
and valets.id = records.valet_id
and parking_lots.id = records.parking_id;
-- P1-1
show table status where comment='view' and name like "%brooklyn%";

select * from records_all_name where license_plate like '%ZH%';

select user_name, valet_name, parking_name, license_plate, enter_time, exit_time, total
from records_all_name
where user_id = 1;


 

