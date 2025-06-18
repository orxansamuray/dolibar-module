CREATE TABLE IF NOT EXISTS llx_az_employee (
    rowid INTEGER AUTO_INCREMENT PRIMARY KEY,
    ref VARCHAR(50),
    lastname VARCHAR(50),
    firstname VARCHAR(50),
    position VARCHAR(100),
    salary DOUBLE,
    active TINYINT DEFAULT 1
);

CREATE TABLE IF NOT EXISTS llx_az_payroll (
    rowid INTEGER AUTO_INCREMENT PRIMARY KEY,
    fk_employee INTEGER,
    pay_date DATE,
    gross DOUBLE,
    income_tax DOUBLE,
    dsmf DOUBLE,
    net DOUBLE
);

CREATE TABLE IF NOT EXISTS llx_az_taxconfig (
    rowid INTEGER AUTO_INCREMENT PRIMARY KEY,
    income_tax_rate DOUBLE,
    dsmf_rate DOUBLE
);
