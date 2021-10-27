DELIMITER //
CREATE TRIGGER salary_id 
    BEFORE insert ON employee_details
    FOR EACH ROW 
BEGIN
if new.employee_position ='cleaner' then
set new.salary_id ='4';
  else if new.employee_position = 'marketer' then
set new.salary_id = '1';
 else if new.employee_position = 'accountant' then
set new.salary_id = '3';
else set new.salary_id = '2';
end if;
end if;
end if;
END//