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

create table if not exists plates (
  id bigint(20) UNSIGNED NOT NULL,
  plate varchar(7) NOT NULL,
  applicant text NOT NULL,
  type text NOT NULL,
  value decimal(8,2) NOT NULL,
  paymentMethod varchar(25) NOT NULL,
  date date NOT NULL
)