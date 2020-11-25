<?php



/**
	DB::getInstance()->get_results($query);
 * 
 */
class Db
{
    private $link = null;
    static $inst = null;
	
    public function __construct()
    {
        mb_internal_encoding( 'UTF-8' );
        mb_regex_encoding( 'UTF-8' );
        mysqli_report( MYSQLI_REPORT_STRICT );
        try {
            $this->link = new mysqli( db_HOST, db_USER, db_PASS, db_NAME );
            $this->link->set_charset( "utf8" );
        } catch ( Exception $e ) {
            die( $e->getMessage() ); // exit
        }
    }

    // DB::getInstance()->get_results($query);
    public function get_results( $query, $object = false )
    {
        $row = null;
        
        $results = $this->link->query( $query );
        if( $this->link->error ){
            return false;
        }else{
            $row = [];
            while( $r = ( !$object ) ? $results->fetch_assoc() : $results->fetch_object() )
            {
                $row[] = $r;
            }
            return $row;   
        }
    }
    
    public function query( $query )
    {
        $full_query = $this->link->query( $query );
        if( $this->link->error )
        {
            $this->log_db_errors( $this->link->error, $query );
            return false; 
        }
        else
        {
            return true;
        }
    }

    // DB::getInstance()->escape($data);
     public function escape( $data )
     {
         if( !is_array( $data ) )
         {
             $data = $this->link->real_escape_string( $data );
         }
         else
         {
             //Self call function to sanitize array data
             $data = array_map( array( $this, 'escape' ), $data );
         }
         return $data;
     }


    static function getInstance()
    {
        if( self::$inst == null )
        {
            self::$inst = new self();
        }
        return self::$inst;
    }

}

// new Db();