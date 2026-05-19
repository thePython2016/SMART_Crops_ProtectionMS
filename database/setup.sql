-- PostgreSQL schema for the crops CRMS application (matches PHP column names)

DROP TABLE IF EXISTS message_sent CASCADE;
DROP TABLE IF EXISTS sentsms CASCADE;
DROP TABLE IF EXISTS agroinputs CASCADE;
DROP TABLE IF EXISTS agroofficers CASCADE;
DROP TABLE IF EXISTS farmers CASCADE;
DROP TABLE IF EXISTS "user" CASCADE;

CREATE TABLE "user" (
    username VARCHAR(60) PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    level INTEGER NOT NULL
);

CREATE TABLE farmers (
    "mobileNumber" VARCHAR(20) PRIMARY KEY,
    email VARCHAR(100),
    fname VARCHAR(50),
    mname VARCHAR(50),
    lname VARCHAR(50),
    gender VARCHAR(20),
    "birthDay" VARCHAR(10),
    "birthMonth" VARCHAR(10),
    "birthYear" VARCHAR(10),
    region VARCHAR(100)
);

CREATE TABLE agroofficers (
    "mobileNumber" VARCHAR(20) PRIMARY KEY,
    occupation VARCHAR(100),
    fname VARCHAR(50),
    mname VARCHAR(50),
    lname VARCHAR(50),
    gender VARCHAR(20),
    "birthDay" VARCHAR(10),
    "birthMonth" VARCHAR(10),
    "birthYear" VARCHAR(10),
    address VARCHAR(150)
);

CREATE TABLE agroinputs (
    "inputsNumber" VARCHAR(50) PRIMARY KEY,
    name VARCHAR(150),
    category VARCHAR(100),
    usage_ TEXT
);

CREATE TABLE sentsms (
    id VARCHAR(50) PRIMARY KEY,
    date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    sender_name VARCHAR(100),
    receiver_name TEXT,
    subject VARCHAR(255),
    message TEXT
);

CREATE TABLE message_sent (
    id VARCHAR(50) PRIMARY KEY,
    date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    sender_name VARCHAR(100),
    receiver_name VARCHAR(100),
    subject VARCHAR(255),
    message TEXT
);

INSERT INTO "user" (username, password, level) VALUES
    ('admin', 'admin123', 1),
    ('Farmer', 'farmer123', 2),
    ('Agronomist', 'agro123', 3)
ON CONFLICT (username) DO UPDATE
SET password = EXCLUDED.password,
    level = EXCLUDED.level;
