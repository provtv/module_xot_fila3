<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
use Sushi\Sushi;
use Webmozart\Assert\Assert;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a table in the INFORMATION_SCHEMA.TABLES.
 *
 * Provides metadata and statistics about database tables.
 *
 * @property string|null $TABLE_CATALOG
 * @property string|null $TABLE_SCHEMA
 * @property string|null $TABLE_NAME
 * @property string|null $TABLE_TYPE
 * @property string|null $ENGINE
 * @property int|null $VERSION
 * @property string|null $ROW_FORMAT
 * @property int|null $TABLE_ROWS
 * @property int|null $AVG_ROW_LENGTH
 * @property int|null $DATA_LENGTH
 * @property int|null $MAX_DATA_LENGTH
 * @property int|null $INDEX_LENGTH
 * @property int|null $DATA_FREE
 * @property int|null $AUTO_INCREMENT
 * @property \Illuminate\Support\Carbon|null $CREATE_TIME
 * @property \Illuminate\Support\Carbon|null $UPDATE_TIME
 * @property \Illuminate\Support\Carbon|null $CHECK_TIME
 * @property string|null $TABLE_COLLATION
 * @property int|null $CHECKSUM
 * @property string|null $CREATE_OPTIONS
 * @property string|null $TABLE_COMMENT
 * @property int $id
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereAUTOINCREMENT($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereAVGROWLENGTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereCHECKSUM($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereCHECKTIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereCREATEOPTIONS($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereCREATETIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereDATAFREE($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereDATALENGTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereENGINE($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereINDEXLENGTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereMAXDATALENGTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereROWFORMAT($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereTABLECATALOG($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereTABLECOLLATION($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereTABLECOMMENT($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereTABLENAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereTABLEROWS($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereTABLESCHEMA($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereTABLETYPE($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereUPDATETIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereVERSION($value)
 * @mixin \Eloquent
<<<<<<< HEAD
=======
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use InvalidArgumentException;
use Sushi\Sushi;

/**
 * Represents a table in the INFORMATION_SCHEMA.TABLES.
 * Provides metadata and statistics about database tables.
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
 */
class InformationSchemaTable extends Model
{
    use Sushi;

    /**
     * The connection name for the model.
     */
<<<<<<< HEAD
    protected $connection = 'information_schema';
=======
<<<<<<< HEAD
    protected $connection = 'information_schema';
=======
    protected $connection = 'mysql';
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)

    /**
     * The table associated with the model.
     */
<<<<<<< HEAD
    protected $table = 'tables';
=======
<<<<<<< HEAD
    protected $table = 'tables';
=======
    protected $table = 'information_schema_tables';
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)

    /**
     * Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
     * @var list<string>
     */
    protected $fillable = [
        'table_schema',
        'table_name',
        'engine',
        'version',
        'row_format',
        'table_rows',
        'avg_row_length',
        'data_length',
        'max_data_length',
        'index_length',
        'data_free',
        'create_time',
        'update_time',
        'check_time',
        'table_collation',
        'checksum',
        'create_options',
        'table_comment',
<<<<<<< HEAD
=======
=======
     * @var array<string>
     */
    protected $fillable = [
        'TABLE_CATALOG',
        'TABLE_SCHEMA',
        'TABLE_NAME',
        'TABLE_TYPE',
        'ENGINE',
        'VERSION',
        'ROW_FORMAT',
        'TABLE_ROWS',
        'AVG_ROW_LENGTH',
        'DATA_LENGTH',
        'MAX_DATA_LENGTH',
        'INDEX_LENGTH',
        'DATA_FREE',
        'AUTO_INCREMENT',
        'CREATE_TIME',
        'UPDATE_TIME',
        'CHECK_TIME',
        'TABLE_COLLATION',
        'CHECKSUM',
        'CREATE_OPTIONS',
        'TABLE_COMMENT',
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    ];

    /**
     * The schema for the Sushi model.
     *
     * @var array<string, string>
     */
    protected $schema = [
        'id' => 'integer',
        'TABLE_CATALOG' => 'string',
        'TABLE_SCHEMA' => 'string',
        'TABLE_NAME' => 'string',
        'TABLE_TYPE' => 'string',
        'ENGINE' => 'string',
        'VERSION' => 'integer',
        'ROW_FORMAT' => 'string',
        'TABLE_ROWS' => 'integer',
        'AVG_ROW_LENGTH' => 'integer',
        'DATA_LENGTH' => 'integer',
        'MAX_DATA_LENGTH' => 'integer',
        'INDEX_LENGTH' => 'integer',
        'DATA_FREE' => 'integer',
        'AUTO_INCREMENT' => 'integer',
        'CREATE_TIME' => 'datetime',
        'UPDATE_TIME' => 'datetime',
        'CHECK_TIME' => 'datetime',
        'TABLE_COLLATION' => 'string',
        'CHECKSUM' => 'integer',
        'CREATE_OPTIONS' => 'string',
        'TABLE_COMMENT' => 'string',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'TABLE_ROWS' => 'integer',
        'AVG_ROW_LENGTH' => 'integer',
        'DATA_LENGTH' => 'integer',
        'MAX_DATA_LENGTH' => 'integer',
        'INDEX_LENGTH' => 'integer',
        'DATA_FREE' => 'integer',
        'AUTO_INCREMENT' => 'integer',
        'CHECKSUM' => 'integer',
        'CREATE_TIME' => 'datetime',
        'UPDATE_TIME' => 'datetime',
        'CHECK_TIME' => 'datetime',
        'VERSION' => 'integer',
    ];

    /**
     * Get the rows array for the Sushi model.
     * This method is required by Sushi to provide the data.
     *
     * @return array<int, array<string, mixed>>
     */
    public function getRows(): array
    {
        $query = "SELECT 
            TABLE_CATALOG,
            TABLE_SCHEMA,
            TABLE_NAME,
            TABLE_TYPE,
            ENGINE,
            VERSION,
            ROW_FORMAT,
            TABLE_ROWS,
            AVG_ROW_LENGTH,
            DATA_LENGTH,
            MAX_DATA_LENGTH,
            INDEX_LENGTH,
            DATA_FREE,
            AUTO_INCREMENT,
            CREATE_TIME,
            UPDATE_TIME,
            CHECK_TIME,
            TABLE_COLLATION,
            CHECKSUM,
            CREATE_OPTIONS,
            TABLE_COMMENT
        FROM information_schema.TABLES
        WHERE TABLE_SCHEMA = ?";

        $results = collect(DB::select($query, [DB::connection()->getDatabaseName()]))
            ->map(function ($row, $index) {
                $data = (array) $row;
                $data['id'] = $index + 1; // Aggiungi un ID incrementale
                return $data;
            })
            ->toArray();

<<<<<<< HEAD
        /** @var array<int, array<string, mixed>> */
=======
<<<<<<< HEAD
        /** @var array<int, array<string, mixed>> */
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
        return $results;
    }

    /**
     * Get table statistics from Sushi or information_schema as fallback.
     *
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
     * @param string $schema The schema name
     * @param string $table The table name
     */
    public static function getTableStats(string $schema, string $table): ?self
    {
        $result = DB::connection('mysql')
            ->table('information_schema.TABLES')
            ->select([
                'TABLE_CATALOG',
                'TABLE_SCHEMA',
                'TABLE_NAME',
                'TABLE_TYPE',
                'ENGINE',
                'VERSION',
                'ROW_FORMAT',
                'TABLE_ROWS',
                'AVG_ROW_LENGTH',
                'DATA_LENGTH',
                'MAX_DATA_LENGTH',
                'INDEX_LENGTH',
                'DATA_FREE',
                'AUTO_INCREMENT',
                'CREATE_TIME',
                'UPDATE_TIME',
                'CHECK_TIME',
                'TABLE_COLLATION',
                'CHECKSUM',
                'CREATE_OPTIONS',
                'TABLE_COMMENT'
            ])
            ->where('TABLE_SCHEMA', '=', $schema)
            ->where('TABLE_NAME', '=', $table)
            ->first();

<<<<<<< HEAD
=======
=======
     * @param string $tableName The name of the table
     * @param string $database The database name
     */
    public static function getTableStats(string $tableName, string $database): ?self
    {
        // Prima prova dal modello Sushi
        $stats = static::query()
            ->where('TABLE_SCHEMA', $database)
            ->where('TABLE_NAME', $tableName)
            ->first();

       
        if ($stats) {
            return $stats;
        }

        // Se non trova nulla, prova da information_schema
        $query = "SELECT * FROM information_schema.TABLES 
                 WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ?";
        
        $result = DB::selectOne($query, [$database, $tableName]);

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
        if (!$result) {
            return null;
        }

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
        // Creiamo una nuova istanza e popoliamola manualmente
        $instance = new self();
        foreach ((array) $result as $key => $value) {
            $instance->setAttribute($key, $value);
        }
        return $instance;
<<<<<<< HEAD
=======
=======
        // Crea una nuova istanza del modello con i dati
        return static::newFromBuilder((array) $result);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    }

    /**
     * Get the row count for a model class.
     * This method incorporates the logic from CountAction.
     *
     * @param class-string<Model> $modelClass The fully qualified model class name
     *
     * @throws InvalidArgumentException If model class is invalid or not found
     */
    public static function getModelCount(string $modelClass): int
    {
        if (! class_exists($modelClass)) {
            throw new InvalidArgumentException("Model class [$modelClass] does not exist");
        }

        /** @var Model $model */
        $model = app($modelClass);

        if (! $model instanceof Model) {
            throw new InvalidArgumentException("Class [$modelClass] must be an instance of ".Model::class);
        }

        $connection = $model->getConnection();
        $database = $connection->getDatabaseName();
        $driver = $connection->getDriverName();
        $table = $model->getTable();

        // Handle in-memory database
        if (':memory:' === $database) {
            return (int) $model->count();
        }

        // Handle SQLite specifically
        if ('sqlite' === $driver) {
            return (int) $model->count();
        }

        return static::getAccurateRowCount($table, $database);
    }

    /**
     * Get accurate row count for a table.
     *
     * @param string $tableName The name of the table
     * @param string $database The database name
     */
    public static function getAccurateRowCount(string $tableName, string $database): int
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
        $stats = static::getTableStats($database, $tableName);
        if ($stats === null) {
            return 0;
        }

        $rows = $stats->getAttribute('TABLE_ROWS');
        if ($rows === null) {
            return 0;
        }
        Assert::numeric($rows);
        return (int) $rows;
<<<<<<< HEAD
=======
=======
        $stats = static::getTableStats($tableName, $database);
        
        if (!$stats) {
            return 0;
        }

        // For InnoDB tables with less than 1000 rows or when TABLE_ROWS is 0,
        // use COUNT(*) for better accuracy
        if ($stats->ENGINE === 'InnoDB' && ($stats->TABLE_ROWS < 1000 || $stats->TABLE_ROWS === 0)) {
            try {
                return (int) DB::table($tableName)->count();
            } catch (\Exception $e) {
                // Se fallisce il count diretto, ritorna il valore stimato
                return (int) $stats->TABLE_ROWS;
            }
        }

        return (int) $stats->TABLE_ROWS;
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    }

    /**
     * Get table size in bytes.
     *
     * @param string $tableName The name of the table
     * @param string $database The database name
     */
    public static function getTableSize(string $tableName, string $database): int
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
        $stats = static::getTableStats($database, $tableName);
        if ($stats === null) {
            return 0;
        }

        $dataLength = $stats->getAttribute('DATA_LENGTH');
        $indexLength = $stats->getAttribute('INDEX_LENGTH');

        if ($dataLength === null || $indexLength === null) {
            return 0;
        }

        // Assicuriamo che i valori siano convertiti correttamente in intero
        $dataLengthInt = is_numeric($dataLength) ? (int) $dataLength : 0;
        $indexLengthInt = is_numeric($indexLength) ? (int) $indexLength : 0;
        
        return $dataLengthInt + $indexLengthInt;
    }

    /**
     * Refresh the cache for a specific table.
<<<<<<< HEAD
=======
=======
        $stats = static::getTableStats($tableName, $database);
        
        if (!$stats) {
            return 0;
        }

        return (int) ($stats->DATA_LENGTH + $stats->INDEX_LENGTH);
    }

    /**
     * Refresh the Sushi cache for a specific table.
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
     *
     * @param string $tableName The name of the table
     * @param string $database The database name
     */
    public static function refreshCache(string $tableName, string $database): void
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
        DB::connection('mysql')
            ->statement("ANALYZE TABLE `{$database}`.`{$tableName}`");
    }
}
<<<<<<< HEAD
=======
=======
        $query = "SELECT * FROM information_schema.TABLES 
                 WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ?";
        
        $result = DB::selectOne($query, [$database, $tableName]);

        if ($result) {
            $data = (array) $result;
            static::updateOrCreate(
                [
                    'TABLE_SCHEMA' => $database,
                    'TABLE_NAME' => $tableName,
                ],
                $data
            );
        }
    }
} 
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
