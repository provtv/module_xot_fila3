# Gestione della Documentazione e delle Regole

## Struttura della Documentazione

La documentazione del progetto è organizzata in modo gerarchico:

```
base_predict_fila3_mono/
├── docs/                           # Documentazione globale del progetto
│   ├── ARCHITECTURE.md            # Architettura generale
│   ├── MODULES.md                 # Panoramica dei moduli
│   ├── PHPSTAN_WORKFLOW.md        # Workflow analisi PHPStan
│   └── ...
├── Modules/
│   ├── ModuleA/
│   │   └── docs/                  # Documentazione specifica del modulo
│   └── ModuleB/
│       └── docs/                  # Documentazione specifica del modulo
├── .cursor/
│   └── rules/                     # Regole per Cursor AI
└── .windsurfrules                 # Regole per Windsurf
```

## Gestione delle Regole

### 1. Livelli di Documentazione

- **Documentazione Globale** (`/docs/`)
  - Contiene le linee guida generali
  - Descrive l'architettura del sistema
  - Definisce i pattern comuni
  - Stabilisce le convenzioni di base

- **Documentazione dei Moduli** (`Modules/[ModuleName]/docs/`)
  - Specifica per ogni modulo
  - Contiene regole e pattern specifici
  - Documenta casi d'uso particolari
  - Mantiene esempi specifici del modulo

- **Regole AI** (`.cursor/rules/`)
  - Regole per l'assistente AI
  - Pattern di codice importanti
  - Convenzioni specifiche del progetto
  - Esempi di implementazione

- **Regole Windsurf** (`.windsurfrules`)
  - Regole per il framework Windsurf
  - Configurazioni specifiche
  - Best practices

### 2. Processo di Aggiornamento

Quando si identifica una nuova regola o pattern importante:

1. **Analisi dell'Impatto**
   - Determinare se la regola è specifica per un modulo o globale
   - Valutare l'impatto su altri moduli
   - Identificare le dipendenze

2. **Aggiornamento Documentazione**
   - Se regola specifica del modulo:
     1. Aggiornare `Modules/[ModuleName]/docs/`
     2. Se rilevante, aggiungere riferimento in `/docs/`

   - Se regola globale:
     1. Aggiornare `/docs/`
     2. Aggiornare la documentazione dei moduli interessati

3. **Aggiornamento Regole AI**
   - Aggiungere in `.cursor/rules/`
   - Fornire esempi concreti
   - Specificare contesto di applicazione

4. **Aggiornamento Windsurf**
   - Aggiornare `.windsurfrules`
   - Mantenere coerenza con altre documentazioni

### 3. Best Practices

1. **Coerenza**
   - Mantenere uniformità tra le diverse documentazioni
   - Usare la stessa terminologia
   - Riferimenti incrociati tra documenti

2. **Aggiornamenti**
   - Aggiornare in tempo reale
   - Rimuovere documentazione obsoleta
   - Verificare la validità degli esempi

3. **Organizzazione**
   - Struttura chiara e consistente
   - Facile da navigare
   - Collegamenti tra documenti correlati

4. **Validazione**
   - Review periodica della documentazione
   - Verifica della coerenza
   - Test degli esempi

## Checklist per Nuove Regole

1. **Valutazione**
   - [ ] Determinare lo scope (globale/modulo)
   - [ ] Identificare impatto
   - [ ] Verificare compatibilità

2. **Documentazione**
   - [ ] Aggiornare docs appropriati
   - [ ] Aggiungere esempi
   - [ ] Creare riferimenti

3. **Regole AI**
   - [ ] Aggiornare .cursor/rules
   - [ ] Fornire contesto
   - [ ] Aggiungere esempi

4. **Windsurf**
   - [ ] Aggiornare .windsurfrules
   - [ ] Verificare coerenza
   - [ ] Testare applicabilità 