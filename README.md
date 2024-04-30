# DeliveBoo

## Introduzione
DeliveBoo è una web app che permette di ordinare cibo a domicilio nella città di ***. Consente agli utenti di cercare i loro cibi preferiti, preparati dai loro ristoranti di fiducia, tutto rimanendo comodamente a casa propria.

## Tipi di Utenti
Definiamo i seguenti tipi di utente che possono utilizzare DeliveBoo:
- **Utente Interessato (UI):** un utente non registrato che visita il sito.
- **Utente Registrato (UR):** un utente che ha effettuato la registrazione come ristoratore.

## Lista delle pagine
1. **Homepage:** Offre la possibilità di cliccare sulle tipologie di ristorante e, senza il refresh della pagina, ottenere una lista ristoranti con le tipologie di appartenenza sotto ogni nome.
2. **Pagina Menù Ristoratore Pubblica:** Permette di visualizzare il menù di un particolare ristoratore. È possibile scegliere i cibi desiderati e relativa quantità per inserirli nel carrello.
3. **Pagina Carrello/Checkout:** Permette di modificare le quantità dei cibi e di procedere all’ordine. È possibile acquistare solo da un ristoratore alla volta. Tramite questo pannello è possibile pagare inserendo i dettagli della carta di credito.
4. **Dashboard Utente Registrato:** Permette la gestione dei propri dati e l’inserimento dei piatti disponibili.
5. **Pagina Lista Piatti:** Da qui è possibile accedere alla modifica e cancellazione dei propri piatti. I piatti non hanno categoria e si mostrano in ordine alfabetico.
6. **Pagina Piatto:** Pagina per l’inserimento del piatto singolo con descrizione e prezzo.
7. **Pagina Lista Ordini Ricevuti:** Pagina per la visualizzazione degli ordini ricevuti.
8. **Pagina Statistiche Ordini:** Permette di visualizzare le statistiche degli ordini, come il numero di ordini per mesi/anni e l’ammontare delle vendite.

## Requisiti Tecnici
1. **(RT1) Client-side Validation:** Tutti gli input inseriti dall’utente sono controllati client-side (oltre che server-side) per un controllo di veridicità.
2. **(RT2) Sistema di Pagamento:** Il sistema di pagamento utilizzato è [Braintree](https://www.braintreepayments.com/), che permette agli sviluppatori di simulare pagamenti senza essere approvati formalmente e senza utilizzare vere carte di credito.
3. **(RT3) Il sito è responsive:** È correttamente visibile da desktop e da smartphone.
4. **(RT4) La ricerca avviene senza il refresh.**

## Requisiti Funzionali
La piattaforma soddisfa i seguenti requisiti funzionali (RF):
1. **(RF1) Permettere ai ristoratori di registrarsi alla piattaforma:** L’applicazione permette ai ristoratori di registrarsi alla piattaforma e creare un profilo.
2. **(RF2) Permettere ai ristoratori di aggiungere un piatto:** Un ristoratore ha la possibilità di inserire uno o più piatti all’interno del sistema.
3. **(RF3) Permette ai visitatori di ricercare per tipologia di ristorante:** Un utente è in grado di ricercare per uno o più tipologie di ristorante.
4. **(RF4) Permettere ai visitatori di vedere il menu di un ristoratore:** Selezionando un ristoratore, appaiono tutti i dettagli disponibili riguardanti il ristorante e i piatti disponibili.
5. **(RF5) Permettere ai UI di pagare l’ordinazione:** In questa pagina è possibile aggiornare il carrello e inserire i dati per la consegna e della carta di credito con cui processare il pagamento.
6. **(RF6) Permettere ai Ristoratori di visualizzare le statistiche degli ordini:** Un ristoratore ha la possibilità di vedere le statistiche degli ordini ricevuti.


## Installazione
Per utilizzare DeliveBoo, è necessario eseguire i seguenti passaggi:

1. Clonare il repository dal seguente link: [DeliveBoo Repository](link_al_repository)
2. Installare tutte le dipendenze eseguendo il comando `npm install`.
3. Installa composer con `composer i`.
4. Clona il file env e esegui il comando `php key:generate`.
5. Configurare le variabili d'ambiente necessarie per l'applicazione, come ad esempio l'URL del database e le chiavi di accesso ai servizi esterni.
6. Inizializzare il database eseguendo le migrazioni tramite il comando `php artisan migrate`.
7. Se necessario, eseguire il seeder per popolare il database con dati di esempio utilizzando il comando `php artisan db:seed`.
8. Avviare il server locale eseguendo il comando `php artisan serve`.
9. Accedere all'applicazione tramite il browser all'indirizzo `http://localhost:8000`.

Una volta completati questi passaggi, DeliveBoo sarà pronto per l'utilizzo.

