# MegaCar
## About:
Il sito utilizza Lumen come framework.  
XAMPP:   ```localhost:82```  
Database adattato a Lumen   ```Clienti -> Clientes```  
phpMyAdmin: gestione database  
app_Admin: simple work in progress gui per interfacciarsi col database solo per testing

## Setup:
``` php -S localhost:82 -t ./public ```   

[localhost:82/app_Admin/](localhost:82/app_Admin/)  
[localhost:82/phpMyAdmin/](localhost:82/phpMyAdmin/)

## Screen:
Interfaccia grafica ancora da creare
### Admin app:
![basic admin app](https://raw.githubusercontent.com/ObvTella/MegaCar/main/Website/Screenshot/app_AdminScreenshot.PNG)
## API:
### GET
* Visualizza tutto
	* ```api/v1/clienti/```  
	* ```api/v1/macchine/```  
	* ```api/v1/consulenti/```  

* Visualizza specifico
	* ```api/v1/clienti/id/```
	* ```api/v1/macchine/id/```
	* ```api/v1/consulenti/id/```


### POST
* Inserimento validato
	* ```api/v1/clienti/```  
	* ```api/v1/macchine/``` 
	* ```api/v1/consulenti/``` 

### PUT
* Modifica specifico
	* ```api/v1/clienti/``` 
	* ```api/v1/macchine/```  
	* ```api/v1/consulenti/```   

### DELETE
* Cancella specifico
	* ```api/v1/clienti/id/```
	* ```api/v1/macchine/id/```  
	* ```api/v1/consulenti/id/```  
	
## TODO:
* API:
	* Search function 
	* API per altre tabelle
	
* Interfaccia grafica
