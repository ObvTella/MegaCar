# Schema ER
![MegaCarER](https://user-images.githubusercontent.com/72648253/117034079-40498800-ad03-11eb-8b92-a9baf206bfbc.png)

# SQL
```
CREATE TABLE Macchine (
ID_macchina INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
targa VARCHAR(45) NOT NULL,
marca VARCHAR(45) NOT NULL,
modello VARCHAR(45) NOT NULL,
tipo VARCHAR(45) NOT NULL,
anno YEAR NOT NULL,
prezzo VARCHAR(45) NOT NULL,
descrizione_macchina VARCHAR(45) NOT NULL,
porte INT NOT NULL,
posti INT NOT NULL,
usato BOOLEAN NOT NULL);

CREATE TABLE Clienti (
username VARCHAR(45) NOT NULL PRIMARY KEY,
password VARCHAR(45) NOT NULL,
nome_cliente VARCHAR(45) NOT NULL,
cognome_cliente VARCHAR(45) NOT NULL,
patente VARCHAR(45) NOT NULL,
email_cliente VARCHAR(45) NOT NULL,
indirizzo VARCHAR(45) NOT NULL);

CREATE TABLE Consulenti (
ID_consulente INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
nome_consulente VARCHAR(45) NOT NULL,
cognome_consulente VARCHAR(45) NOT NULL,
email_consulente VARCHAR(45) NOT NULL);

CREATE TABLE Appuntamenti (
ID_appuntamento INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
consulente_appuntamento INT NOT NULL,
cliente_appuntamento VARCHAR(45) NOT NULL,
data_appuntamento DATE NOT NULL,
metodo VARCHAR(45) NOT NULL,
preventivo VARCHAR(45) NOT NULL);

CREATE TABLE Guide (
ID_guida INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
cliente_guida VARCHAR(45) NOT NULL,
veicolo_guida INT NOT NULL,
data_guida DATE NOT NULL);

CREATE TABLE Acquisti (
ID_acquisto INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
cliente_acquisto VARCHAR(45) NOT NULL,
vettura_acquisto INT NOT NULL,
colore_acquisto INT NOT NULL,
optional_acquisto INT NOT NULL,
motore_acquisto INT NOT NULL,
metodo_acquisto VARCHAR(45) NOT NULL,
prezzo_acquisto VARCHAR(45) NOT NULL,
data_acquisto DATE NOT NULL);

CREATE TABLE Colori (
ID_colore INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
colore VARCHAR(45) NOT NULL);

CREATE TABLE Optionals (
ID_optional INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
optional VARCHAR(45) NOT NULL);

CREATE TABLE Motori (
ID_motore INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
motore VARCHAR(45) NOT NULL,
cavalli INT NOT NULL,
cc VARCHAR(45) NOT NULL,
carburante VARCHAR(45) NOT NULL,
cambio VARCHAR(45) NOT NULL,
classe_emissioni INT NOT NULL);

CREATE TABLE Macchine_Motori (
ID_macchina_motore INT NOT NULL PRIMARY KEY,
ID_macchina INT NOT NULL,
ID_motore INT NOT NULL);

CREATE TABLE Macchine_Optionals (
ID_macchina_optional INT NOT NULL PRIMARY KEY,
ID_macchina INT NOT NULL,
ID_optional INT NOT NULL);

CREATE TABLE Macchine_Colori (
ID_macchina_colore INT NOT NULL PRIMARY KEY,
ID_macchina INT NOT NULL,
ID_colore INT NOT NULL);

CREATE TABLE Dettagli_Usato (
ID_dettaglio_usato INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
ID_macchina INT NOT NULL,
proprietari INT NOT NULL,
km FLOAT NOT NULL);

ALTER TABLE Appuntamenti ADD FOREIGN KEY (consulente_appuntamento) REFERENCES Consulenti(ID_consulente);
ALTER TABLE Appuntamenti ADD FOREIGN KEY (cliente_appuntamento) REFERENCES Clienti(username);
ALTER TABLE Guide ADD FOREIGN KEY (cliente_guida) REFERENCES Clienti(username);
ALTER TABLE Guide ADD FOREIGN KEY (veicolo_guida) REFERENCES Macchine(ID_macchina);
ALTER TABLE Acquisti ADD FOREIGN KEY (cliente_acquisto) REFERENCES Clienti(username);
ALTER TABLE Acquisti ADD FOREIGN KEY (vettura_acquisto) REFERENCES Macchine(ID_macchina);
ALTER TABLE Acquisti ADD FOREIGN KEY (colore_acquisto) REFERENCES Macchine_Colori(ID_macchina_colore);
ALTER TABLE Acquisti ADD FOREIGN KEY (optional_acquisto) REFERENCES Macchine_Optionals(ID_macchina_optional);
ALTER TABLE Acquisti ADD FOREIGN KEY (motore_acquisto) REFERENCES Macchine_Motori(ID_macchina_motore);
ALTER TABLE Macchine_Motori ADD FOREIGN KEY (ID_macchina) REFERENCES Macchine(ID_macchina);
ALTER TABLE Macchine_Motori ADD FOREIGN KEY (ID_motore) REFERENCES Motori(ID_motore);
ALTER TABLE Macchine_Optionals ADD FOREIGN KEY (ID_macchina) REFERENCES Macchine(ID_macchina);
ALTER TABLE Macchine_Optionals ADD FOREIGN KEY (ID_optional) REFERENCES Optionals(ID_optional);
ALTER TABLE Macchine_Colori ADD FOREIGN KEY (ID_macchina) REFERENCES Macchine(ID_macchina);
ALTER TABLE Macchine_Colori ADD FOREIGN KEY (ID_colore) REFERENCES Colori(ID_colore);
ALTER TABLE Dettagli_Usato ADD FOREIGN KEY (ID_macchina) REFERENCES Macchine(ID_macchina);
```