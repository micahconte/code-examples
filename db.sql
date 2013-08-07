CREATE TABLE employee_info (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(64),
    email1 VARCHAR(64),
    email2 VARCHAR(64),
    password VARCHAR(14),
    company_name VARCHAR(128),
    company_phone VARCHAR(12),
    company_address VARCHAR(128),
    job_title CHAR(64),
    salary VARCHAR(10),
    permission_level CHAR(32),
    is_permission_level_active ENUM('true','false'),
    start_date DATE
);
