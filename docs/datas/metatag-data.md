# MetatagData

La classe MetatagData è un Data Object che gestisce i meta tag per il SEO e i social media.

## Caratteristiche principali

- Gestione dei meta tag SEO standard
- Supporto per Open Graph Protocol
- Configurazione Twitter Cards
- Integrazione con schema.org
- Gestione dei meta tag personalizzati

## Proprietà

| Proprietà | Tipo | Descrizione |
|-----------|------|-------------|
| title | string | Titolo della pagina |
| description | string | Descrizione della pagina |
| keywords | array | Parole chiave per SEO |
| robots | string | Direttive per i crawler |
| author | string | Autore del contenuto |
| ogTitle | string | Titolo per Open Graph |
| ogDescription | string | Descrizione per Open Graph |
| ogImage | string | URL immagine per Open Graph |
| twitterCard | string | Tipo di Twitter Card |
| twitterTitle | string | Titolo per Twitter |
| twitterDescription | string | Descrizione per Twitter |
| twitterImage | string | URL immagine per Twitter |

## Metodi

### Costruttore
```php
public function __construct(array $data)
```

### Factory Methods
```php
public static function fromArray(array $data): self
public static function make(array $data = []): self
```

### Metodi di generazione
```php
public function toHtml(): string
public function toArray(): array
```

## Best Practices

- Utilizzare i metodi factory per creare nuove istanze
- Validare i dati in ingresso con Assert
- Mantenere l'immutabilità dell'oggetto
- Seguire le specifiche dei vari protocolli (Open Graph, Twitter Cards)
- Utilizzare URL assoluti per le immagini

## Esempio di utilizzo

```php
$metatags = MetatagData::make([
    'title' => 'Titolo della pagina',
    'description' => 'Descrizione della pagina',
    'ogTitle' => 'Titolo per social',
    'ogImage' => 'https://example.com/image.jpg',
]);

echo $metatags->toHtml();
```

## Validazione

La classe utilizza `Assert` per validare:
- Presenza dei campi obbligatori
- Formato corretto degli URL
- Lunghezza appropriata dei testi
- Valori validi per i tipi di card 