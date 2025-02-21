<?php

namespace CRUD;


use CRUD\exceptions;

class Db {

    private static $conn = null;

    public static function getConn() {
        if (!(static::$conn instanceof \PDO)) {
            try {
                static::$conn = new \PDO(\DB_DSN, \DB_USER, \DB_PASSWD,
                        array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
            } catch (\PDOException $e) {
                static::$conn = false;
                throw new AppException
                                ('Error DB. No se puede continuar. Revisa el valor de las constantes DB_USER y DB_PASSWD en el archivo conf.php.',
                                AppException::DB_UNABLE_TO_CONNECT);
            }
        }
        return static::$conn;
    }

    public static function closeConn() {
        static::$conn = null;
    }

    public static function doSQL($sql, $data = []) {
        $ret = false;
        $pdo = self::getConn();
        if (!$pdo)
            throw new AppException('Error DB: no se puede conectar con la base de datos',
                            AppException::DB_NOT_CONNECTED);
        try {
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute($data)) {
                if (preg_match('/^\s*SELECT\s/i', $sql))
                    $ret = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                else
                    $ret = $stmt->rowCount();
            } else
                throw new AppException('Error DB: Fallo al ejecutar la consulta SQL.',
                                AppException::DB_QUERY_EXECUTION_FAILURE
                );
        } catch (\PDOException $ex) {
            if ($ex->getCode() === '23000') {
                throw new AppException('Error DB: la consulta realizada incumple las restricciones de la base de datos.',
                                AppException::DB_CONSTRAINT_VIOLATION_IN_QUERY);
            }
            throw new AppException('Error DB: error en la consulta.',
                            AppException::DB_ERROR_IN_QUERY);
        }
        return $ret;
    }
}

?>