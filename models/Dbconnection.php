<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbconnection".
 *
 * @property integer $db_id
 * @property string $db_host
 * @property string $db_username
 * @property string $db_password
 * @property string $db_database
 */
class Dbconnection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dbconnection';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['db_host', 'db_username', 'db_password'], 'required'],
            [['db_host'], 'string', 'max' => 15],
            [['db_username', 'db_password', 'db_database'], 'string', 'max' => 45],
            [['db_host'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'db_id' => 'Db ID',
            'db_host' => 'Server',
            'db_username' => 'Username',
            'db_password' => 'Password',
            'db_database' => 'Database',
        ];
    }

    public function dbconnect($data){
        // print_r($data);
        // exit;
        $connection = mysqli_connect($data->db_host,$data->db_username, $data->db_password);
        
        if (!$connection) {
            return "error";
            //die("Connection failed: " . mysqli_connect_error());
        }
        // show database
        $sql = "SHOW DATABASES";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_all($result);
        } else {
            echo "Error creating database: " . mysqli_error($connection);
        }       
    }
   
}