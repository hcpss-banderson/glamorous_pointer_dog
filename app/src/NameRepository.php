<?php

namespace HCPSS;

class NameRepository {
    
    /**
     * @var \SQLite3
     */
    private static $db;
    
    private function __construct() {}
    
    private static function getDatabase() : \SQLite3 {
        if (!static::$db) {
            static::$db = new \SQLite3('/srv/sqlite3/db.sqlite');
            
            static::$db->query('
                CREATE TABLE IF NOT EXISTS "names" (
                    "id"          INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                    "name"        VARCHAR NOT NULL,
                    "description" TEXT    NOT NULL,
                    "created"     INTEGER NOT NULL
                )
            ');
        }
        
        return static::$db;
    }
    
    /**
     * Create an instance.
     * 
     * @return NameRepository
     */
    public static function instance() : NameRepository {
        return new static();
    }
    
    /**
     * Does the name exist?
     * 
     * @param string $name
     * @return bool
     */
    public function exists(string $name) : bool {
        /** @var \SQLite3Result $result */
        $result = static::getDatabase()->query('
            SELECT COUNT(*) as count FROM names WHERE name = "' . $name . '"
        ');
        
        return $result->fetchArray(SQLITE3_ASSOC)['count'] > 0;
    }
    
    /**
     * List current projects.
     * 
     * @return array
     */
    public function list() {
        /** @var \SQLite3Result $result */
        $result = static::getDatabase()->query('
            SELECT * FROM names
        ');
        
        $return = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $return[] = $row;
        }
        
        return $return;
    }
    
    /**
     * Insert a name.
     * 
     * @param string $name
     * @param string $description
     * @param int $created
     * @return NameRepository
     */
    public function insert(string $name, string $description, int $created = null) : NameRepository {
        if (!$created) {
            $created = time();
        }
        
        $insert = '
            INSERT INTO "names" ("name", "description", "created")
            VALUES ("' . $name . '", "' . $description . '", ' . $created . ');
        ';
        
        static::getDatabase()->query($insert);
        
        return $this;
    }
}
