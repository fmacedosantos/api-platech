create database if not exists platech;

use platech;

create table if not exists plates (
	id serial primary key,
    plate varchar(7) not null unique,
    applicant text not null,
    type text not null,
    value decimal(8, 2) not null,
    paymentMethod varchar(25) not null,
    date date not null
);

create table if not exists users (
	id SERIAL PRIMARY KEY,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

create table if not exists clients (
    id serial primary key,
    applicant text not null,
    company text not null,
    phone varchar(15) not null unique,
    registerType varchar(25) not null,
    priceCar decimal(8, 2) not null,
    priceMotorcycle decimal(8, 2) not null
) 