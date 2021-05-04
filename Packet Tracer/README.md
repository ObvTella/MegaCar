![MegaCarInfrastruttura](https://raw.githubusercontent.com/ObvTella/MegaCar/main/Packet%20Tracer/packet%20tracer.PNG)

# Descrizione:
L’autosalone ha 4 stanze per i consulenti, con i relativi terminali, un servizio WiFi riservato ai dipendenti ed una rete WiFi per i clienti in visita. 

# ROUTING
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

# TO DO
Dalla rete interna, con un dispositivo mobile, in prossimità di una vettura, consulenti e clienti potranno visualizzare maggiori informazioni relative alla vettura stessa. 
