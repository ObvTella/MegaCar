![MegaCarInfrastruttura](https://raw.githubusercontent.com/ObvTella/MegaCar/main/Packet%20Tracer/packet%20tracer.PNG)

# Descrizione:
L’autosalone ha 4 stanze per i consulenti, con i relativi terminali, un servizio WiFi riservato ai dipendenti ed una rete WiFi per i clienti in visita. 

## PIANO INDIRIZZI
### Switch Consulenti
|  | _**Switch Consulenti**_ | 8 Dispositivi |  |
|:-- | :-: | :-: | :-: |
|**Rete:**| 192.168.1.0 | **/28** | 255.255.255.240|
|**Gateway:**| 192.168.1.1 |
|**Range:**| 192.168.1.2 | 192.168.1.14 | MAX: 14 host|
|**Broadcast**| 192.168.1.15 |

### Switch Clienti
|  | _**Switch Clienti**_ | 50 Dispositivi |  |
|:-- | :-: | :-: | :-: |
|**Rete:**| 192.168.2.0 | **/26** | 255.255.255.192|
|**Gateway:**| 192.168.2.1 |
|**Range:**| 192.168.2.2 | 192.168.2.62 | MAX: 62 host|
|**Broadcast**| 192.168.2.63 |

## Packet tracer setup
### Router:
  ```
  >enable
  >config terminal
  ```
* Switch Consulenti
  ```
  >interface fastethernet0/0
  >ip address 192.168.1.1 255.255.255.240
  >no shutdown
  ```
* Switch Clienti
  ```
  >interface fastethernet6/0
  >ip address 192.168.2.1 255.255.255.192
  >no shutdown
  ```
### DHCP Server:
Services > DHCP
  
   * Service: ON
   * Pool Name : ``` serverPoolConsulenti ``` / ``` serverPoolClienti ```
   * Default Gateway : ``` 192.168.1.1 ``` / ``` 192.168.2.1 ```
   * Start IP address: ``` 192.168.1.2 ``` / ``` 192.168.2.2 ```
   * Subnet mask: ``` 255.255.255.240 ``` / ```255.255.255.192 ```
   * Maximum Number of Users: ``` 14 ``` / ``` 62 ```

### Internet:
Si tratta ovviamente di una simulazione teorica di Internet
  ```
  >interface serial2/0
  >ip address 20.0.0.1 255.0.0.0
  >no shutdown
  ```
## Riconoscimento auto
Tramite l'uso delle Beacon Bluetooth l'utente avvicinandosi alla macchina interessata,
connettendosi tramite bluetooth al dispositivo avra' in output 
il link alla pagina contenente le informazioni dell'auto interessata.

Il beacon bluetooth e' un trasmettitore hardware a basso consumo (Buetooth Low Eenergy) che comunica
in broadcast bluetooth il suo ID che viene usato da un'app compatibile per fare determinate azioni, in questo caso
rendirizzarci alla pagina web della macchina interessata

## Motivazioni:
Usiamo un router [inserisci modello] per gestire le due LAN (Clienti e Consulenti)
Le lan sono definite da due switch [inserisci modello], connessi tramite Ethernet [802.3], alla quale vengono connessi due server DHCP che gestiscono la configurazione degli ip automaticamente. Ad ogni switch viene connesso un access point [inserisci modello] capace di coprire [inserisci metri: 500?] che servono a dividere le due reti wifi (pubblica e privata) che usano il protocollo [802.11a].
La rete pubblica è aperta, quindi priva di password.
La rete privata invece utilizza il protocollo di autenticazione WPA2-PSK con crittografia AES per garantire un accesso sicuro alla rete utilizzata dai dipendenti.
Ogni computer dedicato ai dipendenti offre un login sicuro tramite una buona policy di sicurezza sulle password (8+ caratteri, segni speciali, cambiata periodicamente) e un'autorizzazione a due fattori
Il sito web, dove è possibile visionarie il catalogo delle auto in vendita, viene ospitato su un servizio di hosting esterno [aruba?].

Per garantire la sicurezza vengono sfruttati:
* i protocolli di connessione crittografata quali HTTPS e FTPS (basati su SSL/TLS) 
* la sanificazione degli ingressi
* la convalida dei dati 
* l'escape delle uscite

Questo assicura l'inefficacia di:
* Cross-site scripting (XSS)
* SQL Injection
* CSRF/XSRF
* Session hijacking
* Code injection
* Spoofing / Sniffing 

Per assicurare la resilienza a guasti e malfunzionamenti delle applicazioni e le relative tecnologie viene:
* Raccomandato l'utilizzo di una regolare manutenzione da parte di un esperto
* Backup regolari
* Ridondanza dei sistemi
* Calcolo dei rischi
* Antivirus software
* Gestione autorizzazione file
* Riconoscimento e Autenticazione
* [Inserisci metodi di manutenzione]

## TO DO

* Firewall 
* Forse vlan?
