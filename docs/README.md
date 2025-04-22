# Modulo Xot

## 🎯 Perché Xot?

Xot è il modulo core del framework che fornisce le funzionalità fondamentali e le astrazioni necessarie per l'architettura modulare. È stato creato per:

- Standardizzare lo sviluppo dei moduli
- Fornire utilities e helper comuni
- Implementare pattern architetturali consistenti
- Gestire l'interoperabilità tra moduli

## 📋 Funzionalità Principali

### Service Provider Base
- Perché: Standardizzazione della registrazione dei moduli
- Cosa: `XotBaseServiceProvider` fornisce l'infrastruttura per il caricamento dei moduli

### Data Transfer Objects
- Perché: Tipizzazione forte e validazione dei dati
- Cosa: Implementazione di Spatie Data per la gestione type-safe dei DTO

### Actions
- Perché: Logica di business atomica e testabile
- Cosa: Pattern Action implementato con Spatie QueueableAction

## 🔗 Dipendenze Chiave

- Spatie Laravel Data
- Spatie QueueableAction
- Laravel Framework

## 📚 Guide

- [[guides/creating-module.md|Creare un Nuovo Modulo]]
- [[guides/implementing-actions.md|Implementare Actions]]
- [[guides/data-transfer-objects.md|Lavorare con i DTO]]

## 🏗 Architettura

- [[architecture/service-provider.md|Service Provider]]
- [[architecture/actions.md|Actions Pattern]]
- [[architecture/data-objects.md|Data Objects]]

## 🧪 Testing

- [[testing/unit-tests.md|Unit Testing]]
- [[testing/feature-tests.md|Feature Testing]]
- [[testing/test-data.md|Test Data Factories]]

## 📈 Performance

- [[performance/caching.md|Strategie di Caching]]
- [[performance/optimization.md|Ottimizzazioni]]

## 🔒 Sicurezza

- [[security/validation.md|Validazione Input]]
- [[security/authorization.md|Autorizzazioni]]

## 📝 Note di Sviluppo

### Convenzioni
- Usa sempre type hints
- Implementa interfacce per i contratti
- Documenta le eccezioni
- Segui il principio SOLID

### Best Practices
- Preferisci DTO a array associativi
- Usa Actions per logica di business
- Implementa test per ogni feature
- Mantieni la documentazione aggiornata

## 🔄 Changelog

Vedi [[changelog.md|CHANGELOG]] per la storia completa delle modifiche.

## 🤝 Contribuire

Vedi [[contributing.md|CONTRIBUTING]] per le linee guida sulla contribuzione.

## Panoramica
Il modulo Xot fornisce le funzionalità base e le utilities utilizzate da tutti gli altri moduli dell'applicazione.

## Componenti Principali

### XotBaseResource
Classe base per tutte le risorse Filament. Gestisce:
- Navigazione automatica
- Traduzioni
- Permessi base
- Configurazioni comuni

### XotBasePage
Classe base per tutte le pagine Filament. Fornisce:
- Layout standard
- Gestione permessi
- Integrazione con il sistema di traduzioni
- Funzionalità comuni

### XotBaseModel
Modello base con funzionalità comuni:
- Soft delete
- Timestamp automatici
- Relazioni standard
- Metodi utility

## Servizi

### LangService
Gestisce le traduzioni dell'applicazione:
- Caricamento automatico
- Fallback configurabile
- Cache delle traduzioni
- Supporto per più lingue

### PermissionService
Gestisce i permessi dell'applicazione:
- Controllo accessi
- Ruoli e capacità
- Cache dei permessi
- Integrazione con Gate

## Traits

### HasPermissions
Trait per la gestione dei permessi nei modelli:
- Verifica permessi
- Assegnazione ruoli
- Sincronizzazione permessi

### HasTranslations
Trait per la gestione delle traduzioni nei modelli:
- Campi traducibili
- Fallback automatico
- Cache delle traduzioni

## Configurazione
Il modulo è configurabile tramite:
- `config/xot.php`
- Environment variables
- Service providers

## Best Practices
1. Estendere sempre le classi base appropriate
2. Utilizzare i traits forniti
3. Seguire le convenzioni di naming
4. Mantenere la documentazione aggiornata

## Directory Principali
- `Abstracts/`: Classi base e interfacce
- `Helpers/`: Utility globali
- `Http/`: Middleware e controller base
- `config/`: Configurazioni condivise

## Funzionalità Chiave
1. **Helper Globali**
   - Manipolazione stringhe/array
   - Utility date e tempi
   - Helper database
   - Funzioni sicurezza

2. **Astrazioni Base**
   - Interfacce comuni
   - Classi base per modelli/controller
   - Trait riutilizzabili

3. **Quality Assurance**
   - PHP Insights
   - PHPStan
   - PHPMD
   - Psalm
   - Rector
   - PHP CS Fixer

## Utilizzo
1. Estendere le classi base per nuovi modelli/controller
2. Utilizzare gli helper per funzionalità comuni
3. Seguire gli standard di codice definiti

## Documentazione Dettagliata
- `/docs/filament/`: Integrazione Filament
- `/docs/model/`: Gestione modelli
- `/docs/service/`: Servizi disponibili
- `/docs/activity/`: Sistema di logging

## Documentazione PHPStan

- [Linee Guida PHPStan Livello 10](./PHPStan/LEVEL10_LINEE_GUIDA.md) - Linee guida dettagliate per rispettare le regole di PHPStan a livello 10

## Documentazione Filament

- [Linee Guida per getInfolistSchema](./filament/INFOLIST_SCHEMA_GUIDELINES.md) - Guida completa per l'implementazione corretta del metodo getInfolistSchema, con focus sull'uso delle chiavi stringa negli array 