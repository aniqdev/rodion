<?php


define('db_HOST', 'localhost');
define('db_USER', 'root');
define('db_PASS', '');
define('db_NAME', 'test_dbs');


function db_query($query = '')
{

	$mysqli = new mysqli(db_HOST, db_USER, db_PASS, db_NAME);
	$mysqli->set_charset( "utf8" );
	if ($result = $mysqli->query($query)) {
	    while($obj = $result->fetch_object()){
	        print_r($obj->description);
	    }
	}
	$mysqli->close();


}


/**
	DB::getInstance()->get_results($query);
 * 
 */
class Db
{
    private $link = null;
	
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


    public function get_results( $query, $object = false )
    {
        $row = null;
        
        $results = $this->link->query( $query );
        if( $this->link->error )
        {
            $this->log_db_errors( $this->link->error, $query );
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


}

// new Db();