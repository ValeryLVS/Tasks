<?php
/**
 * Возвращает отформатированную строку для использования в качестве I параметра в new PDO
 * @return string
 */
function prepareDSNString()
{
    return sprintf("%s:host=%s;dbname=%s;charset=%s",
    DRIVER,
    HOST,
    DATABASE,
    CHARSET
    );
}

/**
 * Соединение между PHP и сервером базы данных.
 */
function connection()
{
    try {
        $connection = new PDO(
            prepareDSNString(),
            LOGIN,
            PASSWORD
        );
        $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $connection;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}