# MegaCar
## About:
Il sito utilizza Lumen come framework.  
XAMPP:   ```localhost:82```  
Database adattato a Lumen   ```Clienti -> Clientes```  
phpMyAdmin: gestione database  
app_Admin: simple work in progress gui per interfacciarsi col database

## Screen:
Interfaccia grafica ancora da creare

## API:
### GET
* api/v1/clienti
	```
	Visualizza cliente:
	- username
	- password
	- nome_cliente
	- cognome_cliente
	- email_cliente
	- indirizzo
	```
### POST
* api/v1/clienti  
	```
	Inserisce cliente:
	- username
	- password
	- nome_cliente
	- cognome_cliente
	- email_cliente
	- indirizzo
	```
### DELETE
* api/v1/clienti/username  
	```
	Cancella cliente con username inserito
	```
	
## TODO:
* API:
	* 1 cliente alla volta
	* modifica dei valori
	* API per altre tabelle
	
* Interfaccia grafica