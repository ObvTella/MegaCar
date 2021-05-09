# MegaCar
## About:
Il sito utilizza Lumen come framework.  
XAMPP:   ```localhost:82```  
Database adattato a Lumen   ```Clienti -> Clientes```  
phpMyAdmin: gestione database  
app_Admin: simple work in progress gui per interfacciarsi col database

## Setup
``` php -S localhost:82 -t ./public ```   

[localhost:82/app_Admin/](localhost:82/app_Admin/)  
[localhost:82/phpMyAdmin/](localhost:82/phpMyAdmin/)

## Screen:
Interfaccia grafica ancora da creare

## API:
### GET
* api/v1/clienti/
	```
	Visualizza cliente:
	- id
	- username
	- password
	- nome_cliente
	- cognome_cliente
	- email_cliente
	- indirizzo
	- created_at
	```
* api/v1/clienti/id/
	```
	Visualizza cliente specifico:
	- id
	- username
	- password
	- nome_cliente
	- cognome_cliente
	- email_cliente
	- indirizzo
	- created_at
	```
### POST
* api/v1/clienti/  
	```
	Inserisce cliente:
	- username
	- password
	- nome_cliente
	- cognome_cliente
	- email_cliente
	- indirizzo
	```
### PUT
* api/v1/clienti/  
	```
	Modifica il cliente con l'id del messaggio
	- id
	- username
	- password
	- nome_cliente
	- cognome_cliente
	- email_cliente
	- indirizzo
	```
### DELETE
* api/v1/clienti/id/  
	```
	Cancella cliente con id inserito
	```
	
## TODO:
* API:
	* API per altre tabelle
	
* Interfaccia grafica