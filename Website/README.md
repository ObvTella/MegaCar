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
* Login sicuro
	* ```api/welcome/login/```  
* Register validato
	* ```api/welcome/register/```  
* Aggiorna a superuser (protetta)
	* ```api/secure/clienti/{id}```  

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
	
## TOKEN
* ```api/secure/clienti/{id}```  crea automaticamente un token usando una funzione di hash su un valore generato casualmente  
* ```api/secure/login/```  aggiorna nello stesso modo il token ad ogni login se auth_level = 1
* Solo chi ha auth_level = 1 ha un api_token per svolgere funzioni protette (da superuser)

[Definire la policy dei token]
	
## TODO:
* API:
	* Search function 
	* API per altre tabelle
	
* Interfaccia grafica
