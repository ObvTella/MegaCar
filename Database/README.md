# Schema ER
![MegaCarER](https://raw.githubusercontent.com/ObvTella/MegaCar/main/Database/MegaCarER.png)
# SQL
```
CREATE TABLE Macchine (
ID_macchina INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
targa VARCHAR(45) NOT NULL,
marca VARCHAR(45) NOT NULL,
modello VARCHAR(45) NOT NULL,
tipo VARCHAR(45) NOT NULL,
anno YEAR NOT NULL,
prezzo FLOAT NOT NULL,
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
ora_appuntamento TIME NOT NULL,
metodo VARCHAR(45) NOT NULL,
preventivo VARCHAR(45));

CREATE TABLE Guide (
ID_guida INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
cliente_guida VARCHAR(45) NOT NULL,
veicolo_guida INT NOT NULL,
data_guida DATE NOT NULL,
ora_guida TIME NOT NULL);

CREATE TABLE Acquisti (
ID_acquisto INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
cliente_acquisto VARCHAR(45) NOT NULL,
vettura_acquisto INT NOT NULL,
colore_acquisto INT NOT NULL,
optional_acquisto INT NOT NULL,
motore_acquisto INT NOT NULL,
metodo_acquisto VARCHAR(45) NOT NULL,
prezzo_acquisto FLOAT NOT NULL,
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
cc FLOAT NOT NULL,
carburante VARCHAR(45) NOT NULL,
cambio VARCHAR(45) NOT NULL,
classe_emissioni VARCHAR(45) NOT NULL);

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
# Query
- Elenco degli appuntamenti di un certo consulente schedulati per la data odierna
```
SELECT A.ID_appuntamento, A.cliente_appuntamento, A.metodo, A.ora_appuntamento
FROM Appuntamenti AS A, Consulenti AS C
WHERE C.ID_consulente = ? AND C.ID_consulente = A.consulente_appuntamento AND A.data_appuntamento = getdate()
GROUP BY A.ID_appuntamento
```
- Numero delle auto di costo superiore ai 25000 euro vendute il mese scorso
```
SELECT M.ID_macchina, M.marca, M.modello, M.targa, A.prezzo_acquisto
FROM Macchine AS M, Acquisti AS A
WHERE M.ID_macchina = A.vettura_acquisto AND A.prezzo_acquisto > 25000 AND DATEPART(m, data_acquisto) = DATEPART(m, DATEADD(m, -1, getdate())) AND DATEPART(yyyy, data_acquisto) = DATEPART(yyyy, DATEADD(m, -1, getdate()))
GROUP BY M.ID_macchina
```
