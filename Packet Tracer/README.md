![MegaCarInfrastruttura](https://raw.githubusercontent.com/ObvTella/MegaCar/main/Packet%20Tracer/packet%20tracer.PNG)

# Descrizione:
L’autosalone ha 4 stanze per i consulenti, con i relativi terminali, un servizio WiFi riservato ai dipendenti ed una rete WiFi per i clienti in visita. 

# PIANO INDIRIZZI
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

### Motivazioni:
Usiamo un router [inserisci modello] per gestire le due LAN {Clienti e Consulenti}
Le lan sono definite da due switch [inserisci modello], connessi tramite Ethernet, alla quale vengono connessi due server DHCP che gestiscono la configurazione degli ip automaticamente. Ad ogni switch viene connesso un access point [inserisci modello] capace di coprire [inserisci metri: 500?] che servono a dividere le due reti wifi {pubblica e privata} che usano il protocollo [802.11ax].
La rete pubblica è aperta, quindi priva di password.
La rete privata invece utilizza il protocollo di autenticazione WPA2-PSK con crittografia AES per garantire un accesso sicuro alla rete utilizzata dai dipendenti.
Il sito web, dove è possibile visionarie il catalogo delle auto in vendita, viene ospitato su un servizio di hosting esterno [aruba?].

Per garantire la sicurezza vengono sfruttati:
* i protocolli di connessione crittografata quali HTTPS, FTPS e TLSS
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

Per assicurare la resilienza a guasti e malfunzionamenti delle applicazioni e le relative tecnologie viene, invece, raccomandato l'utilizzo di una regolare manutenzione da parte di un esperto. [Inserisci metodi di manutenzione]

# TO DO
Dalla rete interna, con un dispositivo mobile, in prossimità di una vettura, consulenti e clienti potranno visualizzare maggiori informazioni relative alla vettura stessa. 
