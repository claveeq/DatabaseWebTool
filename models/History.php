<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "history".
 *
 * @property integer $history_id
 * @property string $history_server_name
 * @property string $history_db_name
 * @property string $history_date
 * @property string $history_dumpfile_loc
 */
class History extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
         // /  [['history_server_name', 'history_db_name', 'history_date', 'history_dumpfile_loc'], 'required'],
         //    [['history_server_name', 'history_db_name', 'history_date'], 'string', 'max' => 20],
         //    [['history_dumpfile_loc'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'history_id' => 'ID',
            'history_server_name' => 'Server',
            'history_db_name' => 'Database',
            'history_date' => 'Date',
            'history_dumpfile_loc' => 'Dump File Location',
        ];
    }
     public function dump($account){
        $dbhost = $this->history_server_name;
        $dbuser = $account->db_username;
        $dbpass = $account->db_password;
        $dbname = $this->history_db_name;

        // return  $dbname;
        // print_r($data);
        // exit;
        // 
        //$dbhost."/".
        //$backup_file = "C:/".$dbname . date("Y-m-d-H-m-s") . '.sql';
        $backup_file = $_SERVER['DOCUMENT_ROOT']."/".$dbname . date("Y-m-d-H-m-s") . '.sql';
        $command = "cd C:/xampp/mysql/bin/ & mysqldump.exe --routines -h $dbhost -u$dbuser -p$dbpass "."$dbname > $backup_file";
        exec($command,$out,$ret);
        // // echo $command;
        return($backup_file);
        // print_r($command);
        // exit;
    } 
    // public function import(){
    //     return
    // }
    public function restore($histoy,$connection){
        $dbhost = $histoy->history_server_name;
        $dbuser = $connection->db_username;
        $dbpass = $connection->db_password;
        $dbname = $connection->db_database;
        $dumpfile_loc = $histoy->history_dumpfile_loc;
       
        $command = "cd C:/xampp/mysql/bin/ & mysql -h$dbhost -u$dbuser -p$dbpass $dbname < $dumpfile_loc";
        exec($command,$out,$ret);
        if ($ret == 0){
            return "Restored Successfully!"; 
        }
        else{
            return "Sorry, something went wrong.";
        }
    }
}

